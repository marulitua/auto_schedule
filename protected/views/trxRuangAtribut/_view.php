<?php
/* @var $this TrxRuangAtributController */
/* @var $data TrxRuangAtribut */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ruang_kelas_id')); ?>:</b>
	<?php echo CHtml::encode($data->ruang_kelas_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('atribut_id')); ?>:</b>
	<?php echo CHtml::encode($data->atribut_id); ?>
	<br />


</div>