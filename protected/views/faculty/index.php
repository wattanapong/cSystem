<?php
$this->breadcrumbs=array(
	'Faculties',
);

$this->menu=array(
array('label'=>'Create Faculty','url'=>array('create')),
array('label'=>'Manage Faculty','url'=>array('admin')),
);
?>

<h1>Faculties</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
