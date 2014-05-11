<?php 
$return = array();
array_push($return,array('label'=>'เพิ่มข้อมูลสำเร็จ','id'=>1,'value'=>'test'));
$js = json_encode($return);
echo $js."<br>";
?>
<script>
	var jav = <?php echo $js;?>;
	var obj = eval(jav);
	alert(obj[0].label);
	alert(obj[0].id);
	alert(obj[0].value);
</script>