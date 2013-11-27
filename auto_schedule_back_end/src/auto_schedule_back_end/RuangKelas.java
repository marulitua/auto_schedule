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
    private boolean praktek;
    private ArrayList<Integer> atribut = new ArrayList<Integer>();
    
    public RuangKelas(int Kelas, int Praktek){
        setId(Kelas);
        if(Praktek == 1)
            setPraktek(true);
        else
            setPraktek(false);
    }
    
    public RuangKelas(int Kelas, int Praktek, String atributStr){
        setId(Kelas);
        if(Praktek == 1)
            setPraktek(true);
        else
            setPraktek(false);
        
        String[] out = atributStr.split(",");
        for (int i = 0; i < out.length; i++) {
             atribut.add(Integer.parseInt(out[i]));
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
    public boolean getPraktek() {
        return praktek;
    }

    /**
     * @param praktek the praktek to set
     */
    public void setPraktek(boolean praktek) {
        this.praktek = praktek;
    }
}
