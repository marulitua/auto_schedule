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
    private int hari;
    private int mulai;
    private int selesai;
    
    ArrayList<Integer> listMatakuliah = new ArrayList<Integer>();

    public Dosen(int Id, int Batas, String Matakuliah, int Hari, int Mulai, int Selesai) {
        setId(Id);
        setBatas(Batas);
        setHari(Hari);
        setMulai(Mulai);
        setSelesai(Selesai);
        
        if(Matakuliah != null){
            String[] out = Matakuliah.split(",");
            for (int i = 0; i < out.length; i++) {
                listMatakuliah.add(Integer.parseInt(out[i]));
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

    /**
     * @return the hari
     */
    public int getHari() {
        return hari;
    }

    /**
     * @param hari the hari to set
     */
    public void setHari(int hari) {
        this.hari = hari;
    }

    /**
     * @return the mulai
     */
    public int getMulai() {
        return mulai;
    }

    /**
     * @param mulai the mulai to set
     */
    public void setMulai(int mulai) {
        this.mulai = mulai;
    }

    /**
     * @return the selesai
     */
    public int getSelesai() {
        return selesai;
    }

    /**
     * @param selesai the selesai to set
     */
    public void setSelesai(int selesai) {
        this.selesai = selesai;
    }
    
    public boolean isValidCourse(int param){
        return listMatakuliah.contains(param);
    }
    
}
