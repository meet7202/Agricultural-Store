<?php
error_reporting(0);
include('connection.php');

$select="SELECT * FROM `categories`";
$result=mysql_query($select,$con);

?>

<div class="header_slide">
			<div class="header_bottom_left">				
				<div class="categories">
				  
		<ul>
			<h3>Categories</h3>
			<?php
			while($r=mysql_fetch_array($result))
			{
			?>
				<li><a href="index.php?page=display&id=<?php echo $r['id']?>"><?php echo $r['name']?></a></li>
    		<?Php
			}
			?>
        </ul>
		</div>
   	</div>
    			 <div class="header_bottom_right">					 
					 	 <div class="slider">					     
							 <div id="slider">
			                    <div id="mover">
			                    	<div id="slide-1" class="slide">			                    
									 <div  class="slider-img">
									     <a target="_blank" href="assets/wheat/wheat1.jpg"><img 
									     style="height: 500px; width:300px"
									     src="assets/wheat/wheat1.jpg" alt="learn more" /></a>	
									  </div>
						             	<div class="slider-text">
		                                 <h1>Season<br><span>SALE</span></h1>
		                                 <h2>UPTo 20% OFF</h2>
									   <div class="features_list">
									   	<h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>							               
							            </div>
							             <a href="index.php?page=preview&id=28" class="button">Shop Now</a>
					                   </div>			               
									  <div class="clear"></div>				
				                  </div>	
						             	<div class="slide">
						             		<div class="slider-text">
		                                 <h1>Clearance<br><span>SALE</span></h1>
		                                 <h2>UPTo 40% OFF</h2>
									   <div class="features_list">
									   	<h4>Get to Know More About Our Memorable Services</h4>							               
							            </div>
							             <a href="index.php?page=preview&id=40" class="button">Shop Now</a>
					                   </div>		
						             	 <div class="slider-img">
									     <a target="_blank" href="assets/cinnamon/cinnamon2.jpg"><img 
									     style="height: 500px; width:300px"
									     src="assets/cinnamon/cinnamon2.jpg" alt="learn more" /></a>
									  </div>						             					                 
									  <div class="clear"></div>				
				                  </div>
				                  <div class="slide">						             	
					                  <div class="slider-img">
									     <a target="_blank" href="assets/bajra/bajra1.jpg"><img
									     style="height: 500px; width:300px"
									      src="assets/bajra/bajra1.jpg" alt="learn more" /></a>
									  </div>
									  <div class="slider-text">
		                                 <h1>Season<br><span>SALE</span></h1>
		                                 <h2>UPTo 10% OFF</h2>
									   <div class="features_list">
									   	<h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>							               
							            </div>
							             <a href="index.php?page=preview&id=30" class="button">Shop Now</a>
					                   </div>	
									  <div class="clear"></div>				
				                  </div>												
			                 </div>		
		                </div>
					 <div class="clear"></div>					       
		         </div>
		      </div>
		   <div class="clear"></div>
		</div>
   </div>
</div>        
        <script>
        var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("slide");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1} 
    slides[slideIndex-1].style.display = "block"; 
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
        </script>
     

<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="see">
    			<p><a href="index.php?page=display&id=0">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
            <?php        $select="SELECT * FROM `product`";
$res=mysql_query($select,$con);$x=0;
?>
	    <div class="section group">
        		<?php while($rr=mysql_fetch_array($res)){?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="Admin/images/<?php echo $rr['image']?>"><img id="myImg" height=210px width:150px; src="Admin/images/<?php echo $rr['image']?>" alt="" /></a>
                     <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

					 <h2><?php echo $rr['name'];?> </h2>
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
                <?php $x++; if($x==8) 
				break;} ?>

  			</div>

			<div class="content_bottom">
    		<div class="heading">
    		<h3>Most buyed Products</h3>
    		</div>
    		<div class="see">
    			<p><a href="index.php?page=display&id=-1">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
        <?php        $select="SELECT * FROM `product` ORDER BY price DESC";
$res=mysql_query($select,$con);$x=0;
?>
	    <div class="section group">
        		<?php while($rr=mysql_fetch_array($res)){?>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="Admin/images/<?php echo $rr['image']?>"><img id="myImg" height=210px width:150px; src="Admin/images/<?php echo $rr['image']?>" alt="" />
                     </a><div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

					 <h2><?php echo $rr['name'];?> </h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span c  lass="rupees">Rs.<?php echo $rr['price'] ?></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="index.php?page=preview&id=<?php echo $rr['id'] ?>">Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>	
				</div>
                <?php $x++; if($x==4) 
				break;} ?>

  			</div>
    </div>
 </div>
</div>	
</div>