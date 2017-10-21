<?php include('functions.php'); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>The Magic Pot</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
		<!-- BEGIN SIDEBAR MENU -->
		<div class="sidebar-menu">
			<div class="primary-menu-wrapper">
				<nav class="primary-menu">
					<div class="primary-menu-top">
						<div class="welcome-msg pull-left">
						</div>
						<span class="primary-menu-close icon-arrow-right-circle"></span>
					</div><!-- .primary-menu-top -->

					<ul>
						<li><span class="icon-home"></span>Home</li>
						<li><span class="icon-note"></span>Add new recipe</li>
						<li><span class="icon-user"></span>My Account</li>
						<li><span class="icon-options"></span>Settings</li>
					</ul>
				</nav><!-- .primary-menu -->
			</div><!-- .primary-menu-wrapper -->
		</div><!-- .sidebar-menu -->
		<!-- END SIDEBAR MENU -->
		
		<!-- BEGIN MAIN CONTENT -->
		<div class="main-content">

		<!-- BEGIN SITE HEADER -->
		<header class="site-header">
			<div class="container">
				<div class="row">
					<div class="site-logo col-sm-4">
						<h1><?php echo $site_title; ?></h1>
					</div><!-- .site-logo -->
					<div class="col-sm-4"></div>
					<div class="site-navigation col-sm-6 pull-right">
						<div class="nav-item burger-menu pull-right"><div class="icon-menu"></div></div>
						<ul class="nav-item nav-user pull-right">
							<li class="user-avatar"><a href="account.php"><span class="user-avatar-img" style="background: url('<?php echo $user__src; ?>');"></span><?php echo $user__alias; ?></li></a>
							<li><a href="logout.php"><span class="icon-logout"></span>Sign Out</li></a>
						</ul>
					</div><!-- .site-navigation -->
				</div><!-- .row -->
			</div><!-- .container -->
		</header><!-- .site-header -->
		<!-- END SITE HEADER -->

