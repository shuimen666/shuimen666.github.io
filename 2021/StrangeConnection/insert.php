<?php
header("Content-type:text/html; charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "959507715543";
$dbname = "shuimen";

$conn = mysqli_connect($servername,$username,$password);
if(!$conn) {
	die('Could not connect: ' . mysql_error($conn));
}
mysqli_select_db($conn,$dbname);

$uword = $_GET["word"];

if($uword=="") die("error");

$sql = "SELECT word FROM strangeconnection_wordpool WHERE word='$uword'";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0) die("error");


$sql = "INSERT INTO strangeconnection_wordpool (word) VALUES ('$uword')";
if (!mysqli_query($conn,$sql))
{
	die('error');
}
echo "success";

mysqli_close($conn);
?>