<?php
/* @var $this LeaveController */
/* @var $data Leave */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('leave_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->leave_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_start')); ?>:</b>
	<?php echo CHtml::encode($data->date_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_end')); ?>:</b>
	<?php echo CHtml::encode($data->date_end); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leave_service_id')); ?>:</b>
	<?php echo CHtml::encode($data->leave_service_id); ?>
	<br />


</div>