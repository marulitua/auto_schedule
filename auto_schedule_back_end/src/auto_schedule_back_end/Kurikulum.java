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
    private int sks;
    
    private ArrayList<Integer> listHari = new ArrayList<Integer>();
    private ArrayList<Integer> listRuang = new ArrayList<Integer>();
    private ArrayList<Integer> listAtribut = new ArrayList<Integer>();
    
    private ArrayList<SolutionSpace> solutionSpace = new ArrayList<SolutionSpace>();
     
    Kurikulum(int mataKuliah, int Praktek, int Sks, String hari, String ruang, String atribut){
        
        setMata_kuliah_id(mataKuliah);
        setPraktek(Praktek);
        setSks(Sks);
        
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

//    @Override
//    public int compareTo(Kurikulum o) {
//         return this.solutionSpace.size() > o.solutionSpace.size() ? 1 : this.solutionSpace.size() < o.solutionSpace.size() ? -1 : 0;
//    }
    
    public boolean isValidDay(int param){
        if(getListHari().size() == 0)
            return true;
        
        return getListHari().contains(param);
    }

    boolean isValidRoom(int id) {
        if(getListRuang().size() == 0)
            return true;
        
        return getListRuang().contains(id);
    }

    boolean isValidAtribut(ArrayList<Integer> atribut) {
        if(this.getListAtribut().size() != 0 && this.getListRuang().size() == 0){
        
            if(getListAtribut().size() > atribut.size())
                return false;

            for(int i = 0;i < getListAtribut().size();i++){
                if(!atribut.contains(listAtribut.get(i)))
                    return false;
            }
            
        }
        
        return true;
    }

    /**
     * @return the listAtribut
     */
    public ArrayList<Integer> getListAtribut() {
        return listAtribut;
    }

    /**
     * @return the sks
     */
    public int getSks() {
        return sks;
    }

    /**
     * @param sks the sks to set
     */
    public void setSks(int sks) {
        this.sks = sks;
    }

    /**
     * @return the listRuang
     */
    public ArrayList<Integer> getListRuang() {
        return listRuang;
    }

    /**
     * @param listRuang the listRuang to set
     */
    public void setListRuang(ArrayList<Integer> listRuang) {
        this.listRuang = listRuang;
    }

    /**
     * @return the listHari
     */
    public ArrayList<Integer> getListHari() {
        return listHari;
    }

    /**
     * @return the solutionSpace
     */
    public ArrayList<SolutionSpace> getSolutionSpace() {
        return solutionSpace;
    }

    /**
     * @param solutionSpace the solutionSpace to set
     */
    public void setSolutionSpace(ArrayList<SolutionSpace> solutionSpace) {
        this.solutionSpace = solutionSpace;
    }
    
    
}
