<?php
/* @var $this MataKuliahController */
/* @var $model MataKuliah */

$this->breadcrumbs=array(
	'Mata Kuliah'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Daftar Mata Kuliah', 'url'=>array('index')),
	array('label'=>'Tambah Mata Kuliah', 'url'=>array('create')),
	array('label'=>'Update Mata Kuliah', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Mata Kuliah', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mata Kuliah', 'url'=>array('admin')),
);
?>

<h1>View Mata Kuliah #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'mata_kuliah',
		'mata_kuliah_code',
		array(
                    'name' => 'praktek', 
                    'value' => $model->praktek == 1 ? 'Praktek' : 'Teori', 
                ),
		'sks',
	),
)); ?>
