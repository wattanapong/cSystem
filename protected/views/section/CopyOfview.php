<?php
/* @var $this SectionController */
/* @var $model Section */

$this->breadcrumbs=array(
	'Sections'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Section', 'url'=>array('index')),
	array('label'=>'Create Section', 'url'=>array('create')),
	array('label'=>'Update Section', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Section', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Section', 'url'=>array('admin')),
);
?>

<h1>หมู่เรียนที่ #<?php echo $model->value; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'type'=>'striped bordered condensed',
	'attributes'=>array(
		array('name'=>'courseon',
				'value'=>$model->course->code."<br>".$model->course->valueTh."<br>".$model->course->valueEn,
				'type'=>'raw',
		),
			array('name'=>'courseonSemester_id',
					'value'=>$model->semester->value,
			),
			array('name'=>'courseonYeared_id',
					'value'=>$model->yeared->value,
			),
	),
)); ?>

<hr></hr>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'course-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="row-fluid">
	<div class="well bs-layout span6">
			<span class="bs-layout-header">อาจารย์ทั้งหมด</span>
			<?php echo $form->dropDownListRow($model, 'empty',
					CHtml::listdata(Member::model()->findAll('privilege_id = \''.Yii::app()->user->getPrivilegeId("teacher").'\' ' ),
					'id','fullName'),array('multiple'=>true,'size'=>'10'
							,'style'=>'width:auto; min-width:220px;','id'=>'lecAll','name'=>'lecAll')); ?>
	</div>
	
	<div class="well bs-layout span6">		
			<span class="bs-layout-header">นิสิตทั้งหมด</span>
			<?php echo $form->dropDownListRow($model, 'empty',
					CHtml::listdata(Member::model()->findAll('privilege_id = '.Yii::app()->user->getPrivilegeId("student").' AND
							code != "" ' ),
					'id','fullName'),array('multiple'=>true,'size'=>'10'
							,'style'=>'width:auto;min-width:220px;', 'id'=>'stdAll','name'=>'stdAll')); ?>
	</div>
</div>

<div class="row-fluid">
	<div class="well bs-layout span6">
			<span class="bs-layout-header">อาจารย์ผู้สอน</span>
	</div>
	
	<div class="well bs-layout span6">		
			<span class="bs-layout-header">นิสิตลงทะเบียน</span>
	</div>
</div>
<?php $this->endWidget(); ?>