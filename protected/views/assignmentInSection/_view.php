<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assignment_id')); ?>:</b>
	<?php echo CHtml::encode($data->assignment_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('section')); ?>:</b>
	<?php echo CHtml::encode($data->section); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assignment_title')); ?>:</b>
	<?php echo CHtml::encode($data->assignment_title); ?>
	<br />


</div>