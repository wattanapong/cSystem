<?php
/* @var $this AssignmentController */
/* @var $model Assignment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'assignment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'topic'); ?>
		<?php echo $form->textField($model,'topic',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'topic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pdf'); ?>
		<?php echo $form->textField($model,'pdf',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'pdf'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start'); ?>
		<?php echo $form->textField($model,'start'); ?>
		<?php echo $form->error($model,'start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end'); ?>
		<?php echo $form->textField($model,'end'); ?>
		<?php echo $form->error($model,'end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create'); ?>
		<?php echo $form->textField($model,'create'); ?>
		<?php echo $form->error($model,'create'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_has_section_id'); ?>
		<?php echo $form->textField($model,'member_has_section_id'); ?>
		<?php echo $form->error($model,'member_has_section_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->