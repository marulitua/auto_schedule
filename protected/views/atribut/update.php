<?php
/* @var $this AtributController */
/* @var $model Atribut */

$this->breadcrumbs=array(
	'Atribut'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Atribut', 'url'=>array('index')),
	array('label'=>'Tambah Atribut', 'url'=>array('create')),
	array('label'=>'View Atribut', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Atribut', 'url'=>array('admin')),
);
?>

<h1>Update Atribut <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>