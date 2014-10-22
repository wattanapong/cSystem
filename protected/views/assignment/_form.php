<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'assignment-form',
	'enableAjaxValidation'=>false,
		'htmlOptions' => array(
				'enctype' => 'multipart/form-data',
				//'onsubmit'=>"return false;",
				//'onkeypress'=>" if(event.keyCode == 13){ send(); } "
		),
		/*'clientOptions' => array(
				'validateOnSubmit'=>true,
				'validateOnChange'=>true,
				'validateOnType'=>false,
		),*/
)); ?>

<div class="clear" style="height:30px"></div>
<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'topic',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->fileFieldRow($model,'pdfFile'); ?>

	<?php echo $form->dropDownListRow($model,'category_id',CHtml::listdata(Category::model()->findAll(),'id','name'),
			array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
