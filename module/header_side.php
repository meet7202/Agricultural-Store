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
				<li><a href="#"><?php echo $r['name']?></a></li>
    		<?Php
			}
			?>
        </ul>
		</div>
   	</div>
    <div> slider</div>
</div>