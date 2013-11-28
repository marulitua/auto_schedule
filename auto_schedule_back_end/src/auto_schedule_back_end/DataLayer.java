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
    ArrayList<Kurikulum> listKurikulum = new ArrayList<>();
    ArrayList<Dosen> listDosen = new ArrayList<>();

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

    public void getRuang() {
        try {
            Statement ps = con.createStatement();
            ResultSet rs = ps.executeQuery
            (
                "select r.id, r.lantai, r.praktek, (select GROUP_CONCAT(t.atribut_id) "
              + "from trx_ruang_atribut t "
              + "where t.ruang_kelas_id = r.id ) as atribut from ruang_kelas r"
            );
            
            int id;
            int lantai;
            int praktek;
            String atribut;
            RuangKelas ruang;
            while (rs.next()) {
                id = rs.getInt(1);
                lantai = rs.getInt(2);
                praktek = rs.getInt(3);
                atribut = rs.getString(4);

                ruang = new RuangKelas(id, lantai, praktek, atribut);
               
                listRuang.add(ruang);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DataLayer.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void getDosen() {
        try {
            Statement ps = con.createStatement();
            ResultSet rs = ps.executeQuery
            (
                "select t.dosen_id, d.batas_lantai,\n" +
                "(\n" +
                "select GROUP_CONCAT(m.mata_kuliah_id)\n" +
                "from trx_pengajar_mata_kuliah m\n" +
                "where m.pengajar_id = t.id\n" +
                ") \n" +
                "as mata_kuliah,\n" +
                "(\n" +
                "select GROUP_CONCAT(CONCAT_WS('-', w.hari_id ,w.start , w.end))\n" +
                "from trx_pengajar_waktu w\n" +
                "where w.pengajar_id = t.id\n" +
                ") as waktu\n" +
                "from trx_pengajar t \n" +
                "left join dosen d on d.id = t.dosen_id\n" +
                "where t.periode_id = (\n" +
                "select p.id\n" +
                "from periode p\n" +
                "where p.finished_time is null\n" +
                ")"
            );
            
            int id;
            int lantai;
            String mataKuliah;
            String waktu;
            
            Dosen dosen;
            
            while (rs.next()) {
                id = rs.getInt(1);
                lantai = rs.getInt(2);
                mataKuliah = rs.getString(3);
                waktu = rs.getString(4);

                dosen = new Dosen(id, lantai, mataKuliah, waktu);
               
                listDosen.add(dosen);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DataLayer.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void getKurikulum(){
        try {
            Statement ps = con.createStatement();
            ResultSet rs = ps.executeQuery
            (
                "select t.id, t.mata_kuliah_id, \n" +
            "		 t.jumlah_kelas,\n" +
            "		 m.praktek,\n" +
            "		 (\n" +
            "		 	select GROUP_CONCAT(h.hari_id)\n" +
            "		 	from trx_hari_kurikulum h\n" +
            "		 	where h.kurikulum_id = t.id\n" +
            "		 ) as hari,\n" +
            "		 (\n" +
            "		 	select GROUP_CONCAT(r.ruang_kelas_id)\n" +
            "		 	from trx_ruang_kurikulum r\n" +
            "		 	where r.kurikulum_id = t.id\n" +
            "		 ) as ruang,\n" +
            "		 (\n" +
            "		 	select GROUP_CONCAT(a.atribut_id)\n" +
            "		 	from trx_atribut_kurikulum a\n" +
            "		 	where a.kurikulum_id = t.id\n" +
            "		 ) as atribut	\n" +
            "from trx_kurikulum t\n" +
            "left JOIN mata_kuliah m on m.id = t.mata_kuliah_id\n" +
            "where t.periode_id = (\n" +
            "	select p.id\n" +
            "	from periode p\n" +
            "	where p.finished_time is null \n" +
            ")"
            );
            
            int id;
            int mata_kuliah_id;
            int jumlah_kelas;
            int praktek;
            String hari;
            String ruang;
            String atribut;
            Kurikulum kurikulum;
            
            while (rs.next()) {
                id = rs.getInt(1);
                mata_kuliah_id = rs.getInt(2);
                jumlah_kelas = rs.getInt(3);
                praktek = rs.getInt(4);
                hari = rs.getString(5);
                ruang = rs.getString(6);
                atribut = rs.getString(7);

                for(int i = 0;i<jumlah_kelas;i++){
                    kurikulum = new Kurikulum(mata_kuliah_id, praktek, hari, ruang, atribut);
                    listKurikulum.add(kurikulum);
                }
                
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

    public int getActivePeriode() {
        
        int result = 0;
        
        try {
            Statement ps = con.createStatement();
            ResultSet rs = ps.executeQuery("select p.id from periode p where p.finished_time is null ");
            while (rs.next()) {
                result = rs.getInt(1);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DataLayer.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        return result;
    }
}