<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>45)); ?>

			<?php echo $form->textFieldRow($model,'fuser',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->dropDownListRow($model,'prefix_id',CHtml::listData(Prefix::model()->findAll(),'id','valueTh'),array('class'=>'span5'));  ?>
		
		<?php echo $form->dropDownListRow($model,'gender_id',CHtml::listData(Gender::model()->findAll(),'id','valueTh'),array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'surname',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'academic_rank_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'date_registered',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'privilege_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'phd',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
