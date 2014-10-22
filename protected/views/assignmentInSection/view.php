<?php
$this->breadcrumbs=array(
	'Assignment In Sections'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List AssignmentInSection','url'=>array('index')),
array('label'=>'Create AssignmentInSection','url'=>array('create')),
array('label'=>'Update AssignmentInSection','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete AssignmentInSection','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage AssignmentInSection','url'=>array('admin')),
);
?>

<h1>View AssignmentInSection #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'assignment_id',
		'section',
		'assignment_title',
),
)); ?>
