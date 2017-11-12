<script src="js/jquery-2.1.1.min.js"> </script>
<?php

error_reporting(0);
include('connection.php');

$id=$_GET['id'];
?>
<script>
$(document).ready(function() {
    $('#cat1').val(<?php echo $id?>);    
    });
</script>
<?php

if($id==-1)
	$select="SELECT * FROM `product` ORDER BY price DESC";
else if($id)
 $select="SELECT * FROM  `product` WHERE  `category` =$id";
else
	$select="SELECT * FROM  `product`";
$result=mysql_query($select,$con);

if(isset($_POST['sub']))
{
	$id=$_POST['cat1'];
	$sort=$_POST['sort'];
	$low=$_POST['low'];
	$high=$_POST['high'];
	$gender=1;
	if($sort==2 && $gender!=1)
	{
		$select="SELECT * FROM `product` WHERE (category='$id') AND (price BETWEEN '$low' AND '$high') AND (for_whom=$gender) ORDER BY price DESC";
		$result=mysql_query($select,$con);
	}
	else if($sort==3 && $gender!=1)
	{
		$select="SELECT * FROM `product` WHERE (category='$id') AND (price BETWEEN '$low' AND '$high') AND (for_whom=$gender) ORDER BY price ASC";
		$result=mysql_query($select,$con);
	}
	else if($sort==2)
	{
		$select="SELECT * FROM `product` WHERE (category='$id') AND (price BETWEEN '$low' AND '$high') ORDER BY price DESC";
		$result=mysql_query($select,$con);
	}
	else if($sort==3)
	{
		$select="SELECT * FROM `product` WHERE (category='$id') AND (price BETWEEN '$low' AND '$high') ORDER BY price ASC";
		$result=mysql_query($select,$con);
	}
	else if($gender!=1)
	{
		$select="SELECT * FROM `product` WHERE (category='$id') AND (price BETWEEN '$low' AND '$high') AND (for_whom=$gender)";
		$result=mysql_query($select,$con);
	}
	else
	{
		$select="SELECT * FROM `product` WHERE (category='$id') AND (price BETWEEN '$low' AND '$high')";
		$result=mysql_query($select,$con);
	}
	?>
    
	<script>
	$(document).ready(function() {
    $('#gen').val(<?php echo $gender?>);    
    });
	
	$(document).ready(function() {
    $('#sort').val(<?php echo $sort?>);    
    });
	$(document).ready(function() {
    $('#cat1').val(<?php echo $id?>);    
    });
	$(document).ready(function() {
    $('#id1').val(<?php echo $low?>);    
    });
	$(document).ready(function() {
    $('#id2').val(<?php echo $high?>);    
    });

	</script>	
<?php
}

?>

<div class="content_bottom">
    		<div class="heading"><?php
       		$s="SELECT * FROM  `categories` WHERE `id`='$id'";
			$res=mysql_query($s,$con);
			$ss=mysql_fetch_array($res);
			?>
    		<h3 style="color:green"><?php echo $ss['name']; 
			if($id==-1 || $id==0)
			{
				echo "ALL Products";
			}
			?></h3>
    		</div>
</div>

<div class="content_bottom" style="border:0">
    		<div class="heading">
            <?php if($id!=-1 && $id!=0){?>
            <form action="#" method="post">
			<font style="font-size:18px; color:red">categories</font>
			<?php            
            $ct="SELECT * FROM `categories`";
			$lt=mysql_query($ct,$con);
			?>
			<select id="cat1" name="cat1" style="height:35px; width:150px">
            <?php
			while($pppp=mysql_fetch_array($lt))
			{
			?>
				   <option value="<?php echo $pppp['id']; ?>"><?php echo $pppp['name']; ?></option>
    		<?Php
			}
			?>
        </select>
      	&nbsp;&nbsp;&nbsp;&nbsp;
            <font style="font-size:18px; color:red">sort</font>
            <select name="sort" style="height:35px; width:150px" id="sort">
            <option value="1">popularity</option>
            <option value="2">high to low</option>
            <option value="3">low to high</option>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="font-size:18px; color:red">Price between</font>  
            <input type="text" name="low" id="id1" value="0" style="height:35px; width:150px"/> to
            <input type="text" name="high" id="id2" value="300000" style="height:35px; width:150px"/>
            <font style="font-size:18px; color:red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="sub" value="submit" style="height:35px; width:70px"/>
            
            
            </form>
            <?php } ?>
    		</div>
</div>

<div class="section group">
        		<?php while($rr=mysql_fetch_array($result)){?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="<?php echo $rr['id'] ?>"><img height=210px width:150px; src="Admin/images/<?php echo $rr['image']?>" alt="" /></a>
					 <h2><?php echo $rr['name'];?></h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">Rs.<?php echo $rr['price'] ?></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="index.php?page=preview&id=<?php echo $rr['id'] ?>">Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>	
				</div>
                <?php } ?>
  			</div>
