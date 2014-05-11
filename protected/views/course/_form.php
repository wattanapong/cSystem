<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'course-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">
	Fields with <span class="required">*</span> are required.
</p>

<?php echo $form->errorSummary($model); ?>

<?php //autocompleted ?>
		<?php echo $form->labelEx($model,'code'); ?>
		<?php
		$this->widget ( 'zii.widgets.jui.CJuiAutoComplete', array (
				'name' => 'Course[code]',
				'value'=> $model->code ,
				'sourceUrl' =>  Yii::app()->createAbsoluteUrl('course/autocomplete'),
				'options' => array (
						'minLength' => '2',
						'maxlength'=>'6',
						//'showAnim'=>'fold',
						'select'=>"js:function(event, ui) {
							log(ui.item);
						}",
				),
				'htmlOptions' => array (
						'style' => 'height:20px;' ,
				) 
		) );
		?>
		<?php echo $form->error($model,'code'); ?>

<?php echo $form->textFieldRow($model,'valueTh',array('class'=>'span5','maxlength'=>70)); ?>

<?php echo $form->textFieldRow($model,'valueEn',array('class'=>'span5','maxlength'=>70)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'เพิ่ม' : 'แก้ไข',
		)); ?>
</div>

<?php $this->endWidget(); ?>
