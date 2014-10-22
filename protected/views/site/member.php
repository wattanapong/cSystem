<?php
/* @var $this MemberController */
/* @var $model Member */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'member-member-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'prefix_id'); ?>
		<?php echo $form->textField($model,'prefix_id'); ?>
		<?php echo $form->error($model,'prefix_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'academic_rank_id'); ?>
		<?php echo $form->textField($model,'academic_rank_id'); ?>
		<?php echo $form->error($model,'academic_rank_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sex_id'); ?>
		<?php echo $form->textField($model,'sex_id'); ?>
		<?php echo $form->error($model,'sex_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_id'); ?>
		<?php echo $form->textField($model,'status_id'); ?>
		<?php echo $form->error($model,'status_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel_id'); ?>
		<?php echo $form->textField($model,'tel_id'); ?>
		<?php echo $form->error($model,'tel_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_id'); ?>
		<?php echo $form->textField($model,'email_id'); ?>
		<?php echo $form->error($model,'email_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'surname'); ?>
		<?php echo $form->textField($model,'surname'); ?>
		<?php echo $form->error($model,'surname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'professional_license'); ?>
		<?php echo $form->textField($model,'professional_license'); ?>
		<?php echo $form->error($model,'professional_license'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_registered'); ?>
		<?php echo $form->textField($model,'date_registered'); ?>
		<?php echo $form->error($model,'date_registered'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_start'); ?>
		<?php echo $form->textField($model,'date_start'); ?>
		<?php echo $form->error($model,'date_start'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->