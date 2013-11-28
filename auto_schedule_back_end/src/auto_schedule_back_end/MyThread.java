/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package auto_schedule_back_end;

import java.io.IOException;
import java.util.ArrayList;
import java.util.Collections;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author maruli
 */
public class MyThread extends Thread {

    int minTime = 8;
    int maxTime = 18;
    long startTime;
    int anchor = 0;
    
    // flag menandakan index listKurikulum yang paling terakhir dicoba
    int flag = -1;
    
    ArrayList<RuangKelas> listRuang = new ArrayList<>();
    ArrayList<Kurikulum> listKurikulum = new ArrayList<>();
    ArrayList<Dosen> listDosen = new ArrayList<>();
    ArrayList<Domain> listDomain = new ArrayList<>();
    
    ArrayList<Jadwal> listSolved = new ArrayList<>();
    ArrayList<Kurikulum> listUnSolved = new ArrayList<>();
    
    ArrayList<Jadwal> listJadwal = new ArrayList<>();

    DataLayer dao = new DataLayer();
    int periode = dao.getActivePeriode();
    
    public MyThread() {

    }

    public MyThread(long StartTime) {
        startTime = StartTime;
    }

    @Override
    public void run() {
        try {
            //get data

            dao.getRuang();
            listRuang = dao.listRuang;
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

            // sort berdasarkan optionValue
            Collections.sort(listKurikulum, new CustomComparator());
            MsgLog.write("Sort berdasarkan optionValue");
            
            //susun domain
            createDomain();
            MsgLog.write("susun domain");
            MsgLog.write("listDomain size = "+listDomain.size());
            
            //do backtracking
            do{
                // jika ada constraint yang tidak memiliki solusi 
                // eliminasi constraint tersebut
                cspBt();
                if(flag != 0 && flag < listKurikulum.size()){
                    // masukkan ke unsolved
                    listUnSolved.add(listKurikulum.get(flag));
                    listKurikulum.remove(flag);
                    
                    MsgLog.write("listKurikulum.size() = "+listKurikulum.size());
                    
                    //reset flag
                    flag = -1;
                    
                    MsgLog.write("found unsolved");
                }else{
                    anchor = 0;
                }
                
            }while(flag != 0);
            
            MsgLog.write("listKurikulum.size() = "+listKurikulum.size());
            MsgLog.write("listSolved.size() = "+listSolved.size()); 
            MsgLog.write("listUnSolved.size() = "+listUnSolved.size()); 
            
            MsgLog.write("execution time = "+(double)(System.nanoTime() - startTime) / 1000000000 + " s");
            
        } catch (IOException ex) {
            Logger.getLogger(MyThread.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    // susun daftar variable
    public void createDomain() {
        Domain variabel;
        for (int i = 0; i < listRuang.size(); i++) {
            for (int x = 0; x < listDosen.size(); x++) {
                if (listDosen.get(x).getBatas() != 0) {
                    if (listDosen.get(x).getBatas() <= listRuang.get(i).getLantai()) {
                        continue;
                    }
                }

                variabel = new Domain(x, i);
                listDomain.add(variabel);
            }
        }
    }

    private boolean cspBt() throws IOException {
        return doBacktracking(0);
    }

    private boolean doBacktracking(int x) throws IOException {
        MsgLog.write("constraint = "+x);
        
        Jadwal result;
        boolean successful;
        if(x > flag)
            flag = x;
            
        if(x == listKurikulum.size())
            return true;
        else{
            for(int i = 0; i < listDomain.size(); i++){
                result = compare(x, i);
                if( result != null){
                    
                    listSolved.add(result);
                    successful = doBacktracking(x + 1);
                    
                    if (!successful) {
                        // remove the lastest solved
                        listSolved.remove(listSolved.size() - 1);
                        i++;
                    }              
                }
            }
        }
        
        return false;
    }

    private Jadwal compare(int kurikulum, int domain) {
        try {
            
            Jadwal result = null;
            
            Kurikulum constraint = listKurikulum.get(kurikulum);
            
            Dosen varDosen = listDosen.get(listDomain.get(domain).getIdDosen());
            
            RuangKelas varRuang = listRuang.get(listDomain.get(domain).getIdRuang());
            
            // cek matakuliah
            if(!varDosen.isValidCourse(constraint.getMata_kuliah_id()))
                return null;
            
            // cek hari
            if(!constraint.isValidDay(varDosen.getHari()))
                return null;
            
            //praktek
            if(constraint.getPraktek() != varRuang.getPraktek())
                return null;
            
            if(!constraint.isValidRoom(varRuang.getId()))
                return null;
            
            //compare attribut
            if(constraint.getListAtribut().size() != 0 && constraint.getListRuang().size() == 0)
                if(!constraint.isValidAtribut(varRuang.getAtribut()))
                    return null;
            
            //sks > selesai - mulai
            if(constraint.getSks() > (varDosen.getSelesai() - varDosen.getMulai()))
                return null;
            
            // dari depan
            
            for(int i = varDosen.getMulai(); i <= varDosen.getSelesai(); i++){
                if( i + constraint.getSks() > varDosen.getSelesai())
                    break;
                else{
                    if(isAvailable(varDosen.getId(), varRuang.getId(), i, i + constraint.getSks()))
                        return new Jadwal(periode, constraint.getMata_kuliah_id(), varDosen.getId(), varRuang.getId(), i, i + constraint.getSks());
                }
            }
            
            //dari belakang
            for(int i = varDosen.getSelesai(); i >= varDosen.getMulai(); i--){
                if( i - constraint.getSks() < varDosen.getMulai())
                    break;
                else{
                    if(isAvailable(varDosen.getId(), varRuang.getId(), i, i - constraint.getSks()))
                        return new Jadwal(periode, constraint.getMata_kuliah_id(), varDosen.getId(), varRuang.getId(), i, i - constraint.getSks());
                }
            }
            
            return result;
        } catch (IOException ex) {
            Logger.getLogger(MyThread.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        
        return null;
    }
    
    public boolean isAvailable(int dosen, int ruang, int mulai, int selesai) throws IOException{
        
        Jadwal param;        
        // cek apakah waktu dosen masih tersedia pada waktu tersebut
        for(int i = 0; i<listSolved.size(); i++ ){
            param = listSolved.get(i);
            if(param.getDosen() == dosen && param.getMulai() <= mulai && param.getSelesai() >= selesai)
                return false;
            
            if(param.getDosen() == dosen && param.getMulai() < selesai)
                return false;
            
            if(param.getDosen() == dosen && param.getSelesai() < mulai)
                return false;
        }
        
        // cek apakah ruang masih tersedia pada waktu tersebut
        for(int i = 0; i<listSolved.size(); i++ ){
            param = listSolved.get(i);
            if(param.getRuang_kelas() == ruang && param.getMulai() <= mulai && param.getSelesai() >= selesai)
                return false;
            
            if(param.getRuang_kelas() == ruang && param.getMulai() < selesai)
                return false;
            
            if(param.getRuang_kelas() == ruang && param.getSelesai() < mulai)
                return false;
        }
        
        return true;
    }
}
