<style>
    table.first {
        color: #000;
        font-family: sans-serif;
        font-size: 5pt;
        border-top: solid #000;
        border-bottom: solid #000;
    }

    .tkepala{
        background-color: gray;
    }

    .ood{

    }

    .even{
        background-color: lightgray;
    }

    html
    {
        font-size: 5pt !important;
        color: #000 !important;
        font-family: Arial !important;
    }

    .lasRow{
        border-top: solid #000;
    }
</style>

<?php
$data = Yii::app()->db->createCommand("
    select m.mata_kuliah, h.hari, r.number, j.jam_mulai , j.jam_selesai
    from jadwal j
    left join mata_kuliah m on m.id = j.mata_kuliah_id
    left join hari h on h.id = j.hari_id
    left join ruang_kelas r on r.id = j.ruang_kelas_id
    where j.periode_id = $periode and j.dosen_id = $dosen
    order by h.id, jam_mulai")->queryAll();

$nama = Dosen::model()->findByPk($dosen)->full_name;
$jumlahSks = Yii::app()->db->createCommand("select sum(j.jam_selesai - j.jam_mulai)
from jadwal j
left join mata_kuliah m on m.id = j.mata_kuliah_id
left join hari h on h.id = j.hari_id
left join ruang_kelas r on r.id = j.ruang_kelas_id
where j.periode_id = $periode and j.dosen_id = $dosen
order by h.id, jam_mulai")->queryScalar();
?>
<br pagebreak="true"/>
<table>
    <tr><td style="width: 20%;"></td><td style="width: 10px;"></td><td></td></tr>
    <tr><td style="width: 20%;"></td><td style="width: 10px;"></td><td></td></tr>
    <tr><td style="width: 20%;">Nama Dosen</td><td style="width: 10px;">:</td><td style="width: 50%;" ><?php echo $nama; ?></td></tr>
    <tr><td style="width: 20%;">Jumlah Sks</td><td style="width: 10px;">:</td><td style="width: 50%;" ><?php echo $jumlahSks; ?></td></tr>
    <tr><td style="width: 20%;"></td><td style="width: 10px;"></td><td></td></tr>
    <tr><td style="width: 20%;"></td><td style="width: 10px;"></td><td></td></tr>
</table>

<table style="border: #000 solid thick;">
    <tr><td style="background-color: gray; border: #000 solid thick;text-align: center;">Mata Kuliah</td><td style="background-color: gray; border: #000 solid thick;text-align: center;">Hari</td><td style="background-color: gray; border: #000 solid thick;text-align: center;">Ruang Kelas</td><td style="background-color: gray; border: #000 solid thick;text-align: center;">Waktu</td></tr>
    <?php
    if (count($data) > 0) {

        foreach ($data as $key => $value) {
            echo '<tr><td style="border: #000 solid thick;text-align: center;">' . $value['mata_kuliah'] . '</td><td style="border: #000 solid thick;text-align: center;">' . $value['hari'] . '</td><td style="border: #000 solid thick;text-align: center;">' . $value['number'] . '</td><td style="border: #000 solid thick;text-align: center;">' . str_pad($value['jam_mulai'], 2, "0", STR_PAD_LEFT) . ":00" . "-" . str_pad($value['jam_selesai'], 2, "0", STR_PAD_LEFT) . ":00" . "</td></tr>";
        }
    }
    ?>
</table>
<table>
    <tr><td style="width: 20%;"></td><td style="width: 10px;"></td><td></td></tr>
    <tr><td style="width: 20%;"></td><td style="width: 10px;"></td><td></td></tr>
    <tr><td style="width: 20%;"></td><td style="width: 10px;"></td><td></td></tr>
</table>
<hr>
<br pagebreak="true"/>