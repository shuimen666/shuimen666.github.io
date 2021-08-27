<?php
$servername = "60.205.200.37";
$username = "root";
$password = "959507715543";
$dbname = "shuimen";

$conn = mysqli_connect($servername,$username,$password);
if(!$conn) {
	die('Could not connect: ' . mysql_error());
}
mysqli_select_db($dbname, $con);

$uname = $_POST["name"];
$ucontent = $_POST["content"];

$sql = "INSERT INTO test (name,content) VALUES ('$uname','$ucontent')";
if (!mysqli_query($sql,$con))
{
	die('Error: ' . mysqli_error());
}
echo "1 record added";

mysqli_close($con);
?>