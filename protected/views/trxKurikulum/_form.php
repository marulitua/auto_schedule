<?php
/* @var $this TrxKurikulumController */
/* @var $model TrxKurikulum */
/* @var $form CActiveForm */

$cs = Yii::app()->clientScript;
$cs->registerCssFile(Yii::app()->baseUrl. '/css/select2.css');
$cs->registerScriptFile(Yii::app()->baseUrl. '/js/select2.min.js');

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});

$('.search-form form').submit(function(){
	$('#trx-ruang-atribut-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});

//Hari
$('#TrxKurikulum_hari').select2();
$('#TrxKurikulum_hari').select2('val', [".TrxHariKurikulum::model()->preLoaded()."]);

$('input[id^=s2id_au]').width(200);

$('#TrxKurikulum_isHari').click(function(){
    $('#rowHari').toggle();
});   

//Atribut
$('#TrxKurikulum_atribut').select2();
$('#TrxKurikulum_atribut').select2('val', [".TrxAtributKurikulum::model()->preLoaded()."]);

$('input[id^=s2id_au]').width(200);


$('#TrxKurikulum_isAtribut').click(function(){
    $('#rowAtribut').toggle();
});

//Ruang
$('#TrxKurikulum_ruang').select2();
$('#TrxKurikulum_ruang').select2('val', [".TrxRuangKurikulum::model()->preLoaded()."]);

$('input[id^=s2id_au]').width(200);

$('#TrxKurikulum_isRuang').click(function(){
    $('#rowRuang').toggle();
});

");



?>



<script type="text/javascript">
    
    
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'trx-kurikulum-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <?php $model->periode_id = penjadwalan::activePeriode()->id; ?>
	
        
        <div class="row">
        
            <div style="background-color: yellow;" class="span-6">

                <div class="row hidden">
                        <?php echo $form->labelEx($model,'periode_id'); ?>
                        <?php echo $form->textField($model,'periode_id'); ?>
                        <?php echo $form->error($model,'periode_id'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'mata_kuliah_id'); ?>
                        <?php echo $form->dropDownList($model,'mata_kuliah_id', TrxKurikulum::toAdd()); ?>
                        <?php echo $form->error($model,'mata_kuliah_id'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'jumlah_kelas'); ?>
                        <?php echo $form->textField($model,'jumlah_kelas'); ?>
                        <?php echo $form->error($model,'jumlah_kelas'); ?>
                </div>
                
            </div>
            
            <div style="background-color: blue;" class="span-6">
                
                <?php echo CHtml::checkBox("TrxKurikulum[isHari]", TrxHariKurikulum::model()->isChecked() ? true : false); ?>
                Tentukan Hari perkuliahan
                
                <div class="row" id="rowHari" style="display:<?php echo TrxHariKurikulum::model()->isChecked() ? "block" : "none"; ?>;">
                        <?php echo CHtml::label("Hari perkuliahan", "data");?>
                        <?php echo CHtml::dropDownList("TrxKurikulum[hari]", "TrxKurikulum_hari", TrxHariKurikulum::toAdd(), array('multiple'=>'multiple')) ?>
                </div>
                
            </div>
            
            <div style="background-color: green;" class="span-6">
                
                <?php echo CHtml::checkBox("TrxKurikulum[isAtribut]", TrxAtributKurikulum::model()->isChecked() ? true : false); ?>
                Tentukan Ruang Kelas (atribut)
                
                <div class="row" id="rowAtribut" style="display:<?php echo TrxAtributKurikulum::model()->isChecked() ? "block" : "none"; ?>;">
                        <?php echo CHtml::label("Atribut Kelas", "data");?>
                        <?php echo CHtml::dropDownList("TrxKurikulum[atribut]", "TrxKurikulum_atribut", TrxAtributKurikulum::toAdd(), array('multiple'=>'multiple')) ?>
                </div>
                
            </div>

            <div style="background-color: red;" class="span-6">
                
                <?php echo CHtml::checkBox("TrxKurikulum[isRuang]", TrxRuangKurikulum::model()->isChecked() ? true : false); ?>
                Tentukan Ruang Kelas (Ruang Kelas)
                
                <div class="row" id="rowRuang" style="display:<?php echo TrxRuangKurikulum::model()->isChecked() ? "block" : "none"; ?>;">
                        <?php echo CHtml::label("Ruang Kelas", "data");?>
                        <?php echo CHtml::dropDownList("TrxKurikulum[ruang]", "TrxKurikulum_ruang", TrxRuangKurikulum::toAdd(), array('multiple'=>'multiple')) ?>
                </div>
                
            </div>

            
            <?php 
                
                //echo CHtml::dropDownList("test", "test", CHtml::listData(Atribut::model()->findAll(), "id", "atribut"), array('multiple'=>'multiple'));
                
            ?>
            
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