<?php
/* updated for php7 and php 5 on 2560-09-13 */
$myForm = '<body>
<form action="s5orderdetails.php">
<input name="delid" value="1001">
<input type="submit" value="s5orderdetails.php">
</form>';
if (!isset($_GET['delid'])) { 
  echo $myForm;
  exit;
}
require("s1orderdetails.php");
$sql="delete from $tb ";
$sql.="where orderid ='".$_GET['delid']."'";
if((int)phpversion() >= 7) {
	if($connect->query($sql) === FALSE) 
		echo "$sql : failed";
	else 
		header("location: s0orderdetails.php");	
	$connect->close();
} else {	
	if(!$result=mysql_db_query($db,$sql)) 
		echo "$sql : failed";
	else 
		header("location: s0orderdetails.php");
	mysql_close($connect);
}
?>
</body>