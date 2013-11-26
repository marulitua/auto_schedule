<?php
/* @var $this TrxKurikulumController */
/* @var $model TrxKurikulum */

$this->breadcrumbs=array(
	'Kurikulum'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar Kurikulum', 'url'=>array('index')),
	array('label'=>'Tambah Kurikulum', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#trx-kurikulum-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Kurikulum</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'trx-kurikulum-grid',
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
		//'mata_kuliah_id',
                array(
                  'name' => 'mata_kuliah_id',
                  'value' => '$data->mataKuliah->mata_kuliah',
                  'filter' => TrxKurikulum::createFilter(),
                ),
                array(
                  'header' => 'Kode Mata Kuliah',
                  'value' => '$data->mataKuliah->mata_kuliah_code',
                ),
// 		'jumlah_kelas',
                array(
                    'name' => 'jumlah_kelas',
                    'htmlOptions' => array(
                        'style' => 'width:40px',
                    ),
                ),
		array(
                   'header' => 'Hari Perkuliahan',
                   'value' => 'TrxKurikulum::hari($data->id)',
                ),
                array(
                   'header' => 'Ruang Kuliah',
                   'value' => 'TrxKurikulum::ruang($data->id)',
                ),
                array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'htmlOptions'=>array('style'=>'width: 55px'),
		),
	),
)); ?>
