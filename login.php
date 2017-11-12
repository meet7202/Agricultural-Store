<?php
session_start();
error_reporting(0);
include('connection.php');

if(isset($_POST['sign']))
{
	 $name=$_POST['name'];
	 $email=$_POST['email'];
	 $mobile=$_POST['mobile'];
	 $password=md5($_POST['pass']);
	 $add=$_POST['address'];
	 $image=$_FILES['image']['name'];
	$sub="INSERT INTO  `shopping`.`customers` (
`name` ,
`email_id` ,
`mobile` ,
`password` ,
`address` ,
`photo`
) VALUES ('$name','$email','$mobile','$password','$add','$image')";
	mysql_query($sub,$con);
	if(!file_exists("Admin/Users/".$image))
	{
		move_uploaded_file($_FILES['image']['tmp_name'],"Admin/Users/".$image);
	}
	header('Location: login.php');
}

if(isset($_POST['login']))
{
	$name=$_POST['user_id'];
	$pass=$_POST['password'];
	$selec="SELECT * FROM  `customers` WHERE  `name` = '$name'";
	 $result=mysql_query($selec,$con);
	 $sel=mysql_num_rows($result);
	 
	 //exit;
	 if($sel)
	 {
		$r=mysql_fetch_array($result);
		if(md5($pass)!=$r['password'])
		{
			?><script>alert('Wrong password');</script><?php
		}
		else if($r['status']=='active'){ 
		$_SESSION['user']=$name;
	 	header('location:index.php?page=div2');
		exit;
		}
		else
		{
			?><script>alert('You are not confrim as user by admin, please wait or contact admin');</script><?php
		}
		
	 }
	else
	{
		?><script>alert('Invalid user_id or password');</script><?php
	}
}
?>

<html>
<head><title>login</title>

<script>
function test()
{
	document.getElementById('login').style.display='none';
	document.getElementById('sign_up').style.display='block';		
}
function test1()
{
	document.getElementById('sign_up').style.display='none';
	document.getElementById('login').style.display='block';		
}
</script>
<style>
body{	
	background-size:100% 100%;
}
.login-main {
    width: 40%;
    margin: 0 auto;
    background: #FFFFFF;
    background-size: cover;
    min-height: 400px;
    box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
}
.login-page {
    padding: 6.5em 0em;
	overflow:hidden;
}
.login-head {
    background-size: cover;
    height: 50px;
}
.login-head h1 {
    font-size:3em;
     color:#F00;
    padding: 1em 0em 0em 0em;
    text-align: center;
    font-family: 'Carrois Gothic', sans-serif;
}
.login-block {
    padding: 4em 2em;
}
.login-block input[type="text"], .login-block input[type="password"], .login-block textarea {
    font-size: 1em;
	font-weight:500;
    padding: 10px 20px;
    width: 100%;
    color:#660099;
    outline: none;
    border: 1px solid #D3D3D3;   
     border-radius: 20px;
	-ms-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
    background:#F5F5F5;
    margin: 0em 0em 1.5em 0em;
}
.login-block input[type="submit"] {
    border: none;
    outline: none;
    cursor: pointer;
    color: #fff;
    background: #00CCFF;
    width: 100%;
    margin: 0 auto;
    border-radius: 20px;
    padding: 0.5em 1em;
    font-size: 1em;
    display: block;
    font-family: 'Carrois Gothic', sans-serif;
}
.login-block input[type="submit"]:hover{
	background:#F00;
	transition: 0.5s all;
	-webkit-transition: 0.5s all;
	-moz-transition: 0.5s all;
	-o-transition: 0.5s all ;
	-ms-transition: 0.5s all;
}
.forgot-top-grids {
    margin: 1em 0em;
    padding:0em 1.5em
}
.login-block label.checkbox {
    margin-left: 1.3em;
    margin-top: 0;
    font-size: 1em;
    color: #F00;
    font-weight: 400;
    display: inline-block;
    cursor: pointer;
}
.forgot {
	float: right;
    margin-top: 0.3em;
}
.forgot a {
	font-size: 0.75em;
    color:#FF0000;
    font-weight: 600;
    display: block;
    text-transform: uppercase;
}
.forgot a:hover{
	color:#68AE00;
}
.login-block h2{
	color:#FF0000;
	font-size:0.875em;
	margin:1.2em 0;
	text-align:center;
	font-family: 'Carrois Gothic', sans-serif;
}
/*--*/
.login-icons ul {
	text-align:center;
}
.login-icons ul li{
	display: inline-block;
    margin: 0 0.5em;
}
.login-icons ul li a{
	display:block;
}
.login-icons i.fa.fa-facebook, .login-icons i.fa.fa-twitter, .login-icons i.fa.fa-google-plus {
    font-size: 1em;
    color: #FFFFFF;
    width: 33px;
    height: 33px;
    line-height: 34px;
    vertical-align: middle;
    background: #3b5998;
    transition: 0.5s all;
}
.login-block h3 {
    font-size: 1em;
    color: #000;
    text-align: center;
    margin-top: 1em;
    font-family: 'Carrois Gothic', sans-serif;
}
.login-block h3 a{
	color:#FF0000;
}
.login-block h3 a:hover{
	color:#FF0000;
}
.login-block h5 {
    font-size: 1em;
    text-align: right;
    margin-top: 1em;
    font-family: 'Carrois Gothic', sans-serif;
}
.login-block h5 a {
    color: #FC8213;
    text-decoration: underline;
}
.login-block h5 a:hover {
    color: #68AE00;
    text-decoration: underline;
}


</style>
</head>
<body>	
<div class="login-page" id="login">
    <div class="login-main">  	
    	 <div class="login-head">
				<h1>Login</h1>
			</div>
			<div class="login-block">
				<form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
					<input type="text" name="user_id" placeholder="User_name" required>
					<input type="password" name="password" class="lock" placeholder="Password">
					<input type="submit" name="login" value="Login">	
					<h3>Not a member?				
				</form>
                <input type="button" value="signup" onClick="test()" id="si"></h3>
			</div>
      </div>
</div>
<div class="login-page" id="sign_up" style="display:none">
    <div class="login-main">  	
    	 <div class="login-head">
				<h1>Sign_up</h1>
			</div>
			<div class="login-block">
				<form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
					<input type="text" name="name" placeholder="User_name" required>
                    <input type="text" name="email" placeholder="Email address" required>
                    <input type="text" name="mobile" placeholder="mobile number" required>
         			<input type="text" placeholder="Enter your address" name="address" required="required">
                    <input type="password" name="pass" class="lock" placeholder="Password">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="+1" >Profile picture:: </font> <input type="file" name="image" ><br><br>
					<input type="submit" name="sign" value="Sign_up">	
					<h3>Not a member?<input type="button" value="signup" onClick="test1()" id="si"></h3>				
				</form>
                
			</div>
      </div>
</div>
</body>
</html>

