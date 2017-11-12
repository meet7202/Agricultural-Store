<?php
	error_reporting(0);
	
	include('connection.php');
	
		echo $ad1=$_POST['ad1'];
	echo $ad2=$_POST['ad2'];
	echo $city=$_POST['city'];
	echo $pin=$_POST['pin'];
	echo $email=$_POST['Email'];
	echo $name=$_POST['Name'];
	$nn=$name;
	
	if(isset($_POST['submit']))
	{

		echo $card=$_POST['card'];
		echo $holder=$_POST['card_holder'];
		echo $no=$_POST['number'];
		echo $nn;
		if($emial!="")
			echo $email;
		else
			echo "0cas";
		exit;	
		$p=$_SESSION['user'];
		$sct = "select * from `customers` where name='$p'";
		$re = mysql_query($sct,$con);
		$rcc=mysql_fetch_array($re);
		$rrr=$rcc['id'];
		
		$select="SELECT * FROM  `bag` WHERE  `user_id` =$rrr";
		$sec=mysql_query($select,$con);
		while($r=mysql_fetch_array($sec))
		{
			$rxr=$r['pro_id'];		
			$sel="INSERT INTO  `shopping`.`sold_product` (`user_id` ,`pro_id` ,`b_date` ,`s_date` ,`name` ,`email` ,`ad1` ,`ad2` ,`city` ,`pin` ,`card_name` ,`card` ,`card_no`)VALUES ('$rrr',  '$rxr',  '2017-09-11',  '2017-09-20',  '$name',  '$email',  '$ad1',  '$ad2',  '$city',  '$pin',  '$holder',  '$card',  '$no')";
			mysql_query($sel,$con);
	}
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
                        <div class="wrp">
                            <div id="addCard">
                                <div class="panel">
                                    <h2 style="color:red">Card Payment</h2>
                                    <div>
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
                                    </div>
                                    <br>
                                    <div class="form-group col-lg-12">
                                        <label>Card Holder Name</label><br>
                                        <input type="text" required="required" class="form-control" name="card_holder" placeholder="Firstname Lastname"><br><br>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="col-sm-5 form-group">
                                        <label>Card Number</label>
                                        <br>
                                        <input type="text" name="number" class="form-control" required="required" data-encrypted-attribute="card_number"  placeholder="4111111111111111">
                                        <br><br>
                                    </div>
                                    <div class="col-sm-3 col-xs-6 form-group third float-left">
                                        <label>CVV</label><br>
                                        <input type="text" class="form-control" required="required" data-encrypted-attribute="card_cvv"  placeholder="000"><br><br>
                                    </div>
                                    <div class="col-sm-2 col-xs-3 form-group third float-left">
                                        <label>Month</label>
              <br>                          <input type="text" name="expMM" class="form-control" required="required" maxlength="2"  placeholder="01">
               <br><br>                     </div>
                                    <div class="col-sm-2 col-xs-3 form-group third float-left">
                                        <label>Year</label>
                       <br>                 <input type="text" name="expYY" required="required" class="form-control" maxlength="2">
                          <br><br>          </div>
                                </div>
                                <div class="stripes bottom"> </div>
                                <div style="margin:10px 0;">
                                    <input type="checkbox" name="store_card" value="true"/> Store Card
                                </div>
                                <div class="clear">
                                </div>
<br>
                                <input type="submit" name="submit" value="Finish Payment" id="btnPay" class="btn_blue fullsize btn-primary mondidocheckout"><br><br>
                                <div>
                                    <div id="credit-card-list">
                                        <img alt="Mastercard" class="card_mastercard card_icon" src="images/mastercard.png">
                                        <img alt="Visa" class="card_visa card_icon" src="images/visa.png">
                                        <img alt="Amex"  class="card_amex card_icon" src="images/amex.png">
                                        <img alt="Discover" class="card_discover card_icon" src="images/discover.png">
                                        <img alt="Maestro" class="card_maestro  card_icon" src="images/maestro.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
      
 

