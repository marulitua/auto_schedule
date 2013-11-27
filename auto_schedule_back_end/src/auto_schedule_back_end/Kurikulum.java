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
public class Kurikulum implements Comparable<Kurikulum> {
    private int mata_kuliah_id;
    private int praktek;
    private int optionValue;
    
    private ArrayList<Integer> listHari = new ArrayList<Integer>();
    private ArrayList<Integer> listRuang = new ArrayList<Integer>();
    private ArrayList<Integer> listAtribut = new ArrayList<Integer>();
    
    Kurikulum(int mataKuliah, int Praktek,String hari, String ruang, String atribut){
        
        setMata_kuliah_id(mataKuliah);
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
        
        // tentukan optionValue
        if(!listHari.isEmpty() && !listAtribut.isEmpty())
            setOptionValue(1);
        else if(!listHari.isEmpty() && !listRuang.isEmpty())
            setOptionValue(2);
        else if(!listAtribut.isEmpty() && listRuang.isEmpty() && listHari.isEmpty())
            setOptionValue(3);
        else if(listAtribut.isEmpty() && !listRuang.isEmpty() && listHari.isEmpty())
            setOptionValue(4);
        else if(listAtribut.isEmpty() && listRuang.isEmpty() && !listHari.isEmpty())
            setOptionValue(5);
        else setOptionValue(6);
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
     * @return the optionValue
     */
    public int getOptionValue() {
        return optionValue;
    }

    /**
     * @param optionValue the optionValue to set
     */
    public void setOptionValue(int optionValue) {
        this.optionValue = optionValue;
    }

    @Override
    public int compareTo(Kurikulum o) {
         return this.optionValue > o.optionValue ? 1 : this.optionValue < o.optionValue ? -1 : 0;
    }
    
    
}
