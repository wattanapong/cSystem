<?php
$this->breadcrumbs=array(
	'Universities'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List University','url'=>array('index')),
array('label'=>'Create University','url'=>array('create')),
array('label'=>'Update University','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete University','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage University','url'=>array('admin')),
);
?>

<h1>View University #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'valueTh',
		'valueEn',
		'abb',
),
)); ?>
