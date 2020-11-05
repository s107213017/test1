<?php
session_start();
require("dbconnect.php");
//篩選已完成工作
$sql = "select * from todo where status = 1;";

$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>已完成工作</title>
</head>

<body>

<p>已完成工作</p>
<hr />
<table width="350" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>content</td>
    <td>status</td>
  </tr>
<?php
$count = 0; //紀錄已完成工作筆數
while (	$rs=mysqli_fetch_assoc($result)) {
  $count++;
	echo "<tr><td>" . $rs['id'] . "</td>";
    echo "<td>{$rs['title']}</td>";
    echo "<td>" , htmlspecialchars($rs['content']), "</td>";
    echo "<td>";
    echo "<a href='todoReturn.php?id={$rs['id']}'>退件</a>"."</td></tr>";
}
echo "已完成工作共有".$count."項";
?>
</table>
<a href="todoListBoss.php">回工作清單</a>
</body>
</html>
