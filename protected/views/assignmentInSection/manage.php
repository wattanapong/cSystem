<?php
if ( !isset($secid) ){
$this->breadcrumbs=array(
	'Assignment In Sections'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List AssignmentInSection','url'=>array('index')),
array('label'=>'Create AssignmentInSection','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('assignment-in-section-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Assignment In Sections</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<?php }?>

<?php 
Yii::app()->clientScript->registerScript('datePickerManage', "

		function reinstallDatePickerManage() {

		$('#manage_end').datepicker( $.extend( $.datepicker.regional[ 'th' ],{ dateFormat: 'd MM yy',changeMonth:'true',changeYear:'true',defaultDate:'+543y'} ) );
		$('#manage_start').datepicker( $.extend( $.datepicker.regional[ 'th' ],{ dateFormat: 'd MM yy',changeMonth:'true',changeYear:'true',defaultDate:'+543y'} ) );

		//$('#manage_search_end').datepicker( $.extend( $.datepicker.regional[ 'th' ],{ dateFormat: 'd MM yy',changeMonth:'true',changeYear:'true',defaultDate:'+543y'} ) );
		//$('#manage_search_start').datepicker( $.extend( $.datepicker.regional[ 'th' ],{ dateFormat: 'd MM yy',changeMonth:'true',changeYear:'true',defaultDate:'+543y'} ) );
}

		reinstallDatePickerManage();
		");
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn',
		'style'=>'font-size:0.8em;margin:10 0 30 auto;')); ?>
<div class="search-form" style="display:none">
	<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'assignment-in-section-grid',
'type'=>'striped bordered condensed',
'dataProvider'=>$searchResult,
		'afterAjaxUpdate' => 'reinstallDatePickerManage',
'filter'=>$model,
'columns'=>array(
		 'assignment_id',
		'assignment_title',
		array(
		'name'=>'date',
				'filter'=>$this->widget(
						'ext.jui.EJuiDateTimePicker',
						array(
								'model'     => $model,
								'attribute' => 'start',
								'mode'    => 'datetime',
								'language'=> 'th',
								'htmlOptions'=>array(
										'class'=>'span5',
										'id' => 'manage_start',
										'size' => '10',
										'value' => convertDate($model->start),
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
				'value'=>'convertDate($data->start)',
		),
		array(
		'name'=>'end',
				'filter'=>$this->widget(
						'ext.jui.EJuiDateTimePicker',
						array(
								'model'     => $model,
								'attribute' => 'end',
								'mode'    => 'datetime',
								'language'=> 'th',
								'htmlOptions'=>array(
										'class'=>'span5',
										'id' => 'manage_end',
										'size' => '10',
										'value' => convertDate($model->end),
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
				'value'=>'convertDate($data->end)',
				'htmlOptions'=>array("width"=>"120px"),
		),
			
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>

<?php 

$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			//'icon'=>'ok',
			'type'=>'primary',
			'label'=> 'ลบ',
			'htmlOptions'=>array( 
				'onclick'=>"
					var selectionIds=$('#assignment-in-section-grid').yiiGridView('getChecked', 'id') ;
					if (selectionIds.length!==0) {
					
					$.ajax( {
                                        type:'POST',
                                        url:'".Yii::app()->createUrl('/assignmentInSection/admin')."',
										data: {mid: selectionIds,sid:".$secid.",opt:'add'},
                                        success:function(data) { 	
											alert(data);
                                             $.fn.yiiGridView.update('#assignment-in-section-grid');
                                        }
                                    });
		       		}
				
				
					"
			),
		)); 
?>
