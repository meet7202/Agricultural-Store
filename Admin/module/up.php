<?php
	$con=mysql_connect('localhost','root','123');
mysql_select_db('shopping',$con);
$idd = $_GET['id'];
	$select = "select * from `customers` where id='$idd'";
	$result = mysql_query($select,$con);
	
	$r = mysql_fetch_assoc($result);
	if(isset($_POST['sign']))
		{	
	 $name=$_POST['name'];
	  $email=$_POST['email'];
	  $mobile=$_POST['mobile'];
	 $password=md5($_POST['pass']);
	 $add=$_POST['address'];
	 $image=$_FILES['img']['name'];
		if($image=='')
		{
			$update="UPDATE customers SET name='$name',
				email_id='$email',
			mobile='$mobile',
			address='$add',
			password=md5('$password')	
			where id='$idd'";
			//var_dump($insert);
			//exit;
			mysql_query($update,$con);
		
		}
		else
		{	
			move_uploaded_file($_FILES['img']['tmp_name'],"Users/".$image);
			
			$update="UPDATE customers SET name='$name',
				email_id='$email',
			mobile='$mobile',
			address='$add',
			photo='$image'
			where id='$idd'";
			//var_dump($insert);
			//exit;
			mysql_query($update,$con);
				
		}
	header('location:index.php?page=Disp_User');
		}
?>
<div class="login-block">
				<form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
					<input type="button" style="background-color:#000; color:white; height:50px; width:100px" name="id" value="<?php echo $r['id'] ?>" required><br /><br >
					<input type="text" name="name" value="<?php echo $r['name'] ?>" required>
                    <input type="text" name="email"  value="<?php echo $r['email_id'] ?>" required>
                    <input type="text" name="mobile"  value="<?php echo $r['mobile'] ?>" required>
         			<input type="text"  value="<?php echo $r['address'] ?>" name="address" required="required">
                    <input type="password" name="pass" class="lock"  value="<?php echo $r['password'] ?>">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="img"  />
                    <br><br>
					<input type="submit" name="sign" value="Update">	
						
				</form>
                
			</div>
