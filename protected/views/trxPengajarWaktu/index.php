<?php
/* @var $this TrxPengajarWaktuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Waktu Pengajar',
);

$this->menu=array(
	array('label'=>'Tambah Waktu Pengajar', 'url'=>array('create')),
	array('label'=>'Manage Waktu Pengajar', 'url'=>array('admin')),
);
?>

<h1>Waktu Pengajar</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
