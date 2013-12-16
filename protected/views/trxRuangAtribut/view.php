<?php
/* @var $this TrxRuangAtributController */
/* @var $model TrxRuangAtribut */

//$this->breadcrumbs=array(
//	'Trx Ruang Atributs'=>array('index'),
//	$model->id,
//);

$this->menu=array(
	array('label'=>'List TrxRuangAtribut', 'url'=>array('index')),
	array('label'=>'Create TrxRuangAtribut', 'url'=>array('create')),
	array('label'=>'Update TrxRuangAtribut', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TrxRuangAtribut', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TrxRuangAtribut', 'url'=>array('admin')),
);
?>

<h1>View TrxRuangAtribut #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ruang_kelas_id',
		'atribut_id',
	),
)); ?>
