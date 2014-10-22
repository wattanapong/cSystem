<?php
$this->breadcrumbs=array(
	'Assignment In Sections',
);

$this->menu=array(
array('label'=>'Create AssignmentInSection','url'=>array('create')),
array('label'=>'Manage AssignmentInSection','url'=>array('admin')),
);
?>

<h1>Assignment In Sections</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
