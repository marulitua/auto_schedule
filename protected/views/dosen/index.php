<?php
/* @var $this DosenController */
/* @var $dataProvider CActiveDataProvider */

//$this->breadcrumbs=array(
//	'Dosen',
//);

$this->menu=array(
	array('label'=>'Tambah Dosen', 'url'=>array('create')),
	array('label'=>'Manage Dosen', 'url'=>array('admin')),
);
?>

<h1>Dosen</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
