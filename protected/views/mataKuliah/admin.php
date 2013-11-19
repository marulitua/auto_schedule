<?php
/* @var $this MataKuliahController */
/* @var $model MataKuliah */

$this->breadcrumbs=array(
	'Mata Kuliahs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MataKuliah', 'url'=>array('index')),
	array('label'=>'Create MataKuliah', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#mata-kuliah-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Mata Kuliahs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
      //$this->widget('zii.widgets.grid.CGridView', array(
      $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'mata-kuliah-grid',
        'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'template'=>"{items}{summary}{pager}",
	'columns'=>array(
		//'id',
                array(
                  'header' => 'No',
                  'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',                   
                ),
		array(
                    'name' => 'mata_kuliah',
                    'value' => 'ucwords($data->mata_kuliah)',
                ),
		'mata_kuliah_code',
                array(
                    'name' => 'praktek',
                    'value' => '$data->praktek == \'1\' ? \'Praktek\' : \'Teori\' ', 
                    'filter'=>array(0=>'Teori', 1=>'Praktek'),
                ),
		'sks',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'htmlOptions'=>array('style'=>'width: 100px'),
		),
	),
)); ?>
