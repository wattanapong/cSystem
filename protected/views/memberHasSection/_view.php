<?php
/* @var $this MemberHasSectionController */
/* @var $data MemberHasSection */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_id')); ?>:</b>
	<?php echo CHtml::encode($data->member_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('section_id')); ?>:</b>
	<?php echo CHtml::encode($data->section_id); ?>
	<br />


</div>