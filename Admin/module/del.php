<?php
error_reporting(0);
$con=mysql_connect('localhost','root','123');
mysql_select_db('shopping',$con);

		$s_id = $_GET['id'];
		$msg = $_GET['msg'];
		if($msg=="d")
		{
		$delete = "delete from customers where id='$s_id'";
		mysql_query($delete,$con);
		
		}
		else if($msg=="ch")
		{
			$st=$_GET['st'];	
			$s1="active";$s2="unactive";
			if($st=="unactive")
			{
				$up = "UPDATE customers SET status='$s1' where id='$s_id'";
				mysql_query($up,$con);
			}
			else
			{
				$up = "UPDATE customers SET status='$s2' where id='$s_id'";
				mysql_query($up,$con);
			}
		}
		else if($msg=="rol")
		{
			$st=$_GET['role'];	
			$s1="admin";$s2="buyer";
			if($st==$s1)
			{
				$up = "UPDATE customers SET Mode='$s2' where id='$s_id'";
				mysql_query($up,$con);
			}
			else
			{
				$up = "UPDATE customers SET Mode='$s1' where id='$s_id'";
				mysql_query($up,$con);
			}
		}
		header('location:index.php?page=Disp_User');
?>