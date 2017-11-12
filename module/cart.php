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
	$select="SELECT * FROM  `bag` WHERE  `user_id` =$rrr";
	$sec=mysql_query($select,$con);
	echo "<br><br><br>";
	$count=0;$tpice=0;
	while($r=mysql_fetch_array($sec))
	{
		
		$rxr=$r['pro_id'];		
		$sss="SELECT * FROM  `product` WHERE  `id`=$rxr";
		$sss=mysql_query($sss,$con);
		$pp=mysql_fetch_array($sss);
		$qty=$r['total'];
		?>
        <br />
        <table cellspacing="0" cellpadding="0"> 
        <tr >
        		<td width="80px" align="center"> <?php echo ++$count; ?> </td>
        		<td><br /><a target="new" href="Admin/images/<?php echo $pp['image'] ?>"><img src="Admin/images/<?php echo $pp['image'] ?>" height="180px" width="180 px" /></a>
                
                <br /></td>
                <td width="350px">
                	<div >
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php	echo "Original price:- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$pp['price']."<br>"; ?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php	echo "Shipping charge:-&nbsp;&nbsp;&nbsp;&nbsp;".$pp['Scharge']."<br>"; ?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php	echo "Discount:- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$pp['discount']."%<br>"; ?>
                        <br /><br /><font color="#FF0000">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "total price of one item:-&nbsp; INR ".$tot=($pp['price']-($pp['price']*$pp['discount']/100)+$pp['Scharge']); ?><br /><br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "total price:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; INR ".$tot=$qty*($pp['price']-($pp['price']*$pp['discount']/100)+$pp['Scharge']); ?>
                        <?php $tprice+=$tot;?>
                        </div>
                </td>
                
                <td align="center">
               &nbsp;&nbsp; <button style="height:50px; border-radius:35px; color:white; cursor:pointer; background-color:red; width:120px; padding:10px" onclick="window.location='index.php?page=up&msg=2&id=<?php echo $rrr ?>&pid=<?php echo $rxr ?>&value='+1;">Delete from cart</button>&nbsp;&nbsp;&nbsp;
    <br /><br /><font color="#0000CC">Select quantity</font><br /><br />
                  <select style="border-radius:10px; width: 100px; height:30px; text-align:center" id="myselect" name="location" onchange="window.location='index.php?page=up&id=<?php echo $rrr ?>&msg=1&pid=<?php echo $rxr ?>&value='+this.value;">
        <option value="All"><?php echo $qty ?></option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
    </select>

    <?php
    if(isset($_GET['id']))
    {
        $location=$_GET['id'];
        echo $location;
    ?>
    <script>
        var myselect = document.getElementById("myselect");
        myselect.options.selectedIndex = <?php echo $_GET["pos"]; ?>
    </script>
    <?php
    }
    ?>
                </td>
        </tr>
        </table>
		<?php 
		
	}
	if($tprice)
	{?>
    	<br /><br />
		<table cellspacing="0" cellpadding="0"> 
        <tr style="height:80px;"><td width="770px" align="left"><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0000" size="+2">Total price = </font><font size="+2" color="#0000FF"><?php echo $tprice ?></font>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button onclick="window.location='index.php?page=payaddr'" style="height:50px; border-radius:10px; color:red; width:200px; font-size:16px; cursor:pointer;"><b>proceed to pay money</b></button>
		<br /><br /><br /></td></tr>
		</table><?php
	}
	if($count==0)
	{
		?>
        <div style="width:900px; border:groove; padding:50px; margin-left:30px">
        <h2 style="color:#60C">Your Cart is empty.</h2><br><br>
		<p>Your Shopping Cart lives to serve. 
        
        <br><br> Give it purpose - fill it with books, CDs, DVDs, toys, electronics, and more.
        <br> 
<br> Continue shopping on the <a href="index.php?page=div2"><font color="#0000FF">homeshop.com </font></a> homepage, learn about today's deals.or visit your <a href="index.php?page=wishlist"><font color="#0000FF">Wishlist</font></a>.
<br><br>The price and availability of items at Amazon.com are subject to change. The Cart is a temporary place to store a list of your items and reflects each item's most recent price. <br><br><br>
Do you have a gift card or promotional code? We'll ask you to enter your claim code when it's time to pay.
        
        </div>
		<?php
	}
	
	

?>
<br /><br />