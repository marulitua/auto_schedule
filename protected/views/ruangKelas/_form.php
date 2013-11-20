<?php
/* @var $this RuangKelasController */
/* @var $model RuangKelas */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerScript('check', "

      $('#RuangKelas_number').keyup(function(){
         $(this).val( $(this).val().toUpperCase());

         if($(this).val().length == 4){
            $('#RuangKelas_lantai').val($(this).val().charAt(1));
         }
      });
      
");
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ruang-kelas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'number'); ?>
	</div>

        
	<div class="row">
		<?php echo $form->labelEx($model,'praktek'); ?>
		<?php echo $form->dropDownList($model, 'praktek', array(' '=>'', 0 => 'Teori', 1 => 'Praktek')); ?>
		<?php echo $form->error($model,'praktek'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'gedung_id'); ?>
		<?php echo $form->dropDownList($model, 'gedung_id', array(" " => " ") + CHtml::listData(Gedung::model()->findAll(), 'id', 'gedung')); ?>
		<?php echo $form->error($model,'gedung_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lantai'); ?>
		<?php echo $form->textField($model,'lantai'); ?>
		<?php echo $form->error($model,'lantai'); ?>
	</div>

	<div class="row buttons">
		<?php 
//                        echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'buttonType' => 'submit',
                            'type' => 'primary',
                            'label' => $model->isNewRecord ? 'Create' : 'Save',
                        ));
                ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->