<?php
//退件
require("dbconnect.php");
$msg=mysqli_real_escape_string($conn,$_POST['msg']);
$msgID=(int)$_GET['id'];
if ($msgID) {
	$sql = "update todo set status = 0 where id=$msgID;";
	mysqli_query($conn,$sql) or die("MySQL query error");
}
$msg= "Message:$msgID completed.";
header("Location:todoListBoss.php?m=$msg");
?>
<br>
<a href="todoListBoss.php">back</a>
