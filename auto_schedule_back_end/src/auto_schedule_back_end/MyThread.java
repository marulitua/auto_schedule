/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package auto_schedule_back_end;

import java.io.IOException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collections;
import java.util.Comparator;
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
    
    ArrayList<RuangKelas> listRuang = new ArrayList<>(); 
    ArrayList<Kurikulum> listKurikulum = new ArrayList<>();
    ArrayList<Dosen> listDosen = new ArrayList<>();
    
    DataLayer dao = new DataLayer();
    
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
            MsgLog.write("listRuang size = "+listRuang.size());
            
            dao.getKurikulum();
            listKurikulum = dao.listKurikulum;
            MsgLog.write("query listKurikulum");
            MsgLog.write("listKurikulum size = "+listKurikulum.size());
            
            dao.getDosen();
            listDosen = dao.listDosen;
            MsgLog.write("query listDosen");
            MsgLog.write("listDosen size = "+listDosen.size());
            
            // sort berdasarkan optionValue
            Collections.sort(listKurikulum, new CustomComparator());
            
            
        } catch (IOException ex) {
            Logger.getLogger(MyThread.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    // lakukan penyusunan listKurikulum
    // constraint dengan value option paling sedikit paling atas
    // agar proses backtracking lebih efisien
    
    public void sortKurikulum(){
        
    }
}


