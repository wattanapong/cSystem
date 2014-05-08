<?php
/* @var $this YearedController */
/* @var $model Yeared */

$this->breadcrumbs=array(
	'Yeareds'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Yeared', 'url'=>array('index')),
	array('label'=>'Create Yeared', 'url'=>array('create')),
	array('label'=>'Update Yeared', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Yeared', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Yeared', 'url'=>array('admin')),
);
?>

<h1>View Yeared #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'value',
	),
)); ?>
