<?php 
$cs = Yii::app()->getClientScript();
$cs->registerCss('tabcss','
.tabActive{
	border-bottom:none;
}
		
		.items th,.items th a {
			background-color:#00F;
			color:#fff;
		}

#tab1{
	display:block;
}

#tab2,#tab3{
	display: none;
}

.tabInActive{
	background-color:#FF0;border:1px solid #000;border-top-left-radius:5px;border-top-right-radius:5px;
}
');

if (Yii::app()->user->getPrivilege() === "administrator") $privileges = Privilege::model()->findAll();
elseif (Yii::app()->user->getPrivilege() === "teacher") $privileges = Privilege::model()->findAll("value != 'administrator' ");

$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'เพิ่มสมาชิก',
	'items'=>array(
		array('label'=>'กรอกข้อมูล','url'=>array('create')),
			array('label'=>'เป็นไฟล์','url'=>array('upfile')),
	),
),
array('label'=>'ยืนยันสมาชิก','url'=>array('activate')),
);
$cs->registerScriptFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/js/jquery-ui-i18n.min.js' );
$cs->registerScript('search', "
		
$('.search-button1').click(function(){
	$('.search-form1' ).toggle();
	return false;
});
		
		$('.search-button2').click(function(){
	$('.search-form2' ).toggle();
	return false;
});
		
		$('.search-button3').click(function(){
	$('.search-form3' ).toggle();
	return false;
});

	$('.search-form1 form').submit(function(){
	$.fn.yiiGridView.update('member-grid1', {
	data: $(this).serialize()
	});
	return false;
	});
		
		$('.search-form2 form').submit(function(){
	$.fn.yiiGridView.update('member-grid2', {
	data: $(this).serialize()
	});
	return false;
	});
		
		$('.search-form3 form').submit(function(){
	$.fn.yiiGridView.update('member-grid3', {
	data: $(this).serialize()
	});
	return false;
	});

		
function tabAll(i,obj){
	for(var j=1;j<=3;j++){
		$('#tab'+j).hide();
	}
	$('.active').removeClass('active');
	obj.addClass('active'); 
	
	$('.tabActive').css('background-color','#FFF' );
	$('.tabInActive').css('background-color','#FF0' );
	
	$('#tab'+i).show();
}
			
function reinstallDatePicker() {
		
		$('#datepicker_for_date_registered1').datepicker( $.extend( $.datepicker.regional[ 'th' ],{ dateFormat: 'd MM yy',changeMonth:'true',changeYear:'true',defaultDate:'+543y'} ) );
		$('#datepicker_for_date_registered2').datepicker( $.extend( $.datepicker.regional[ 'th' ],{ dateFormat: 'd MM yy',changeMonth:'true',changeYear:'true',defaultDate:'+543y'} ) );
		$('#datepicker_for_date_registered3').datepicker( $.extend( $.datepicker.regional[ 'th' ],{ dateFormat: 'd MM yy',changeMonth:'true',changeYear:'true',defaultDate:'+543y'} ) );
}
//reinstallDatePicker();
", CClientScript::POS_END);
?>

<?php
$items = array();
$i = 0; 
foreach($privileges as $p){
	if ( empty($items[0])) $items[] = array('label'=>'Manage '.$p->value, 'url'=>'#', 'active'=>true,'itemOptions'=>array('onclick'=>'tabAll('.++$i.',$(this));' ) );
	else $items[] = array('label'=>'Manage '.$p->value, 'url'=>'#','itemOptions'=>array('onclick'=>'tabAll('.++$i.',$(this));'),);
}
$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=> $items,
)); ?> 

<?php 
$i= 1;
foreach($privileges as $p){ ?>
<div class="hero-unit " id="tab<?php echo $i;?>">
<h2>Manage <?php echo $p->value;?></h2>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button'.$i.' btn')); ?>
<div class="search-form<?php echo $i;?>" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'member-grid'.$i,
'type'=>'striped bordered condensed',
'afterAjaxUpdate' => 'reinstallDatePicker',
'dataProvider'=>$model->search($p->id),

'filter'=>$model,
'columns'=>array(
		array('header'=>'No.',
				'value'=>'++$row',//'++$row',
				'htmlOptions'=>array('style'=>'width:20px;'),
		),
		array(
				'name'=>'username',
				'htmlOptions'=>array('style'=>'width:120px;'),
		),
		array(
				'name'=>'prefix_id',
				'value'=> ' Prefix::model()->findByPk($data->prefix_id)->valueTh',
				'filter'=>CHtml::listData(Prefix::model()->findAll(),'id','valueTh'),
				'htmlOptions'=>array('style'=>'width:60px;'),
		),
		
		array(
				'name'=>'name',
				//'htmlOptions'=>array('style'=>'width:120px;'),
		),
		array(
				'name'=>'surname',
				//'htmlOptions'=>array('style'=>'width:120px;'),
		),
		//'academic_rank_id',
		array(
						'name'=>'date_registered',
						'filter'=>$this->widget(
								'ext.jui.EJuiDateTimePicker',
								array(
										'model'     => $model,
										'attribute' => 'date_registered',
										'language'=> 'th',//default Yii::app()->language
										'mode'    => 'date',
										'htmlOptions'=>array(
												
												'id' => 'datepicker_for_date_registered'.$i,
												//'onkeypress'=>'reinstallDatePicker()',
												'size' => '10',
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
						'value'=>'convertDate($data->date_registered)',
						'htmlOptions'=>array('style'=>'width:150px;'),
				),
		array(
				'name'=>'status',
				'value'=> ' $data->status==1?"ON":"OFF"',
				'filter'=>array(1=>'ON',0=>'OFF'),
				'htmlOptions'=>array('style'=>'width:50px;'),
		),
		//'privilege_id',
		//'phd',
	
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
),
)); ?>
</div>
<?php
$i++;
}?>