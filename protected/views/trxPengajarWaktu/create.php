<?php
/* @var $this TrxPengajarWaktuController */
/* @var $model TrxPengajarWaktu */

$this->breadcrumbs=array(
	'Waktu Pengajar'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'Daftar Waktu Pengajar', 'url'=>array('index')),
	array('label'=>'Manage Waktu Pengajar', 'url'=>array('admin')),
);
?>

<h1>Tambah Waktu Pengajar</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>