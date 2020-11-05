<?php
require("dbconnect.php");
$title=mysqli_real_escape_string($conn,$_POST['title']);
$msg=mysqli_real_escape_string($conn,$_POST['msg']);
$prior=mysqli_real_escape_string($conn,$_POST['prior']);

if ($title) { //if title is not empty
	$sql = "insert into todo (title, content, status, prio) values ('$title', '$msg',0 ,'$prior');";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	echo "Message added";
} else {
	echo "Message title cannot be empty";
}

?>
<br><a href="todoListBoss.php">Back</a>