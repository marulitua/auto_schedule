<?php
/* @var $this TrxPengajarWaktuController */
/* @var $model TrxPengajarWaktu */

$this->breadcrumbs=array(
	'Trx Pengajar Waktus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TrxPengajarWaktu', 'url'=>array('index')),
	array('label'=>'Manage TrxPengajarWaktu', 'url'=>array('admin')),
);
?>

<h1>Create TrxPengajarWaktu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>