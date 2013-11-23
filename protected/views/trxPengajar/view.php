<?php
/* @var $this TrxPengajarController */
/* @var $model TrxPengajar */

$this->breadcrumbs=array(
	'Trx Pengajars'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TrxPengajar', 'url'=>array('index')),
	array('label'=>'Create TrxPengajar', 'url'=>array('create')),
	array('label'=>'Update TrxPengajar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TrxPengajar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TrxPengajar', 'url'=>array('admin')),
);
?>

<h1>View TrxPengajar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'periode_id',
		'dosen_id',
	),
)); ?>
