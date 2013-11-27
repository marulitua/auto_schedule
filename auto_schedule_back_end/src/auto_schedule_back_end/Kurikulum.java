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
public class Kurikulum {
    private int id;
    private int mata_kuliah_id;
    private int jumlah_kelas;
    private int praktek;
    
    private ArrayList<Integer> listHari = new ArrayList<Integer>();
    private ArrayList<Integer> listRuang = new ArrayList<Integer>();
    private ArrayList<Integer> listAtribut = new ArrayList<Integer>();
    
    Kurikulum(int Id, int mataKuliah, int jumlahKelas, int Praktek,String hari, String ruang, String atribut){
        setId(Id);
        setMata_kuliah_id(mataKuliah);
        setJumlah_kelas(jumlahKelas);
        setPraktek(Praktek);
        
        if(hari != null){
            String[] out = hari.split(",");
            for (int i = 0; i < out.length; i++) {
                listHari.add(Integer.parseInt(out[i]));
            }
        }
        
        if(ruang != null){
            String[] out = ruang.split(",");
            for (int i = 0; i < out.length; i++) {
                listRuang.add(Integer.parseInt(out[i]));
            }
        }
        
        if(ruang == null && atribut != null){
            String[] out = atribut.split(",");
            for (int i = 0; i < out.length; i++) {
                listAtribut.add(Integer.parseInt(out[i]));
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
     * @return the mata_kuliah_id
     */
    public int getMata_kuliah_id() {
        return mata_kuliah_id;
    }

    /**
     * @param mata_kuliah_id the mata_kuliah_id to set
     */
    public void setMata_kuliah_id(int mata_kuliah_id) {
        this.mata_kuliah_id = mata_kuliah_id;
    }

    /**
     * @return the jumlah_kelas
     */
    public int getJumlah_kelas() {
        return jumlah_kelas;
    }

    /**
     * @param jumlah_kelas the jumlah_kelas to set
     */
    public void setJumlah_kelas(int jumlah_kelas) {
        this.jumlah_kelas = jumlah_kelas;
    }

    /**
     * @return the praktek
     */
    public int getPraktek() {
        return praktek;
    }

    /**
     * @param praktek the praktek to set
     */
    public void setPraktek(int praktek) {
        this.praktek = praktek;
    }
    
    
}
