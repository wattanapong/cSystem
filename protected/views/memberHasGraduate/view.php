<?php
/* @var $this MemberHasGraduateController */
/* @var $model MemberHasGraduate */

$this->breadcrumbs=array(
	'Member Has Graduates'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MemberHasGraduate', 'url'=>array('index')),
	array('label'=>'Create MemberHasGraduate', 'url'=>array('create')),
	array('label'=>'Update MemberHasGraduate', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MemberHasGraduate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MemberHasGraduate', 'url'=>array('admin')),
);
?>

<h1>View MemberHasGraduate #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'member_id',
		'graduate_id',
	),
)); ?>
