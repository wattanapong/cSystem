<?php
/* @var $this LeaveTypeController */
/* @var $model LeaveType */

$this->breadcrumbs=array(
	'Leave Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LeaveType', 'url'=>array('index')),
	array('label'=>'Create LeaveType', 'url'=>array('create')),
	array('label'=>'View LeaveType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LeaveType', 'url'=>array('admin')),
);
?>

<h1>Update LeaveType <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>