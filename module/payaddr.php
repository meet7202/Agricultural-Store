<?php
error_reporting(0);
$user=$_SESSION['user'];

?>
<style>
label
{
	color:#F00;
}
</style>

<?php
	error_reporting(0);
	
	include('connection.php');
	
	$ad1=$_POST['ad1'];
	 $ad2=$_POST['ad2'];
	 $city=$_POST['city'];
	$pin=$_POST['pin'];
	 $email=$_POST['Email'];
	$name=$_POST['Name'];
	$nn=$name;
	
	if(isset($_POST['submit']))
	{

		$card=$_POST['card'];
		$holder=$_POST['card_holder'];
		$no=$_POST['number'];
			
		$p=$_SESSION['user'];
		$sct = "select * from `customers` where name='$p'";
		$re = mysql_query($sct,$con);
		$rcc=mysql_fetch_array($re);
		$rrr=$rcc['id'];
		
		$select="SELECT * FROM  `bag` WHERE  `user_id` =$rrr";
		$sec=mysql_query($select,$con);
		 $date=date("Y-m-d");
		$d=strtotime("+1 week");
		$sdate= date("Y-m-d", $d) . "<br>";

		while($r=mysql_fetch_array($sec))
		{
			$rxr=$r['pro_id'];
			$sss="SELECT * FROM  `product` WHERE  `id`=$rxr";
			$qty=$r['total'];
			$sss=mysql_query($sss,$con);
			$pp=mysql_fetch_array($sss);
			$tot=$qty*($pp['price']-($pp['price']*$pp['discount']/100)+$pp['Scharge']);
				
			$qty=$r['total'];	
			$sel="INSERT INTO  `shopping`.`sold_product` (`user_id` ,`pro_id` ,`Qty` ,`tprice` ,`b_date` ,`s_date` ,`name` ,`email` ,`ad1` ,`ad2` ,`city` ,`pin` ,`card_name` ,`card` ,`card_no`)VALUES ('$rrr',  '$rxr',  '$qty',  '$tot',  '$date',  '$sdate',  '$name',  '$email',  '$ad1',  '$ad2',  '$city',  '$pin',  '$holder',  '$card',  '$no')";
			mysql_query($sel,$con);
			$sss="UPDATE `product` SET `quantity`=`quantity`-$qty WHERE `id`=$rxr";
			mysql_query($sss,$con);
		}
		$sct = "delete from `bag` where  `user_id` =$rrr";
		 mysql_query($sct,$con);
		 header('location:index.php?page=success');
		
	}
	
	

?>
<style>
 #mondidopayform input[type='text'],input[type='submit']
 {
   height:40px;
   width:400px;
 }
 form
 {
	margin-left:50px;	 
 }
</style>  

                    <form id="mondidopayform" action="#" method="post">
                    	<div class="a1">
								<h2 style="color:#C00">shippng Address</h2>
                                <br>
						    	<span><label>Name for bill</label></span><br>
						    	<span><input name="Name" required="required" type="text" class="textbox" ></span><br><br>
						    	<span><label>E-mail</label></span><br>
						    	<span><input name="Email" type="text" required="required" class="textbox"></span>
						    <br><br>
						     	<span><label>ADDRESS LINE-1</label></span>
						    	<br><span><input name="ad1" type="text" class="textbox" required="required"></span>
						    <br><br>
						     	<span><label>ADDRESS LINE-2</label></span>
						    	<br><span><input name="ad2" type="text" class="textbox" required="required"></span>
						    <br><br>
						     	<span><label>City</label></span>
						    	<br><span><input name="city" type="text" class="textbox" required="required"></span>
						    <br><br>
						     	<span><label>Pincode</label></span>
						    	<br><span><input name="pin" type="text" class="textbox" required="required"></span>
						    <br><br>
						   </div>
                           <div class="a1">
                                    <h2 style="color:red">Card Payment</h2>
                                    <br>
                                    <label>Select card<label>
            						<br>	
                                    <select name="card" style="height:35px; width:120px">
                                    <option value="master-card">MasterCard</option>
                                    <option value="visa-card">Visa Card</option>
                                    <option value="american-express">American Express</option>
                                    <option value="discover">Discover</option>
                                    <option value="maestro">maestro</option>
                                    </select>
                                    <br><br>
                                        <label>Card Holder Name</label><br>
                                        <input type="text" required="required" class="form-control" name="card_holder" ><br><br>
                                   
                                        <label>Card Number</label>
                                        <br>
                                        <input type="text" name="number" class="form-control" required="required" data-encrypted-attribute="card_number"  >
                                        <br><br>
                                        <label>CVV</label><br>
                                        <input type="text" class="form-control" required="required" data-encrypted-attribute="card_cvv" ><br><br>
                                        <label>Month</label>
              <br>                          <input type="text" name="expMM" class="form-control" required="required" >
               <br><br>                            <label>Year</label>
                       <br>                 <input type="text" name="expYY" required="required" class="form-control" >
                          <br><br>         
                                    <input type="checkbox" name="store_card" value="true"/> Store Card
                                
<br>
                                <input type="submit" name="submit" value="Finish Payment" id="btnPay" class="btn_blue fullsize btn-primary mondidocheckout"><br><br>
                                        <img alt="Mastercard" class="card_mastercard card_icon" src="images/mastercard.png">
                                        <img alt="Visa" class="card_visa card_icon" src="images/visa.png">
                                        <img alt="Amex"  class="card_amex card_icon" src="images/amex.png">
                                        <img alt="Discover" class="card_discover card_icon" src="images/discover.png">
                                        <img alt="Maestro" class="card_maestro  card_icon" src="images/maestro.png">
                                </div>
                    </form>