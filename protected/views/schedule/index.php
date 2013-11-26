<?php
/* @var $this ScheduleController */

$this->breadcrumbs=array(
	'Jadwal',
);

$model = new Jadwal();

$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'jadwal-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'type'=>'striped bordered condensed',
        'template'=>"{items}{summary}{pager}",
	'columns'=>array(
		array(
                  'header' => 'No',
                  'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',                   
                ),
//                'periode_id',
                array(
                  'name' => 'mata_kuliah_id',
                  'value' => '$data->mataKuliah->mata_kuliah',
                ),
                array(
                  'name' => 'dosen_id',
                  'value' => '$data->dosen->full_name',
                ),
                array(
                  'name' => 'ruang_kelas_id',
                  'value' => '$data->ruangKelas->number',
                ),
                array(
                  'name' => 'jam_mulai',
                ),
                array(
                  'name' => 'jam_selesai',
                ),
	),
));

?>