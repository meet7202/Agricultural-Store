<?php
session_start();
if($_SESSION['user']){
	session_destroy();
	echo "hello";
}
header('location:index.php?page=div2');
?>