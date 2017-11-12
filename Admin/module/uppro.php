<?php
	$con=mysql_connect('localhost','root','123');
mysql_select_db('shopping',$con);
$idd = $_GET['id'];
	$select = "select * from `product` where id='$idd'";
	$result = mysql_query($select,$con);
	
	$r = mysql_fetch_assoc($result);
	if(isset($_POST['sign']))
		{	
	 $name=$_POST['name'];
	  $price=$_POST['price'];
	  $gender=$_POST['gender'];
	 $color=$_POST['color'];
	 $qty=$_POST['qty'];
	 $ship=$_POST['ship'];
	 $dis=$_POST['dis'];
	 $image=$_FILES['img']['name'];
		if($image=='')
		{
			$update="UPDATE product SET name='$name',
				price='$price',
			for_whom='$gender',
			color='$color',
			quantity='$qty',
			Scharge='$ship',
			discount='$dis'	
			where id='$idd'";
			//var_dump($insert);
			//exit;
			mysql_query($update,$con);
		
		}
		else
		{	
		if(!file_exists("images/".$image))
		{
			move_uploaded_file($_FILES['img']['tmp_name'],"images/".$image);
		}
		if(!file_exists("../images/".$image))
		{
			move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$image);
		}			
		$update="UPDATE product SET name='$name',
				price='$price',
			for_whom='None',
			color='white',
			quantity='$qty',
			Scharge='$ship',
			discount='$dis',
			image='$image'
			where id='$idd'";
			mysql_query($update,$con);		
		}
	header('location:index.php?page=up_proc');
		}
?>
<div class="login-block">
				<form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
					<input type="button" style="background-color:#000; color:white; height:50px; width:100px" name="id" value="<?php echo $r['id'] ?>" required><br /><br >
					Name  ::<input type="text" name="name" value="<?php echo $r['name'] ?>" required>
                    Price ::<input type="text" name="price"  value="<?php echo $r['price'] ?>" required>
                    Qty   ::<input type="text" name="qty"  value="<?php echo $r['quantity'] ?>">
                    Dis   ::<input type="text" name="dis"  value="<?php echo $r['discount'] ?>">
                    Ship  ::<input type="text" name="ship"  value="<?php echo $r['Scharge'] ?>">
                    <div style="overflow:hidden">
                    update photo
                   	<br><br><input type="file" name="img" style="float:left"  />
                    <br><br>
                    </div>
					<input type="submit" name="sign" value="Update">	
						
				</form>
                
			</div>
