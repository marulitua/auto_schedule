/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package auto_schedule_back_end;

/**
 *
 * @author maruli
 */
class SolutionSpace {
    private int dosenId;
    private int hariId;
    private int ruangId;
    private int jamMulai;
    private int jamSelesai;
    private boolean flag;

    public SolutionSpace(int Dosen, int Hari, int Ruang, int Mulai, int Selesai) {
        setDosenId(Dosen);
        setHariId(Hari);
        setRuangId(Ruang);
        setJamMulai(Mulai);
        setJamSelesai(Selesai);
        setFlag(true);
    }
    
    /**
     * @return the dosenId
     */
    public int getDosenId() {
        return dosenId;
    }

    /**
     * @param dosenId the dosenId to set
     */
    public void setDosenId(int dosenId) {
        this.dosenId = dosenId;
    }

    /**
     * @return the hariId
     */
    public int getHariId() {
        return hariId;
    }

    /**
     * @param hariId the hariId to set
     */
    public void setHariId(int hariId) {
        this.hariId = hariId;
    }

    /**
     * @return the jamMulai
     */
    public int getJamMulai() {
        return jamMulai;
    }

    /**
     * @param jamMulai the jamMulai to set
     */
    public void setJamMulai(int jamMulai) {
        this.jamMulai = jamMulai;
    }

    /**
     * @return the jamSelesai
     */
    public int getJamSelesai() {
        return jamSelesai;
    }

    /**
     * @param jamSelesai the jamSelesai to set
     */
    public void setJamSelesai(int jamSelesai) {
        this.jamSelesai = jamSelesai;
    }

    /**
     * @return the ruangId
     */
    public int getRuangId() {
        return ruangId;
    }

    /**
     * @param ruangId the ruangId to set
     */
    public void setRuangId(int ruangId) {
        this.ruangId = ruangId;
    }

    /**
     * @return the flag
     */
    public boolean getFlag() {
        return flag;
    }

    /**
     * @param flag the flag to set
     */
    public void setFlag(boolean flag) {
        this.flag = flag;
    }
    
    
}
