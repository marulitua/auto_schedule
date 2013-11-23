<?php
/* @var $this AtributController */
/* @var $model Atribut */

$this->breadcrumbs=array(
	'Atribut'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar Atribut', 'url'=>array('index')),
	array('label'=>'Tambah Atribut', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#atribut-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Atribut</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'atribut-grid',
        'type'=>'striped bordered condensed',
        'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
                array(
                        'header' => 'No',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',                   
                ),
		'atribut',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
