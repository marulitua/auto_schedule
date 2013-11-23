<?php
/* @var $this MataKuliahController */
/* @var $model MataKuliah */

$this->breadcrumbs=array(
	'Mata Kuliah'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Daftar Mata Kuliah', 'url'=>array('index')),
	array('label'=>'Manage MataKuliah', 'url'=>array('admin')),
);
?>

<h1>Tambah Mata Kuliah</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>