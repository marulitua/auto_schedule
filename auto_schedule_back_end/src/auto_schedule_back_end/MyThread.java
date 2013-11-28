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
                if(flag != -1){
                    // masukkan ke unsolved
                    listUnSolved.add(listKurikulum.get(flag));
                    listKurikulum.remove(flag);
                    
                    //reset flag
                    flag = -1;
                    
                    MsgLog.write("found unsolved");
                }
            }while(!cspBt());
            
            MsgLog.write("listKurikulum.size() = "+listKurikulum.size());
            MsgLog.write("listSolved.size() = "+listSolved.size()); 
            MsgLog.write("listUnSolved.size() = "+listUnSolved.size()); 
            
            MsgLog.write("execution time = "+(double)(System.nanoTime() - startTime) / 1000000000);
            
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

    private boolean cspBt() {
        return doBacktracking(0);
    }

    private boolean doBacktracking(int x) {
        Jadwal result;
        boolean successful;
        
        if(x == listKurikulum.size())
            return true;
        else{
            flag++;
            
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
        if(constraint.getListAtribut().size() == 0)
            if(!constraint.isValidAtribut(varRuang.getAtribut()))
                return null;
        
        // waktu
        
        return result;
        
    }
}
