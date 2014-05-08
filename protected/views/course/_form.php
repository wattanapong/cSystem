<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'course-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">
	Fields with <span class="required">*</span> are required.
</p>

<?php echo $form->errorSummary($model,$modelCS); ?>
<?php //autocompleted ?>
		<?php echo $form->labelEx($model,'code'); ?>
		<?php
		$this->widget ( 'zii.widgets.jui.CJuiAutoComplete', array (
				'name' => 'Course[code]',
				//'source' =>array('ac1','ac2'),
				'sourceUrl' =>  Yii::app()->createAbsoluteUrl('course/autocomplete'),
				/* 'select'=>' function( event, ui ) {
					log(  ui.item  );
				}', */
				// additional javascript options for the autocomplete plugin
				'options' => array (
						'minLength' => '2',
						'maxlength'=>'6',
						'showAnim'=>'fold',
						'select'=>"js:function(event, ui) {
							log(ui.item);
						}",
						'onKeypress'
				),
				'htmlOptions' => array (
						'style' => 'height:20px;' ,
				) 
		) );
		?>
		<?php echo $form->error($model,'code'); ?>



<?php echo $form->textFieldRow($model,'valueTh',array('class'=>'span5','maxlength'=>70)); ?>

	<?php echo $form->textFieldRow($model,'valueEn',array('class'=>'span5','maxlength'=>70)); ?>

	<?php echo $form->dropDownListRow($modelCS,'semester_id',CHtml::listData(Semester::model()->findAll(),'id','value'),array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($modelCS,'yeared_id',CHtml::listData(Yeared::model()->findAll(" 1 ORDER BY value DESC"),'id','value'),array('class'=>'span5','id'=>'yearEd_id')); ?>
	
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			//'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'เพิ่มปีการศึกษา',
			'icon'=>'plus',
			'htmlOptions' => array (
					'data-toggle' => 'modal',
					'data-target' => '#yearedModal'
			)
		)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<!-- modal section  -->
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'yearedModal')); ?>

<div class="modal-header">
	<a class="close" data-dismiss="modal">&times;</a>
	<h4>เพิ่มปีการศึกษา</h4>
</div>

<div class="modal-body">

	<div class="form">
	
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'yeared-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model,$modelCS,$modely); ?>

	<?php echo $form->textfieldRow($modely,'value',array(''=>'')+CHtml::listData(yeared::model()->findAll(),'id','value'),array('class'=>'span5','maxlength'=>10)); ?>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=> 'เพิ่ม',
			'htmlOptions' => array (
					'id'=>'cYear',
					'data-dismiss' => 'modal',
					'style' => 'margin-right:40px',
					//'onclick' => 'js:bootbox.confirm("Are you sure?", function(confirmed){console.log("Confirmed: "+confirmed);})'
					//'onclick' => 'if(event.keyCode == 13){ send(); } "
					'onclick'=>'send(); ',
			) ,
		)); ?>

<?php $this->endWidget(); ?>

</div>
	<!-- form -->
</div>

<?php $this->endWidget(); ?>

<script>
function send()
 {
 addField("#yeared-form","<?php echo Yii::app()->createAbsoluteUrl('course/ajax'); ?>",
		 "ไม่สามารถเพิ่มปีการศึกษาได้ กรุณาลองใหม่",'#yearEd_id',"<?php echo Yii::app()->createAbsoluteUrl('yeared/loadYear'); ?>");

 }
 </script>
