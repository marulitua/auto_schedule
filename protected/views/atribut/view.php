<?php
/* @var $this AtributController */
/* @var $model Atribut */

//$this->breadcrumbs=array(
//	'Atribut'=>array('index'),
//	$model->id,
//);

$this->menu=array(
	array('label'=>'Daftar Atribut', 'url'=>array('index')),
	array('label'=>'Tambah Atribut', 'url'=>array('create')),
	array('label'=>'Update Atribut', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Atribut', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Atribut', 'url'=>array('admin')),
);
?>

<h1>View Atribut #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'atribut',
	),
)); ?>
