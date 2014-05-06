<?php
function mapKey($key,$value){
	$_value = [];
	$i = 0;
	foreach ($key as $k){
		$_value[$k] = $value[$i++];
	}
	return $_value;
}
?>