<?php
/* @var $this TrxPengajarController */
/* @var $model TrxPengajar */
/* @var $form CActiveForm */

$cs = Yii::app()->clientScript;
$cs->registerCssFile(Yii::app()->baseUrl. '/css/select2.css');
$cs->registerScriptFile(Yii::app()->baseUrl. '/js/select2.min.js');

Yii::app()->clientScript->registerScript('search', "

//mata kuliah
$('#TrxPengajar_mataKuliah').select2();
$('#TrxPengajar_mataKuliah').select2('val', [".TrxPengajarMataKuliah::model()->preLoaded($model->id)."]);

$('#trx-pengajar-form').submit(function() {
    // DO STUFF
    if($('#TrxPengajar_mataKuliah').val() == null)
        return false;
});
");

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'trx-pengajar-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <?php $model->periode_id = penjadwalan::activePeriode()->id; ?>

	<div class="row hidden">
		<?php echo $form->labelEx($model,'periode_id'); ?>
		<?php echo $form->textField($model,'periode_id'); ?>
		<?php echo $form->error($model,'periode_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dosen_id'); ?>
		<?php //echo $form->textField($model,'dosen_id'); ?>
                <?php echo $form->dropDownList($model,'dosen_id', $model->isNewRecord ? TrxPengajar::toAdd() : TrxPengajar::toAdd($model->dosen_id)); ?>
                <?php echo $form->error($model,'dosen_id'); ?>
	</div>
        
        <div style="" class="row span-5">
                <div class="row" id="rowHari" style="block">
                        <label class="required" for="TrxPengajar_mataKuliah">Mata Kuliah <span class="required">*</span></label>
                        <?php echo CHtml::dropDownList("TrxPengajar[mataKuliah]", "TrxPengajar_mataKuliah", TrxPengajarMataKuliah::toAdd(), array('multiple'=>'multiple')) ?>
                </div>
                
        </div>

	<div class="row buttons span-15">
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