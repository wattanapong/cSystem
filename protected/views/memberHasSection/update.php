<?php
/* @var $this MemberHasSectionController */
/* @var $model MemberHasSection */

$this->breadcrumbs=array(
	'Member Has Sections'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MemberHasSection', 'url'=>array('index')),
	array('label'=>'Create MemberHasSection', 'url'=>array('create')),
	array('label'=>'View MemberHasSection', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MemberHasSection', 'url'=>array('admin')),
);
?>

<h1>Update MemberHasSection <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>