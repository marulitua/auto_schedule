/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package auto_schedule_back_end;

import java.io.IOException;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Random;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author maruli
 */
public class MyThread extends Thread {

    long startTime;
    int anchor = 0;

    // flag menandakan index listKurikulum yang paling terakhir dicoba
    int flag = -1;
    int safety = 0;
    int counter = 0;

    ArrayList<RuangKelas> listRuang = new ArrayList<>();
    ArrayList<Kurikulum> listKurikulum = new ArrayList<>();
    ArrayList<Dosen> listDosen = new ArrayList<>();

    ArrayList<Jadwal> listSolved = new ArrayList<>();
    ArrayList<Kurikulum> listUnSolved = new ArrayList<>();

    ArrayList<Jadwal> listJadwal = new ArrayList<>();

    DataLayer dao = new DataLayer();
    int periode = dao.getActivePeriode();

    public MyThread(long StartTime) {
        startTime = StartTime;
    }

    MyThread() {

    }

    @Override
    public void run() {
        try {
            //get data

            dao.getRuang();
            listRuang = dao.listRuang;
            long seed = System.nanoTime();
            Collections.shuffle(listRuang, new Random(seed));
            MsgLog.write("query listRuang");
            MsgLog.write("listRuang size = " + listRuang.size());

            dao.getKurikulum();
            listKurikulum = dao.listKurikulum;
            MsgLog.write("query listKurikulum");
            MsgLog.write("listKurikulum size = " + listKurikulum.size());

            dao.getDosen();
            listDosen = dao.listDosen;
            MsgLog.write("query listDosen");
            MsgLog.write("listDosen size = " + listDosen.size());

            //susun domain
            createDomain();
            MsgLog.write("susun domain");

            removeZeroSolution();

            Collections.sort(listKurikulum, new CustomComparator());

            int max = listKurikulum.get(0).getSolutionSpace().size();
            int min = listKurikulum.get(0).getSolutionSpace().size();

            for (int x = 0; x < listKurikulum.size(); x++) {
                if (listKurikulum.get(x).getSolutionSpace().size() > max) {
                    max = listKurikulum.get(x).getSolutionSpace().size();
                }

                if (listKurikulum.get(x).getSolutionSpace().size() < min) {
                    min = listKurikulum.get(x).getSolutionSpace().size();
                }
            }

//          MsgLog.write("Sort berdasarkan optionValue");
            //do backtracking
            do {
                // jika ada constraint yang tidak memiliki solusi 
                // eliminasi constraint tersebut
                // cspBt();
                if (flag != -1) {
                    // masukkan ke unsolved

                    removeFromList();

                }
            } while (!cspBt());
            dao.clearGagal();
            dao.clearHasil();
            dao.saveSolved(listSolved);
            dao.saveUnSolved(listUnSolved);

            MsgLog.write("listKurikulum.size() = " + listKurikulum.size());
            MsgLog.write("listSolved.size() = " + listSolved.size());
            MsgLog.write("listUnSolved.size() = " + listUnSolved.size());

            MsgLog.write("execution time = " + (double) (System.nanoTime() - startTime) / 1000000000 + " s");

            dao.saveLog(listKurikulum.size(), (double) (System.nanoTime() - startTime) / 1000000000, min, max, listSolved.size(), listUnSolved.size(), counter);

        } catch (IOException | SQLException ex) {
            Logger.getLogger(MyThread.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    private boolean cspBt() throws IOException {
        return doBacktracking(0);
    }

    private boolean doBacktracking(int y) throws IOException {

        Jadwal result;
        counter++;

        if (y == listKurikulum.size()) {
            return true;
        } else {
            boolean successful = false;
            if (y > flag) {
                flag = y;
                MsgLog.write(String.valueOf(flag));
            } else {
                safety++;
                if (listKurikulum.get(y).getSolutionSpace().size() < safety) {
                    return false;
                }
            }

            int i = 0;

            if (isFull(y)) {
                return false;
            }
            while (!successful && (i < listKurikulum.get(y).getSolutionSpace().size())) {
                if (listKurikulum.get(y).getSolutionSpace().get(i).getFlag()) {
                    result = compare(y, i);
                    if (result == null) {
                        i++;
                    } else {
                        listSolved.add(result);
                        successful = doBacktracking(y + 1);
                        removeInconsistentValue(y, result);

                        if (!successful) {
                            // remove the lastest solved
                            listSolved.remove(listSolved.size() - 1);
                            //MsgLog.write("remove from listSolved");
                            restoreInconsistentValue(y, result);
                            i++;

                            if (listKurikulum.get(y).getListAtribut().equals(listKurikulum.get(y + 1).getListAtribut()) && listKurikulum.get(y).getListHari().equals(listKurikulum.get(y + 1).getListHari()) && listKurikulum.get(y).getListRuang().equals(listKurikulum.get(y + 1).getListRuang()) && listKurikulum.get(y).getMata_kuliah_id() == listKurikulum.get(y + 1).getMata_kuliah_id() && listKurikulum.get(y).getOptionValue() == listKurikulum.get(y + 1).getOptionValue() && listKurikulum.get(y).getPraktek() == listKurikulum.get(y + 1).getPraktek() && listKurikulum.get(y).getSks() == listKurikulum.get(y + 1).getSks()) {
                                //   MsgLog.write("nyentuh ga sih");
                                return false;
                            }
                        }
                    }
                } else {
                    i++;
                }
            }

            return successful;
        }
    }

    public void createDomain() throws IOException {
        long seed;
        for (int k = 0; k < listKurikulum.size(); k++) { // matakuliah
            for (int i = 0; i < listRuang.size(); i++) { // ruang 
                for (int x = 0; x < listDosen.size(); x++) { //dosen
                    if (isPosible(k, i, x)) {
                        if (listKurikulum.get(k).getPraktek() == 1) {
                            for (int a = listDosen.get(x).getMulai(); a <= listDosen.get(x).getSelesai(); a++) {
                                if (a + (listKurikulum.get(k).getSks() * 2) > listDosen.get(x).getSelesai()) {
                                    break;
                                } else {
                                    //MsgLog.write("tambah solutionSpace");
                                    listKurikulum.get(k).getSolutionSpace().add(new SolutionSpace(listDosen.get(x).getId(), listDosen.get(x).getHari(), listRuang.get(i).getId(), a, a + (listKurikulum.get(k).getSks()*2)));
                                }
                            }
                        } else {
                            for (int a = listDosen.get(x).getMulai(); a <= listDosen.get(x).getSelesai(); a++) {
                                if (a + listKurikulum.get(k).getSks() > listDosen.get(x).getSelesai()) {
                                    break;
                                } else {
                                    //MsgLog.write("tambah solutionSpace");
                                    listKurikulum.get(k).getSolutionSpace().add(new SolutionSpace(listDosen.get(x).getId(), listDosen.get(x).getHari(), listRuang.get(i).getId(), a, a + listKurikulum.get(k).getSks()));
                                }
                            }
                        }
                    }
                }
            }
            seed = System.nanoTime();
            Collections.shuffle(listKurikulum.get(k).getSolutionSpace(), new Random(seed));
        }
    }

    private Jadwal compare(int kurikulum, int domain) throws IOException {

        if (listKurikulum.get(kurikulum).getSolutionSpace().isEmpty()) {
            return null;
        }

        //MsgLog.write(kurikulum + " " + domain);
        Kurikulum constraint = listKurikulum.get(kurikulum);
        SolutionSpace posible = listKurikulum.get(kurikulum).getSolutionSpace().get(domain);

        if (isAvailable(posible.getDosenId(), posible.getRuangId(), posible.getHariId(), posible.getJamMulai(), posible.getJamSelesai())) {
            return new Jadwal(periode, constraint.getMata_kuliah_id(), posible.getDosenId(), posible.getRuangId(), posible.getHariId(), posible.getJamMulai(), posible.getJamSelesai());
        }

        return null;
    }

    public boolean isAvailable(int dosen, int ruang, int hari, int mulai, int selesai) {

        Jadwal param;
        // cek apakah waktu dosen dan ruang masih tersedia pada waktu tersebut
        for (int i = 0; i < listSolved.size(); i++) {
            param = listSolved.get(i);

            if ((param.getHari() == hari && param.getDosen() == dosen) || (param.getHari() == hari && param.getRuang_kelas() == ruang)) {

                if (selesai <= param.getMulai() || param.getSelesai() <= mulai) {
                } else {
                    return false;
                }

            }

        }

        return true;
    }

    private boolean isPosible(int k, int i, int x) {
        Kurikulum kurikulum = listKurikulum.get(k);
        RuangKelas ruang = listRuang.get(i);
        Dosen dosen = listDosen.get(x);

        //batas lantai
        if (dosen.getBatas() < ruang.getLantai() && dosen.getBatas() != 0) {
            return false;
        }

        // uji mata kuliah
        if (!dosen.isValidCourse(kurikulum.getMata_kuliah_id())) {
            return false;
        }

        // uji sks <= alokasi waktu dosen
        if (kurikulum.getSks() > (dosen.getSelesai() - dosen.getMulai())) {
            return false;
        }

        // uji hari
        if (!dosen.isValidDay(kurikulum.getListHari())) {
            return false;
        }

        // uji ruang
        if (!kurikulum.isValidRoom(ruang.getId())) {
            return false;
        }

        if (!kurikulum.isValidAtribut(ruang.getAtribut())) {
            return false;
        }

        return !kurikulum.getListRuang().isEmpty() || !kurikulum.getListAtribut().isEmpty() || kurikulum.getPraktek() == ruang.getPraktek();
    }

    private void removeFromList() throws IOException {

        boolean counter = false;

        Kurikulum find = listKurikulum.get(flag);

        do {
            counter = true;
            for (int i = flag; i < listKurikulum.size(); i++) {
                //if (listKurikulum.get(i).equals(find)) {
                if (listKurikulum.get(i).getListAtribut().equals(find.getListAtribut()) && listKurikulum.get(i).getListHari().equals(find.getListHari()) && listKurikulum.get(i).getListRuang().equals(find.getListRuang()) && listKurikulum.get(i).getMata_kuliah_id() == find.getMata_kuliah_id() && listKurikulum.get(i).getOptionValue() == find.getOptionValue() && listKurikulum.get(i).getPraktek() == find.getPraktek() && listKurikulum.get(i).getSks() == find.getSks()) {
                    listUnSolved.add(listKurikulum.get(i));
                    //MsgLog.write("hapus index ke "+i);
                    listKurikulum.remove(i);
                    counter = false;
                    //MsgLog.write("listKurikulum size tinggal  = " + listKurikulum.size());
                    break;
                }
            }
        } while (!counter);
        flag = -1;
        safety = 0;
    }

    private void removeInconsistentValue(int y, Jadwal result) throws IOException {
        for (int i = y; i < listKurikulum.size(); i++) {
            ArrayList<SolutionSpace> param = listKurikulum.get(i).getSolutionSpace();
            for (int j = 0; j < param.size(); j++) {
                if ((result.getHari() == param.get(j).getHariId() && result.getDosen() == param.get(j).getDosenId()) || (result.getHari() == param.get(j).getHariId() && result.getRuang_kelas() == param.get(j).getRuangId())) {
                    if (result.getSelesai() <= param.get(j).getJamMulai() || param.get(j).getJamSelesai() <= result.getMulai()) {

                    } else {
                        //MsgLog.write("remove from inconsistent");
                        listKurikulum.get(i).getSolutionSpace().get(j).setFlag(false);
                    }
                }
            }
        }
    }

    private void restoreInconsistentValue(int y, Jadwal result) throws IOException {
        for (int i = y; i < listKurikulum.size(); i++) {
            ArrayList<SolutionSpace> param = listKurikulum.get(i).getSolutionSpace();
            for (int j = 0; j < param.size(); j++) {
                if ((result.getHari() == param.get(j).getHariId() && result.getDosen() == param.get(j).getDosenId()) || (result.getHari() == param.get(j).getHariId() && result.getRuang_kelas() == param.get(j).getRuangId())) {
                    if (result.getSelesai() <= param.get(j).getJamMulai() || param.get(j).getJamSelesai() <= result.getMulai()) {

                    } else {
                        //MsgLog.write("restore from inconsistent");
                        listKurikulum.get(i).getSolutionSpace().get(j).setFlag(true);
                    }
                }
            }
        }
    }

    private void removeZeroSolution() {
        boolean counter = false;

        do {
            counter = true;
            for (int i = 0; i < listKurikulum.size(); i++) {
                if (listKurikulum.get(i).getSolutionSpace().isEmpty()) {
                    listUnSolved.add(listKurikulum.get(i));
                    listKurikulum.remove(i);
                    counter = false;
                    //MsgLog.write("listKurikulum size tinggal  = " + listKurikulum.size());
                    break;
                }
            }
        } while (!counter);
    }

    private boolean isFull(int y) {

        ArrayList<SolutionSpace> space = listKurikulum.get(y).getSolutionSpace();

        for (int i = 0; i < space.size(); i++) {
            if (space.get(i).getFlag()) {
                return false;
            }
        }

        return true;
    }

}
