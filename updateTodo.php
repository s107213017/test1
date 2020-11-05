<?php
require("dbconnect.php");
$msgID=(int)$_POST['id'];
$title=mysqli_real_escape_string($conn,$_POST['title']);
$content=mysqli_real_escape_string($conn,$_POST['content']);
$msg=mysqli_real_escape_string($conn,$_POST['msg']);
$prior=mysqli_real_escape_string($conn,$_POST['prio']);
if ($msgID) {
    $sql = "update todo set title = '{$title}',content = '{$content}', prio = '{$prior}' where id=$msgID;";
	mysqli_query($conn, $sql) or die("Update failed, SQL query error"); 
	$msg= "Message updated !";
} else {
	$msg =  "Message title cannot be empty";
}
header("Location:todoListBoss.php?m=$msg");//改完直接跳回todoList.php
?>
<br>
<a href="todoListBoss.php">Back</a>