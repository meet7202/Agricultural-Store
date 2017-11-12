<?php
	error_reporting(0);
	session_start();
	$hostname = 'localhost';
	$uname = 'root';
	$pass = '';
	$db_name = 'shopping';
	$con = mysql_connect($hostname,$uname,$pass);
	mysql_select_db($db_name,$con);	
	$use=$_SESSION['user'];
	$selec="SELECT * FROM  `customers` WHERE `name`='$use'";
	 $res=mysql_query($selec,$con);
	 $r=mysql_fetch_array($res);
?>
<html>
<head>
<title>Agricultural Store</title>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/startstop-slider.js"></script>
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="icon" href="images/logo.png" type="text/css">
<style>
body {
	font-family: Arial, Helvetica, sans-serif;
	background: #FFF;
}
.wrap {
	width:1325px%;
	
}
.header {
	background-color:#FFFFFF;
}
.headertop_desc{
	padding:20px 0;
	border-bottom:1px solid #EEE;
	height:20px;
}
.call{
	float:left;
	margin-top:-22px;
}
.call p{
	font-size:0.9em;
	color:#9C9C9C;
}
.account_desc{
	float:right;
	margin-top:-25px;
}

.account_desc li{
	display:inline;
	border-left:1px dotted #CCC;
	
}
.account_desc li:first-child{
	border:none;
}
.account_desc li a{
	font-size:0.823em;
	color:#06F;
	padding:0 10px;
	font-family: 'ambleregular';
	text-decoration:none;
}
.account_desc li a:hover{
	color:#E4292F;
}

/**** Cart ****/
.cart{
	float:right;
	 position: relative;
	 padding-right:40px;
	 margin-top:20px;
}
.cart p{
	font-size:0.9em;
	color:#303030;
	display:inline-block;
}
.cart p span{
	font-size:1.5em;
	color:#E4292F;
}
.wrapper-dropdown-2 {
    display:inline-block;
    margin: 0 auto;
    font-size:0.9em;
    color:#303030;
    padding:0px 5px;
    cursor: pointer;
    outline: none;
}
.wrapper-dropdown-2:after {
    content: "";
    width: 0;
    height: 0;
    position: absolute;
    right:5px;
    top: 50%;
    margin-top:0px;
    border-width: 6px 6px 0 6px;
    border-style: solid;
    border-color:#E4292F transparent;
}
.wrapper-dropdown-2 .dropdown {
    position: absolute;
    top: 100%;
    width:75%;
    right: 0px;
    z-index:1;
    background:#EEE;
    -webkit-transition: all 0.3s ease-out;
    -moz-transition: all 0.3s ease-out;
    -ms-transition: all 0.3s ease-out;
    -o-transition: all 0.3s ease-out;
    transition: all 0.3s ease-out;
    list-style: none;
    opacity: 0;
    pointer-events: none;
}
.wrapper-dropdown-2 .dropdown li{
    display: block;
    text-decoration: none;
    color: #333;
    font-size:0.823em;
    padding: 10px;
    -webkit-transition: all 0.3s ease-out;
    -moz-transition: all 0.3s ease-out;
    -ms-transition: all 0.3s ease-out;
    -o-transition: all 0.3s ease-out;
    transition: all 0.3s ease-out;
}
.wrapper-dropdown-2 .dropdown li:hover a {
    color:red;
    background:#AAA;
}
.wrapper-dropdown-2.active:after {
    border-width: 0 6px 6px 6px;
}
.wrapper-dropdown-2.active .dropdown {
    opacity: 1;
    pointer-events: auto;
}
   /**** End Cart ****/


.header_top
{
	padding:30px 0;
	border-bottom:1px solid #EEE;
}
.logo
{
	float:left;
	margin-top:-40px;
}
.cart 
{
	float:right;
	margin-top:-20px;
}

.header_bottom {
	background-color:#333;
	border-radius: 60px;
	overflow:hidden;
	-webkit-border-radius: 6px;
	-moz-border-rfadius: 6px;
	-o-border-radius: 6px;
	line-height:5px;	
}
.menu {
	float:left;
}
.menu li {
	float:left;
	display:inline;
}
.menu ul
{
	margin:0px;
	padding:0px;
	overflow:hidden;
}
.menu li a {
	font-family:"Lucida Console", Monaco, monospace;
	text-transform:uppercase;
	font-size:1em;
	color:#FFF;
	overflow:hidden;
	display:block;
	padding:20px 20px;
	border-right: 2px ridge #585858;
	transition: all .9s;
	 -webkit-transition: all .9s;
   -moz-transition: all .9s;
   -o-transition: all .9s;
   -ms-transition: all .9s;
}
.menu li a:hover{
	background:#FF0000;
}
.menu li:first-child  a{
	border-radius:6px 0 0 6px;
}
.search_box {
	float: right;
	border: 1px solid #3C3C3C;
	background: #FFF;
	border-radius: 0.3em;
	position: relative;
	width:25%;
}
.search_box form input[type="text"] {
	border: none;
	outline: none;
	background: none;
	font-size:12px;
	color: #acacac;
	width:75%;
	padding:5px;
}
.search_box form input[type="submit"] {
	border: none;
	cursor: pointer;
	background: url(../images/search.png) no-repeat 0px 7px;
	position: absolute;
	right: 0;
	width: 20px;
	height: 25px;
}


.header_slide{
	margin:25px 20px 0px;
	overflow:hidden;
}

.header_bottom_left{
	float:left;
	width:25%;
}

.categories{
	margin-left:-20px;
	border:1px solid #EEE;
}

.categories h3{
	font-size:1.2em;
	color:#FFF;

	padding:10px;
	background:#B81D22;
	text-transform:uppercase;
	font-family:"Arial Black", Gadget, sans-serif;	
}

.categories ul{
	list-style:none;
}
.categories li a{
	display:block;
	font-size:0.8em;
	padding:8px 15px;
    color: #999999;
	text-decoration:none;
    font-family: 'ambleregular';
    margin:0 15px;
    background:url(../images/drop_arrow.png) no-repeat 0;
    border-bottom: 1px solid #EEE;
    text-transform:uppercase;	
}

.categories li:last-child a{
	border:none;
}

.categories li a:hover{
	color:#B81D22;
}


.header_bottom_right{
	float:left;
	width:74%;
	padding-left:1%;
}


.main{
	margin-top:80px;
}
.main1
{
	padding-top:10px;
}
/***** Content *****/
.content {
	padding: 20px 0;
	background: #FFF;
}
.content h2 {
	color: #383838;
	margin-bottom: 0.5em;
	font-size:1.5em;
	line-height: 1.2;
	font-family: 'ambleregular';
	font-weight: normal;
	margin-top: 0px;
	text-transform: uppercase;
}
.content_top{
	padding: 30px 20px;
	border: 1px solid #EBE8E8;
	border-radius: 3px;
}
.content_bottom {
	padding: 30px 20px;
	border: 1px solid #EBE8E8;
	border-radius: 3px;
	margin-top: 2.6%;
}
.heading {
	float: left;
	margin-top:-33;
}

.heading h3 {
	font-family: 'ambleregular';
	font-size:22px;
	color:#383838;
	text-transform: uppercase;
}
.see {
	float: right;
	margin-top:-15;
}
.see p a{
	display: inline;
	font-size: 0.8125em;
	color: #333;
	background: url(../images/list-img.png) no-repeat right 3px;
    padding:0px 10px 0px 0px;
}
.see p a:hover{
	color: #E4292F;
}


.grid_1_of_4 {
	display: block;
	float: left;
	margin: 10 5 5 5;
	box-shadow: 0px 0px 3px rgb(150, 150, 150);
	-webkit-box-shadow: 0px 0px 3px rgb(150, 150, 150);
	-moz-box-shadow: 0px 0px 3px rgb(150, 150, 150);
	-o-box-shadow: 0px 0px 3px rgb(150, 150, 150);
}
.grid_1_of_4:first-child {
	margin-left:10;
}
.images_1_of_4 {
	width: 20.8%;
	padding: 1.5%;
	text-align: center;
	position: relative;
}
.images_1_of_4  img {
	max-width:230;
}
.images_1_of_4  h2 {
	color:#6A82A4;
	font-family: 'ambleregular';
	font-size:1.1em;
	margin-top:10px;
	font-weight: normal;
}
.images_1_of_4  p {
	font-size: 0.8125em;
	padding: 0.4em 0;
	color: #333;
}
.images_1_of_4  p span.price {
	font-size: 18px;
	font-family: 'ambleregular';
	color:#CC3636;
}
.price-details{
	margin-top:30px;
	border-top:1px solid #CD1F25;
}
.price-number{
	float: left;
	padding-top: 0;
}
.price-details p span.rupees{
	font-size:1.6em;
	font-family: 'ambleregular';
	color:#383838;
}
.add-cart{
	float:right;
	display: inline-block;
	
}
.add-cart h4 a{
	font-size:0.9em;
	display: block;
	padding:10px 15px;
	margin-top:-22;
	font-family: 'ambleregular';
	background:#CD1F25;
	color: #FFF;
	text-decoration: none;
	outline: 0;
	-webkit-transition: all 0.5s ease-in-out;
	-moz-transition: all 0.5s ease-in-out;
	-o-transition: all 0.5s ease-in-out;
	transition: all 0.5s ease-in-out;
}
.add-cart h4 a:hover{
	  text-shadow: 0px 0px 1px #000;
	  background:#0000FF;
}

.span_1_of_4 {
	width: 20.5%;
	padding:1.5% 1.5% 0 0;
	border-left:1px solid #CECECE;
}
.span_1_of_4  h4 {
	color:#4F4F4F;
	margin-bottom: .5em;
	font-size: 1.2em;
	line-height: 1.2;
	font-family: 'ambleregular';
	font-weight: normal;
	margin-top: 0px;
	letter-spacing: -1px;
	text-transform: uppercase;
	border-bottom: 1px solid #CECECE;
	padding-bottom: 0.5em;
	padding-left:20px;
}
.span_1_of_4 ul{
	padding-left:20px;
}
.span_1_of_4  li a {
	font-size: 0.8125em;
	padding: 0.4em 0;
	color:#2A5C86;
	font-family: 'ambleregular';
	display: block;
}
.span_1_of_4  li span{
	font-size:1em;
	font-family: 'ambleregular';
	color:#2A5C86;
	cursor:pointer;
	margin:10px 0;
	display:block;
}
.span_1_of_4  li a:hover, .span_1_of_4  li span:hover {
	color:#DD0F0E;
}

.footer {
	position: relative;
	background: #FCFCFC;
    border-top: 1px solid #CECECE;
    margin:20px auto;
}
.section {
	clear: both;
	padding: 0px;
	margin: 0px;
}
.group:before, .group:after {
	content: "";
	display: table;
}
.group:after {
	clear: both;
}
.group {
	zoom: 1;
}
.col_1_of_4 {
	display: block;
	float: left;
	margin:0% 0 1% 3.6%;
}
.col_1_of_4:first-child {
	margin-left: 0;
}

.span_2_of_3 {
	width: 63.1%;
	padding: 1.5%;
}

.span_1_of_3 {
	width: 29.2%;
	padding: 1.5%;
}
.span_2_of_3  h2, .span_1_of_3  h2 {
	margin-bottom: 0.5em;
	line-height: 1.2;
	font-family: 'ambleregular';
	font-weight: normal;
	margin-top: 0px;
}
.contact-form {
	position: relative;
	padding-bottom: 30px;
}
.contact-form div {
	padding: 5px 0;
}
.contact-form span {
	display: block;
	font-size: 0.8125em;
	color: #757575;
	padding-bottom: 5px;
	font-family: verdana, arial, helvetica, helve, sans-serif;
}
.contact-form input[type="text"], .contact-form textarea {
	padding: 8px;
	display: block;
	width:98%;
	background:none;
	border:1px solid #CACACA;
	outline: none;
	color: #464646;
	font-size:1em;
	font-weight:bold;
	font-family: Arial, Helvetica, sans-serif;
	-webkit-appearance: none;
}
.contact-form textarea {
	resize: none;
	height: 120px;
}
.contact-form input[type="submit"] {
	font-size:1em;
	padding:10px 15px;
	font-family: 'ambleregular';
	background:#CD1F25;
	color: #FFF;
	border:none;
	text-decoration: none;
	outline: 0;
	cursor:pointer;
	-webkit-transition: all 0.5s ease-in-out;
	-moz-transition: all 0.5s ease-in-out;
	-o-transition: all 0.5s ease-in-out;
	transition: all 0.5s ease-in-out;
	position: absolute;
	right: 0;
}
.contact-form input[type="submit"]:hover {
	text-shadow: 0px 0px 1px #000;
	background: #292929;
}

.company_address p {
	font-size: 0.8125em;
	color: #757575;
	padding: 0.2em 0;
	font-family: Arial, Helvetica, sans-serif;
}
.company_address p span {
	text-decoration: underline;
	color: #444;
	cursor: pointer;
}
.map {
	border: 1px solid #C7C7C7;
	margin-bottom: 15px;
}
.social-icons {
	padding-top: 8%;
}
.social-icons li {
	width: 30px;
	height: 30px;
	padding: 0px 0 0 5px;
	margin: 0;
	display: inline-block;
	cursor: pointer;
}
.copy_right {
	text-align: center;
	border-top: 1px solid #EEE;
	padding: 10px 0;
	font-family:Verdana, Geneva, Arial, Helvetica, sans-serif;
}
.copy_right p {
	font-size:0.823em;
	color: #747474;
}
.copy_right p a {
	color:#DD0F0E;
	font-family: 'ambleregular';
	text-decoration: underline;
}
.copy_right p a:hover {
	color:#222;
	text-decoration: none;
}



/*  About  ============================================================================= */
.col_1_of_3 {
	display: block;
	float: left;
	margin: 0% 0 0% 1.6%;
}
.col_1_of_3:first-child {
	margin-left: 0;
}
.span_1_of_3 {
	width: 29.2%;
	padding: 1.5%;
}
.span_1_of_3 img {
	max-width: 100%;
}
.span_1_of_3  h3 {
	color: #383838;
	margin-bottom: 0.5em;
	font-size: 1.5em;
	line-height: 1.2;
	font-family: 'ambleregular';
	font-weight: normal;
	margin-top: 0px;
	text-transform: uppercase;
 }
.span_1_of_3  p {
	font-size: 0.8125em;
	padding: 0.5em 0;
	color:#727272;
	line-height: 1.8em;
	font-family: Arial, Helvetica, sans-serif;
}
.year {
	float: left;
	width:50px;
}
.year p {
	color: #E4292F;
	font-size: 0.95em;
}
.span_1_of_3  p.history {
	float: left;
	width: 85%;
	font-size: 0.8125em;
	color:#727272;
	line-height: 1.8em;
}
.span_1_of_3 .list li a {
	font-size: 0.82em;
	padding:7px 15px;
	color: #E4292F;
	background: url(../images/drop_arrow.png) no-repeat 0px 10px;
	display: block;
	font-family:Verdana, Geneva, Arial, Helvetica, sans-serif;
}
.span_1_of_3 .list li a:hover {
	text-decoration:underline;
}
/*end of about page

*/
/*  Preview  ============================================================================= */

.cont-desc {
	display: block;
	float: left;
	clear: both;
}
.rightsidebar {
	display: block;
	float: left;
	margin: 0% 0 0% 1.6%;
}
.cont-desc:first-child {
	margin-left: 0;
}
.desc {
	display: block;
	float: left;
	margin: 0% 0 0% 2.6%;
}
.product-details{
	margin:30px 0;
}
.span_1_of_2 {
	width: 67.1%;
	padding: 1.5%;
}
.images_3_of_2 {
	width: 44.2%;
	float: left;
	text-align: center;
}
.span_3_of_2 {
	width: 53.2%;
}
.span_3_of_1 {
	width: 25.2%;
	padding: 1.5%;
}
.images_3_of_2  img {
	max-width: 100%;
}
.span_3_of_2  h2 {
	font-family: 'ambleregular';
	font-size: 1.1em;
	color:#CD1F25;
	font-weight: normal;
	margin-top: 0px;
	text-transform: uppercase;
}
.span_3_of_2  p{
	font-size: 0.8125em;
	padding: 0.3em 0;
	color: #969696;
	line-height: 1.6em;
	font-family: verdana, arial, helvetica, helve, sans-serif;
}
.price p {
	font-size: 0.8125em;
	padding:20px 0;
	color: #666;
	vertical-align: top;
}
.price p span {
	font-size:3em;
	font-family: 'ambleregular';
	color:#CD1F25;;
}
.available p {
	font-size: 0.9em;
	color: #333;
	font-weight: bold;
	padding-bottom: 10px;
}
.available li {
	display: inline;
	font-size: 0.8125em;
	padding: 1.5% 2%;
	color: #353535;
}
.available li select {
	display: inline;
	font-size: 1em;
	color: #333;
	margin-left: 3px;
}
.share-desc{
	margin-bottom:15px;
}
.share{
	float:left;
}
.share p {
	padding-top: 10px;
	font-size: 0.9em;
	color: #333;
	font-weight: bold;
}
.share li {
	display: inline-block;
	margin: 5px 6px;
	background:#222;
	border-radius:5px;
}
.share li img {
	vertical-align:middle; 
}
.wish-list{
	padding:15px 0;
	border-bottom: 1px solid #E6E6E6;
	border-top: 1px solid #E6E6E6;
}
.wish-list li{
	display:inline-block;
	margin-right:45px;
}
.wish-list li a{
	color: #383838;
	font-size:1em;
	font-family: 'ambleregular';
	padding-left:22px;
	text-decoration: underline;
}
.wish-list li a:hover {
	color: #E4292F;
}
.wish-list li.wish{
	background:url(../images/wishlist.png) no-repeat 0;
}
.wish-list li.compare{
	background:url(../images/compare.png) no-repeat 0;
}
.product-desc, .product-tags {
	clear: both;
	padding-top: 20px;
}
.product-desc p {
	font-size: 0.8em;
	padding:5px 0;
	color: #969696;
	line-height: 1.8em;
	font-family: verdana, arial, helvetica, helve, sans-serif;
}
.product-desc p span{
	font-weight:bold;
}
.product-tags h4 {
	padding: 10px 0;
	font-size: 0.9em;
	color: #333;
	font-weight: bold;
}
.input-box {
	background: url(../images/tag.png) no-repeat 0 8px;
	padding-left: 35px;
}
.input-box input[type="text"] {
	padding: 8px;
	display: block;
	width: 95%;
	background: #fcfcfc;
	border: none;
	outline: none;
	color: #464646;
	font-size: 0.8125em;
	font-family: Arial, Helvetica, sans-serif;
	box-shadow: inset 0px 0px 3px #999;
	-webkit-box-shadow: inset 0px 0px 3px #999;
	-moz-box-shadow: inset 0px 0px 3px #999;
	-o-box-shadow: inset 0px 0px 3px #999;
	-webkit-appearance: none;
}
.product-tags .button {
	margin-top: 15px;
	line-height: 3em;
}
.span_3_of_2 .button {
	float: right;
	margin-top: 1%;
	line-height: 2em;
}
.product-tags .button a {
	font-size:1em;
	padding:10px 15px;
	font-family: 'ambleregular';
	background:#CD1F25;
	color: #FFF;
	text-decoration: none;
	outline: 0;
	-webkit-transition: all 0.5s ease-in-out;
	-moz-transition: all 0.5s ease-in-out;
	-o-transition: all 0.5s ease-in-out;
	transition: all 0.5s ease-in-out;
}
.span_3_of_2 .button a:hover, .product-tags .button a:hover {
	text-shadow: 0px 0px 1px #000;
    background: #292929;
}
.product-tags p{
	font-size: 0.85em;
	padding:5px  0;
	color: #969696;
	line-height: 1.8em;
}


/****** News **************************/
.image {
	clear: both;
	padding: 0px;
	margin: 0px;
	padding:1.5%;
}
.group:before,
.group:after {
    content:"";
    display:table;
}
.group:after {
    clear:both;
}
.group {
    zoom:1;
}
.grid {
	display: block;
	float:left;
	margin: 0% 0 0% 1.6%;
}
.grid:first-child { margin-left: 0; }

.images_3_of_1 {
	width:30.2%;
}
.news_desc{
	width: 68.1%;
}
.images_3_of_1  img {
	max-width:100%;
	display:block;
	border:1px solid #E0E0E0;
}
.news_desc  h3{
	color:#B81D22;
	margin-bottom:0.3em;
	font-size:1.2em;
	text-transform:uppercase;
	font-family: 'ambleregular';
}
.news_desc h4 span a{
	text-decoration:underline;
}
.news_desc h4 span a:hover{
	color:#B81D22;
	text-decoration:none;
}
.news_desc h4 ,.news_desc h4 a{
	font-size:0.95em;
	color:#303030;;
	padding-bottom:5px;
}
.news_desc  p{
	font-size:0.85em;
	padding:5px 0;
	color:#747474;
	line-height: 1.8em;
}
.news_desc p a{
	font-size:1em;
	color:#B81D22;
}
/*** Page numbers ***/
.content-pagenation{
	padding:35px 0;
	text-align:right;
}
.content-pagenation li {
	display: inline-block;
}
.content-pagenation li a {
	color:#303030;
	font-size: 0.8em;
	font-family:Verdana, Geneva, Arial, Helvetica, sans-serif;
	background: #FFF;
	padding: 10px 12px;
	box-shadow: 0px 0px 5px #ADADAD;
	-webkit-box-shadow: 0px 0px 2px #ADADAD;
	-moz-box-shadow: 0px 0px 2px #ADADAD;
	-o-box-shadow: 0px 0px 2px #ADADAD;
	-webkit-transition: all .5s;
	-moz-transition: all .5s;
	-o-transition: all .5s;
	-ms-transition: all .5s;
	transition: all .5s;
}
.content-pagenation li a:hover,.content-pagenation li.active a{
	background:#303030;
	color:#FFF;
}


/*photoes big*/
                #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */


/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}

</style>
</head>
<body>
<div class="wrap">
	<div class="header">
    	<div class="headertop_desc">
        	<div class="call">
            	<p>
                <?php
						include('connection.php');
						$use=$_SESSION['user'];
						$select="SELECT * FROM `customers` where name='$use'";
						$res=mysql_query($select,$con);
						$r=mysql_fetch_array($res);
						
							?><b>Need help?</b> call us <font color="#EE0000">+91-9033477202</font><?php
						
				?>
                    </p>
            </div>
        	<div class="account_desc">
				<ul><li>
                	<?php if(!$_SESSION['user']) {?>
					<a href="login.php"><font size="+1">Login/signup</font></a>
                    <?php }
					else {?>
                    <div class="dropdown" style="margin-top:-30px">
              <button class="dropbtn" style="height:70px; background-color:#FFF"><img src="Admin/Users/<?php echo $r['photo']?>" height="50px" width="50px" style="border-radius:50%" alt="">&nbsp;&nbsp;&nbsp;&nbsp;<font color="#CC3300" size="+2" ><?php echo $_SESSION['user'];?></font></button>
  <div class="dropdown-content">
    <a href="index.php?page=profile"><p><font size="+1">Profile</font></p></a>
    <?php if($_SESSION['user'] && $r['Mode']=='admin')
							{ ?><a href="Admin"><p><font size="+1">Admin panel</font></p><?php } ?>
    <a href="index.php?page=logout"><p><font size="+1">LogOut</font></p></a>
  </div>
</div>
					<?php 
					} ?> </li>
				</ul>
			</div>
        </div>
        <div class="clear"></div>
		</div>
		<br>
		<div class="header_top">
			<div style="margin top:-10px"  class="logo">
				<a href="index.php"><img src="images/logo.png" height="70px" width="250px" alt="" /></a>
			</div>
			  <div style="float:right; margin-top:-25px">
			  	   <a href="index.php?page=wishlist"><img style="height: 30px; width: 30px" src="data:image/jpeg;base64,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"></a>
                   <a href="index.php?page=cart"><img style="height: 30px; width: 30px" src="http://www.freepngimg.com/download/cart/10-2-cart-png-pic.png"></a>
			  </div>
			  <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});

		</script>
	 <div class="clear"></div>
  </div>
  <br>
	<div class="header_bottom">
	     	<div class="clear"></div>
	     </div>	
	
</div>