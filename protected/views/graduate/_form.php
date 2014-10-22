<?php
/* @var $this GraduateController */
/* @var $model Graduate */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'graduate-form',
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
		<?php echo $form->textField($model,'valueTh',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'valueTh'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'abbTh'); ?>
		<?php echo $form->textField($model,'abbTh',array('size'=>10,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'abbTh'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valueEn'); ?>
		<?php echo $form->textField($model,'valueEn',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'valueEn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'abbEn'); ?>
		<?php echo $form->textField($model,'abbEn',array('size'=>10,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'abbEn'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'graduatelevel_id'); ?>
		<?php echo $form->dropDownList($model, 'graduatelevel_id',CHtml::listData(GraduateLevel::model()->findAll(), 'id','valueTh')); ?>
		<?php echo $form->error($model,'graduatelevel_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->