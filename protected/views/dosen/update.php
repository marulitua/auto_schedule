<?php
/* @var $this DosenController */
/* @var $model Dosen */

//$this->breadcrumbs=array(
//	'Dosen'=>array('index'),
//	$model->id=>array('view','id'=>$model->id),
//	'Update',
//);

$this->menu=array(
	array('label'=>'Daftar Dosen', 'url'=>array('index')),
	array('label'=>'Tambah Dosen', 'url'=>array('create')),
	array('label'=>'View Dosen', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Dosen', 'url'=>array('admin')),
);
?>

<h1>Update Dosen <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>