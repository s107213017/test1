<?php
session_start();
require("dbconnect.php");
$id = (int)$_GET['id'];
$sql = "select * from todo where id = $id;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$rs=mysqli_fetch_assoc($result);
if (! $rs) {
	echo "no data found";
	exit(0);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>編輯</title>
</head>
<body>
<h1>修改資料</h1>
<form method="post" action="updateTodo.php">
      <input name="id" type="hidden" id="id" value="<?php echo (int)$_GET['id']?>"/>  <br>
      Title: <input name="title" type="text" id="title" value="<?php echo htmlspecialchars($rs['title']);?>"/> <br>
      Content: <input name="content" type="text" id="content" value="<?php echo htmlspecialchars($rs['content']);?>" /> <br>
      Priority: <input name="prio" type="text" id="prio" value="<?php echo htmlspecialchars($rs['prio']);?>" /> <br>
      <input type="submit" name="complete" value="確認修改" />
	</form>
  </tr>
</table>
</body>
</html>