<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'member-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


	<?php if ( empty($model->id) ){
		echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>45));
		echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>45)); 
	}?>
	
	<?php echo $form->textFieldRow($model,'fuser',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->dropDownListRow($model,'prefix_id',CHtml::listData(Prefix::model()->findAll(),'id','valueTh'),array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'surname',array('class'=>'span5','maxlength'=>45)); ?>
	
	<?php echo $form->textFieldRow($model,'code',array('class'=>'span5','maxlength'=>15 )); ?>

	<?php echo $form->dropDownListRow($model,'academic_rank_id',array(''=>'')+CHtml::listData(AcademicRank::model()->findAll(),'id','valueTh'),array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'date_registered',array('class'=>'span5')); ?>
	
	<?php 
	/* echo $form->labelEx($model,'date_registered');
	$form->widget ( 'ext.jui.EJuiDateTimePicker',
			array(
					'model'     => $model,
					'attribute' => 'date_registered',
					'mode'    => 'date',
					'language'=> 'th',
					'htmlOptions'=>array(
							'class'=>'span5',
							'id' => 'Member_date_registered',
							'size' => '10',
							'value' => convertDate($model->date_registered),
							'width'=>'120px',
					),
					'options'=>array(
							'dateFormat'=> 'd MM yy',
							'changeMonth'=>'true',
							'changeYear'=>'true',
							'defaultDate'=>'+543y',
					),
			) );
	$form->error($model,'date_registered'); */
	?>
<?php 
if (Yii::app()->user->getPrivilege() === "teacher") $privileges = Privilege::model()->findAll("value != 'administrator' ");
else $privileges = Privilege::model()->findAll();
?>
	<?php echo $form->dropDownListRow($model,'status',array('0'=>'OFF','1'=>'ON'),array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'privilege_id',CHtml::listData($privileges,'id','value'),array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'faculty_id',CHtml::listData(Faculty::model()->findAll(),'id','valueTh'),array('class'=>'span5')); ?>
	
	<?php echo $form->dropDownListRow($model,'major_id',CHtml::listData(Major::model()->findAll(),'id','valueTh'),array('class'=>'span5')); ?>
	
	<?php echo $form->dropDownListRow($model,'phd',array('0'=>'no','1'=>'yes'),array('class'=>'span5')); ?>
	
	

	<?php if ( !empty($model->id) ){?>
	<div class="clear"></div>
	<strong>แก้ไขรหัสผ่าน</strong>
	<div class="hero-unit">
		<?php echo $form->passwordFieldRow($model,'password1',array('class'=>'span5','maxlength'=>45)); ?>
		<?php echo $form->passwordFieldRow($model,'password2',array('class'=>'span5','maxlength'=>45)); ?>
	</div>
	<?php }?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'สร้าง' : 'บันทึก',
		)); ?>
</div>

<?php $this->endWidget(); ?>
