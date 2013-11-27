/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package auto_schedule_back_end;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author maruli
 */
public class DataLayer {

    //connect
    String userName = "root";
    String passWord = "";
    String address = "127.0.0.1";
    String db = "penjadwalan";
    Connection con;
    
    //periode perkuliahan
    int periode;
    
    ArrayList<RuangKelas> listRuang = new ArrayList<>();

    public DataLayer() {
        try {
            try {
                Class.forName("com.mysql.jdbc.Driver");
            } catch (ClassNotFoundException ex) {
                Logger.getLogger(DataLayer.class.getName()).log(Level.SEVERE, null, ex);
            }
            con = DriverManager.getConnection("jdbc:mysql://" + address + "/" + db + "?user=" + userName + "&password=" + passWord + "");
        } catch (SQLException ex) {
            Logger.getLogger(DataLayer.class.getName()).log(Level.SEVERE, null, ex);
        }

    }

    public void getActivePeriode() {
        try {
            Statement ps = con.createStatement();
            ResultSet rs = ps.executeQuery("select p.id from periode p where p.finished_time is null");
            int columnCount = rs.getMetaData().getColumnCount();
            while (rs.next()) {
                periode = rs.getInt(1);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DataLayer.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void getRuang() {
        try {
            Statement ps = con.createStatement();
            ResultSet rs = ps.executeQuery
            (
                "select r.id, r.praktek, (select GROUP_CONCAT(t.atribut_id) "
              + "from trx_ruang_atribut t "
              + "where t.ruang_kelas_id = r.id ) as atribut from ruang_kelas r"
            );
            
            while (rs.next()) {
                int id = rs.getInt(1);
                int praktek = rs.getInt(2);
                String atribut = rs.getString(3);

                RuangKelas ruang;
                if(atribut == null)
                    ruang = new RuangKelas(id, praktek);
                else
                    ruang = new RuangKelas(id, praktek, atribut);
               
                listRuang.add(ruang);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DataLayer.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void clearHasil() {
        try {
            Statement ps = con.createStatement();
            int rs = ps.executeUpdate("delete from jadwal_hasil");
        } catch (SQLException ex) {
            Logger.getLogger(DataLayer.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void clearGagal() {
        try {
            Statement ps = con.createStatement();
            int rs = ps.executeUpdate("delete from jadwal_gagal");
        } catch (SQLException ex) {
            Logger.getLogger(DataLayer.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

//    void simpanJadwal(ArrayList<Possible> finalSolutions) {
//        for (int i = 0; i < finalSolutions.size(); i++) {
//            try {
//                Statement ps = con.createStatement();
//                int rs = ps.executeUpdate("INSERT INTO `jadwal_hasil` (`dosen_id`, `ruang_id`, `matakuliah_id`, `day_id`, `start_time`, `end_time`) VALUES (" + finalSolutions.get(i).getDosenId() + ", " + finalSolutions.get(i).getRuangId() + ", " + finalSolutions.get(i).getMatakuliahId() + ", " + finalSolutions.get(i).getDayId() + ", \'" + finalSolutions.get(i).getStartTime() + ":00:00\', \'" + finalSolutions.get(i).getEndTime() + ":00:00\');");
////                int rs = ps.executeUpdate("insert into jadwal_hasil (dosen_id, ruang_id, matakuliah_id, day_id, start_time, end_time) values("+finalSolutions.get(i).getDosenId()+", "+finalSolutions.get(i).getRuangId()+", "+finalSolutions.get(i).getMatakuliahId()+", "+finalSolutions.get(i).getDayId()+", '0"+finalSolutions.get(i).getStartTime()+":00:00', '0"+finalSolutions.get(i).getEndTime())+":00:00'");
//            } catch (SQLException ex) {
//                Logger.getLogger(DataLayer.class.getName()).log(Level.SEVERE, null, ex);
//            }
//        }
//    }

//    void simpanGagal(ArrayList<Kurikulum> listGagal) {
//        for (int i = 0; i < listGagal.size(); i++) {
//            try {
//                Statement ps = con.createStatement();
//                int rs = ps.executeUpdate("INSERT INTO `jadwal_gagal` (`mata_kuliah_id`, `sks`, `praktek`) VALUES (" + listGagal.get(i).getMataKuliah() + ", " + listGagal.get(i).getSks() + ", " + listGagal.get(i).getPraktek() + ");");
////                int rs = ps.executeUpdate("insert into jadwal_hasil (dosen_id, ruang_id, matakuliah_id, day_id, start_time, end_time) values("+finalSolutions.get(i).getDosenId()+", "+finalSolutions.get(i).getRuangId()+", "+finalSolutions.get(i).getMatakuliahId()+", "+finalSolutions.get(i).getDayId()+", '0"+finalSolutions.get(i).getStartTime()+":00:00', '0"+finalSolutions.get(i).getEndTime())+":00:00'");
//            } catch (SQLException ex) {
//                Logger.getLogger(DataLayer.class.getName()).log(Level.SEVERE, null, ex);
//            }
//        }
//    }
}