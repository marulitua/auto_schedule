<?php
/* @var $this TrxPengajarWaktuController */
/* @var $model TrxPengajarWaktu */

$this->breadcrumbs=array(
	'Waktu Pengajar'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Daftar Waktu Pengajar', 'url'=>array('index')),
	array('label'=>'Tambah Waktu Pengajar', 'url'=>array('create')),
	array('label'=>'Update Waktu Pengajar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Waktu Pengajar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Waktu Pengajar', 'url'=>array('admin')),
);
?>

<h1>View Waktu Pengajar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'pengajar_id',
                array(
                  'name' => 'pengajar_id',
                  'value' => $model->pengajar->dosen->full_name,
                ),
		//'hari_id',
                array(
                  'name' => 'hari_id',
                  'value' => $model->hari->hari,
                ),
//		'start',
//		'end',
                array(
                  'label' => 'Waktu',
                  'value' => $model->waktu(),
                )
	),
)); ?>
