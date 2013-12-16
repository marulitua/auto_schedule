<?php
/* @var $this TrxPengajarWaktuController */
/* @var $model TrxPengajarWaktu */
/* @var $form CActiveForm */


$cs = Yii::app()->clientScript;
$cs->registerCssFile(Yii::app()->baseUrl. '/css/select2.css');
$cs->registerScriptFile(Yii::app()->baseUrl. '/js/select2.min.js');

Yii::app()->clientScript->registerScript('search', "
 

//TrxPengajarWaktu_pengajar_id
$('#TrxPengajarWaktu_pengajar_id').select2();


$('#trx-pengajar-waktu-form').submit(function() {
    // DO STUFF
    if($('#TrxPengajarWaktu_start').val() == '')
        return false;
        
    if($('#TrxPengajarWaktu_end').val() == '')
        return false;
        
    if(parseInt($('#TrxPengajarWaktu_end').val()) <= parseInt($('#TrxPengajarWaktu_start').val()))
        return false;        

});

");


?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'trx-pengajar-waktu-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pengajar_id'); ?>
		<?php //echo $form->textField($model,'pengajar_id'); ?>
                <?php echo $form->dropDownList($model,'pengajar_id', TrxPengajarWaktu::toAdd()); ?>
		<?php echo $form->error($model,'pengajar_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hari_id'); ?>
		<?php //echo $form->textField($model,'hari_id'); ?>
		<?php echo $form->dropDownList($model,'hari_id', array("" => "") + CHtml::listData(Hari::model()->findAll("id != 7"), "id", "hari")); ?>
		<?php echo $form->error($model,'hari_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start'); ?>
		<?php //echo $form->textField($model,'start'); ?>
		<?php echo $form->dropDownList($model,'start', array("" => "") + penjadwalan::time()); ?>
		<?php echo $form->error($model,'start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end'); ?>
		<?php //echo $form->textField($model,'end'); ?>
		<?php echo $form->dropDownList($model,'end', array("" => "") + penjadwalan::time()); ?>
		<?php echo $form->error($model,'end'); ?>
	</div>

	<div class="row buttons">
		<?php 
                    //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
                    $this->widget('bootstrap.widgets.TbButton', array(
                         'id' => 'btnSubmit',
                         'buttonType' => 'submit',
                         'type' => 'primary',
                         'label' => $model->isNewRecord ? 'Create' : 'Save',
                    ));
                ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->