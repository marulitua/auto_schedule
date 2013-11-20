<?php
/* @var $this RuangKelasController */
/* @var $model RuangKelas */

$this->breadcrumbs=array(
	'Ruang Kelas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar Ruang Kelas', 'url'=>array('index')),
	array('label'=>'Tambah Ruang Kelas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ruang-kelas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ruang Kelas</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'ruang-kelas-grid',
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
		//'praktek',
		'number',
                array(
                    'name' => 'praktek',
                    'value' => '$data->praktek == \'1\' ? \'Praktek\' : \'Teori\' ', 
                    'filter'=>array(0=>'Teori', 1=>'Praktek'),
                ),
		//'gedung_id',
                array(
                    'name' => 'gedung_id',
                    'value' => '$data->gedung->gedung'
                ),
		'lantai',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'htmlOptions'=>array('style'=>'width: 60px'),
                        'template' => '{attribut}{view}{update}{delete}',
                        'buttons' => array(
                            'attribut' => array(
                                'label' => 'attribut',
                                'imageUrl' => false,
                                //'class' => array('fancy-item'),
                                'options'=>array('class' => 'fancy-item'), 
                                'icon' => 'th-list',
                                'url' => 'Yii::app()->createUrl("ruangKelas/attribut", array("id"=>$data->id))',
                            ),
                        ),
		),
	),
)); ?>

<?php
//create a link
echo  CHtml::link('link text goes here',"#data", array("id"=>"fancy-link")); 
 
//put fancybox on page
$this->widget('application.extensions.fancybox.EFancyBox', array(
        'target'=>'.fancy-item',
        'config'=>array(),));  
?>  
 
//use nested div structure as below
<div style="display:none">
<div id="data">
<p>Contents of this div appear in fancybox</p>
</div>
</div>
