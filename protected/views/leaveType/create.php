<?php
/* @var $this LeaveTypeController */
/* @var $model LeaveType */

$this->breadcrumbs=array(
	'Leave Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LeaveType', 'url'=>array('index')),
	array('label'=>'Manage LeaveType', 'url'=>array('admin')),
);
?>

<h1>Create LeaveType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>