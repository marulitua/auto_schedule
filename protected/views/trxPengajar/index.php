<?php
/* @var $this TrxPengajarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Trx Pengajars',
);

$this->menu=array(
	array('label'=>'Create TrxPengajar', 'url'=>array('create')),
	array('label'=>'Manage TrxPengajar', 'url'=>array('admin')),
);
?>

<h1>Trx Pengajars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
