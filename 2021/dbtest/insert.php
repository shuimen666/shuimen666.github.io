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

$uname = $_GET["name"];
$ucontent = $_GET["content"];

if($uname==""||$ucontent=="") die("不可为空！");

$sql = "INSERT INTO note (name,content) VALUES ('$uname','$ucontent')";
if (!mysqli_query($conn,$sql))
{
	die('Error: ' . mysqli_error());
}
echo "1 record added";
header("location:index.html");

mysqli_close($conn);
?>