<?php
/* @var $this AtributController */
/* @var $model Atribut */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'atribut-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'atribut'); ?>
		<?php echo $form->textField($model,'atribut',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'atribut'); ?>
	</div>

	<div class="row buttons">
		<?php 
                      //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
                      $this->widget('bootstrap.widgets.TbButton', array(
                         'buttonType' => 'submit',
                         'type' => 'primary',
                         'label' => $model->isNewRecord ? 'Create' : 'Save',
                      ));
                ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->