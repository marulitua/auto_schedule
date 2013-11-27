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
public class Domain {
    private int idDosen;
    private int idRuang;

    public Domain(int dosen, int ruang) {
        setIdDosen(dosen);
        setIdRuang(ruang);
    }
    
    /**
     * @return the idDosen
     */
    public int getIdDosen() {
        return idDosen;
    }

    /**
     * @param idDosen the idDosen to set
     */
    public void setIdDosen(int idDosen) {
        this.idDosen = idDosen;
    }

    /**
     * @return the idRuang
     */
    public int getIdRuang() {
        return idRuang;
    }

    /**
     * @param idRuang the idRuang to set
     */
    public void setIdRuang(int idRuang) {
        this.idRuang = idRuang;
    }
}
