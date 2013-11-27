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
class Waktu {
    private int hari;
    private int jamMulai;
    private int jamSelesai;

    Waktu(int Hari, int JamMulai, int JamSelesai){
        setHari(Hari);
        setJamMulai(JamMulai);
        setJamSelesai(JamSelesai);
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
}
