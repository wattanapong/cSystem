<?php
$cs = Yii::app()->getClientScript();
$cs->registerCss('tabcss','
.items th,.items th a {
	background-color:#0A0;
		color:#00F;
}
');
$this->breadcrumbs=array(
	'Courses'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'เพิ่มรายวิชาใหม่','url'=>array('create')),
array('label'=>'เพิ่มรายวิชาสำหรับภาคการศึกษา','url'=>array(Yii::app()->baseUrl.'/../courseonsemester/create')),
array('label'=>'จัดการรายวิชาสำหรับภาคการศึกษา','url'=>array(Yii::app()->baseUrl.'/../courseonsemester/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('course-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>จัดการรายวิชา</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
			'modelCS'=>$modelCS,
			'modely'=>$modely,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'course-grid',
'type'=>'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array('header'=>'No.',
					'value'=>'++$row',//'++$row',
					'htmlOptions'=>array('style'=>'width:20px;'),
			),
		'code',
		'valueTh',
		'valueEn',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
