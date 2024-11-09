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
<section class="page-title" style="background-image:url(assets/images/breadcrumb-4.jpg)">
	<div class="auto-container">
		<h2>Career</h2>
		<ul class="bread-crumb clearfix">
			<li><a href="index.php">Home</a></li>
			<li>Career</li>
		</ul>
	</div>
</section>
<!-- End Page Title -->
<!-- Testimonial Three -->
<section class="testimonial-three">
	<div class="auto-container">
		<div class="row clearfix">

			<!-- Carousel Column -->
			<div class="testimonial-three_carousel-column col-lg-6 col-md-12 col-sm-12">
				<div class="testimonial-three_carousel-inner">
					<!-- Sec Title -->
					<div class="sec-title">
						<div class="sec-title_title">Career With Us</div>
						<h2 class="sec-title_heading">Your<span> Success </span>Begins Here At Herambs
						</h2>
					</div>

					<div class="">

						<!-- Testimonial Block Three -->
						<div class="testimonial-block_three">
							<div class="testimonial-block_three-inner">
								<div class="testimonial-block_three-text">HERAMBS Employment Training and Business Learning Federation is dedicated to its primary objective of providing comprehensive training through business programs, internships, and business learning. Our mission is to equip candidates with the essential skills required by companies in the fields of sales and marketing, digital marketing, management, accounting, and HR.</div>



							</div>
						</div>




					</div>
				</div>
			</div>

			<!-- Image Column -->
			<div class="testimonial-three_image-column col-lg-6 col-md-12 col-sm-12">
				<div class="testimonial-three_image-inner">
					<div class="testimonial-three_image">
						<img src="assets/images/career.jpg" alt="" width="100%">
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- End Testimonial Three -->

<!-- Services Two -->
<section class="services-two">
	<div class="auto-container">
		<!-- Sec Title Three -->
		<div class="sec-title">
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<div class="left-box">
					<div class="sec-title_title">Career</div>
					<h2 class="sec-title_heading">Current Job Openings</h2>
				</div>

			</div>
		</div>
		<div class="row">

			<!-- Service Block Four -->
			<?php
			$stmt = $conn->prepare("SELECT * FROM `career`");
			$stmt->execute();
			$record = $stmt->fetchAll();
			foreach ($record as $key) { ?>
				<div class="service-block_four col-md-4">
					<div class="service-block_four-inner">
						<h5 class="service-block_four-title"><?php echo $key['heading'] ?></h5>
						<div class="service-block_four-text">
							<p><?php echo html_entity_decode($key['short_text']) ?></p>
						</div>
						<div class="cta-two_button-box text-center">
							<a class="btn-style-seven theme-btn mt-3" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
								<div class="btn-wrap">
									<span class="text-one">Apply Now</span>
									<span class="text-two">Apply Now</span>
								</div>
							</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<!-- End Services Two -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Apply Now</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body contact-one pt-0 pb-0">
				<div class="form-column col-lg-12 col-md-12 col-sm-12">
					<div class="inner-column p-4">
						<!-- Contact Form -->
						<div class="contact-form">
							<form method="post" action="assets/mail/send.php" enctype="multipart/form-data" id="add_career">
								<div class="row clearfix">
									<div class="col-md-6 mb-3">
										<label for="name">Name:</label>
										<input type="text" id="name" class="form-control" name="name">
									</div>
									<div class="col-md-6 mb-3">
										<label for="email">Email:</label>
										<input type="email" id="email" class="form-control" name="email">
									</div>
									<div class="col-md-6 mb-3">
										<label for="phone">Phone:</label>
										<input type="tel" id="phone" class="form-control" name="phone">
									</div>
									<div class="col-md-6 mb-3">
										<label for="address">Address:</label>
										<textarea type="text" id="address" class="form-control" name="address"></textarea>
									</div>
									<div class="col-md-6 mb-3">
										<label for="address">Gender:</label>
										<select class="form-select" name="gender">
											<option value="">select gender</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Other">Other</option>
										</select>
									</div>
									<div class="col-md-6 mb-3">
										<label for="position">Position Applied For</label>
										<select class="form-select" name="position">
											<option selected>Select Position</option>
											<?php
											$stmt = $conn->prepare("SELECT * FROM `career` where delete_status='0'");
											$stmt->execute();
											$record = $stmt->fetchAll();
											foreach ($record as $key) { ?>
												<option value="<?php echo $key['heading'] ?>"><?php echo $key['heading'] ?></option><?php } ?>
										</select>
									</div>
									<div class="col-md-6 mb-3">
										<label for="resume">Resume (PDF or Word):</label>
										<input type="file" id="resume" class="form-control" name="resume">
									</div>
									<div class="col-md-6 mb-3">
										<label for="address">Message:</label>
										<textarea type="text" id="message" class="form-control" name="message"></textarea>
									</div>
									<div class="col-md-12 mt-3 text-center">
										<?php
										$stmt = $conn->prepare("SELECT * FROM `manage_web`");
										$stmt->execute();
										$record = $stmt->fetchAll();
										foreach ($record as $key) { ?>
											<div class="g-recaptcha" data-sitekey="<?php echo $key['sitekey'] ?>"></div>
										<?php } ?>
										<div class="col-lg-12 col-md-12 col-sm-12 form-group">
											<button class="btn-style-seven theme-btn" name="submit2" onclick="addCarrer()" type="submit">
												<span class="btn-wrap">
													<span class="text-one">Submit</span>
													<span class="text-two">Submit</span>
												</span>
											</button>
										</div>

									</div>
							</form>
						</div>
						<!-- End Comment Form -->

					</div>
				</div>
			</div>

		</div>
	</div>
</div>
</div>

<?php include('include/footer.php'); ?>


<script>
	function addCarrer() {

		$('#add_career').validate({
			rules: {
				name: {
					required: true
				},
				email: {
					required: true
				},
				address: {
					required: true
				},
				phone: {
					digits: true,
					minlength: 10,
					maxlength: 10
				},
				gender: {
					required: true
				},
				message: {
					required: true
				}
			},
			messages: {
				name: {
					required: "Please enter the name"
				},
				email: {
					required: "Please enter the email"
				},
				address: {
					required: "Please enter the address"
				},
				phone: {
					required: "Please enter the phone"
				},
				gender: {
					required: "Please enter the gender"
				},
				message: {
					required: "Please enter the message"
				}

			}
		});
	};
</script>