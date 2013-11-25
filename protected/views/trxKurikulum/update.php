<?php
/* @var $this TrxKurikulumController */
/* @var $model TrxKurikulum */

$this->breadcrumbs=array(
	'Kurikulum'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Kurikulum', 'url'=>array('index')),
	array('label'=>'Tambah Kurikulum', 'url'=>array('create')),
	array('label'=>'View Kurikulum', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Kurikulum', 'url'=>array('admin')),
);
?>

<h1>Update Kurikulum <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>