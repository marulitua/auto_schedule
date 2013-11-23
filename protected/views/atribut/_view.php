<?php
/* @var $this AtributController */
/* @var $data Atribut */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('atribut')); ?>:</b>
	<?php echo CHtml::encode($data->atribut); ?>
	<br />


</div>