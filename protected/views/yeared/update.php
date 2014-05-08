<?php
/* @var $this YearedController */
/* @var $model Yeared */

$this->breadcrumbs=array(
	'Yeareds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Yeared', 'url'=>array('index')),
	array('label'=>'Create Yeared', 'url'=>array('create')),
	array('label'=>'View Yeared', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Yeared', 'url'=>array('admin')),
);
?>

<h1>Update Yeared <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>