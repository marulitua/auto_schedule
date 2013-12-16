<?php
/* @var $this TrxRuangAtributController */
/* @var $model TrxRuangAtribut */

//$this->breadcrumbs=array(
//	'Trx Ruang Atributs'=>array('index'),
//	$model->id=>array('view','id'=>$model->id),
//	'Update',
//);

$this->menu=array(
	array('label'=>'List TrxRuangAtribut', 'url'=>array('index')),
	array('label'=>'Create TrxRuangAtribut', 'url'=>array('create')),
	array('label'=>'View TrxRuangAtribut', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TrxRuangAtribut', 'url'=>array('admin')),
);
?>

<h1>Update TrxRuangAtribut <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>