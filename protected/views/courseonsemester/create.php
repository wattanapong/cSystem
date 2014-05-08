<?php
/* @var $this CourseonsemesterController */
/* @var $model Courseonsemester */

$this->breadcrumbs=array(
	'Courseonsemesters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Courseonsemester', 'url'=>array('index')),
	array('label'=>'Manage Courseonsemester', 'url'=>array('admin')),
);
?>

<h1>Create Courseonsemester</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>