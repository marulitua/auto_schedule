<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class penjadwalan extends CComponent {

    public static function selected2($param, $id, $name, $data = FALSE) {

        $string = "<select multiple id=\"$id\" name=\"$name\" style=\"width: 300px;\" >";

        if ($param) {
            foreach ($param as $key => $value) {
                //<option value="11">Manajemen Keuangan 2</option>

                if ($data) {
                    if (in_array($key, $data))
                        $string .= "<option selected value=\"$key\">$value</option>";
                    else
                        $string .= "<option value=\"$key\">$value</option>";
                }
                else
                    $string .= "<option value=\"$key\">$value</option>";
            }
        }

        $string .= "</select>";

        self::scriptReady($id);
 
        return $string;
    }

    public static function scriptReady($id) {
        Yii::app()->clientScript->registerScript("$id", "$(\"#$id\").select2();");
    }

    public static function dropDownList($param, $id, $name, $data = FALSE) {

        $string = "<select id=\"$id\" name=\"$name\">";

        if ($param) {
            foreach ($param as $key => $value) {
                //<option value="11">Manajemen Keuangan 2</option>

                if ($data) {
                    if (in_array($key, $data))
                        $string .= "<option selected value=\"$key\">$value</option>";
                    else
                        $string .= "<option value=\"$key\">$value</option>";
                }
                else
                    $string .= "<option value=\"$key\">$value</option>";
            }
        }

        $string .= "</select>";

        self::scriptReady($id);

        return $string;
    }

    public static function time() {
        $result = array();

        for($i = Yii::app()->params->minHour; $i <= Yii::app()->params->maxHour; $i++){
            $result[$i] = $i.":00";
        }

        return $result;
    }

    public static function check() {

        $result = array();

        if (Periode::model()->count('flag = 1') == 0)
            array_push($result, "Tentukan Periode");
        else {
            if (TrxKurikulum::model()->count('periode_id = ' . Periode::model()->active()->id . '') == 0)
                array_push($result, "Kurikulum belum ditentukan");

            if (TrxDosen::model()->count('periode_id = ' . Periode::model()->active()->id . '') == 0)
                array_push($result, "Pengajar belum ditentukan");
            else {
                
                $sql = Yii::app()->db->createCommand('select c.* from findMatakuliahTanpaDosen c')->queryAll();
                foreach ($sql as $a)
                    array_push ($result, "Mata kuliah ".$a['mata_kuliah']." belum ada pengajarnya");                
            }
            
            if (TrxDosenTime::model()->count() == 0)
                array_push($result, "Waktu pengajar belum ditentukan");
            else{
                $sql = Yii::app()->db->createCommand('select c.* from findDosenTanpaWaktu c')->queryAll();
                foreach ($sql as $a)
                    array_push ($result, "Dosen ".$a['full_name']." belum memili detail waktu");             
            }
        }

        return $result;
    }
    
    public static function isPraktek(){
           
        if(isset($_POST['MataKuliah'])){
            if($_POST['MataKuliah']['praktek'] == '1'){
                return true;
            }
        }
        
        return false;
    }
    
    public static function activePeriode(){
        return Periode::model()->find('finished_time is null');
    }

    public static function isEnableBtnPeriode(){
        
        return Periode::model()->find('finished_time is null') == null ? false : true;
    
    }
    
    public static function isEnableBtnKurikulum(){
        if(!self::isEnableBtnPeriode())
            return true;
    
        return false;
    }
    
    public static function isEnableBtnPengajar(){
        if(!self::isEnableBtnPeriode())
            return true;
        else
            if(TrxKurikulum::model()->count("periode_id = ".self::activePeriode()->id) == '0')
                return true;
        
        return false;
    }
    
    public static function isEnableBtnGenerate(){
        if(!self::isEnableBtnPeriode())
            return true;
        else
            if(self::activePeriode() != null)      
                    if(TrxPengajar::model()->count("periode_id = ".self::activePeriode()->id) == '0')
                        return true;
        
        return false;
    }
    
    public static function isEnableBtnWaktuPengajar(){
         if(!self::isEnableBtnPeriode())
            return true;
         else
             if(TrxPengajar::model()->count("periode_id = ".self::activePeriode()->id) == '0')
                return true;
        
        return false;
    }
}

?>
