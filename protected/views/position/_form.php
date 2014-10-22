<?php
/* @var $this PositionController */
/* @var $model Position */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'position-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'valueTh'); ?>
		<?php echo $form->textField($model,'valueTh',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'valueTh'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valueEn'); ?>
		<?php echo $form->textField($model,'valueEn',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'valueEn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jobDescription_id'); ?>
		<?php echo $form->dropDownList($model,'jobDescription_id',CHtml::listData(JobDescription::model()->findAll(),'id','valueTh')); ?>
		<?php echo $form->error($model,'jobDescription_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->