<?php
error_reporting(0);
include('connection.php');

if(isset($_POST['submit']))
{
	echo $name=$_POST['textfield'];
	$insert="INSERT INTO `shopping`.`categories` (`name`) VALUES('$name')";
	mysql_query($insert,$con);
	header('Location: category.php');
}

?>


<html>
<head>
<title>category</title>
</head>
<body>


<table width="379" height="77" border="0" cellpadding="0" cellspacing="0">
  <form name="form1" method="post" action="#">
  <tr>
    <th width="225" height="43"><strong>Insert categry</strong></th>
    <td width="154">
         <input type="text" name="textfield" id="textfield">
    </td>
  </tr>
  <tr>
    <td height="34" colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit"></td>
    </tr>
  </form>
</table>
</body>
</html>