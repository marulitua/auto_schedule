<?php
/* @var $this RuangKelasController */
/* @var $model RuangKelas */

//$this->breadcrumbs=array(
//	'Ruang Kelas'=>array('index'),
//	$model->id,
//);

$this->menu=array(
	array('label'=>'Daftar Ruang Kelas', 'url'=>array('index')),
	array('label'=>'Tambah Ruang Kelas', 'url'=>array('create')),
	array('label'=>'Update Ruang Kelas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ruang Kelas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ruang Kelas', 'url'=>array('admin')),
);
?>

<h1>View Ruang Kelas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'praktek',
		'number',
                array(
                    'label' => 'praktek',
                    'value' => $model->praktek == '1' ? 'Praktek' : 'Teori',
                ),
		//'gedung_id',
                array(
                    'label' => 'Gedung',
                    'value' => $model->gedung->gedung,
                ),
		'lantai',
	),
)); ?>
