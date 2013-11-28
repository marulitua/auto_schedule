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
public final class RuangKelas {
    private int id;
    private int praktek;
    private int lantai;
    private ArrayList<Integer> atribut = new ArrayList<Integer>();
    
    public RuangKelas(int Kelas, int Lantai,int Praktek, String atributStr){
        setId(Kelas);
        setLantai(Lantai);
        setPraktek(Praktek);
    
        if(atributStr != null){
            String[] out = atributStr.split(",");
            for (int i = 0; i < out.length; i++) {
                 atribut.add(Integer.parseInt(out[i]));
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

    /**
     * @return the lantai
     */
    public int getLantai() {
        return lantai;
    }

    /**
     * @param lantai the lantai to set
     */
    public void setLantai(int lantai) {
        this.lantai = lantai;
    }

    /**
     * @return the atribut
     */
    public ArrayList<Integer> getAtribut() {
        return atribut;
    }

    /**
     * @param atribut the atribut to set
     */
    public void setAtribut(ArrayList<Integer> atribut) {
        this.atribut = atribut;
    }
}
