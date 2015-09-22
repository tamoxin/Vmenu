<!DOCTYPE html>
<html>


<head>
<title>Vmenu_Equipo4</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
	function hideURLbar(){ window.scrollTo(0,1); } 
</script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Enriqueta:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'><script src="js/jquery-1.11.0.min.js"></script>

<script src="js/jquery.min.js"> </script>

<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>

<!---- start-smoth-scrolling---->
</head>



<body>
	<!----start-header---->
	<div class="header" id="home">
		<div class="container">
			<div class="logo">
				<a href="index.html"><img src="images/logo.png" alt=""></a>
			</div>
			<div class="navigation">
			 <span class="menu"></span> 
				<ul class="navig">
					<li><a href="index.php">Home</a><span> </span></li>
					<li><a href="desayunos.php">Desayunos</a><span> </span></li>
					<li><a href="comidasycenas.php">Comidas y Cenas</a><span> </span></li>
					<li><a href="postres.php">Postres</a><span> </span></li>
					<li><a class="active" href="bebidas.php">Bebidas</a><span> </span></li>
				</ul>
			</div>
				 <!-- script-for-menu -->
		 <script>
				$("span.menu").click(function(){
					$(" ul.navig").slideToggle("slow" , function(){
					});
				});
		 </script>
		 <!-- script-for-menu -->
		</div>
	</div>	
	<!----end-header---->
	<!--banner-starts-->
	<div class="bannerBebidas" id="home">
	</div>	
	<!--banner-ends--> 
	<!--FlexSlider-->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
			<!--End-slider-script-->
	<!--offer-starts-->
	<div class="offer">
		<div class="container">
			<div class="offer-top heading">
				<h4>Bebidas</h4>
			</div>
			<div class="offer-bottom">
				<div class="col-md-3 offer-left">
					<a href="single.html"><img src="images/o-1.jpg" alt="" />
					<h6>Orange Salad</h6></a>
					<h4><a href="single.html">Quisque sed neque</a></h4>
					<p>Maecenas interdum augue eget elit interdum, vitae elementum diam molestie. Nulla facilisi.</p>
					<div class="o-btn">
						<a href="single.html">Read More</a>
					</div>
				</div>
				<div class="col-md-3 offer-left">
					<a href="single.html"><img src="images/o-2.jpg" alt="" />
					<h6>Mixed Salad</h6></a>
					<h4><a href="single.html">Donec mattis nunc</a></h4>
					<p>Maecenas interdum augue eget elit interdum, vitae elementum diam molestie. Nulla facilisi.</p>
					<div class="o-btn">
						<a href="single.html">Read More</a>
					</div>
				</div>
				<div class="col-md-3 offer-left">
					<a href="single.html"><img src="images/o-3.jpg" alt="" />
					<h6>Strawberry Salad</h6></a>
					<h4><a href="single.html">Maecenas non risus</a></h4>
					<p>Maecenas interdum augue eget elit interdum, vitae elementum diam molestie. Nulla facilisi.</p>
					<div class="o-btn">
						<a href="single.html">Read More</a>
					</div>
				</div>
				<div class="col-md-3 offer-left">
					<a href="single.html"><img src="images/o-5.jpg" alt="" />
					<h6>Grape Salad</h6></a>
					<h4><a href="single.html">Nullam vitae nisl</a></h4>
					<p>Maecenas interdum augue eget elit interdum, vitae elementum diam molestie. Nulla facilisi.</p>
					<div class="o-btn">
						<a href="single.html">Read More</a>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--offer-ends--> 
	<!--nature-starts--> 
	<div class="nature">
			<div class="nature-top">
				<h3>Maecenas ornare lobortis</h3>
				<p>Fruit salad is a dish consisting of various kinds of fruit, sometimes served in a liquid, either in their own juices or a syrup. When served as an appetizer or as a dessert, a fruit salad is sometimes known as a fruit cocktail or fruit cup. In different forms fruit salad can be served as an appetizer, a side-salad, or a dessert.</p>
			</div>
		</div>
	<!--nature-ends--> 
	<!--footer-->
		<div class="footer">
			<div class="footer-grids">
				<div class="container">
					<div class="col-md-3 footer-grid">
						<h4>Services</h4>
						<ul>
							<li><a href="#">Contact Customer Service</a></li>
							<li><a href="#">Free Delivery</a></li>
							<li><a href="#">View your Wishlist</a></li>
							<li><a href="#">Ring Size Guide</a></li>
							<li><a href="#">Returns</a></li>
						</ul>
					</div>
					<div class="col-md-3 footer-grid">
							<h4>Information</h4>
						<ul>
							<li><a href="#">Gift certificates</a></li>
							<li><a href="#">Jewellery care guide</a></li>
							<li><a href="#">International customers</a></li>
							<li><a href="#">Wholesale enquires</a></li>
							<li><a href="#">Returns</a></li>
						</ul>
					</div>
					<div class="col-md-3 footer-grid">
						<h4>More details</h4>
						<ul>
							<li><a href="#">About us</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Terms & Condition</a></li>
							<li><a href="#">Secure payment</a></li>
							<li><a href="#">Site map</a></li>
						</ul>
					</div>
					<div class="col-md-3 footer-grid contact-grid">
						<h4>Contact us</h4>
						<ul>
							<li><span class="c-icon"> </span>Newyork Still Road.</li>
							<li><span class="c-icon1"> </span><a href="mailto:info@example.com">mail@example.com</a></li>
							<li><span class="c-icon2"> </span>756 gt globel Place</li>
						</ul>
						<ul class="social-icons">
							<li><a href="#"><span class="facebook"> </span></a></li>
							<li><a href="#"><span class="twitter"> </span></a></li>
							<li><a href="#"><span class="thumb"> </span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
			<div class="copy">
		              <p>© 2015 Holiday inn. All Rights Reserved | Design by Equipo 4 <a href="http://itesm.com.mx/">ITESM</a> </p>
		            </div>
	<!--/footer-->
		<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!--footer-ends--> 
</body>
</html>


<!-- 
Fruit_Salad Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design -->