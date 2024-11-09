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
<section class="page-title" style="background-image:url(assets/images/breadcrumb-5.jpg)">
	<div class="auto-container">
		<h2>Gallery</h2>
		<ul class="bread-crumb clearfix">
			<li><a href="index.php">Home</a></li>
			<li>Gallery</li>
		</ul>
	</div>
</section>
<!-- End Page Title -->
<!-- Case Two -->
<section class="py-5 position-relative">
	<div class="case-two_pattern" data-parallax='{"y" : 60}' style="background-image:url(assets/images/icons/service-22.png)"></div>
	<div class="case-two_pattern-two" data-parallax='{"y" : 60}' style="background-image:url(assets/images/icons/service-23.png)"></div>
	<div class="auto-container">

		<div class="inner-container">
			<div class="row">
				<!-- limit three -->
				<!-- Case Block Two -->
				<?php
                    $stmt = $conn->prepare("SELECT * FROM `photogallery` WHERE delete_status='0' ORDER BY id DESC");
                    $stmt->execute();
                    $records = $stmt->fetchAll();
                    
                    foreach ($records as $key) {
                    
                    ?>
					<div class="case-block-two col-md-4">
						<div class="case-block_two-inner">
							<a class="case-block_two-image lightbox-image" href="panel/assets/images/<?php echo $key['photo'] ?>">
								<img src="panel/assets/images/<?php echo $key['photo'] ?>" alt="" />
								<div class="case-block_two-content">

									<h4 class="case-block_two-title"><?php echo $key['caption'] ?></h4>
								</div>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<!-- End Case Two -->
<!-- End Team One -->
<?php include('include/footer.php'); ?>