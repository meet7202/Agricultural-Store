<style>
tr{
	height:220px;
	width:900px;
	border:double;
}
table
{
	border:solid;
	margin:0px 80px;
}
</style>
<?php
	error_reporting(0);
	include('connection.php');
	$p=$_SESSION['user'];
	$sct = "select * from `customers` where name='$p'";
	$re = mysql_query($sct,$con);
	$rcc=mysql_fetch_array($re);
	$rrr=$rcc['id'];
	$select="SELECT * FROM  `wishlist` WHERE  `user_id` =$rrr";
	$sec=mysql_query($select,$con);
	echo "<br><br><br>";
	$count=0;
	while($r=mysql_fetch_array($sec))
	{

		$rxr=$r['pro_id'];
		$sss="SELECT * FROM  `product` WHERE  `id`=$rxr";
		$sss=mysql_query($sss,$con);
		$pp=mysql_fetch_array($sss);

		?>
        <br />
        <table cellspacing="0" cellpadding="0">
        <tr >
        		<td width="80px" align="center"> <?php echo ++$count; ?> </td>
        		<td><br /><a target="new" href="Admin/images/<?php echo $pp['image'] ?>"><img src="Admin/images/<?php echo $pp['image'] ?>" height="180px" width="180 px" /></a>

                <br /></td>
                <td width="400px">
                	<div >
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php	echo "Original price:- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$pp['price']."<br><br>"; ?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php	echo "Shipping charge:-&nbsp;&nbsp;&nbsp;&nbsp;".$pp['Scharge']."<br><br>"; ?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php	echo "Discount:- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$pp['discount']."%<br><br>"; ?>
                        <br /><br /><font color="#FF0000">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "total price:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".($pp['price']-($pp['price']*$pp['discount']/100)+$pp['Scharge']); ?>
                        </div>
                </td>
        </tr>
        </table>
		<?php

	}
	if($count==0)
	{
		?>
        <div style="width:900px; border:groove; padding:50px; margin-left:30px">
        <h2 style="color:#60C">Your Wishlist is empty.</h2><br><br>
		<p>Your Shopping Cart lives to serve.

        <br><br> Give it purpose - fill it with books, CDs, DVDs, toys, electronics, and more.
        <br>
<br> Continue shopping on the <a  href="index.php?page=div2"><font color="#0000FF">homeshop.com </font></a> homepage, learn about today's deals.
<br><br>The price and availability of items at Amazon.com are subject to change. The Cart is a temporary place to store a list of your items and reflects each item's most recent price. <br><br><br>
Do you have a gift card or promotional code? We'll ask you to enter your claim code when it's time to pay.

        </div>
		<?php
	}

?>
<br /><br />
