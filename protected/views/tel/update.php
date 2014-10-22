<?php
/* @var $this TelController */
/* @var $model Tel */

$this->breadcrumbs=array(
	'Tels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tel', 'url'=>array('index')),
	array('label'=>'Create Tel', 'url'=>array('create')),
	array('label'=>'View Tel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tel', 'url'=>array('admin')),
);
?>

<h1>Update Tel <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>