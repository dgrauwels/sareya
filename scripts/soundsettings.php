<?php
if($_POST["soundsetting"] == "ON") {
	$soundstatus = "SOUNDON|";
	echo "ON";
} if($_POST["soundsetting"] == "OFF") {
	$soundstatus = "SOUNDOFF|";
	echo "OFF";
}

$myfile = fopen("../file0.txt", "w") or die("Unable to open file!");
$txt = $soundstatus."WAITING";
fwrite($myfile, $txt);
fclose($myfile);
$myfile = fopen("../file1.txt", "w") or die("Unable to open file!");
$txt = $soundstatus."WAITING";
fwrite($myfile, $txt);
fclose($myfile);
?>