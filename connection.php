<?php
$con = mysql_connect("localhost","acldemo","mindfire");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("student_info", $con);
?>
