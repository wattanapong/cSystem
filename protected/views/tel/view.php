<?php
/* @var $this TelController */
/* @var $model Tel */

$this->breadcrumbs=array(
	'Tels'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tel', 'url'=>array('index')),
	array('label'=>'Create Tel', 'url'=>array('create')),
	array('label'=>'Update Tel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tel', 'url'=>array('admin')),
);
?>

<h1>View Tel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'value',
		'member_id',
	),
)); ?>
