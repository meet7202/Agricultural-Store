<div style="width:800px">
<?php
	error_reporting(0);
	session_start();
	include('connection.php');
	$use=$_SESSION['user'];
	$selec="SELECT * FROM  `customers` WHERE `name`='$use'";
	 $res=mysql_query($selec,$con);
	 $r=mysql_fetch_array($res);
	 
	 
	
?>
<div align="center">
<h1 style="color:#060" ><?php echo $r['name']?></h1>
</div>

<div align="center">
<img  src="Users/<?php echo $r['photo']?>" height="300px" width="300px" style="border-radius:50%">
</div>
<br><br>
<style>
th
{
	color:green;
	font-size:16px;
}
td
{
	widtd:100px;
}
tr
{
	height:40px;
}
h2
{
	color:#063;
}
</style>
<table align="center" border="1">
<tr><td colspan="2" align="center"><h2> profile details</h2></td></tr>
<tr><th>Name</th><td><?php echo $r['name'] ?></td></tr>
<tr><th>Email id</th><td><?php echo $r['email_id'] ?></td></tr>
<tr><th>Mobile number</th><td><?php echo $r['mobile'] ?></td></tr>
<tr><th>Address</th><td><?php echo $r['address'] ?></td></tr>
</table>

<div>
<h2 style="color:red"><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transaction History</h2>
<?php 
$iid=$r['id'];
$select="SELECT * FROM  `sold_product` WHERE  `user_id` =$iid ORDER BY `b_date` DESC";
	$sec=mysql_query($select,$con);
	while($r=mysql_fetch_array($sec))
	{
		$ID=$r['ID'];		
		$rxr=$r['pro_id'];		
		$sss="SELECT * FROM  `product` WHERE  `id`=$rxr";
		$sss=mysql_query($sss,$con);
		$pp=mysql_fetch_array($sss);
		
		?>
        <br />
        <table cellspacing="0" cellpadding="0"> 
        <tr >
        		<td widtd="80px" align="center"> <?php echo ++$count; ?> </td>
        		<td><br /><a target="new" href="images/<?php echo $pp['image'] ?>"><img src="images/<?php echo $pp['image'] ?>" height="180px" widtd="180 px" /></a><br />
                <font style="text-align:center; color:red;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $pp['name'];?></font>
                <br /></td>
                <td widtd="400px">
                	<table border="1" cellpadding="0" cellspacing="0">
                	<tr><th widtd="100px">buyer name</td><td><?php echo $r['name']?></td></tr>
                    <tr><th>email id</td><td><?php echo $r['email']?></td></tr>
                    <tr><th>quantity buyed</td><td><?php echo $r['Qty']?></td></tr>
                    <tr><th>shipping address</td><td><?php echo $r['ad1'].",".$r['ad2'].",<br>".$r['city'].",".$r['pin']?></td></tr>
                    <tr><th>Payment card</td><td><?php echo $r['card']?></td></tr>
                    <tr><th>Card_no</td><td><?php echo $r['card_no']?></td></tr>
                    <tr><th>shopping date</td><td><?php echo $r['b_date']?></td></tr>
                    <tr><th>ship date</td><td><?php echo $r['s_date']?></td></tr>
                    </table>
                </td>
        
        <th align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="../index.php?page=bill&value=<?php echo $r['ID'] ?>" target="_blank"><button style="width:200px; height:50px; color:green; border-radius:10px; font-size:16px"><b> Print Invoice </b></button></a>
        
        </th>
        </tr>
        </table>
		<?php 
		
	}

if($count==0)
	{
		?>
        <div style="widtd:900px; border:groove; padding:50px; margin-left:30px">
        <h2 style="color:#60C">You have not done any transaction.</h2><br><br>
		<p>Your Shopping Cart lives to serve. 
        
        <br><br> Give it purpose - fill it witd books, CDs, DVDs, toys, electronics, and more.
        <br> 
<br> Continue shopping on tde <a  href="index.php?page=div2"><font color="#0000FF">homeshop.com </font></a> homepage, learn about today's deals.
<br><br>tde price and availability of items at Amazon.com are subject to change. tde Cart is a temporary place to store a list of your items and reflects each item's most recent price. <br><br><br>
Do you have a gift card or promotional code? We'll ask you to enter your claim code when it's time to pay.
        
        </div>
		<?php
	}
	
?>
</div>
</div>