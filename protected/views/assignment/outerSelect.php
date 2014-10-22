<?php
Yii::app ()->clientScript->registerScript ( 'searchAsm', "
		
			$('.search-buttonAsm').click(function(){
	$('.search-formAsm' ).toggle();
	return false;
	}); 
		
	$('.search-formAsm form').submit(function(){
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
		
" );
?>
<h1><?php echo isset($msg)?$msg:"";?></h1>
<div class="clear" style="height: 20px;"></div>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-buttonAsm btn')); ?>
<div class="search-formAsm" style="display: none">
	<?php
	
$this->renderPartial ( '/assignment/_search', array (
			'model' => $model 
	) );
	?>
</div>
<!-- search-form -->

<?php

$this->widget ( 'bootstrap.widgets.TbGridView', array (
		'id' => 'assignment-grid',
		'type' => 'striped bordered condensed',
		'dataProvider' => $model->search (),
		// 'afterAjaxUpdate' => 'reinstallDatePickerCreate',
		'filter' => $model,
		'columns' => array (
				array (
						'name' => 'id',
						'htmlOptions' => array (
								'width' => '10%' 
						) 
				),
				array (
						'name' => 'topic',
						'htmlOptions' => array (
								'width' => '40%' 
						) 
				),
				array (
						'name' => 'category_id',
						'value' => 'Category::model()->findByPk($data->category_id)->name',
						'filter' => CHtml::listdata ( Category::model ()->findAll (), "id", "name" ),
						'htmlOptions' => array (
								'width' => '40%' 
						) 
				),
		/* array(
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
		), */
 array (
						'class' => 'bootstrap.widgets.TbButtonColumn',
						'template' => '{select}{view}',
						'buttons' => array (
								'view' => array (
										'icon'=>'eye-open',
										'url'=>	'\'../../..\'.$data->pdf',
										'options'=>array(
												'class' => 'btn',
												'target'=>'_blank')
								),
								'select' => array (
										'icon' => 'plus-sign',
										'click' => 'function(){
							 var idcab1=($(this).parent().parent().children(":nth-child(1)").text());
							 var idcab2=($(this).parent().parent().children(":nth-child(2)").text());
							clickMe(idcab1,idcab2);
							return false;
						}',
										'options' => array (
												'class' => 'btn  btn-default',
												'id' => '$data->id' 
										) 
								),
								 
						) 
				)
		) 
) );
?>

<script>
function clickMe(id,catagory){
	 //$('#outerAssignmentInSection_assignment_title').val(topic);
	 
	 $('#outerAssignmentInSection_assignment_id').val(id);
	$('#outerAssignmentInSection_assignment_name').val(catagory);
	$('html, body').animate({
        scrollTop: $("#assignment-in-section-form").offset().top
    }, 1000);
	return false;
}
</script>
