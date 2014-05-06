<?php

$m = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");

function convertDate($date){
	global $m;
	if (empty($date)) return "";
	$nd = explode("-",$date);
	if (sizeof($nd) == 3) 	return ($nd[2]+0)." ".$m[($nd[1]-1)]." ".($nd[0]+543);
	else return "";
}

function getExp($date){
	if (empty($date)) return 0;
	$nd = explode("-",$date);

	if (sizeof($nd) == 3) {
		$date1 =  new DateTime(date("Y-m-d"));
	$interval = $date1->diff(new DateTime($date));
	return ($interval->y==0?"":$interval->y." ปี ").($interval->m==0?"":$interval->m." เดือน ").($interval->d==0?"":$interval->d." วัน");
	}
	else return "";
}

function getDateTimeDiff($date1,$date2){
	if (empty($date1)) return 0;
	$nd = explode("-",$date1);
	$date1 =  new DateTime($date1);
	if (sizeof($nd) == 3) {
		$date2 =  new DateTime($date2);
		$interval = $date2->diff($date1);
		return ($interval->y==0?"":$interval->y." ปี ").($interval->m==0?"":$interval->m." เดือน ").($interval->d==0?"":$interval->d." วัน").($interval->h==0?"":$interval->h." ชั่วโมง");
	}
	else return "";
}

function convertDateTime($date){
	global $m;
	if (empty($date)) return "";
	$date = explode(" ", $date);
	$nd = explode("-",$date[0]);
	if (sizeof($nd) == 3 && sizeof($date)==2 ) 	return ($nd[2]+0)." ".$m[($nd[1]-1)]." ".($nd[0]+543)." ".$date[1];
	else return "";
}

function Date2Sql( $date ){
	global $m;
	$d = explode(" ",trim($date));
	if (sizeof($d)==3 ) 	return ($d[2]-543)."-".(array_search($d[1],$m)+1)."-".$d[0];
}

function DateTime2Sql( $date ){
	global $m;
	$d = explode(" ",trim($date));
	if (sizeof($d)==4 ) 	return ($d[2]-543)."-".(array_search($d[1],$m)+1)."-".$d[0]." ".$d[3];
}
?>