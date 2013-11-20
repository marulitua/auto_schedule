<?php
/* @var $this DosenController */
/* @var $model Dosen */

$this->breadcrumbs=array(
	'Dosen'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar Dosen', 'url'=>array('index')),
	array('label'=>'Tambah Dosen', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dosen-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Dosen</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'dosen-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'type'=>'striped bordered condensed',
        'template'=>"{items}{summary}{pager}",
	'columns'=>array(
		//'id',
                array(
                  'header' => 'No',
                  'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',                   
                ),
		'full_name',
		'NI',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'htmlOptions'=>array('style'=>'width: 100px'),
		),
	),
)); ?>
