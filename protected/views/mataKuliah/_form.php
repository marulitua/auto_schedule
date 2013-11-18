<?php
/* @var $this MataKuliahController */
/* @var $model MataKuliah */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mata-kuliah-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'mata_kuliah'); ?>
		<?php echo $form->textField($model,'mata_kuliah',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'mata_kuliah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mata_kuliah_code'); ?>
		<?php echo $form->textField($model,'mata_kuliah_code',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'mata_kuliah_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'praktek'); ?>
		<?php echo $form->textField($model,'praktek'); ?>
		<?php echo $form->error($model,'praktek'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sks'); ?>
		<?php echo $form->textField($model,'sks'); ?>
		<?php echo $form->error($model,'sks'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->