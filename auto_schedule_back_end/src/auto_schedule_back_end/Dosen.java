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
public class Dosen {
    private int id;
    private int batas;
    
    ArrayList<Integer> listMatakuliah = new ArrayList<Integer>();
    ArrayList<Waktu> listWaktu = new ArrayList<Waktu>();

    public Dosen(int Id, int Batas, String Matakuliah, String Waktu) {
        setId(Id);
        setBatas(Batas);
        
        if(Matakuliah != null){
            String[] out = Matakuliah.split(",");
            for (int i = 0; i < out.length; i++) {
                listMatakuliah.add(Integer.parseInt(out[i]));
            }           
        }
        
        if(Waktu != null){
            String[] out = Waktu.split(",");
            for (int i = 0; i < out.length; i++) {
                String[] peer = out[i].split("-");
                
                Waktu waktuDosen = new Waktu(Integer.parseInt(peer[0]),Integer.parseInt(peer[1]),Integer.parseInt(peer[2]));
                listWaktu.add(waktuDosen);
            }
        }
    }
    
    /**
     * @return the id
     */
    public int getId() {
        return id;
    }

    /**
     * @param id the id to set
     */
    public void setId(int id) {
        this.id = id;
    }

    /**
     * @return the batas
     */
    public int getBatas() {
        return batas;
    }

    /**
     * @param batas the batas to set
     */
    public void setBatas(int batas) {
        this.batas = batas;
    }
    
}
