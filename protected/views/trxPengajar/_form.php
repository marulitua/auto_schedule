<?php
/* @var $this TrxPengajarController */
/* @var $model TrxPengajar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'trx-pengajar-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'periode_id'); ?>
		<?php echo $form->textField($model,'periode_id'); ?>
		<?php echo $form->error($model,'periode_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dosen_id'); ?>
		<?php echo $form->textField($model,'dosen_id'); ?>
		<?php echo $form->error($model,'dosen_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->