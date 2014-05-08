<?php
/* @var $this AssignmentController */
/* @var $model Assignment */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'topic'); ?>
		<?php echo $form->textField($model,'topic',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pdf'); ?>
		<?php echo $form->textField($model,'pdf',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start'); ?>
		<?php echo $form->textField($model,'start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end'); ?>
		<?php echo $form->textField($model,'end'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create'); ?>
		<?php echo $form->textField($model,'create'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_has_section_id'); ?>
		<?php echo $form->textField($model,'member_has_section_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->