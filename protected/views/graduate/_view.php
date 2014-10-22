<?php
/* @var $this GraduateController */
/* @var $data Graduate */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valueTh')); ?>:</b>
	<?php echo CHtml::encode($data->valueTh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abbTh')); ?>:</b>
	<?php echo CHtml::encode($data->abbTh); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('valueEn')); ?>:</b>
	<?php echo CHtml::encode($data->valueEn); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('abbEn')); ?>:</b>
	<?php echo CHtml::encode($data->abbEn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('graduatelevel_id')); ?>:</b>
	<?php echo CHtml::encode($data->graduatelevel_id); ?>
	<br />

</div>