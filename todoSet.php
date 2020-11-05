<?php
//狀態改為已完成
require("dbconnect.php");
$msg=mysqli_real_escape_string($conn,$_POST['msg']);
$msgID=(int)$_GET['id'];
if ($msgID) {
	$sql = "update todo set status = 1 where id=$msgID;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
}
$msg= "Message:$msgID completed.";
header("Location:todoListBoss.php?m=$msg");
?>
<br>
<a href="todoListBoss.php">Back</a>
