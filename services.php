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
<section class="page-title" style="background-image:url(assets/images/breadcrumb-3.jpg)">
	<div class="auto-container">
		<h2>Services</h2>
		<ul class="bread-crumb clearfix">
			<li><a href="index.php">Home</a></li>
			<li>Services</li>
		</ul>
	</div>
</section>
<!-- End Page Title -->






<!-- Service Two -->
<section class="service-two">
	<div class="auto-container">
		<!-- Sec Title -->

		<div class="row clearfix">
			<?php
			$stmt = $conn->prepare("SELECT * FROM `service` where delete_status='0' ");
			$stmt->execute();
			$record = $stmt->fetchAll();

			foreach ($record as $key) { ?>
				<!-- Service Block Two -->
				<div class="service-block_two col-lg-3 col-md-6 col-sm-12">
					<div class="service-block_two-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="service-block_two-image">
							<img src="panel/assets/images/<?php echo $key['photo'] ?>" alt="" class="img">
							<div class="service-block_two-overlay">

								<h5 class="service-block_two-title"><?php echo $key['heading'] ?></h5>
							</div>
							<div class="service-block_two-overlay-two">
								<div class="service-two_overlay-content">
									<h5 class="service-block_two-title"><a href="#" onclick="submitForm(event, <?php echo $key['id'] ?>, 'service-detail.php')"><?php echo $key['heading'] ?></a></h5>
									<div class="service-block_two-text"><?php echo substr($key['shortcontent'], 0, 150)  ?> ... </div>
									<a class="service-block_two-more" href="#" onclick="submitForm(event, <?php echo $key['id'] ?>, 'service-detail.php')">Read more</a>
								</div>
							</div>
						</div>
					</div>
				</div>

			<?php } ?>


		</div>

	</div>
</section>
<!-- End Service Two -->

<?php include('include/footer.php'); ?>