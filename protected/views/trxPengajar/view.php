<?php
/* @var $this TrxPengajarController */
/* @var $model TrxPengajar */

//$this->breadcrumbs=array(
//	'Pengajar'=>array('index'),
//	$model->id,
//);

$this->menu=array(
	array('label'=>'Daftar Pengajar', 'url'=>array('index')),
	array('label'=>'Tambah Pengajar', 'url'=>array('create')),
	array('label'=>'Update Pengajar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pengajar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pengajar', 'url'=>array('admin')),
);
?>

<h1>View Pengajar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'periode_id',
		//'dosen_id',
                array(
                   'label' => 'Dosen',
                   'value' => $model->dosen->full_name,
                ),
                array(
                   'label' => 'Mata Kuliah',
                   'value' => $model->mataKuliah($model->id),
                ),
	),
)); ?>
