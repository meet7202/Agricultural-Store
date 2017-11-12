<?php

error_reporting(0);
include('view.php');
$pages=$_GET['page'];

if($pages)
{
	include('module/'.$pages.'.php');
}
else
	include('module/profile.php');
include('module/dashboard.php');
?>
