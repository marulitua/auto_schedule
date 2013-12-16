<?php
/* @var $this RuangKelasController */
/* @var $dataProvider CActiveDataProvider */

//$this->breadcrumbs=array(
//	'Ruang Kelas',
//);

$this->menu=array(
	array('label'=>'Tambah Ruang Kelas', 'url'=>array('create')),
	array('label'=>'Manage Ruang Kelas', 'url'=>array('admin')),
);
?>

<h1>Ruang Kelas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
