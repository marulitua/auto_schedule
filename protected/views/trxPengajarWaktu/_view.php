<?php
/* @var $this TrxPengajarWaktuController */
/* @var $data TrxPengajarWaktu */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pengajar_id')); ?>:</b>
	<?php echo CHtml::encode($data->pengajar->dosen->full_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hari_id')); ?>:</b>
	<?php echo CHtml::encode($data->hari->hari); ?>
	<br />
        <!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('start')); ?>:</b>
	<?php echo CHtml::encode($data->start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end')); ?>:</b>
	<?php echo CHtml::encode($data->end); ?>
	<br />
        -->
        <b>Waktu:</b>
	<?php echo CHtml::encode($data->waktu()); ?>
	<br />


</div>