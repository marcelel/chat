<?php
$filename = "messages.txt";
if (!file_exists($filename)) {
	$file = fopen($filename, "w");
	fclose($file);
} else {
	$file = fopen($filename, "r");
	$text = fread($file, filesize($filename));
	fclose($file);
	echo $text;
}
?>