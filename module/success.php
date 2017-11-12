<br><br>
<img src="images/modify-success-page-04.png" width="790" height="209">


<h1 style="color:red">Your order is placed successfully</h1>
<br>
<h2 style="color:blue"> Order place on <?php echo date("Y-m-d") ?></h2>
<h2 style="color:blue"> and will be dilevered till <?php 		
		$d=strtotime("+1 week");
		echo date("Y-m-d", $d);
		?>
        
  <br>
  <br>
  <button onclick="window.location='index.php?page=div2'" style="height:50px; border-radius:10px; color:red; width:200px; font-size:16px; cursor:pointer;"><b>Continue shopping</b></button>
  
 <br>
 <br>
 <br>
 <br><br>
 