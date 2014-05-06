<?php

$cs = Yii::app()->getClientScript();
$cs->registerCss('css','
		.h20{
			height:20px;
		}
		.panel-body { text-shadow: none; line-height: auto;font-weight:normal;}
');
$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Create',
);

$this->menu=array(
		array('label'=>'เพิ่มสมาชิก',
				'items'=>array(
						array('label'=>'กรอกข้อมูล','url'=>array('create')),
						array('label'=>'เป็นไฟล์','url'=>array('upfile')),
				),
		),
			array('label'=>'จัดการสมาชิก','url'=>array('admin'),'visible'=> Yii::app()->user->isStudent() ?false:true),
			array('label'=>'ยืนยันสมาชิก','url'=>array('activate'),'visible'=>Yii::app()->user->isStudent() ?false:true),
);

?>
<div class="hero-unit">
<h2>อัพโหลดสมาชิกใหม่</h2>
<label><a href="<?php echo Yii::app()->baseUrl?>/tmp/demoUploadMember.csv">ตัวอย่างไฟล์ csv</a></label>
<div class="h20"></div>
<span class="label label-info" style="padding:10px;font-size:1.2em;cursor:hand" onclick="$('.panel-default').toggle()">
รายละเอียดการกำหนดค่า เลขแทนเพศ(prefix_id),privilege_id, เลขประจำสาขาวิชา(major_id)
<div class="panel panel-default" style="font-size:.8em;cursor:text;color:#000;display:none;">
  <div class="panel-heading">เลขแทนเพศ(prefix_id)</div>
  <div class="panel-body">
    ชาย ให้แทนด้วย 1<br>
    หญิง ให้แทนด้วย 2
  </div>
  
  <div class="panel-heading">เลขประจำสาขาวิชา(major_id)</div>
  <div class="panel-body">
    วิศวกรรมคอมพิวเตอร์ ให้แทนด้วย  1<br>
    วิศวกรรมซอฟต์แวร์ให้แทนด้วย 2<br>
    วิศวกรรมสารสนเทศและการสื่อสารให้แทนด้วย  3<br>
     คอมพิวเตอร์ธุรกิจให้แทนด้วย 4<br>
     เทคโนโลยีสารสนเทศให้แทนด้วย  5<br>
     ภูมิสารสนเทศศาสตร์ให้แทนด้วย  6<br>
     วิทยาการคอมพิวเตอร์ให้แทนด้วย 7<br>
     เทคโนโลยีคอมพิวเตอร์เคลื่อนที่ 8
  </div>
  
  <div class="panel-heading">เลขประจำสิทธิ(privilege_id)</div>
  <div class="panel-body">
    	อาจารย์ ให้แทนด้วยเลข 2<br>
    	นิสิต ให้แทนด้วยเลข 3
  </div>
</div>

</span>
<?php 
$form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )
);
?>
<div class="h20"></div>
<?php 
// ...
echo $form->labelEx($model, 'memberlist');
echo $form->fileField($model, 'memberlist');
echo $form->error($model, 'memberlist');
// ...
?>
<div class="h20"></div>
<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=> 'อัพโหลด',
		)); ?>
<div class="h20"></div>
<?php 
$this->endWidget();
$i =0;
$keys = ['completed'=>'info','failed'=>'error'];
if ($msg != "" && $type != "" ){

	if ( is_array($msg) ){
		foreach ($msg as $msgs)
			foreach ($msgs as $key=>$_msg)
				 Yii::app()->user->setFlash($keys[$key].' c'.$i++, '<strong>'.$_msg.'!</strong>');

	}else{
			 Yii::app()->user->setFlash($keys[$type].' c'.$i++, '<strong>'.$msg.'!</strong>');
	}
	
  	foreach(Yii::app()->user->getFlashes() as $key => $message) {
		echo '<div class="alert-block flash-' . $key . '"><a href="#" class="close" data-dismiss="alert">×</a>'
		 . $message . "</div>\n";
	}  
	
	
	Yii::app()->clientScript->registerScript(
	'myHideEffect',
	'$(".alert-block").animate({opacity: 1.0}, 3000);',//.fadeOut("slow")
	CClientScript::POS_READY
	);
	
	$this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
			'alerts'=>array( // configurations per alert type
					'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			),
	));
}

?>
</div>