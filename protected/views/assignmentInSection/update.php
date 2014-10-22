<?php
$this->breadcrumbs=array(
	'Assignment In Sections'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List AssignmentInSection','url'=>array('index')),
	array('label'=>'Create AssignmentInSection','url'=>array('create')),
	array('label'=>'View AssignmentInSection','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage AssignmentInSection','url'=>array('admin')),
	);
	?>

	<h1>Update AssignmentInSection <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>