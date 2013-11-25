<?php
/* @var $this TrxPengajarController */
/* @var $model TrxPengajar */

$this->breadcrumbs=array(
	'Pengajar'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'Daftar Pengajar', 'url'=>array('index')),
	array('label'=>'Manage Pengajar', 'url'=>array('admin')),
);
?>

<h1>Tambah Pengajar</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>