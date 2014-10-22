<?php
/* @var $this CourseonsemesterController */
/* @var $model Courseonsemester */

$this->breadcrumbs=array(
	'Courseonsemesters'=>array('index'),
	$model->id,
);

$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/addField.js');

$this->menu=array(
		array('label'=>'เพิ่มรายวิชาลงทะเบียน','url'=>array('create')),
		array('label'=>'แก้ไขรายวิชานี้', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'จัดการรายวิชานี้','url'=>array('admin')),
);

$button = array('bootstrap.widgets.TbButton', array(
		//'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'เพิ่มปีการศึกษา',
		'icon'=>'plus',
		'htmlOptions' => array (
				'data-toggle' => 'modal',
				'data-target' => '#yearedModal'
		)
));
?>

<h1> รหัสวิชา <?php echo $model->course->code; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'type'=>'striped bordered condensed',
	'attributes'=>array(
		array('name'=>'course_id',
				'value'=>$model->course->code."<br>".$model->course->valueTh."<br>".$model->course->valueEn,
				'type'=>'raw',
		),
		array('name'=>'semester_id',
				'value'=>$model->semester->value,
		),
		array('name'=>'yeared_id',
				'value'=>$model->yeared->value,
		),
		array('name'=>'section',
				'value'=>CHtml::dropDownList('section_id','section',
						CHtml::listData(Section::model()->findAll('courseonSemester_id = \''.$model->id.'\' '), 'id', 'value'),
						array(
			                   // 'submit'=>array('section/view/'),
			                     'onclick'=>'if (this.value > 0 ) window.location.assign("'.Yii::app()->baseUrl.'/index.php/section/view/"+this.value)', 
								 // You can trigger some javascript here instead of the submit - but it's more hassle if you ask me.
			                    //'prompt'=>'-- You\'ll need a prompt', // Because onchange wont fire for the initially selected item.
			                 	'multiple' =>true,
		 				)
						)."<br><span class='label label-info' style='padding:5px'>คลิ๊กหมู่เรียน เพื่อเพิ่มสมาชิกในหมู่เรียน</span>",
				'type'=>'raw',
	   ),
	   array('name'=>'adddelsection',
	   		'value'=>CHtml::button('เพิ่ม ลบ หมู่เรียน', array(
								'class'=>'bootstrap.widgets.TbButton',
	   							'style'=>'background-color:#DD0;color:#000',
								'data-toggle' => 'modal',
								'data-target' => '#sectionModal'
								)),
	   		'type'=>'raw',
	   		),
	),
		
)); ?>

<!-- modal section  -->
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'sectionModal','htmlOptions'=>array('class'=>'span3'),)); ?>

<div class="modal-header">
	<a class="close" data-dismiss="modal">&times;</a>
	<h4>เพิ่มหมู่เรียน</h4>
</div>

<div class="modal-body">

	<div class="form">
	
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'section-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->hiddenField($models,'courseonSemester_id',array('value'=>$model->id)); ?>
	<?php echo $form->dropDownListRow($model,'section',CHtml::listData(Section::model()->findAll('courseonSemester_id = '.$model->id), 'id', 'value')
			,array('class'=>'span2','row'=>9,'multiple'=>true )); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'danger',
			'label'=> 'ลบ',
			'htmlOptions' => array (
					'id'=>'cYear',
					//'data-dismiss' => 'modal',
					'style' => 'margin-right:40px',
					//'onclick' => 'js:bootbox.confirm("Are you sure?", function(confirmed){console.log("Confirmed: "+confirmed);})'
					//'onclick' => 'if(event.keyCode == 13){ send(); } "
					'onclick'=>'del();return false;',
			) ,
		)); ?>
	<hr></hr>
	<?php echo $form->textfieldRow($models,'value',array('class'=>'span2','maxlength'=>10)); ?>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=> 'เพิ่ม',
			'htmlOptions' => array (
					'id'=>'cYear',
					//'data-dismiss' => 'modal',
					'style' => 'margin-right:40px',
					//'onclick' => 'js:bootbox.confirm("Are you sure?", function(confirmed){console.log("Confirmed: "+confirmed);})'
					//'onclick' => 'if(event.keyCode == 13){ send(); } "
					'onclick'=>'send();return false;',
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
 addField("#section-form","<?php echo Yii::app()->createAbsoluteUrl('section/addAjax'); ?>",
		 "#ไม่สามารถสร้างหมู่เรียนได้ กรุณาลองใหม่#",['#section_id','#Courseonsemester_section'],"");
 }

function del()
{
delField("#section-form","<?php echo Yii::app()->createAbsoluteUrl('section/delAjax'); ?>",
		 "#ไม่สามารถลบหมู่เรียนได้ กรุณาลองใหม่#",['#section_id','#Courseonsemester_section'],"");
}
 </script>
