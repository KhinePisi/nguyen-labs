<?php 
require __DIR__.'/../vendor/navhelper.php';
require __DIR__.'/../admin/AuthServiceProvider.php';
use Auth\AuthServiceProvider;
$auth = new AuthServiceProvider();
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

			<main class="main-content">
				<div class="fullwidth-block">
					<div class="container">
