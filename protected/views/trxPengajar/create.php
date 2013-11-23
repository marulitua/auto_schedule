<?php
/* @var $this TrxPengajarController */
/* @var $model TrxPengajar */

$this->breadcrumbs=array(
	'Trx Pengajars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TrxPengajar', 'url'=>array('index')),
	array('label'=>'Manage TrxPengajar', 'url'=>array('admin')),
);
?>

<h1>Create TrxPengajar</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>