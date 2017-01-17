<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Ćwiczenie 1 - Walidacja formularzy</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
</head>

<body>
<h2>Przeslane pliki:</h2>
<?php
echo "<h2>FILES.length = ".count($_FILES)." </h2></br>";
foreach ($_FILES as $key => $file) {
	echo basename($_FILES[$key]['name']);
	echo "<br/>";
}




?>
</body>
