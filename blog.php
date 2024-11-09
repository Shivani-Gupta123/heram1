<?php include('include/header.php'); ?>

<head>
	<meta name="title" content="Herambs Group of Services - Empowering Education, Business, and Careers">
	<meta name="description" content="Discover a world of opportunities with Herambs Group of Services. From innovative Edutech programs to thriving Business solutions, we empower careers for a brighter future.">
	<meta name="keywords" content="Herambs Group of Services, Edutech, Business Solutions, Career Empowerment, Opportunities, Education, Innovation, Business Learning">
	<meta name="robots" content="index, follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="English">
</head>

<!-- Main Slider Three -->
<!-- Page Title -->
<section class="page-title" style="background-image:url(assets/images/breadcrumb-2.jpg)">
	<div class="auto-container">
		<h2>Blog</h2>
		<ul class="bread-crumb clearfix">
			<li><a href="index.php">Home</a></li>
			<li>Blog</li>
		</ul>
	</div>
</section>
<!-- End Page Title -->
<section class="news-page">
	<div class="auto-container">
		<div class="row clearfix">

			<?php
			$stmt = $conn->prepare("SELECT * FROM `product` where delete_status='0' ");
			$stmt->execute();
			$record = $stmt->fetchAll();

			foreach ($record as $key) { ?>
				<!-- News One -->
				<div class="news-block_one col-xl-4 col-lg-6 col-md-6 col-sm-12">
					<div class="news-block_one-inner">
						<div class="news-block_one-image">
							<a href="#" onclick="submitForm(event, <?php echo $key['id'] ?>, 'blog-detail.php')"><img src="panel/assets/images/<?php echo $key['photo'] ?>" alt="" /></a>
						</div>
						<div class="news-block_one-content">
							<ul class="news-block_one-info">
								<li><span class="news-block_one-icon fa fa-regular fa-calendar fa-fw"></span><?php echo date('l, F j, Y', strtotime($key['date'])); ?></li>

							</ul>
							<h5 class="news-one_heading"><a href="#" onclick="submitForm(event, <?php echo $key['id'] ?>, 'blog-detail.php')"><?php echo substr($key['shortcontent'], 0, 110) ?> ... </a></h5>

							<!-- Button Box -->
							<div class="news-one_button-box text-center">
								<a class="theme-btn news-one_load-btn" href="#" onclick="submitForm(event, <?php echo $key['id'] ?>, 'blog-detail.php')">
									Read More
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>


	</div>
</section>




<?php include('include/footer.php'); ?>