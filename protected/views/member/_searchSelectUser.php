<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl('/member/selectUser'),
	'method'=>'get',
)); ?>
		<?php  //echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->dropDownListRow($model,'gender_id',CHtml::listData(Gender::model()->findAll(),'id','valueTh'),array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>45)); ?>

		<?php 
		if ($pname == "teacher"){
		echo $form->textFieldRow($model,'academic_rank_id',
				CHtml::listdata(AcademicRank::model()->findAll(),'id','valueTh'),array('class'=>'span5')); 
		echo $form->textFieldRow($model,'phd',array('class'=>'span5')); 
		}else{
			$academicYear = array("1"=>"1","2"=>"2","3"=>"3","4"=>"4"
					,"5"=>"5","6"=>"6","7"=>"7","8"=>"8"
			);
			echo $form->dropDownListRow($model,'year',$academicYear,array('class'=>'span2')); 
		}
		?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
