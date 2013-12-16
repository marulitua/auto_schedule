<?php
/* @var $this TrxPengajarController */
/* @var $dataProvider CActiveDataProvider */

//$this->breadcrumbs=array(
//	'Pengajar',
//);

$this->menu=array(
	array('label'=>'Tambah Pengajar', 'url'=>array('create')),
	array('label'=>'Manage Pengajar', 'url'=>array('admin')),
);
?>

<h1>Pengajar</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
