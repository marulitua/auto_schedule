<?php
/* @var $this MataKuliahController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mata Kuliah',
);

$this->menu=array(
	array('label'=>'Tambah Mata Kuliah', 'url'=>array('create')),
	array('label'=>'Manage Mata Kuliah', 'url'=>array('admin')),
);
?>

<h1>Mata Kuliahs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
