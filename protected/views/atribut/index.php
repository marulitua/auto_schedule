<?php
/* @var $this AtributController */
/* @var $dataProvider CActiveDataProvider */

//$this->breadcrumbs=array(
//	'Atribut',
//);

$this->menu=array(
	array('label'=>'Tambah Atribut', 'url'=>array('create')),
	array('label'=>'Manage Atribut', 'url'=>array('admin')),
);
?>

<h1>Atribut</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
