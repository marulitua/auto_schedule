/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package auto_schedule_back_end;

import java.util.ArrayList;
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
        
        
        //get data
        
        dao.getRuang();
        listRuang = dao.listRuang;
        
        System.out.println("ruang size = "+listRuang.size());
        
        dao.getKurikulum();
        listKurikulum = dao.listKurikulum;
        
        System.out.println("kurikulum size = "+listKurikulum.size());
        
        dao.getDosen();
        listDosen = dao.listDosen;
        
        System.out.println("dosen size = "+listDosen.size());
    }
}
