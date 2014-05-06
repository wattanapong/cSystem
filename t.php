<?php 
$name = "555 myname is what 111";
$n = preg_replace("/what|myname|\s/", "", $name);
echo $n;
echo "<br>";

$header = ["username","code","prefix","name","surname","facebook","privilege","major"];
$f = array_search("major",$header);
if ( is_numeric($f) ) echo "found ";


?>