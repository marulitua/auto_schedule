<?php
/* @var $this RuangKelasController */
/* @var $model RuangKelas */

$this->breadcrumbs=array(
	'Ruang Kelas'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'Daftar Ruang Kelas', 'url'=>array('index')),
	array('label'=>'Manage Ruang Kelas', 'url'=>array('admin')),
);
?>

<h1>Create RuangKelas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>