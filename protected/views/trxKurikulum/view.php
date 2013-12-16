<?php
/* @var $this TrxKurikulumController */
/* @var $model TrxKurikulum */

//$this->breadcrumbs=array(
//	'Kurikulum'=>array('index'),
//	$model->id,
//);

$this->menu=array(
	array('label'=>'Daftar Kurikulum', 'url'=>array('index')),
	array('label'=>'Tambah Kurikulum', 'url'=>array('create')),
	array('label'=>'Update Kurikulum', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Kurikulum', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kurikulum', 'url'=>array('admin')),
);
?>

<h1>View Kurikulum #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'periode_id',
		array(
                  'label' => 'Mata Kuliah',  
                  'value' => $model->mataKuliah->mata_kuliah,  
                ),
		'jumlah_kelas',
                array(
                  'label' => 'Hari Perkuliahan',
                  'value' => $model->hari($model->id),
                ),
                array(
                  'label' => 'Ruang Kuliah',
                  'value' => $model->ruang($model->id),
                )
	),
)); ?>
