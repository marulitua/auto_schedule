<?php
/* @var $this TrxKurikulumController */
/* @var $dataProvider CActiveDataProvider */

//$this->breadcrumbs=array(
//	'Kurikulum',
//);

$this->menu=array(
	array('label'=>'Tambah Kurikulum', 'url'=>array('create')),
	array('label'=>'Manage Kurikulum', 'url'=>array('admin')),
);
?>

<h1>Kurikulum</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
