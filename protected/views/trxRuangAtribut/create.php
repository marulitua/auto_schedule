<?php
/* @var $this TrxRuangAtributController */
/* @var $model TrxRuangAtribut */

//$this->breadcrumbs=array(
//	'Trx Ruang Atributs'=>array('index'),
//	'Create',
//);

$this->menu=array(
	array('label'=>'List TrxRuangAtribut', 'url'=>array('index')),
	array('label'=>'Manage TrxRuangAtribut', 'url'=>array('admin')),
);
?>

<h1>Create TrxRuangAtribut</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>