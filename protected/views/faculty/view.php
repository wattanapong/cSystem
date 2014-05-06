<?php
$this->breadcrumbs=array(
	'Faculties'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Faculty','url'=>array('index')),
array('label'=>'Create Faculty','url'=>array('create')),
array('label'=>'Update Faculty','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Faculty','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Faculty','url'=>array('admin')),
);
?>

<h1>View Faculty #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'valueTh',
		'valueEn',
		'abb',
		'university_id',
),
)); ?>
