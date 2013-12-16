<?php
/* @var $this DosenController */
/* @var $model Dosen */

//$this->breadcrumbs=array(
//	'Dosen'=>array('index'),
//	'Tambah',
//);

$this->menu=array(
	array('label'=>'Daftar Dosen', 'url'=>array('index')),
	array('label'=>'Manage Dosen', 'url'=>array('admin')),
);
?>

<h1>Tambah Dosen</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>