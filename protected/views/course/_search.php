<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'code',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'valueTh',array('class'=>'span5','maxlength'=>70)); ?>

		<?php echo $form->textFieldRow($model,'valueEn',array('class'=>'span5','maxlength'=>70)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
