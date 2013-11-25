<?php
/* @var $this TrxPengajarController */
/* @var $data TrxPengajar */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
       
	<b><?php echo CHtml::encode($data->getAttributeLabel('dosen_id')); ?>:</b>
	<?php echo CHtml::encode($data->dosen->full_name); ?>
	<br />

</div>