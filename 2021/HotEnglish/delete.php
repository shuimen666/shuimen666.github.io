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

$uid = $_GET["id"];
$uword = $_GET["word"];
$udes = $_GET["des"];

if($uword==""||$udes=="") die("不可为空！");

$sql = "DELETE FROM engword WHERE id='$uid' AND word='$uword' AND des='$udes'";
if (!mysqli_query($conn,$sql))
{
	die('Error: ' . mysqli_error());
}
echo "1 record deleted";
header("location:index.html");

mysqli_close($conn);
?>