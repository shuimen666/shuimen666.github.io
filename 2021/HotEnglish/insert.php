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
$udes = $_GET["des"];

if($uword==""||$udes=="") die("不可为空！");

$sql = "INSERT INTO engword (word,des,time) VALUES ('$uword','$udes',NOW())";
if (!mysqli_query($conn,$sql))
{
	die('Error: ' . mysqli_error());
}
echo "1 record added";
header("location:index.html");

mysqli_close($conn);
?>