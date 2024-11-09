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
<section class="page-title" style="background-image:url(assets/images/breadcrumb-1.jpg)">
	<div class="auto-container">
		<h2>Our Team</h2>
		<ul class="bread-crumb clearfix">
			<li><a href="index.php">Home</a></li>
			<li>Our Team</li>
		</ul>
	</div>
</section>
<!-- End Page Title -->





<!-- Team One -->
<section class="team-one">
	<div class="auto-container">

		<div class="row clearfix justify-content-center">
			<?php
			$stmt = $conn->prepare("SELECT * FROM `team` where delete_status='0' ");
			$stmt->execute();
			$record = $stmt->fetchAll();
			foreach ($record as $key) { ?>
				<!-- Team One -->
				<div class="team_one col-lg-3 col-md-6 col-sm-12">
					<div class="team_one-inner wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="team_one-image">
							<img src="panel/assets/images/<?php echo $key['photo'] ?>" alt="" />
							<div class="team_one-content">
								<h5 class="team-one_title"><a href="javascript:void(0);"><?php echo $key['name1'] ?></a></h5>
								<div class="team-one_designation"><?php echo $key['designation'] ?></div>
							</div>



						</div>
						<!-- Social Box -->

					</div>
				</div>
			<?php } ?>

		</div>
	</div>
</section>
<!-- End Team One -->
<?php include('include/footer.php'); ?>