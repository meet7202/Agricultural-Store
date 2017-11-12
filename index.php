<?php

error_reporting(0);
$pages=$_GET['page'];
if(strcmp($pages,"bill")==0)
{
		include('module/'.$pages.'.php');
}
else if($pages)
{
	
include('module/header.php');
	include('module/'.$pages.'.php');

include('module/footer.php');
}
else
{
	include('module/header.php');

	include('module/div2.php');
	
include('module/footer.php');
}

?>
