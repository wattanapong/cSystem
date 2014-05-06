<?php
$this->breadcrumbs=array(
	'Universities',
);

$this->menu=array(
array('label'=>'Create University','url'=>array('create')),
array('label'=>'Manage University','url'=>array('admin')),
);
?>

<h1>Universities</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
