<?php
	error_reporting(0);
	include('connection.php'); 
	$id=$_GET['id'];
	$select="SELECT * FROM  `product` WHERE  `id` =$id";
	$sec=mysql_query($select,$con);
	$s=mysql_fetch_array($sec);
	$p=$_SESSION['user'];
	$sct = "select * from `customers` where name='$p'";
	$re = mysql_query($sct,$con);
	$rcc=mysql_fetch_array($re);
	$rrr=$rcc['id'];
	if(isset($_POST['cart']))
	{
		$ss="SELECT * FROM  `shopping`.`bag` WHERE `user_id`='$rrr' AND `pro_id`='$id'";
		$st=mysql_query($ss,$con);
		$sel=mysql_num_rows($st);
		if($sel)
		{
			$rx=mysql_fetch_array($st,$con);
			$ss="UPDATE `shopping`.`bag` SET `total`=total+1";
			mysql_query($ss,$con);
		}
		else
		{
		$s="INSERT INTO  `shopping`.`bag` (`user_id` ,`pro_id` ,`total`)VALUES ('$rrr',  '$id',  '1');";
		mysql_query($s,$con);
		}
		header('location:index.php?page=cart');
	}
	
	if(isset($_POST['wish']))
	{
		$ss="SELECT * FROM  `shopping`.`wishlist` WHERE `user_id`='$rrr' AND `pro_id`='$id'";
		$st=mysql_query($ss,$con);
		$sel=mysql_num_rows($st);
		if($sel)
		{
		}
		else
		{
		$s="INSERT INTO  `shopping`.`wishlist` (`user_id` ,`pro_id`)VALUES ('$rrr',  '$id');";
		mysql_query($s,$con);
		}
		header('location:index.php?page=preview&id='.$id);
	}
	
?>
<div class="main1">
    <div class="content">
    	<div class="content_top">
    		<div class="back-links">
    			<b><font color="#FF0000" face="Arial, Helvetica, sans-serif">product details</font></b>
    	    </div>
    	</div>
    	<div class="section group">
				<div class="cont-desc span_1_of_2">
				  <div class="product-details">				
					<div class="grid images_3_of_2">
						<div id="container">
						   <div id="products_example">
							   <div id="products">
								<div class="slides_container" style="border:medium">
									<a href="Admin/images/<?php echo $s['image'];?>" target="_blank"><img src="Admin/images/<?php echo $s['image'];?>" alt=" " /></a>
								</div>
                                <div>
                    	<?php
							echo "Original price:-".$s['price']."<br>";
							echo "shipping:-".$s['Scharge']."<br>";
							echo "discount:-".$s['discount']."%<br>";
							$x=($s['price']-($s['price']*$s['discount']/100)+$s['Scharge']);
							echo "total price:-".$x."<br>"; 
						?></div>
							</div>
						</div>
					</div>
				</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $s['name'];?></h2>
					<p>It's All for you.</p>					
					<div class="price">
						<p>Price: <span>Rs.<?php echo $x;?></span></p>
					</div>
					<div class="available">
						<p>Available Options :</p>
					<ul>
						<li>Quantity:<select>
							<option>10 Kg</option>
							<option>20 Kg</option>
							<option>30 Kg</option>
							<option>40 Kg</option>
							<option>50 Kg</option>
						</select></li>
					</ul>
					</div>
				 </div>
                 <div>
               	<?php
				if($_SESSION['user'])
				{?>
                <form action="#" method="post">
                 <input type="submit" name="cart" value="Add to Cart" style="cursor:pointer; margin:10px 100px 0px 10px; height:40px; width:140px; border-radius:10px; color:#F00; font-size:16px; font-weight:bold">
              	 <input type="submit" name="wish" value="Move to Wishlist" style="cursor:pointer; margin:10px 0px 0px -100px;height:40px; width:140px; border-radius:10px; color:#F00; font-size:16px; font-weight:bold">
                 </form><?php }
				 else
				 {?>
                 <input type="submit" name="cart" value="Add to Cart" style="cursor: not-allowed;
        pointer-events: none; margin:10px 100px 0px 10px; height:40px; width:140px; border-radius:10px; color:#F00; font-size:16px; font-weight:bold">
              	 <input type="submit" name="wish" value="Move to Wishlist" style="cursor: not-allowed;
        pointer-events: none; margin:10px 0px 0px -100px;height:40px; width:140px; border-radius:10px; color:#F00; font-size:16px; font-weight:bold">
        <br /> &nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0000">Please login for add to bag and wishlist</font>
                 <?php } ?>
                 </div>
			</div>
		  </div>
       </div>
           </div>
</div>  