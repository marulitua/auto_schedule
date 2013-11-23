<?php
/* @var $this MataKuliahController */
/* @var $model MataKuliah */

$this->breadcrumbs=array(
	'Mata Kuliah'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Mata Kuliah', 'url'=>array('index')),
	array('label'=>'Tambah Mata Kuliah', 'url'=>array('create')),
	array('label'=>'View Mata Kuliah', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MataKuliah', 'url'=>array('admin')),
);
?>

<h1>Update Mata Kuliah <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'update' => $update = true)); ?>