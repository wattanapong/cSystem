<?php
/* @var $this MemberHasGraduateController */
/* @var $data MemberHasGraduate */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_id')); ?>:</b>
	<?php echo CHtml::encode($data->member_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('graduate_id')); ?>:</b>
	<?php echo CHtml::encode($data->graduate_id); ?>
	<br />


</div>