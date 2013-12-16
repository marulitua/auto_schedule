<?php
/* @var $this TrxPengajarController */
/* @var $model TrxPengajar */

//$this->breadcrumbs=array(
//	'Pengajar'=>array('index'),
//	'Manage',
//);

$this->menu=array(
	array('label'=>'Daftar Pengajar', 'url'=>array('index')),
	array('label'=>'Tambah Pengajar', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#trx-pengajar-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pengajar</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'trx-pengajar-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'type'=>'striped bordered condensed',
        'template'=>"{items}{summary}{pager}",
	'columns'=>array(
		array(
                  'header' => 'No',
                  'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',                   
                ),
		//'periode_id',
//		/'dosen_id',
                array(
                  'name' => 'dosen_id',
                  'value' => '$data->dosen->full_name',
                  'filter' => TrxPengajar::createFilter(),
                ),
                array(
                  'header' => 'Mata Kuliah',
                  'value' => '$data->MataKuliah($data->id)',
                ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'htmlOptions'=>array('style'=>'width: 55px'),
		),
	),
)); ?>
