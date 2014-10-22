<?php
$this->breadcrumbs=array(
	'Assignments'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Assignment','url'=>array('index')),
array('label'=>'Create Assignment','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('assignment-grid', {
data: $(this).serialize()
});
return false;
});
		
		function reinstallDatePickerCreate() {

		$('#created').datepicker( $.extend( $.datepicker.regional[ 'th' ],{ dateFormat: 'd MM yy',changeMonth:'true',changeYear:'true',defaultDate:'+543y'} ) );
		
		$('#search_created').datepicker( $.extend( $.datepicker.regional[ 'th' ],{ dateFormat: 'd MM yy',changeMonth:'true',changeYear:'true',defaultDate:'+543y'} ) );
}

		reinstallDatePickerCreate();
		
");
?>

<div class="clear" style="height:20px;"></div>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('/assignment/_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'assignment-grid',
'type'=>'striped bordered condensed',
'dataProvider'=>$model->search(),
'afterAjaxUpdate' => 'reinstallDatePickerCreate',
'filter'=>$model,
'columns'=>array(
		'topic',
		array(
				 'name'=> 'category_id',
				'value'=>'Category::model()->findByPk($data->category_id)->name',
				'filter'=>CHtml::listdata(Category::model()->findAll(),"id","name"),
		),
		array(
				 'name'=> 'created',
				'filter'=>$this->widget(
						'ext.jui.EJuiDateTimePicker',
						array(
								'model'     => $model,
								'attribute' => 'created',
								'mode'    => 'datetime',
								'language'=> 'th',
								'htmlOptions'=>array(
										'class'=>'span5',
										'id' => 'created',
										'size' => '10',
										'value' => convertDate($model->created),
										'width'=>'120px',
								),
								'options'=>array(
										'dateFormat'=> 'd MM yy',
										'changeMonth'=>'true',
										'changeYear'=>'true',
										'defaultDate'=>'+543y',
								),
						),
						true
				),
				'value'=>'convertDate($data->created)',
				'htmlOptions'=>array("width"=>"120px"),
		),
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
		'template'=>'{update}{delete}',
		'buttons'=>array
		(
				'update' => array
				(
						'url'=>'json_encode(array("label"=>$data->id,"pdf"=>$data->pdf,
						"topic"=>$data->topic,"category_id"=>$data->category_id))',
						'click'=>'function(){
							$("#assignment-form")[0].reset();
							var json = $(this).attr("href");
							 obj = JSON.parse(json);
							$("#topicA").val(obj.topic);
							$("#category_idA").val(obj.category_id);
						return false;
						}
						',
				),
				'delete' => array
				(
						'url'=>'Yii::app()->controller->createUrl("/assignment/delete/".$data->primaryKey)',
				),
		),
),
),
)); ?>
