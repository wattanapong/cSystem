<?php
/* @var $this PositionController */
/* @var $data Position */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valueTh')); ?>:</b>
	<?php echo CHtml::encode($data->valueTh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valueEn')); ?>:</b>
	<?php echo CHtml::encode($data->valueEn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jobDescription_id')); ?>:</b>
	<?php echo CHtml::encode($data->jobDescription_id); ?>
	<br />


</div>