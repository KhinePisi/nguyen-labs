<?php
require 'admin/AuthServiceProvider.php';
use Auth\AuthServiceProvider;
require __DIR__.'/vendor/navhelper.php';
use Vendor\NavHelper;
$navhelper = new NavHelper();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Nguyen Labs</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		<link rel="icon" type="image/png" href="images/favicon.ico"/>
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>
	

	<body>
		
		<div class="site-content">
		<header class="site-header" data-bg-image="">
			<p class="container-fluid email">
				<?php 
				$auth = new AuthServiceProvider();
				$email = $auth->get("email");
				print($email);
				?>
			</p>
				<div class="container-fluid">
					<div class="header-bar">
						<a href="index.php" class="branding">
							<img src="images/jaist-logo.jpeg" alt="" class="logo">
							<div class="site-name">
								<h1 class="title-site">Nguyen Labs</h1>
								<small class="site-description">Research in Deep learning and NLP</small>
							</div>
						</a>

						<nav class="main-navigation">
							<button class="menu-toggle"><i class="fa fa-bars"></i></button>
							<ul class="menu">
								<li class="home menu-item <?php $navhelper->check_nav('home')?>"><a href="index.php"><img src="images/home-icon.png" alt="Home"></a></li>
								<li class="menu-item <?php $navhelper->check_nav('research')?>"><a href="research.php">Research</a></li>
								<li class="menu-item <?php $navhelper->check_nav('members')?>"><a href="members.php">Members</a></li>
								<li class="menu-item <?php $navhelper->check_nav('awards')?>"><a href="awards.php">Awards</a></li>
								<li class="menu-item <?php $navhelper->check_nav('papers')?>"><a href="papers.php">Papers</a></li>
								<li class="menu-item <?php $navhelper->check_nav('aicenter')?>" ><a href="aicenter.php">Interpretable AI Center</a></li>
								<li class="menu-item <?php $navhelper->check_nav('contact')?>"><a href="contact.php">Contact</a></li>

							</ul>
						</nav>

						<div class="mobile-navigation"></div>
					</div>
				</div>
			</header>
			<div class="hero">
				<ul class="slides">
					<li data-bg-image="images/jaist.jpeg">
						<div class="container">
							<div class="slide-content">
								<h2 class="slide-title" st>Nguyen Labs</h2>
								<p>Deep Learning, Natural Language Understanding, Legal Text Processing
								</p>
								<a href="about.php" class="button" style="text-shadow:none">See details</a>
							</div>
						</div>
					</li>
				</ul>
			</div>

			<main class="main-content">
				<div class="fullwidth-block">
					<div class="container">
						<div class="row">
							<div class="col-md-3 col-sm-6">
								<div class="feature">
									<svg xmlns="http://www.w3.org/2000/svg" class="feature-image"  enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M7,19c-1.1,0-2,0.9-2,2h14c0-1.1-0.9-2-2-2h-4v-2h3c1.1,0,2-0.9,2-2h-8c-1.66,0-3-1.34-3-3c0-1.09,0.59-2.04,1.46-2.56 C8.17,9.03,8,8.54,8,8c0-0.21,0.04-0.42,0.09-0.62C6.28,8.13,5,9.92,5,12c0,2.76,2.24,5,5,5v2H7z"/><path d="M10.56,5.51C11.91,5.54,13,6.64,13,8c0,0.75-0.33,1.41-0.85,1.87l0.59,1.62l0.94-0.34l0.34,0.94l1.88-0.68l-0.34-0.94 l0.94-0.34L13.76,2.6l-0.94,0.34L12.48,2L10.6,2.68l0.34,0.94L10,3.97L10.56,5.51z"/><circle cx="10.5" cy="8" r="1.5"/></g></g></svg>
									<h2 class="feature-title">Research</h2>
									<p>Laborum et dolorum fuga harum quidem rerum facilis et expedita distinctio nam libero tempore.</p>
									<a href="research.php" class="button">Learn more</a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="feature">
								<svg xmlns="http://www.w3.org/2000/svg" class="feature-image" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M16.5 12c1.38 0 2.49-1.12 2.49-2.5S17.88 7 16.5 7C15.12 7 14 8.12 14 9.5s1.12 2.5 2.5 2.5zM9 11c1.66 0 2.99-1.34 2.99-3S10.66 5 9 5C7.34 5 6 6.34 6 8s1.34 3 3 3zm7.5 3c-1.83 0-5.5.92-5.5 2.75V19h11v-2.25c0-1.83-3.67-2.75-5.5-2.75zM9 13c-2.33 0-7 1.17-7 3.5V19h7v-2.25c0-.85.33-2.34 2.37-3.47C10.5 13.1 9.66 13 9 13z"/></svg>
									<h2 class="feature-title">Members</h2>
									<p>Laborum et dolorum fuga harum quidem rerum facilis et expedita distinctio nam libero tempore.</p>
									<a href="members.php" class="button">Learn more</a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="feature">
								<svg xmlns="http://www.w3.org/2000/svg" class="feature-image" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><rect fill="none" height="24" width="24"/><path d="M19,5h-2V3H7v2H5C3.9,5,3,5.9,3,7v1c0,2.55,1.92,4.63,4.39,4.94c0.63,1.5,1.98,2.63,3.61,2.96V19H7v2h10v-2h-4v-3.1 c1.63-0.33,2.98-1.46,3.61-2.96C19.08,12.63,21,10.55,21,8V7C21,5.9,20.1,5,19,5z M5,8V7h2v3.82C5.84,10.4,5,9.3,5,8z M19,8 c0,1.3-0.84,2.4-2,2.82V7h2V8z"/></svg>
									<h2 class="feature-title">Awards</h2>
									<p>Laborum et dolorum fuga harum quidem rerum facilis et expedita distinctio nam libero tempore.</p>
									<a href="awards.php" class="button">Learn more</a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="feature">
								<svg xmlns="http://www.w3.org/2000/svg" class="feature-image" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M9,4v1.38c-0.83-0.33-1.72-0.5-2.61-0.5c-1.79,0-3.58,0.68-4.95,2.05l3.33,3.33h1.11v1.11c0.86,0.86,1.98,1.31,3.11,1.36 V15H6v3c0,1.1,0.9,2,2,2h10c1.66,0,3-1.34,3-3V4H9z M7.89,10.41V8.26H5.61L4.57,7.22C5.14,7,5.76,6.88,6.39,6.88 c1.34,0,2.59,0.52,3.54,1.46l1.41,1.41l-0.2,0.2c-0.51,0.51-1.19,0.8-1.92,0.8C8.75,10.75,8.29,10.63,7.89,10.41z M19,17 c0,0.55-0.45,1-1,1s-1-0.45-1-1v-2h-6v-2.59c0.57-0.23,1.1-0.57,1.56-1.03l0.2-0.2L15.59,14H17v-1.41l-6-5.97V6h8V17z"/></g></g></svg>
									<h2 class="feature-title">Papers</h2>
									<p>Laborum et dolorum fuga harum quidem rerum facilis et expedita distinctio nam libero tempore.</p>
									<a href="papers.php" class="button">Learn more</a>
								</div>
							</div>
						</div> <!-- .row -->
					</div> <!-- .container -->
				</div> <!-- .fullwidth-block -->

				<div class="fullwidth-block" data-bg-color="#edf2f4">
					<div class="container">
						<h2 class="section-title">Latest News</h2>
						<div class="row">
							<div class="col-md-4">
								<div class="post">
									<figure class="featured-image"><img src="images/news-1.jpg" alt=""></figure>
									<h2 class="entry-title"><a href="">Magni dolores rationale</a></h2>
									<small class="date">2 oct 2014</small>
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium...</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="post">
									<figure class="featured-image"><img src="images/news-2.jpg" alt=""></figure>
									<h2 class="entry-title"><a href="">Perspiciatis unde omnus</a></h2>
									<small class="date">2 oct 2014</small>
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium...</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="post">
									<figure class="featured-image"><img src="images/news-3.jpg" alt=""></figure>
									<h2 class="entry-title"><a href="">Voluptatem laundantium  totam</a></h2>
									<small class="date">2 oct 2014</small>
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium...</p>
								</div>
							</div>
						</div> <!-- .row -->
					</div> <!-- .container -->
				</div> <!-- .fullwidth-block -->

				<div class="fullwidth-block">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<h2 class="section-title">Our mission and vision</h2>
								<p>Consequuntur minima, delectus quia labore sapiente maiores illo enim numquam sint? Molestias odio itaque, recusandae ut quae fuga ea tempore facere facilis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi cupiditate repellat velit quo, fugiat dolores eum corrupti commodi? Deserunt, adipisci sunt voluptas aliquid aliquam eos. Perspiciatis, similique atque deserunt nam.</p>
								<p>Distinctio delectus consequuntur sed quod ipsum a, odio obcaecati neque, aliquam nostrum aliquid reprehenderit ad quae qui autem voluptate omnis quas Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime magnam amet obcaecati dolore omnis consectetur dignissimos iste cupiditate excepturi quae porro fugiat, nemo iure, minima. Fuga hic voluptate ratione, at.ullam.</p>
							</div>
							<div class="col-md-4">
								<h2 class="section-title">Research summaries</h2>
								<ul class="arrow-list has-border">
									<li><a href="#">Praesentium voluptatum deleniti atque dolores</a></li>
									<li><a href="#">Corrupti quos et quas molestias excepturi sint</a></li>
									<li><a href="#">Occaecati cupiditate non provident similique sunt</a></li>
									<li><a href="#">Nam libero tempore, cum soluta nobis est eligendi</a></li>
								</ul>
								<a href="#" class="button">Show more</a>
							</div>
						</div>
					</div>
				</div>

				<div class="fullwidth-block cta" data-bg-image="images/cta-bg.jpg">
					<div class="container">
						<h2 class="cta-title">Neque porro quisquam</h2>
						<p>Modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem enim ad minima veniam quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil moles</p>
						<a href="#" class="button">See details</a>
					</div>
				</div>

				<div class="fullwidth-block" data-bg-color="#edf2f4">
					<div class="container">
						<div class="subscribe-form">
							<h2>Join our newsletter</h2>
							<form action="#">
								<input type="text" placeholder="Enter your email">
								<input type="submit" value="Subscribe">
							</form>
						</div>
					</div>
				</div>

			</main> <!-- .main-content -->
			<footer class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="widget">
								<h3 class="widget-title">Our address</h3>
								<strong>Nguyen Labs</strong>
								<address>1 Chome-1 Asahidai, Nomi, Ishikawa 923-1211, Japan</address>
								<a href="tel:">+000000000</a> <br>
								<a href="mailto:nguyenml@jaist.ac.jp">nguyenml@jaist.ac.jp</a> <br> <br>
								<?php 
									if($auth->check()) {
								?>
								<form action="logout.php" method="POST">
									<button type="submit" style="all : unset;">
										<a style="text-decoration: underline;">Logout</a>
									</button>									
								</form>
								<?php } else { ?>
								<a href="login.php" style="text-decoration: underline;">Members Login</a>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget">
								<h3 class="widget-title">Published Papers</h3>
								<ul class="arrow-list">
									<li><a href="#">Accusantium doloremque</a></li> 
									<li><a href="#">Laudantium totam aperiam</a></li>
									<li><a href="#">Eaque ipsa quae illo inventore</a></li> 
									<li><a href="#">Veritatis et quasi architecto</a></li>
									<li><a href="#">Vitae dicta sunt explicabo</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget">
								<h3 class="widget-title">Research Summary</h3>
								<ul class="arrow-list">
									<li><a href="#">Accusantium doloremque</a></li> 
									<li><a href="#">Laudantium totam aperiam</a></li>
									<li><a href="#">Eaque ipsa quae illo inventore</a></li> 
									<li><a href="#">Veritatis et quasi architecto</a></li>
									<li><a href="#">Vitae dicta sunt explicabo</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget">
								<h3 class="widget-title">Social media</h3>
								<p>Deserunt mollitia animi id est laborum dolorum fuga harum quidem rerum facilis.</p>
								<div class="social-links">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</div>
							</div>
						</div>
					</div> <!-- .row -->

					<p class="colophon">Copyright 2021 Nguyen Labs | Japan Advanced Institute of Science and Technology <a href="https://www.jaist.ac.jp/english/" title="JASIT" target="_blank">JAIST</a>. All rights reserved</p>
				</div> <!-- .container -->
			</footer>
		</div>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>

</html>