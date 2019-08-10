	<?php require_once("db.php");
 session_start();
?>
<?php
   if (!isset($_SESSION['Email']))
     {
      echo "<script>alert ('You Need to login first.')</script>";
      echo "<script>window.open('../login.html', '_self')</script>";
      exit();
    }
?>
<html>
	<head>
	<title>Rentgames</title>

	
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	  <script type="text/javascript">

    $(document).ready(function(){

      $.ajax({
        type:'post',
        url:'store_items.php',
        data:{
          total_cart_items:"totalitems"
        },
        success:function(response) {
          document.getElementById("total_items").value=response;
        }
      });

    });

    function cart(id)
    {
	  var ele=document.getElementById(id);
	  var img_src=ele.getElementsByTagName("img")[0].src;
	  var name=document.getElementById(id+"_name").value;
	  var price=document.getElementById(id+"_price").value;
	
	  $.ajax({
        type:'post',
        url:'store_items.php',
        data:{
          item_src:img_src,
          item_name:name,
          item_price:price
        },
        success:function(response) {
          document.getElementById("total_items").value=response;
		  $('.cap_status').html("Added to Cart").fadeIn('slow').delay(2000).fadeOut('slow');
        }
      });
	
    }

    function show_cart()
    {
      $.ajax({
      type:'post',
      url:'store_items.php',
      data:{
        showcart:"cart"
      },
      success:function(response) {
        document.getElementById("mycart").innerHTML=response;
        $("#mycart").slideToggle();
      }
     });

    }
	
</script>


	<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>

	<body>
		

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
		  <a class="navbar-brand brand-custom" href="#"><img class="img-responsive" src="../images/logo.png" alt="brand"></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="cart/index.php/product">Cart</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="../feedback.html">Feedback</a>
		      </li>
		       <li class="nav-item">
		        <a class="nav-link" href="../index.html#products">About</a>
		      </li>
		    </ul>
		    <p class="afford-text"> Making Gaming Affordable</p>

	    	<ul class="navbar-nav ml-auto">
	      		<li class="nav-item faq">
	      			<a href="cart/index.php/product">
	      				<i class="fas fa-shopping-cart" style="color: white;margin-top: 10px;"></i>
					</a>
		   			 
	      		</li>
	      		<li class="nav-item faq no-color">
	        		<a class="navbar-brand"><i class="fas fa-user"></i><?php echo $_SESSION['Name']; ?></a>
	      		</li>
	      		<li class="nav-item faq no-color">
	      			<a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a>
	      		</li>
	      	</ul>
		    </nav>
		  </div>
		  </div>
		</nav>


		
<div id="mycart"></div>
<div class="cap_status"></div>




				<div class="main">
			<img class="img-responsive bgImage" src="../images/pubg-banner.jpg" alt="PUBG IMAGE">

			<div class="container">

				<div class="text-on-image">
					<h1>RENT GAMES</h1>
					<ul class="header-text">
						<li><i class="fas fa-check"></i>100% Game Availability </li>
						<li><i class="fas fa-check"></i>Unlimited Swaps. No Hidden charges</li>
						<li><i class="fas fa-check"></i> Games available on Release</li>
						<li><i class="fas fa-check"></i> Service all over India</li>
						<li><i class="fas fa-check"></i>Choice of over 4000 Games</li>
					</ul>

					<a href="#" class="free-link" target="_blank">Select your plan   <i class="fa fa-arrow-right"></i></a>			
				</div>	
			</div>
		</div>



	<section class="products">


			
				<h1 class="text-center heading">PRODUCTS WE HAVE</h1>
					<div class="row container-fluid">

				
					<div class="col-xs-12 col-sm-6 text-center">
						<a href="cart/index.php/product" class="img">
						
							<img class="img-thumbnail img-responsive center" src="../images/games.jpg" alt="ps4 and game rent">
						</a>
						<div class="rent-games">
						<a href="cart/index.php/product">
							<button type="button" class="btn btn-info buy-rent-link">Games</button>
						</a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 text-center">
						<a href="cart/index.php/product" class="img">
							<img class="img-thumbnail img-responsive center" src="../images/console.jpg" alt="ps4 and game rent">
						</a>
						<div class="rent-games">
							<a href="cart/index.php/product">
							<button type="button" class="btn btn-info buy-rent-link">Console</button>
						</a>
						</div>
						
					</div>

					<div class="col-sm-12 text-center">
						<a href="cart/index.php/product" class="img">

						<img class="img-thumbnail img-responsive center" src="../images/accessories.jpg" alt="ps4 and game rent">
					</a>
						<div class="rent-games">
							<a href="cart/index.php/product">
							<button type="button" class="btn btn-info buy-rent-link">Accessories</button>
						</a>
						</div>

					</div>

				</div>

		</section>

		<footer class="footer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<p>Contact Us</p>
						<ul>
							<li>
							<address>RentGames.in<br>
								No 90, 2nd floor, Opp to Kfc<br>
								Mosque road, Frazer town<br>
								Bangalore 560005</address>
							</li>
							<li>Call us 24/7 at <a class="hidden-lg hidden-md" href="tel:8884441666">8884441666 </a></li>
								<li>Email: <a href="mailto:contact@rentgames.in"> contact@rentgames.in </a></li>
							
						</ul>
					</div>

					<div class="col-xs-12 col-sm-4">
						<p>About Rentgames</p>
						<ul>
							<li><a href="https://docs.google.com/forms/d/e/1FAIpQLScmZXBP_ilSyJt5--dDx_2K2NB5pupvBTZYsBE6rJpfTxVfug/viewform" target="_blank">Sell Your Game</a></li>
							<li><a href="http://www.gamesngadget.com" target="_blank">Buy Your Game</a></li>
							<li><a href="http://www.gamesngadget.com" target="_blank">Exchange PS3 To PS4</a></li>
							<li><a href="http://funbreak.in/">Rent Your Game</a></li>
						</ul>
					</div>

					<div class="col-xs-12 col-sm-4">
						<p>Find Us</p>
						<ul>
							<li>
							<div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=srm&t=k&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{text-align:right;height:200px;width:300px;}.gmap_canvas {overflow:hidden;background:none!important;height:200px;width:300px;}</style></div>
							</li>
						</ul>
					</div>
				</div>
			</div>

		</footer>


	</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</html>