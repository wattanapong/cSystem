<?php
$this->breadcrumbs=array(
	'Members',
);

$this->menu=array(
array('label'=>'Create Member','url'=>array('create')),
array('label'=>'Manage Member','url'=>array('admin')),
);
?>

<h1>Editor</h1>
<?php 
$this->widget('ext.editMe.widgets.ExtEditMe', array(
    'name'=>'example',
	'filebrowserBrowseUrl'=>Yii::app()->createUrl('/'),
    'value'=>'',
    //'optionName'=>'optionValue',
));
?>
