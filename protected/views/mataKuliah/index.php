<?php
/* @var $this MataKuliahController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mata Kuliahs',
);

$this->menu=array(
	array('label'=>'Create MataKuliah', 'url'=>array('create')),
	array('label'=>'Manage MataKuliah', 'url'=>array('admin')),
);
?>

<h1>Mata Kuliahs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
