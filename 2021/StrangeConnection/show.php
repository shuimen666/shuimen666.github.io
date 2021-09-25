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

$sql = "SELECT id,word FROM strangeconnection_wordpool ORDER BY id DESC";
$res = mysqli_query($conn,$sql);
if (!$res)
{
	die('Error: ' . mysqli_error($conn));
}

$i = 0;
while($arr = mysqli_fetch_assoc($res)) {
	$list[$i] = $arr;
	$i++;
}
$json['count'] = $i;
$json['data'] = $list;
echo json_encode($json);

mysqli_close($conn);
?>