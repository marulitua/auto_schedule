<?php
/* @var $this TrxPengajarWaktuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Trx Pengajar Waktus',
);

$this->menu=array(
	array('label'=>'Create TrxPengajarWaktu', 'url'=>array('create')),
	array('label'=>'Manage TrxPengajarWaktu', 'url'=>array('admin')),
);
?>

<h1>Trx Pengajar Waktus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
