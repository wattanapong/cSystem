<?php 

if (Yii::app()->user->id !== $data->id && Yii::app()->user->getPrivilege() ===  "student") {}

elseif( Yii::app()->user->getPrivilege() === "teacher" && Privilege::model()->findByPk( $data->privilege_id )->value === "administrator"){}

else{
?>
<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuser')); ?>:</b>
	<?php echo CHtml::encode($data->fuser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prefix_id')); ?>:</b>
	<?php echo CHtml::encode($data->prefix_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('surname')); ?>:</b>
	<?php echo CHtml::encode($data->surname); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_registered')); ?>:</b>
	<?php echo CHtml::encode(convertDate($data->date_registered)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status=="1"?"ON":"OFF"); ?>
	<br />
	
		<b><?php echo CHtml::encode($data->getAttributeLabel('privilege_id')); ?>:</b>
	<?php echo CHtml::encode($data->privilege_id); ?>
	<br />
	
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('academic_rank_id')); ?>:</b>
	<?php echo CHtml::encode($data->academic_rank_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phd')); ?>:</b>
	<?php echo CHtml::encode($data->phd); ?>
	<br />

	*/ ?>

</div>
<?php }?>