<?php
$game = $_POST["game"];

$writeanswer = "WAITING";
if(!empty($_POST["answer"]) && $_POST["answer"] == $_POST["checkvalue"])
{
	$writeanswer = "YES";
	echo "YES";
} elseif (!empty($_POST["answer"])) {
	$writeanswer = "NO";
	echo "NO";
}

$myfile = fopen("../file".$game.".txt", "w") or die("Unable to open file!");
$txt = $_POST["soundstatus"].$writeanswer;
fwrite($myfile, $txt);
fclose($myfile);
sleep(3);
$myfile = fopen("../file".$game.".txt", "w") or die("Unable to open file!");
$txt = $_POST["soundstatus"]."WAITING";
fwrite($myfile, $txt);
fclose($myfile);
?>