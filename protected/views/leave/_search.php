<?php
/* @var $this LeaveController */
/* @var $model Leave */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="row">
		<?php echo $form->label(Member::model(),'name'); ?>
		<?php echo $form->textField(Member::model(),'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'leave_type_id'); ?>
		<?php echo $form->textField($model,'leave_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_start'); ?>
		<?php echo $form->textField($model,'date_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_end'); ?>
		<?php echo $form->textField($model,'date_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->label(LeaveService::model(),'number'); ?>
		<?php echo $form->textField(LeaveService::model(),'number'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label(LeaveService::model(),'header'); ?>
		<?php echo $form->textField(LeaveService::model(),'header'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->