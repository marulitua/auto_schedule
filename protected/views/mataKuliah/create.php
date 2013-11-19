<?php
/* @var $this MataKuliahController */
/* @var $model MataKuliah */

$this->breadcrumbs=array(
	'Mata Kuliahs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Daftar Mata Kuliah', 'url'=>array('index')),
	array('label'=>'Manage MataKuliah', 'url'=>array('admin')),
);
?>

<h1>Create MataKuliah</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>