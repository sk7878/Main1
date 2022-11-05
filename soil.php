<!DOCTYPE html>

<?php require "dbconnect.php"?>
<?php
    parse_str($_SERVER['QUERY_STRING']);
    $result = $conn->query("SELECT * FROM services where id = 2;");
    $prod = $result -> fetch_assoc();
    $hits = $prod["hits"] + 1;
    $conn->query("UPDATE services SET hits = ".$hits." WHERE id = 2;"); 
    $conn->close();
?>
<?php
    if(isset($_COOKIE["lastids"])){
        if(explode(",",$_COOKIE["lastids"])[0]!= 2){
            setcookie("lastids", '2'.",".$_COOKIE["lastids"],time() + (86400 * 30),'/',"esp.sujith.live"); 
        }
        
    }
    else{
        setcookie("lastids", '2', time() + (86400 * 30),'/',"esp.sujith.live");
    }
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Sun Architects | Services</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body>
		
		<div id="site-content">
			<div class="site-header">
				<div class="container">
					<a href="index.html" id="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-text">
							<h1 class="site-title">Sun Architects</h1>
							<small class="site-description">You dream, we build</small>
						</div>
					</a> <!-- #branding -->

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="../index.html">Home</a></li>
							<li class="menu-item"><a href="../news.html">News</a></li>
							<li class="menu-item"><a href="../about.html">About</a></li>
							<li class="menu-item current-menu-item"><a href="../services.html">Services</a></li>
                            <li class="menu-item"><a href="../project.html">Our Projects</a></li>
							<li class="menu-item"><a href="../contact.php">Contact</a></li>
							<li class="menu-item"><a href="../login.php">Login</a></li>
							<li class="menu-item"><a href="users.php">Users</a></li>
							
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
				</div>
			</div> <!-- .site-header -->

			<main class="main-content">
				
				<div class="page">
					<div class="container">
						<a href="services.html" class="button-back"><img src="../images/arrow-back.png" alt="" class="icon">Back to the services</a>

						<div class="row">
							<div class="col-md-5">
								<div class="project-images">
									<img src="../images/soil1.jpg" alt="">

									<div class="thumbs">
										<a href="#"><img src="../images/soil2.jpg" alt="#"></a>
										<a href="#"><img src="../images/soil3.jpg" alt="#"></a>
										<a href="#"><img src="../images/soil4.jpg" alt="#"></a>
									</div>
								</div>
							</div>
							<div class="col-md-7">
								<div class="project-detail">
									<h2 class="project-title">Survey & soil investigations</h2>
									<p>Describing soil and contour types, and interpreting useful for land management and ecosystem studies.</p>

									<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur vel.</p>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->

			<footer class="site-footer">
				<div class="container">
					<div class="pull-left">

						<address>
							<strong>Sun Architects</strong>
							<p>532 Avenue Street, San Jose</p>
						</address>

						<a href="#" class="phone">+ 1 800 931 033</a>
					</div> <!-- .pull-left -->
					<div class="pull-right">

						<div class="social-links">

							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-pinterest"></i></a>

						</div>

					</div> <!-- .pull-right -->

					<div class="colophon">Copyright 2014 Sun Architects. Designed by Sujith. All rights reserved.</div>

				</div> <!-- .container -->
			</footer> <!-- .site-footer -->
		</div>

		<script src="../js/jquery-1.11.1.min.js"></script>
		<script src="../js/plugins.js"></script>
		<script src="../js/app.js"></script>
		
	</body>

</html>