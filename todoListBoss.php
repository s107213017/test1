<?php
session_start();
require("dbconnect.php");
if (isset($_GET['m'])) {
  $msg ='<font color="red">' . $_GET['m'] . "</font>";
}
else {
  $msg="Good Morning";
}
$sql = "select * from todo where status = 0 order by Case prio WHEN '緊急' THEN 1 WHEN '重要' THEN 2 ELSE 3 END;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>My Todo List !! </p>
<hr/>
<?php echo $msg?>
<br><br>
<table width="500" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>content</td>
    <td>priority</td>
    <td>status</td>
    <td></td>
    <td></td>
  </tr>
<?php
while (	$rs=mysqli_fetch_assoc($result)) {
  echo "<tr><td>" . $rs['id'] . "</td>";
  echo "<td>{$rs['title']}</td>";
  echo "<td>" , htmlspecialchars($rs['content']),"</td>";
  echo "<td>{$rs['prio']}</td>";
  echo "<td>". $rs['status'] ." <a href='todoSet.php?id={$rs['id']}'>OK</a>"."</td>";
  echo "<td>";
  echo "<a href='todoEdit.php?id={$rs['id']}'>修改</a></td>";
  echo "<td>"."<a href='todoDelete.php?id={$rs['id']}'>刪除</a> "."</td></tr>";
}
?>
</table>
<a href="todoAddForm.php">新增工作</a>
<a href="todoFinish.php">查看已完成工作</a>
<br><a href="choose.php">Back</a>
</body>
</html>
