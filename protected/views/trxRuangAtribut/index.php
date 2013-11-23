<?php
/* @var $this TrxRuangAtributController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Trx Ruang Atributs',
);

$this->menu=array(
	array('label'=>'Create TrxRuangAtribut', 'url'=>array('create')),
	array('label'=>'Manage TrxRuangAtribut', 'url'=>array('admin')),
);
?>

<h1>Trx Ruang Atributs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
