<?php 

error_reporting(0);
 $id=$_GET['id'];
 $pid=$_GET['pid'];
 $value=$_GET['value'];
 $msg=$_GET['msg'];
if($msg==1){
$select="SELECT * FROM  `bag` WHERE  `user_id` =$id AND `pro_id`=$pid;";
$sec=mysql_query($select,$con);
$r=mysql_fetch_array($sec);
$select="UPDATE `bag` SET total=$value WHERE  `user_id` =$id AND `pro_id`=$pid;";
$sec=mysql_query($select,$con);
}
else if($msg==2){
$select="delete FROM `bag` WHERE `user_id`=$id AND `pro_id`=$pid;";
mysql_query($select,$con);

}

header('location:index.php?page=cart');
?>
