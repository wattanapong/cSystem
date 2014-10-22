<?php
/* @var $this MemberHasGraduateController */
/* @var $model MemberHasGraduate */

$this->breadcrumbs=array(
	'Member Has Graduates'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MemberHasGraduate', 'url'=>array('index')),
	array('label'=>'Create MemberHasGraduate', 'url'=>array('create')),
	array('label'=>'View MemberHasGraduate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MemberHasGraduate', 'url'=>array('admin')),
);
?>

<h1>Update MemberHasGraduate <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>