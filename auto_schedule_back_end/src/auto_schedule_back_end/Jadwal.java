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
public class Jadwal {
    private int periode;
    private int mata_kuliah;
    private int dosen;
    private int ruang_kelas;
    private int mulai;
    private int selesai;

    public Jadwal(int Periode, int MataKuliah, int Dosen, int RuangKelas, int Mulai, int Selesai) {
        setPeriode(Periode);
        setMata_kuliah(MataKuliah);
        setDosen(Dosen);
        setRuang_kelas(RuangKelas);
        setMulai(Mulai);
        setSelesai(Selesai);
    }
    
    /**
     * @return the periode
     */
    public int getPeriode() {
        return periode;
    }

    /**
     * @param periode the periode to set
     */
    public void setPeriode(int periode) {
        this.periode = periode;
    }

    /**
     * @return the mata_kuliah
     */
    public int getMata_kuliah() {
        return mata_kuliah;
    }

    /**
     * @param mata_kuliah the mata_kuliah to set
     */
    public void setMata_kuliah(int mata_kuliah) {
        this.mata_kuliah = mata_kuliah;
    }

    /**
     * @return the dosen
     */
    public int getDosen() {
        return dosen;
    }

    /**
     * @param dosen the dosen to set
     */
    public void setDosen(int dosen) {
        this.dosen = dosen;
    }

    /**
     * @return the ruang_kelas
     */
    public int getRuang_kelas() {
        return ruang_kelas;
    }

    /**
     * @param ruang_kelas the ruang_kelas to set
     */
    public void setRuang_kelas(int ruang_kelas) {
        this.ruang_kelas = ruang_kelas;
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
    
    
}
