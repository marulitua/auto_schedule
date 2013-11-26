<?php
/* @var $this TrxPengajarWaktuController */
/* @var $model TrxPengajarWaktu */

$this->breadcrumbs=array(
	'Trx Pengajar Waktus'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TrxPengajarWaktu', 'url'=>array('index')),
	array('label'=>'Create TrxPengajarWaktu', 'url'=>array('create')),
	array('label'=>'View TrxPengajarWaktu', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TrxPengajarWaktu', 'url'=>array('admin')),
);
?>

<h1>Update TrxPengajarWaktu <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>