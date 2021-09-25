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

$sql = "SELECT id,word,des,time FROM engword ORDER BY id DESC";
$res = mysqli_query($conn,$sql);
if (!$res)
{
	die('Error: ' . mysqli_error($conn));
}

/*
$i = 0;
echo "var jsword = new Array(1000);";
echo "var jsdes = new Array(1000);";
echo "var jsid = new Array(1000);";
echo "var jstime = new Array(1000);";
while($arr = mysqli_fetch_array($res)) {
	$tword = $arr['word'];
	$tdes = $arr['des'];
	$tid = $arr['id'];
	$ttime = $arr['time'];
	//if($i==0) echo "var jstext='<tr><td>$tname</td><td>$tcontent</td></tr>';";
	//echo "jst[".$i."] = '<tr><td>".$tword."</td><td>".$tdes."</td></tr>';";
	echo "jsword[".$i."] = '".$tword."';";
	echo "jsdes[".$i."] = '".$tdes."';";
	echo "jsid[".$i."] = '".$tid."';";
	echo "jstime[".$i."] = '".$ttime."';";
	$i++;
}
echo "var jsnum=$i;";
*/
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