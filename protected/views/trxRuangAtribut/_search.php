<?php
/* @var $this TrxRuangAtributController */
/* @var $model TrxRuangAtribut */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ruang_kelas_id'); ?>
		<?php echo $form->textField($model,'ruang_kelas_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'atribut_id'); ?>
		<?php echo $form->textField($model,'atribut_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->