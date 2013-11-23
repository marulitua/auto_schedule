<?php
/* @var $this RuangKelasController */
/* @var $data RuangKelas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('praktek')); ?>:</b>
	<?php echo CHtml::encode($data->praktek == '1' ? 'Praktek' : 'Teori'); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number')); ?>:</b>
	<?php echo CHtml::encode($data->number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gedung_id')); ?>:</b>
	<?php echo CHtml::encode($data->gedung->gedung); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lantai')); ?>:</b>
	<?php echo CHtml::encode($data->lantai); ?>
	<br />


</div>