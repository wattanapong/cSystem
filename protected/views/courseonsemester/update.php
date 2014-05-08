<?php
/* @var $this CourseonsemesterController */
/* @var $model Courseonsemester */

$this->breadcrumbs=array(
	'Courseonsemesters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Courseonsemester', 'url'=>array('index')),
	array('label'=>'Create Courseonsemester', 'url'=>array('create')),
	array('label'=>'View Courseonsemester', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Courseonsemester', 'url'=>array('admin')),
);
?>

<h1>Update Courseonsemester <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>