<?php include('include/header.php'); ?>
<!-- Main Slider Three -->
<!-- Page Title -->
<head>
    <meta name="title" content="Herambs Group of Services - Empowering Education, Business, and Careers">
    <meta name="description" content="Discover a world of opportunities with Herambs Group of Services. From innovative Edutech programs to thriving Business solutions, we empower careers for a brighter future.">
    <meta name="keywords" content="Herambs Group of Services, Edutech, Business Solutions, Career Empowerment, Opportunities, Education, Innovation, Business Learning">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
</head>

<?php
$stmt = $conn->prepare("SELECT * FROM `product` where delete_status='0' AND id=? ");
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

				<!--Content Side-->
				<div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12">
					<div class="blog-single">
						<div class="inner-box">
							<div class="image">
								<img src="panel/assets/images/<?php echo $key['photo'] ?>" alt="" />
							</div>
							<div class="lower-content">
								<ul class="post-meta">
									<li><span class="icon fa-solid fa-clock fa-fw"></span><?php echo date('l, F j, Y', strtotime($key['date'])); ?></li>
									<li><span class="icon fa-solid fa-user fa-fw"></span>by <strong>admin</strong></li>
								</ul>
								<h3><?php echo $key['heading'] ?></h3>
								<p><?php echo html_entity_decode($key['content'])  ?></p>
							</div>
						</div>
					</div>
				</div>

				<!--Sidebar Side-->
				<div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12">
					<aside class="sidebar sticky-top">
						<!-- Popular Post Widget-->
						<div class="sidebar-widget popular-posts">
							<div class="sidebar-title">
								<h4>Recent Blogs</h4>
							</div>

							<?php
							$stmt2 = $conn->prepare("SELECT * FROM `product` where delete_status='0'");
							$stmt2->execute();
							$record2 = $stmt2->fetchAll();

							foreach ($record2 as $key2) { ?>
								<article class="post">
									<figure class="post-thumb"><img src="panel/assets/images/<?php echo $key2['photo'] ?>" alt=""><a href="blog-detail.php" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
									<div class="text"><a href="#" onclick="submitForm(event, <?php echo $key2['id'] ?>, 'blog-detail.php')"><?php echo substr($key2['shortcontent'], 0, 50)  ?> ...</a></div>
									<div class="post-info"><?php echo date('l, F j, Y', strtotime($key2['date'])); ?></div>
								</article>
							<?php } ?>

						</div>



					</aside>
				</div>

			</div>
		</div>
	</div>



<?php }
include('include/footer.php'); ?>