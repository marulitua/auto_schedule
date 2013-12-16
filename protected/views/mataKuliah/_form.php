<?php
/* @var $this MataKuliahController */
/* @var $model MataKuliah */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerScript('check', "
//      $('input[type=text]').keyup(function(){
//        $(this).val( $(this).val().toUpperCase() );
//      });
      
      $('#MataKuliah_sks').keyup(function(){
        if($(this).val() > ".Yii::app()->params->maxsks.")
            $(this).val(".Yii::app()->params->maxsks.");
      });
      
    $('#MataKuliah_praktek').live('change', function() {
        if($(this).val() == '1'){    
             $('#areaSks').removeClass('hidden');
             $('#mandatorySks').addClass('hidden');
              $('#MataKuliah_sks').val(0);
         }     
        else{
             $('#areaSks').addClass('hidden');
             $('#mandatorySks').removeClass('hidden');
        }
    });

      
");

?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'mata-kuliah-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
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
		<?php if(isset($update)) 
                        echo $form->dropDownList($model, 'praktek', array(' '=>'', 0 => 'Teori', 1 => 'Praktek'), array("disabled"=>"disabled"));
                      else
                        echo $form->dropDownList($model, 'praktek', array(' '=>'', 0 => 'Teori', 1 => 'Praktek')); ?>
		<?php echo $form->error($model,'praktek'); ?>
	</div>

        <div id="mandatorySks" class="<?php if(penjadwalan::isPraktek()) echo 'hidden'; ?>">
            <?php echo $form->textFieldRow($model, 'sks', array('class' => 'span1')); ?>
        </div>

        <div id="areaSks" class="row well <?php if(!penjadwalan::isPraktek()) echo "hidden"; ?> span">
            <?php
            $var1 = penjadwalan::isPraktek() ? $_POST['MataKuliah']['sksTeori'] : 2; 
            $var2 = penjadwalan::isPraktek() ? $_POST['MataKuliah']['sksPraktek'] : 1; 
            echo $form->labelEx($model, 'sks');
            echo CHtml::label('Teori', 'sksTeori');
            echo CHtml::textField('MataKuliah[sksTeori]', $var1);
            echo CHtml::label('Praktek', 'sksPraktek');
            echo CHtml::textField('MataKuliah[sksPraktek]', $var2);
            ?> 
        </div>
        
        <div class="row span5">
	
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
                      $this->widget('bootstrap.widgets.TbButton', array(
                         'buttonType' => 'submit',
                         'type' => 'primary',
                         'label' => $model->isNewRecord ? 'Create' : 'Save',
                      ));
                ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->