<?php
$cs = Yii::app ()->getClientScript ();
$cs->registerCss ( 'css', "
	.items th,.items th a {
			background-color:#00F;
			color:#fff;
		}
	#asm-sec{
		display:none;	
	}
" );

$cs->registerScript ( 'search', "
 
	$('.search-button2').click(function(){
	$('.search-form2' ).toggle();
	return false;
	}); 
		
	$('.search-form2 form').submit(function(){
		$.fn.yiiGridView.update('member-grid2', {
			data: $(this).serialize()
		});
		return false;
	});
		
	$('.search-button3').click(function(){
	$('.search-form3' ).toggle();
	return false;
	}); 
		
	$('.search-form3 form').submit(function(){
		$.fn.yiiGridView.update('member-grid3', {
			data: $(this).serialize()
		});
		return false;
	});
		
		$('.search-button2s').click(function(){
	$('.search-form2s' ).toggle();
	return false;
	}); 
		
	$('.search-form2s form').submit(function(){
		$.fn.yiiGridView.update('member-grid2s', {
			data: $(this).serialize()
		});
		return false;
	});
		
	$('.search-button3s').click(function(){
	$('.search-form3s' ).toggle();
	return false;
	}); 
		
	$('.search-form3s form').submit(function(){
		$.fn.yiiGridView.update('member-grid3s', {
			data: $(this).serialize()
		});
		return false;
	});
		
	$('tab a[href=\"#assignment\"]').click(function (e) {
	  e.preventDefault();
  	$(this).tab('show');
	});


", CClientScript::POS_END );

?>
<?php
/* @var $this SectionController */
/* @var $model Section */

$this->breadcrumbs = array (
		'Sections' => array (
				'index' 
		),
		$model->id 
);

$this->menu = array (
		array (
				'label' => 'List Section',
				'url' => array (
						'index' 
				) 
		),
		array (
				'label' => 'Create Section',
				'url' => array (
						'create' 
				) 
		),
		array (
				'label' => 'Update Section',
				'url' => array (
						'update',
						'id' => $model->id 
				) 
		),
		array (
				'label' => 'Delete Section',
				'url' => '#',
				'linkOptions' => array (
						'submit' => array (
								'delete',
								'id' => $model->id 
						),
						'confirm' => 'Are you sure you want to delete this item?' 
				) 
		),
		array (
				'label' => 'Manage Section',
				'url' => array (
						'admin' 
				) 
		) 
);
?>

<h1>หมู่เรียนที่ <?php echo $model->value; ?></h1>

<?php

$this->widget ( 'bootstrap.widgets.TbDetailView', array (
		'data' => $model,
		'type' => 'striped bordered condensed',
		'attributes' => array (
				array (
						'name' => 'courseon',
						'value' => $model->course->code . "<br>" . $model->course->valueTh . "<br>" . $model->course->valueEn,
						'type' => 'raw' 
				),
				array (
						'name' => 'courseonSemester_id',
						'value' => $model->semester->value 
				),
				array (
						'name' => 'courseonYeared_id',
						'value' => $model->yeared->value 
				) 
		) 
) );
?>

<hr></hr>

<ul class="nav nav-tabs" role="tablist">
	<li class="active"><a href="#score" data-toggle="tab">ตรวจสอบคะแนน</a></li>
	<li><a href="#register" data-toggle="tab">เพิ่ม ลบ
			ผู้สอนและนิสิตลงเรียน</a></li>
	<li><a href="#assignment" data-toggle="tab"> เพิ่ม ลบ Assignment</a></li>
</ul>
<?php $from = "view";?>
<div class="tab-content">
	<div class="tab-pane active" id="score"><?php include 'view_score.php';?></div>
	<div class="tab-pane" id="register"><?php include 'view_register.php';?></div>
	<div class="tab-pane" id="assignment"><?php include 'view_assignment.php';?></div>

</div>


