<?php
$this->breadcrumbs=array(
	'Majors',
);

$this->menu=array(
array('label'=>'Create Major','url'=>array('create')),
array('label'=>'Manage Major','url'=>array('admin')),
);
?>

<h1>Majors</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
