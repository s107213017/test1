<?php
session_start();
require("dbconnect.php");
if (isset($_GET['m'])) {
  $msg ='<font color="red">' . $_GET['m'] . "</font>";
}
else {
  $msg="Good Morning";
}
$sql = "select * from todo where status = 0 order by Case prio WHEN '緊急' THEN 1 WHEN '重要' THEN 2 ELSE 3 END;;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>待辦工作清單 </p>
<hr />
<?php echo $msg?>
<table width="350" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>content</td>
    <td>priority</td>
    <td>status</td>
  </tr>
<?php
while (	$rs=mysqli_fetch_assoc($result)) {
  echo "<tr><td>" . $rs['id'] . "</td>";
  echo "<td>{$rs['title']}</td>";
  echo "<td>" , htmlspecialchars($rs['content']), "</td>";
  echo "<td>{$rs['prio']}</td>";
  echo "<td>". $rs['status'] ." <a href='todoSet1.php?id={$rs['id']}'>OK</a>"."</td>";
}
?>
</table>
<br><a href="choose.php">Back</a>
</body>
</html>
