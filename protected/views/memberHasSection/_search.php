<?php
/* @var $this MemberHasSectionController */
/* @var $model MemberHasSection */
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
		<?php echo $form->label($model,'member_id'); ?>
		<?php echo $form->textField($model,'member_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'section_id'); ?>
		<?php echo $form->textField($model,'section_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->