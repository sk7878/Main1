<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Sun Architects | User</title>

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
							<small class="site-description">You dream, we build!</small>
						</div>
					</a> <!-- #branding -->

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="index.html">Home</a></li>
							<li class="menu-item"><a href="news.html">News</a></li>
							<li class="menu-item"><a href="about.html">About</a></li>
							<li class="menu-item"><a href="services.html">Services</a></li>
							<li class="menu-item"><a href="project.html">Our Projects</a></li>
                            <li class="menu-item"><a href="contact.php">Contact</a></li>
                            <li class="menu-item"><a href="login.php">Login</a></li>
							<li class="menu-item current-menu-item"><a href="users.php">Users</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
				</div>
			</div> <!-- .site-header -->


            <main class="main-content">
				
				<div class="page">
					<div class="container">

						<div class="row">
							<div class="col-md-8">


                                <div class="contact-form">
									<h2 class="section-title">User List</h2>
									<p>Existing users</p>

                                    <?php require "dbconnect.php"?>

									<?php 
                                    $query = "SELECT * FROM users";

                                    echo '<table border="5" cellspacing="5" cellpadding="5"> 
                                        <tr> 
                                            <td> First Name</font> </td> 
                                            <td> Last Name</font> </td> 
                                            <td> E mail</font> </td> 
                                            <td> Home Phone</font> </td> 
                                            <td> Cell Phone</font> </td> 
                                        </tr>';

                                    if ($result = $conn->query($query)) {
                                        while ($row = $result->fetch_assoc()) {
                                            $field1name = $row["FirstName"];
                                            $field2name = $row["LastName"];
                                            $field3name = $row["Email"];
                                            $field4name = $row["HomePhone"];
                                            $field5name = $row["CellPhone"]; 

                                            echo '<tr> 
                                                    <td>'.$field1name.'</td> 
                                                    <td>'.$field2name.'</td> 
                                                    <td>'.$field3name.'</td> 
                                                    <td>'.$field4name.'</td> 
                                                    <td>'.$field5name.'</td> 
                                                </tr>';
                                        }
                                        $result->free();
                                    } 
                                    ?>
								</div>

                                <div class="contact-form">
									<h2 class="section-title">Search User</h2>
									<p>Enter user detail to search</p>


                                    <form action="main/searchuser.php" method="post">
                                        <input type="text" name="name" placeholder="Name">
                                        <h3>OR</h3>
                                        <input type="text" name="email" placeholder="Email">
                                        <h3>OR</h3>
                                        <input type="text" name="phone" placeholder="Phone">
                                        <p class="text-right">
											<button type="submit" name="search" class="login loginmodal-submit" value="Search">Search</button>
										</p>
                                    </form>

									
                                    <?php
                                    if(isset($_POST["search"])){
                                        $sql = "SELECT * FROM users WHERE";
                                        if(isset($_POST["name"]) and $_POST["name"]!=""){
                                            $sql=$sql." firstname LIKE '%".$_POST["name"]."%' OR lastname LIKE '%".$_POST["name"]."%'";
                                        }
                                        else{ 
                                            $sql=$sql." firstname = '' OR lastname= ''";
                                        }
                                        if(isset($_POST["email"]) and $_POST["email"] != "" ){
                                            $sql=$sql."OR email LIKE '%".$_POST["email"]."%'";
                                        }
                                        if(isset($_POST["phone"]) and $_POST["phone"] != ""){
                                            $sql=$sql."OR homephone LIKE'%".$_POST["phone"]."%' OR cellphone LIKE '%".$_POST["phone"]."%';";
                                        }
                                        
                                        $result = $conn->query($sql);

                                        echo '<table border="5" cellspacing="5" cellpadding="5"> 
                                        <tr> 
                                            <td> First Name</font> </td> 
                                            <td> Last Name</font> </td> 
                                            <td> E mail</font> </td> 
                                            <td> Home Phone</font> </td> 
                                            <td> Cell Phone</font> </td> 
                                        </tr>';

                                        if ($result) {
                                            while ($row = $result->fetch_assoc()) {
                                                $field1name = $row["FirstName"];
                                                $field2name = $row["LastName"];
                                                $field3name = $row["Email"];
                                                $field4name = $row["HomePhone"];
                                                $field5name = $row["CellPhone"]; 

                                                echo '<tr> 
                                                        <td>'.$field1name.'</td> 
                                                        <td>'.$field2name.'</td> 
                                                        <td>'.$field3name.'</td> 
                                                        <td>'.$field4name.'</td> 
                                                        <td>'.$field5name.'</td> 
                                                    </tr>';
                                            }
                                            $result->free();
                                        } 
                                        }
                                    ?>

								</div>

								<br> <a href="dbconnect.php">Connect DB</a> <br>
								
								<a href="#" class="email"><span class="contact-icon"><img src="images/icon-envelope.png" class="icon"></span> contact@sunarchitects.com</a>
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

						<a href="#" class="phone">

						<?php
						if ($file = fopen("txt/contact_info.txt", "r")) {
							while(!feof($file)) {
								$line = fgets($file);
								echo "$line";
								break;
							}
							fclose($file);
						}
						?>

						</a>
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

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>