<?php
include('../connection.php');
$select="SELECT COUNT(pro_id),`b_date`
FROM `sold_product` GROUP BY `b_date`";
	$sec=mysql_query($select,$con);
	
?>
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>	<div class="inner-block">
    <div class="chart-main-block">
       <div class="chart-first-line">
    	<div class="col-md-6 chart-blo-1">
    	   <div class="dygno">
    		     <h2>Doughnut</h2>
				
				    <canvas id="doughnut" height="300" width="470" style="width: 470px; height: 300px;"></canvas>
								<script>
									var doughnutData = [
									{
										value: 25,
										color:"#337AB7"
									},
									{
										value : 50,
										color : "#929292"
									},
									{
										value : 100,
										color : "#FC8213"
									},
									{
										value : 40,
										color : "#68AE00"
									},
									];
									new Chart(document.getElementById("doughnut").getContext("2d")).Doughnut(doughnutData);
								</script>
			</div>	
    	 </div>
    	<div class="col-md-6 chart-blo-1">
    		<div class="chart-other">
	    		<h3>Pie</h3> 		
				<canvas id="pie" height="315" width="470" style="width: 470px; height: 315px;"></canvas>
								<script>
									var pieData = [
										{
											value: 30,
											color:"#337AB7"
										},
										{
											value : 50,
											color : "#FC8213"
										},
										{
											value : 100,
											color : "#8BC34A"
										}
									
									];
									new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);
								</script>
            </div>
    	</div>
    	<div class="clearfix"> </div>
    	</div>
    </div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<?php
        while($r=mysql_fetch_array($sec))
	{
		echo $r['sum'];}?>
	