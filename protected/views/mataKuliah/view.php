<?php
/* @var $this MataKuliahController */
/* @var $model MataKuliah */

$this->breadcrumbs=array(
	'Mata Kuliahs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MataKuliah', 'url'=>array('index')),
	array('label'=>'Create MataKuliah', 'url'=>array('create')),
	array('label'=>'Update MataKuliah', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MataKuliah', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MataKuliah', 'url'=>array('admin')),
);
?>

<h1>View MataKuliah #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'mata_kuliah',
		'mata_kuliah_code',
		'praktek',
		'sks',
	),
)); ?>
