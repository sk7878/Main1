<?php require "dbconnect.php"?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Sun Architects | Login</title>

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
							<li class="menu-item"><a href="project.html">our Projects</a></li>
                            <li class="menu-item"><a href="contact.php">Contact</a></li>
							<li class="menu-item current-menu-item"><a href="login.html">Login</a></li>
                            <li class="menu-item"><a href="users.php">Users</a></li>
                            
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

                            <div class="row">
                                <div class="container">
                                    <h2>Globally top viewed services</h2>
                                    <table>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                        </tr>
                                    <?php
                                    $sql = "SELECT * FROM services ORDER BY hits DESC";
                                    $results = $conn->query($sql);
                                    for($i=0; $i<5; $i++){
                                        $row = $results->fetch_assoc();
                                        echo "<tr>";
                                        echo "<td>".$row["name"]."</td>";
                                        echo "<td>".$row["description"]."</td>";
                                        echo "</tr>";
                                    }
                                    
                                    ?>
                                    </table>
                                    
                                </div>
								
								<br>
								<br>
								<br>

                                <div class="container">
                                    <h2>Your top viewed</h2>
                                    <?php
                                        if(isset($_COOKIE["lastids"])){
                                            echo "<table>";
                                            echo "<tr>";
                                            echo "<th>Name</th>";
                                            echo "<th>Description</th>";
                                            echo "</tr>";        
                                        $heatmap=array();
                                        foreach (explode(",",$_COOKIE["lastids"]) as $id){
                                            if(isset($heatmap[$id])){
                                                $heatmap[$id] = $heatmap[$id] + 1;
                                            }
                                            else {
                                                $heatmap[$id] = 1;
                                            }
                                        }
                                        for($i=0;$i<5;$i++){
                                        $max=0;
                                        $maxid=0;
                                        foreach ($heatmap as $key => $value){
                                            if($value>$max){
                                                $max = $value;
                                                $maxid = $key;
                                            }
                                        }
                                        $result = $conn->query("SELECT * FROM services where id = ".$maxid.";");
                                        $row = $result->fetch_assoc();
                                        echo "<tr>";
                                        echo "<td>".$row["name"]."</td>";
                                        echo "<td>".$row["description"]."</td>";
                                        echo "</tr>";
                                        unset($heatmap[$maxid]);    
                                        }
                                        
                                        }
                                        else{
                                            echo "You have not viewed any services";
                                            
                                        }
                                        echo "</table>";
                                    ?>
                                </div>

                                <br>
								<br>
								<br>

                                <div class="container">
                                    <h2>Your Last 5 viewed</h2>

                                                
                                    <?php
                                        if(isset($_COOKIE["lastids"])){
                                            echo "<table>";
                                            echo "<tr>";
                                            echo "<th>Name</th>";
                                            echo "<th>Description</th>";
                                            echo "</tr>"; 
                                            $hits = explode(",",$_COOKIE["lastids"]);
                                            $viewed = array();
                                            for($i=0; $i<5 and $i<sizeof($hits); $i++){
                                                $result = $conn->query("SELECT * FROM services where id = ".$hits[$i].";");
                                                $row = $result->fetch_assoc();
                                                echo "<tr>";
                                                echo "<td>".$row["name"]."</td>";
                                                echo "<td>".$row["description"]."</td>";
                                                echo "</tr>";
                                                array_push($viewed,$hits[$i]);
                                            }
                                            echo "</table>";
                                        }
                                        else{
                                            echo "You have not viewed any services";
                                        }
                                    ?>
                                </div>

                                <br>
								<br>
								<br>


								<a href="#" class="email"><span class="contact-icon"><img src="images/icon-envelope.png" class="icon"></span> contact@sunarchitects.com</a>
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