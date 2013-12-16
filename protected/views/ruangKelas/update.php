<?php
/* @var $this RuangKelasController */
/* @var $model RuangKelas */

//$this->breadcrumbs=array(
//	'Ruang Kelas'=>array('index'),
//	$model->id=>array('view','id'=>$model->id),
//	'Update',
//);

$this->menu=array(
	array('label'=>'Daftar Ruan gKelas', 'url'=>array('index')),
	array('label'=>'Tambah Ruang Kelas', 'url'=>array('create')),
	array('label'=>'View Ruang Kelas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ruang Kelas', 'url'=>array('admin')),
);
?>

<h1>Update Ruang Kelas <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>