<?php
/* @var $this SemesterController */
/* @var $model Semester */

$this->breadcrumbs=array(
	'Semesters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Semester', 'url'=>array('index')),
	array('label'=>'Manage Semester', 'url'=>array('admin')),
);
?>

<h1>Create Semester</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>