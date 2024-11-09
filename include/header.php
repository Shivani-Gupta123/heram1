<?php include('panel/assets/constant/config.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<?php
	$stmt = $conn->prepare("SELECT * FROM `manage_web` ");
	$stmt->execute();
	$record = $stmt->fetchAll();

	foreach ($record as $key) { ?>
		<title><?php echo $key['title'] ?></title>
		<!-- Stylesheets -->
		<link href="assets/css/bootstrap.css" rel="stylesheet">
		<link href="assets/css/main1.css" rel="stylesheet">
		<link href="assets/css/responsive-new.css" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

		<link rel="shortcut icon" href="panel/assets/images/<?php echo $key['photos'] ?>" type="image/x-icon">
		<link rel="icon" href="panel/assets/images/<?php echo $key['photos'] ?>" type="image/x-icon">

		<!-- Responsive -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

		<style>
			.error {
				color: red !important;
			}

			/* Initially hide the mobile menu off-screen to the right */
.mobile-menu {
    position: fixed;
    top: 0;
    right: -100%;
    width: 80%;
    height: 100vh;
    background-color: #fff;
    z-index: 9999;
    transition: right 0.3s ease;
}

/* Show the menu when toggled */
.mobile-menu.open {
    right: 0;
}

.menu-backdrop {
    display: none; /* Hide backdrop by default */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9998;
}
.menu-backdrop.show {
    display: block;
}

		</style>
</head>

<body>

	<div class="page-wrapper">

		<!-- Preloader -->
		<!--<div class="preloader"></div>-->
		<!-- End Preloader -->

		<!-- Main Header / Header Style Three -->
		<header class="main-header header-style-three">

			<!-- Header Top Three -->
			<div class="header-top_three d-none d-md-block">
				<div class="auto-container">
					<div class="d-flex justify-content-between align-items-center flex-wrap">
						<div class="left-box">
							<div class="text">LUCKNOW, INDIA.</div>
						</div>
						<div class="right-box align-items-center d-flex">

							<!-- Social Box -->
							<ul class="header-social_box">
								<li><a href="#" target="_blank" class="fa-brands fa-facebook-f fa-fw"></a></li>
								<li><a  target="_blank" href="https://twitter.com/HerambsOf" class="fa-brands fa-twitter fa-fw"></a></li>
								<li><a href="https://www.linkedin.com/in/herambs-group-of-services-113782182?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="fa-brands fa-linkedin fa-fw"></a></li>
								<li><a  target="_blank" href="https://www.instagram.com/herambsgroupofservices8/" class="fa-solid fa-instagram fa-fw"></a></li>
							</ul>

						</div>
					</div>
				</div>
			</div>
			<!-- End Header Top -->

			<!-- Header Upper -->
			<div class="header-upper">
				<div class="auto-container">
					<div class="inner-container d-flex justify-content-between align-items-center">
						<!-- Logo Box -->
						<div class="logo"><a href="index.php"><img style="height:130px" src="panel/assets/images/<?php echo $key['photo1'] ?>" alt="" title=""></a></div>

						<div class="nav-outer d-flex justify-content-between align-items-center">

							<!-- Main Menu -->
							<nav class="main-menu show navbar-expand-md">
								<div class="navbar-header">
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>

								<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
									<ul class="navigation clearfix">
										<li><a href="index.php">Home</a></li>
										<li><a href="about-us.php">About</a></li>
										<li><a href="services.php">Services</a></li>
										<li><a href="gallery.php">Gallery </a></li>
										<li><a href="register.php">Register </a></li>
										<li><a href="blog.php">Blog </a></li>
										<li><a href="career.php">Career </a></li>
										<li><a href="team.php">Team </a></li>
										<li><a href="contact-us.php">contact Us </a></li>
									</ul>
								</div>

							</nav>
							<!-- Main Menu End-->

							<div class="outer-box d-flex align-items-center">



								<!-- Button Box -->
								<div class="button-box style-two">
									<a class="btn-style-one theme-btn btn-item" target="_blank" href="https://g.page/r/CVZUZHhp5sgYEAI/review">
										<div class="btn-wrap">
											<span class="text-one">Review Us</span>
											<span class="text-two">Review Us</span>
										</div>
									</a>
								</div>

								<!-- Mobile Navigation Toggler -->
								<div class="mobile-nav-toggler"><span class="icon fa-solid fa-bars fa-fw"></span></div>

							</div>
						</div>

					</div>
				</div>
			</div>

			<!-- Sticky Header  -->
			<div class="sticky-header">
				<div class="auto-container">
					<div class="d-flex justify-content-between align-items-center">
						<!-- Logo -->
						<div class="logo">
							<a href="index.php" title=""><img style="height:130px" src="panel/assets/images/<?php echo $key['photo1'] ?>" alt="" title=""></a>
						</div>

						<!-- Right Col -->
						<div class="right-box d-flex align-items-center flex-wrap">
							<!-- Main Menu -->
							<nav class="main-menu">
								<!--Keep This Empty / Menu will come through Javascript-->
							</nav>
							<!-- Main Menu End-->

							<div class="outer-box d-flex align-items-center">



								<!-- Button Box -->
								<div class="button-box style-two">
									<a class="btn-style-one theme-btn btn-item" href="contact-us.php">
										<div class="btn-wrap">
											<span class="text-one">contact Us</span>
											<span class="text-two">contact Us</span>
										</div>
									</a>
								</div>

								<!-- Mobile Navigation Toggler -->
								<div class="mobile-nav-toggler"><span class="icon fa-solid fa-bars fa-fw"></span></div>

							</div>

						</div>

					</div>
				</div>
			</div>
			<!-- End Sticky Menu -->

			<!-- Mobile Menu  -->
			<div class="mobile-menu">
				<div class="menu-backdrop"></div>
				<div class="close-btn"><span class="icon flaticon-020-x-mark"></span></div>
				<nav class="menu-box">
					<div class="nav-logo"><a href="index.php"><img src="panel/assets/images/<?php echo $key['photo1'] ?>" alt="" title=""></a></div>

				<?php } ?>

			
				<div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
				</nav>
			</div>
			<!-- End Mobile Menu -->

		</header>
		<!-- End Main Header -->

		<!-- Sidebar Cart Item -->
