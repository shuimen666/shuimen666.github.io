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

$sql = "SELECT id,name,content FROM note ORDER BY id DESC LIMIT 10";
$res = mysqli_query($conn,$sql);
if (!$res)
{
	die('Error: ' . mysqli_error($conn));
}

$i = 0;
echo "var jst = new Array(10);";
while($arr = mysqli_fetch_array($res)) {
	$tname = $arr['name'];
	$tcontent = $arr['content'];
	//if($i==0) echo "var jstext='<tr><td>$tname</td><td>$tcontent</td></tr>';";
	echo "jst[".$i."] = '<tr><td>".$tname."</td><td>".$tcontent."</td></tr>';";
	$i++;
}
echo "var jsnum=$i;";

mysqli_close($conn);
?>