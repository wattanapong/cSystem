<?php
/* @var $this LeaveServiceController */
/* @var $model LeaveService */

$this->breadcrumbs=array(
	'Leave Services'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LeaveService', 'url'=>array('index')),
	array('label'=>'Create LeaveService', 'url'=>array('create')),
	array('label'=>'Update LeaveService', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LeaveService', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LeaveService', 'url'=>array('admin')),
);
?>

<h1>View LeaveService #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'number',
		'header',
		'leave_status_id',
	),
)); ?>
