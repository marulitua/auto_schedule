<?php
/* @var $this TrxPengajarWaktuController */
/* @var $model TrxPengajarWaktu */

$this->breadcrumbs=array(
	'Trx Pengajar Waktus'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TrxPengajarWaktu', 'url'=>array('index')),
	array('label'=>'Create TrxPengajarWaktu', 'url'=>array('create')),
	array('label'=>'Update TrxPengajarWaktu', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TrxPengajarWaktu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TrxPengajarWaktu', 'url'=>array('admin')),
);
?>

<h1>View TrxPengajarWaktu #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'pengajar_id',
		'hari_id',
		'start',
		'end',
	),
)); ?>
