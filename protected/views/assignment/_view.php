<?php
/* @var $this AssignmentController */
/* @var $data Assignment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('topic')); ?>:</b>
	<?php echo CHtml::encode($data->topic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pdf')); ?>:</b>
	<?php echo CHtml::encode($data->pdf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start')); ?>:</b>
	<?php echo CHtml::encode($data->start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end')); ?>:</b>
	<?php echo CHtml::encode($data->end); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create')); ?>:</b>
	<?php echo CHtml::encode($data->create); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_has_section_id')); ?>:</b>
	<?php echo CHtml::encode($data->member_has_section_id); ?>
	<br />


</div>