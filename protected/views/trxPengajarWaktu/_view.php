<?php
/* @var $this TrxPengajarWaktuController */
/* @var $data TrxPengajarWaktu */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pengajar_id')); ?>:</b>
	<?php echo CHtml::encode($data->pengajar_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hari_id')); ?>:</b>
	<?php echo CHtml::encode($data->hari_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start')); ?>:</b>
	<?php echo CHtml::encode($data->start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end')); ?>:</b>
	<?php echo CHtml::encode($data->end); ?>
	<br />


</div>