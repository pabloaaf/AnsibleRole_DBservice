<?php
/*
     localhost/writer.php?id=0&t=7&h=3&s=100
 */

include_once('config.inc.php');

$id = $_GET['id'];
$temperatura = $_GET['t'];
$humedad = $_GET['h'];
$suelo = $_GET['s'];

// Insert these values if none have been passed
if (!$id) {
  $id = '0';
}
if (!$temperatura) { 
  $temperatura = '';
}
if (!$humedad) {
  $humedad = '';
}
if (!$suelo) {
  $suelo = '';
}

echo("temperatura = ".$temperatura."    "."humedad = ".$humedad."    "."suelo = ".$suelo."<BR>");

// Connect to mysql server
$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
  die("error: ".mysqli_connect_error());
}

$datenow = date("Y-m-d H:i:s");

$sql = "INSERT INTO general (logdata, id, temperatura, humedad, suelo) VALUES ('$datenow','$id','$temperatura','$humedad','$suelo')";
$result = mysqli_query($conn,$sql);
	
echo "<h2>The Field and Value data have been sent</h2>";

mysqli_close($conn);
?>