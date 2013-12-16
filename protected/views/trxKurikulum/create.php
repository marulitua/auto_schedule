<?php
/* @var $this TrxKurikulumController */
/* @var $model TrxKurikulum */

//$this->breadcrumbs=array(
//	'Kurikulum'=>array('index'),
//	'Tambah',
//);

$this->menu=array(
	array('label'=>'Daftar Kurikulum', 'url'=>array('index')),
	array('label'=>'Manage Kurikulum', 'url'=>array('admin')),
);
?>

<h1>Daftar Kurikulum</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>