<?php
/* @var $this MemberHasSectionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Member Has Sections',
);

$this->menu=array(
	array('label'=>'Create MemberHasSection', 'url'=>array('create')),
	array('label'=>'Manage MemberHasSection', 'url'=>array('admin')),
);
?>

<h1>Member Has Sections</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
