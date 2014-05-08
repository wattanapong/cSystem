<?php
/* @var $this SemesterController */
/* @var $model Semester */

$this->breadcrumbs=array(
	'Semesters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Semester', 'url'=>array('index')),
	array('label'=>'Create Semester', 'url'=>array('create')),
	array('label'=>'View Semester', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Semester', 'url'=>array('admin')),
);
?>

<h1>Update Semester <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>