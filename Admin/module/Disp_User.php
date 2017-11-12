<?php
error_reporting(0);
$con=mysql_connect('localhost','root','123');
mysql_select_db('shopping',$con);

$select="SELECT * FROM `customers` ORDER BY id";
$res=mysql_query($select,$con);


?>
<style>
table
{
	margin-left:50px;
	border:solid;
}
td,th
{
	border-right:solid 1px #6699FF;
	width:auto;
	padding:10px;
}
tr
{border-bottom:#00F solid;
}
</style>
<br />
<form method="post" action="#">
<table width="622">
  	<tr style="background-color:#000; color:white"><th colspan="7"><font size="+4">User Information</th></tr>
    <tr>
      <th width="255"><label>Id</label></th>
      <th><label> Details</label> </th>
      <th> <label>Photo </label></th>
      <th> <label>Status </label></th>
      <th> <label>Update </label></th>
      <th> <label>Delete </label></th>
      <th> <label>Role of USER </label></th>
    </tr>
    <?php
	while($r=mysql_fetch_array($res))
	{
		?><tr ><td><?php echo $r['id'];?></td>
		<td><div style="width:350px; height:130px; overflow:scroll"><font size="+2" color="#FF0000"><?php echo $r['name'];?></font>
		<br>E-mail: <?php echo $r['email_id'];?>
        <br>Mobile: <?php echo $r['mobile'];?>
        <br>Address: <?php echo $r['address'];?></div></td>
        <td><a href="users/<?php echo $r['photo'];?>" target="_self"><img height="130px" width="130px" src="Users/<?php echo $r['photo'];?>"</a></td>
		<td ><a href="index.php?page=del&id=<?php echo $r['id'];?>&msg=ch&st=<?php echo $r['status'];?>"><input type="button" value="<?php echo $r['status'];?>" /></a></td>
        <td ><div style="width:100px"><a href="index.php?page=up&id=<?php echo $r['id'];?>">Update User</a></div></td>
        <td ><div style="width:100px"><a href="index.php?page=del&id=<?php echo $r['id'];?>&msg=d">Delete User</a></div></td>
        <td ><div style="width:100px"><a href="index.php?page=del&id=<?php echo $r['id'];?>&msg=rol&role=<?php echo $r['Mode'];?>"><?php echo $r['Mode'];?></a></div></td>
        </tr><?php
	}
	?>
  </table>
</form>
