<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'university-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'valueTh',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'valueEn',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'abb',array('class'=>'span5','maxlength'=>10)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
