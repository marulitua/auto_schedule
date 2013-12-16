<?php
/* @var $this TrxPengajarController */
/* @var $model TrxPengajar */

//$this->breadcrumbs=array(
//	'Pengajar'=>array('index'),
//	$model->id=>array('view','id'=>$model->id),
//	'Update',
//);

$this->menu=array(
	array('label'=>'Daftar Pengajar', 'url'=>array('index')),
	array('label'=>'Tambah Pengajar', 'url'=>array('create')),
	array('label'=>'View Pengajar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pengajar', 'url'=>array('admin')),
);
?>

<h1>Update Pengajar <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>