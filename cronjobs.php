<?php
error_reporting(0);
$document = 'cli1';
$documentt = 'cli2';
$documenttt = 'cli3';
$documentttt = 'cli4';
$public = 'https://yaser4k-wteb.onrender.com/'; // اینجا ادیت بشه
//•••••••••••••••••••••••••••••••••••••••••••
$scan = scandir($document);
$scan = array_diff($scan, ['.','..']);
foreach($scan as $value){
file_get_contents('https://'.$_SERVER['SERVER_NAME'].'/'.$public.'/'.$document.'/'.$value.'/index.php');
}
$scann = scanndir($documentt);
$scann = array_diff($scann, ['.','..']);
foreach($scann as $valuee){
file_get_contents('https://'.$_SERVER['SERVER_NAME'].'/'.$public.'/'.$documentt.'/'.$valuee.'/index.php');
}
$scannn = scannndir($documenttt);
$scannn = array_diff($scannn, ['.','..']);
foreach($scannn as $valueee){
file_get_contents('https://'.$_SERVER['SERVER_NAME'].'/'.$public.'/'.$documenttt.'/'.$valueee.'/index.php');
}
$scannnn = scannnndir($documentttt);
$scannnn = array_diff($scannnn, ['.','..']);
foreach($scannnn as $valueeee){
file_get_contents('https://'.$_SERVER['SERVER_NAME'].'/'.$public.'/'.$documentttt.'/'.$valueeee.'/index.php');
}
echo "done";
?>
