<?php
/* @var $this TrxPengajarWaktuController */
/* @var $model TrxPengajarWaktu */

//$this->breadcrumbs=array(
//	'Waktu Pengajar'=>array('index'),
//	'Manage',
//);

$this->menu=array(
	array('label'=>'Daftar Waktu Pengajar', 'url'=>array('index')),
	array('label'=>'Tambah Waktu Pengajar', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#trx-pengajar-waktu-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Waktu Pengajar</h1>

<?php $this->widget('ext.groupgridview.GroupGridView', array(
	'id'=>'trx-pengajar-waktu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'mergeColumns' => array('pengajar_id'), 
        //'type'=>'striped bordered condensed',
        //'template'=>"{items}{summary}{pager}",
	'columns'=>array(
		//'id',
                array(
                  'header' => 'No',
                  'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',                   
                ),
		//'pengajar_id',
                array(
                  'name' => 'pengajar_id',
                  'value' => '$data->pengajar->dosen->full_name',
                ),
		//'hari_id',
                array(
                  'name' => 'hari_id',
                  'value' => '$data->hari->hari',
                ),
		//'start',
		//'end',
                array(
                  'header' => 'Waktu',
                  'value' => '$data->waktu()',
                ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'htmlOptions'=>array('style'=>'width: 55px'),
		),
	),
)); 
?>
