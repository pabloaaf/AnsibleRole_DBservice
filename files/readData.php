<?php
include_once('config.inc.php');

// Connect to mysql server
$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
  die("error: ".mysqli_connect_error());
}

$sql = "SELECT * FROM general ORDER BY logdata";
$result = mysqli_query($conn,$sql);

echo "<p>Log Date, id, temperatura, humedad, suelo</p>";

$num_rows = mysqli_num_rows($result);

if ($num_rows > 0) { 
  while ($row = mysqli_fetch_assoc($result)) {   
    echo "<p>".$row['logdata'].",".$row['id'].",".$row['temperatura'].",".$row['humedad'].",".$row['suelo']."</p>";
  }
   
  echo "Number of rows = ".$num_rows;
}
else {
  echo "No rows returned";
}  

mysqli_close($conn);

?>