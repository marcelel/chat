<?php
$filename = "messages.txt";
$file = fopen($filename, "a");
$text = $_GET["nick"] . ": " . $_GET["message"] . "\n";
fwrite($file, $text);
fclose($file);

$fileArray = file($filename);
if (count($fileArray) > 10){
    unset($fileArray[0]);
    file_put_contents($filename, $fileArray);
}
?>
