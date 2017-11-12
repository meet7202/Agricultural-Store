<?php

error_reporting(0);
$con=mysql_connect('localhost','root','123');
mysql_select_db('shopping',$con);

$select="SELECT * FROM `categories`";
$result=mysql_query($select,$con);

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
		$sub="INSERT INTO `shopping`.`categories` (`name`) VALUES ('$name')";
	mysql_query($sub,$con);
	header('Location: index.php?page=add_cat');
}
?>
<style>
table
{
	border:1px solid;
}
tr
{
	border-bottom:solid 1px;
}
td
{
	padding:13px;
}

</style><br /><br />
<form action="#" method="post" name="produc" enctype="multipart/form-data">
  <table width="622" align="center">
  	<tr style="background-color:#000; color:white"><td><font size="+4">Add Categories
    <td></tr>
    <tr>
      <td width="255">&nbsp;<label>category Name </label></td>
      <td width="367">&nbsp;<input type="text" name="name" required="required" /></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;<input type="submit" name="submit" value="submit" /></td>
    </tr>
  </table>
</form>



