<?php
/* @var $this TrxPengajarWaktuController */
/* @var $model TrxPengajarWaktu */

$this->breadcrumbs=array(
	'Waktu Pengajar'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Waktu Pengajar', 'url'=>array('index')),
	array('label'=>'Tambah Waktu Pengajar', 'url'=>array('create')),
	array('label'=>'View Waktu Pengajar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Waktu Pengajar', 'url'=>array('admin')),
);
?>

<h1>Update Waktu Pengajar <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>