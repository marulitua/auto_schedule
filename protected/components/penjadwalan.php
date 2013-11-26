<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class penjadwalan extends CComponent {

    public static function time() {
        $result = array();

        for($i = Yii::app()->params->minHour; $i <= Yii::app()->params->maxHour; $i++){
            $result[$i] = $i.":00";
        }

        return $result;
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
    
    public static function IsRunning() {
        $return = false;
        $PORT = 20222; //the port on which we are connecting to the "remote" machine
        $HOST = "localhost"; //the ip of the remote machine (in this case it's the same machine)

        $sock = socket_create(AF_INET, SOCK_STREAM, 0) //Creating a TCP socket
                or die("error: could not create socket\n");

//         $succ = socket_connect($sock, $HOST, $PORT) //Connecting to to server using that socket
//                 or die("error: could not connect to host\n");

        $succ = @socket_connect($sock, $HOST, $PORT); //Connecting to to server using that socket
        //or die("error: could not connect to host\n");

        if ($succ === FALSE) {
            //$return = false;
        } else {
            //$text = "1"; //start
            $text = "0"; //test

            socket_write($sock, $text . "\n", strlen($text) + 1) //Writing the text to the socket
                    or die("error: failed to write to socket\n");

            $reply = socket_read($sock, 10000, PHP_NORMAL_READ) //Reading the reply from socket
                    or die("error: failed to read from socket\n");

            if(substr($reply, 0, -1) == "true")
                    $return = true;
            
        }
        
        return $return;
    }
    
    public static function Generate() {
        $data = array();
        $PORT = 20222; //the port on which we are connecting to the "remote" machine
        $HOST = "localhost"; //the ip of the remote machine (in this case it's the same machine)

        $sock = socket_create(AF_INET, SOCK_STREAM, 0) //Creating a TCP socket
                or die("error: could not create socket\n");

//         $succ = socket_connect($sock, $HOST, $PORT) //Connecting to to server using that socket
//                 or die("error: could not connect to host\n");

        $succ = @socket_connect($sock, $HOST, $PORT); //Connecting to to server using that socket
        //or die("error: could not connect to host\n");

        if ($succ === FALSE) {
            array_push($data, "-1");
        } else {
            $text = "1"; //start
            //$text = "0"; //test

            socket_write($sock, $text . "\n", strlen($text) + 1) //Writing the text to the socket
                    or die("error: failed to write to socket\n");

            $reply = socket_read($sock, 10000, PHP_NORMAL_READ) //Reading the reply from socket
                    or die("error: failed to read from socket\n");

            array_push($data, substr($reply, 0, -1));

        }
        return $data;
    }
    
    public static function Verifying(){
        $result = array();

        // apakah semua mata kuliah sudah memiliki dosen pengampu
        $data = Yii::app()->db->createCommand(
                "select m.mata_kuliah, m.mata_kuliah_code
                from trx_kurikulum t
                left join mata_kuliah m on m.id = t.mata_kuliah_id
                where t.periode_id = ".penjadwalan::activePeriode()->id." and m.id not in (
                        select DISTINCT p.mata_kuliah_id 
                        from trx_pengajar_mata_kuliah p
                        left join trx_pengajar t on t.id = p.pengajar_id
                        where t.periode_id = ".penjadwalan::activePeriode()->id."
                )"
                )->queryAll();
        
        if(count($data) > 0){
            foreach ($data as $peer) {
                array_push($result, 'Mata kuliah '.ucfirst($peer["mata_kuliah"]).' ( '.$peer['mata_kuliah_code'].' ) belum memiliki dosen pengampu');
            }
        }
        
        // apakah semua dosen pengampu sudah memiliki data kesedian waktu mengajar
        
        $data = Yii::app()->db->createCommand(
                "select d.full_name
                from trx_pengajar p
                left join dosen d on d.id = p.dosen_id
                where p.periode_id = ".penjadwalan::activePeriode()->id." and p.id not in  (
                        select DISTINCT t.pengajar_id
                        from trx_pengajar_waktu t
                        left join trx_pengajar r on r.id = t.pengajar_id
                        where r.periode_id = ".penjadwalan::activePeriode()->id."
                )"
                )->queryAll();
        
        if(count($data) > 0){
            foreach ($data as $peer) {
                array_push($result, 'Dosen '.ucfirst($peer["full_name"]).' belum memiliki data waktu kesedian mengajar');
            }
        }
        
        return $result;
    }
    
    public static function renderJSON($data) {
        header('Content-type: application/json');
        echo CJSON::encode($data);

        foreach (Yii::app()->log->routes as $route) {
            if ($route instanceof CWebLogRoute) {
                $route->enabled = false; // disable any weblogroutes
            }
        }
        Yii::app()->end();
    }
}

?>
