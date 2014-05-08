<?php
/* @var $this CourseonsemesterController */
/* @var $model Courseonsemester */

$this->breadcrumbs=array(
	'Courseonsemesters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Courseonsemester', 'url'=>array('index')),
	array('label'=>'Create Courseonsemester', 'url'=>array('create')),
	array('label'=>'Update Courseonsemester', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Courseonsemester', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Courseonsemester', 'url'=>array('admin')),
);
?>

<h1>View Courseonsemester #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'course_id',
		'semester_id',
		'yeared_id',
	),
)); ?>
