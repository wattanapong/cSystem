<?php
/* @var $this LeaveController */
/* @var $model Leave */

$this->breadcrumbs=array(
	'Leaves'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Leave', 'url'=>array('index')),
	array('label'=>'Create Leave', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#leave-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

/* $Leave = Leave::model()->findByPk(1);
foreach ($Leave->member as $member)
	echo $Leave . ' have ' . $member->name.", "; */
?>

<h1>จัดการ การลา</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model
)); ?>
</div><!-- search-form -->

<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'leave-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
			
			array(
					'name'=>'name_search',
					//'filter'=>CHtml::listData(Member::model()->findAll(),'id','name'),
					'value'=>'$data->getNames($data->id)',
					//'value'=>'$data->getMemberName()',

					'htmlOptions'=>array("width"=>"500px"),
			),
			
			array(
					'name'=>'leave_type',
					'value'=>'LeaveType::model()->findByPk($data->leave_type_id)->value',
					'htmlOptions'=>array("width"=>"200px"),
			),
		'date_start',
		'date_end',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
