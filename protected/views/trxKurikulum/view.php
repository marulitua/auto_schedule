<?php
/* @var $this TrxKurikulumController */
/* @var $model TrxKurikulum */

$this->breadcrumbs=array(
	'Trx Kurikulums'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TrxKurikulum', 'url'=>array('index')),
	array('label'=>'Create TrxKurikulum', 'url'=>array('create')),
	array('label'=>'Update TrxKurikulum', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TrxKurikulum', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TrxKurikulum', 'url'=>array('admin')),
);
?>

<h1>View TrxKurikulum #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'periode_id',
		'mata_kuliah_id',
		'jumlah_kelas',
	),
)); ?>
