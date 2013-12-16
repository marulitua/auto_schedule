<?php
/* @var $this AtributController */
/* @var $model Atribut */

//$this->breadcrumbs=array(
//	'Atribut'=>array('index'),
//	'Tambah',
//);

$this->menu=array(
	array('label'=>'Daftar Atribut', 'url'=>array('index')),
	array('label'=>'Manage Atribut', 'url'=>array('admin')),
);
?>

<h1>Tambah Atribut</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>