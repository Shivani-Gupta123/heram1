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


<?php
$stmt = $conn->prepare("SELECT * FROM `service` where delete_status='0' AND id=? ");
$stmt->execute([$_POST['id']]);
$record = $stmt->fetchAll();

foreach ($record as $key) { ?>

	<section class="page-title" style="background-image:url(panel/assets/images/<?php echo $key['photo'] ?>)">
		<div class="auto-container">
			<h2><?php echo $key['heading'] ?></h2>
			<ul class="bread-crumb clearfix">
				<li><a href="index.php">Home</a></li>
				<li><?php echo $key['heading'] ?></li>
			</ul>
		</div>
	</section>
	<!-- End Page Title -->






	<!-- Sidebar Page Container -->
	<div class="sidebar-page-container">
		<div class="auto-container">
			<div class="row clearfix">

				<!-- Sidebar Side -->
				<div class="sidebar-side left-sidebar col-lg-4 col-md-12 col-sm-12">
					<aside class="sidebar">
						<!-- Sidebar Widget -->
						<div class="sidebar-widget category-widget">
							<ul class="cat-list">
								<?php
								$stmt2 = $conn->prepare("SELECT * FROM `service` where delete_status='0'");
								$stmt2->execute();
								$record2 = $stmt2->fetchAll();

								foreach ($record2 as $key2) { ?>
									<li><a href="#" onclick="submitForm(event, <?php echo $key2['id'] ?>, 'service-detail.php')"><?php echo $key2['heading'] ?></a></li>
								<?php } ?>
							</ul>
						</div>

					</aside>
				</div>

				<!-- Content Side -->
				<div class="content-side right-sidebar col-lg-8 col-md-12 col-sm-12">
					<div class="service-detail">
						<div class="inner-box">
							<div class="image">
								<img src="panel/assets/images/<?php echo $key['photo'] ?>" alt="" />
							</div>
							<h3><?php echo $key['heading'] ?></h3>
							<p><?php echo html_entity_decode($key['content'])  ?></p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- End Sidebar Page Container -->

<?php }
include('include/footer.php'); ?>