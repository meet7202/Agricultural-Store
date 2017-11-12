	<?php
	$sel="SELECT * FROM `product`";
	$res=mysql_query($sel,$con);
	?>
<div class="inner-block">
    <div class="product-block">
    	<div class="pro-head">
    		<h2>Products</h2>
    	</div>
         <?php
			while($r=mysql_fetch_array($res))
			{
			?>
    	<div class="col-md-3 product-grid">
    		<div class="product-items">
	    		    <div class="project-eff">
						<div id="nivo-lightbox-demo"> <p> <a href="images/<?php echo $r['image'] ?>"><span class="rollover1"> </span> </a></p></div>     
							<img style="height:200px; width:300px" class="img-responsive" src="images/<?php echo $r['image'] ?>" alt="">
					</div>
	    		<div class="produ-cost">
	    			<h4><?php echo $r['name'] ?></h4>
	    			<h5><?php echo $r['price'] ?>  Rs.</h5>
	    		</div>
                <a style="display:block" href="index.php?page=uppro&id=<?php echo $r['id']?>">
                <div style="background-color:black; color:white; display:block; height:60px; text-align:center">
                	<font ><br />update product</font>
                </div>
                </a>
                
    		</div>
    	</div>
        <?Php
			}
		?>
    </div>
</div>