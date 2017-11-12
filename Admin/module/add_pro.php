<?php

error_reporting(0);
$con=mysql_connect('localhost','root','123');
mysql_select_db('shopping',$con);

$select="SELECT * FROM `categories`";
$result=mysql_query($select,$con);

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$category=$_POST['category'];
	$price=$_POST['price'];
	$ship=$_POST['ship'];
	$dis=$_POST['dis'];
	$quantity=$_POST['quantity'];
	$photo=$_FILES['img']['name'];
	if(!file_exists("images/".$photo))
	{
		move_uploaded_file($_FILES['img']['tmp_name'],"images/".$photo);
	}
	move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$photo);	
	$sub="INSERT INTO `shopping`.`product` (`name`, `category`, `price`, `quantity`, `for_whom`, `color`, `discount`, `Scharge`, `image`) VALUES ('$name','$category','$price','$quantity','None','White','$dis', '$ship','$photo')";
	mysql_query($sub,$con);
	header('Location: index.php?page=add_pro');
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
  	<tr style="background-color:#000; color:white"><td><font size="+4">Add Products
    <td></tr>
    <tr>
      <td width="255">&nbsp;<label>Product Name </label></td>
      <td width="367">&nbsp;<input type="text" name="name" required="required" /></td>
    </tr>
    <tr>
      <td>&nbsp;<label>Category</label></td>
      <td>&nbsp;
      		<select name="category">
            <?php
			while($r=mysql_fetch_array($result))
			{
			?>
				   <option value="<?php echo $r['id']; ?>"><?php echo $r['name']; ?></option>
    		<?Php
			}
			?>
        </select>
      </td>
    </tr>
    <tr>
      <td>&nbsp;<label>price</label></td>
      <td>&nbsp;<input type="text" name="price" required="required" onchange="<?php
	  if($_GET['price']>=1000)?>
	  	document.product.ship.value('0');"/></td>
    </tr>
    <tr>
      <td>&nbsp;<label>quantity</label></td>
      <td>&nbsp;<input type="text" value="0" name="quantity" /></td>
    </tr>
    <tr>
      <td>&nbsp;<label>Discount</label></td>
      <td>&nbsp;<input type="text" name="dis" value="0"/></td>
    </tr>
    <tr>
      <td>&nbsp;<label>shipping charge</label></td>
      <td>&nbsp;<input type="number" name="ship" value="100"/></td>
    </tr>
    <tr>
      <td>&nbsp;<label>image</label></td>
      <td>&nbsp;<input type="file" name="img" />
      </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;<input type="submit" name="submit" value="submit" /></td>
    </tr>
  </table>
</form>



