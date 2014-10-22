<?php
/* @var $this MemberController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
	
	$form = $this->beginWidget ( 'CActiveForm', array (
			'id' => 'member-form',
	) );
	?>
<h2 style="text-align: center">ปฏิทินการลาของบุคคลคณะเภสัช มหาวิทยาลัยพะเยา</h2>
<?php 
$static = array("0"=>"ทั้งหมด");
?>
<h2 style="text-align: center">ประเภทบุคลากร <?php 
echo $form->dropDownList($model, 'position_id',$static+CHtml::listData(Position::model()->findAll(array('order'=>'id asc')),'id','valueTh'),array("style"=>"font-size:.8em;width:auto","onchange"=>"recalendar(this.value,".$m.",".$y."); ","options" => array($posId=>array('selected'=>true)) ));
?></h2>
<?php $this->endWidget(); ?>

<div style="margin-bottom: 40px"></div>
<?php 
$leave = Leave::model();
$criteria = new CDbCriteria();
$this->widget('ext.flowing-calendar.FlowingCalendarWidget',
		array(
				'lang'=>'th',
				'event'=>$leave,
				'criteria'=>$criteria,
				'path'=>Yii::app()->baseUrl,
				'posId'=>$posId)
);

?>


<script>
function recalendar(posId,m,y)
 {
	var lnk = "<?php echo Yii::app()->createAbsoluteUrl('member/calendar?posId='); ?>"+posId;
	if (m!="") lnk += "&month="+m;
	if (y!="") lnk += "&year="+y;
	window.location = lnk; 

}

</script>
