<?php
$cs = Yii::app()->getClientScript();
$cs->registerCss('tabcss','
		.items th,.items th a {
		background-color:#0D0;
		color:#00F;
}
		');
/* @var $this CourseonsemesterController */
/* @var $model Courseonsemester */

$this->breadcrumbs=array(
	'Courseonsemesters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'เพิ่มรายวิชาใหม่','url'=>array(Yii::app()->baseUrl.'/../course/create')),
		array('label'=>'จัดการรายวิชา','url'=>array(Yii::app()->baseUrl.'/../course/admin')),
	array('label'=>'เพิ่มรายวิชาสำหรับภาคการศึกษา','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#courseonsemester-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการรายวิชาสำหรับภาคการศึกษา</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'courseonsemester-grid',
		'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
			array('header'=>'No.',
					'value'=>'++$row',//'++$row',
					'htmlOptions'=>array('style'=>'width:20px;'),
			),
		array('name'=>'course',
				'value'=>'$data->course->code."<br>".$data->course->valueTh."<br>".$data->course->valueEn',
				'type'=>'raw',
		),
		array('name'=>'semester_id',
				'value'=>'$data->semester->value',
				'filter'=>CHtml::listData(Semester::model()->findAll(),'id','value'),
		),
		array('name'=>'yeared_id',
				'value'=>'$data->yeared->value',
				'filter'=>CHtml::listData(Yeared::model()->findAll(),'id','value'),
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
