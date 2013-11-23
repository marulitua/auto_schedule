<?php
/* @var $this TrxPengajarController */
/* @var $model TrxPengajar */

$this->breadcrumbs=array(
	'Trx Pengajars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TrxPengajar', 'url'=>array('index')),
	array('label'=>'Create TrxPengajar', 'url'=>array('create')),
	array('label'=>'View TrxPengajar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TrxPengajar', 'url'=>array('admin')),
);
?>

<h1>Update TrxPengajar <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>