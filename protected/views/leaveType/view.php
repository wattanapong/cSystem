<?php
/* @var $this LeaveTypeController */
/* @var $model LeaveType */

$this->breadcrumbs=array(
	'Leave Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LeaveType', 'url'=>array('index')),
	array('label'=>'Create LeaveType', 'url'=>array('create')),
	array('label'=>'Update LeaveType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LeaveType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LeaveType', 'url'=>array('admin')),
);
?>

<h1>View LeaveType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'value',
	),
)); ?>
