<head>
	<meta name="title" content="Herambs Group of Services - Empowering Education, Business, and Careers">
	<meta name="description" content="Discover a world of opportunities with Herambs Group of Services. From innovative Edutech programs to thriving Business solutions, we empower careers for a brighter future.">
	<meta name="keywords" content="Herambs Group of Services, Edutech, Business Solutions, Career Empowerment, Opportunities, Education, Innovation, Business Learning">
	<meta name="robots" content="index, follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="English">
</head>
<?php include('include/header.php'); ?>
<!-- Main Slider Three -->
<!-- Page Title -->
<section class="page-title" style="background-image:url(assets/images/background/7.jpg)">
	<div class="auto-container">
		<h2>Contact us</h2>
		<ul class="bread-crumb clearfix">
			<li><a href="index.php">Home</a></li>
			<li>Contact us</li>
		</ul>
	</div>
</section>
<!-- End Page Title -->
<!-- Contact One -->
<section class="contact-one" style="background-image:url(images/background/map-1.png)">
	<div class="auto-container">
		<!-- Sec Title -->
		<div class="sec-title">
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<div class="left-box">
					<div class="sec-title_title">Contact us</div>
					<h2 class="sec-title_heading">Grow Your Business With <br> <span>Our Expertise</span></h2>
				</div>

			</div>
		</div>
		<div class="row clearfix">

			<!-- Info Column -->
			<div class="info-column col-lg-4 col-md-12 col-sm-12">
				<div class="inner-column">

					<!-- Contact Block -->
					<div class="contact-block">
						<div class="block-inner">
							<span class="icon"><img src="assets/images/icons/contact-1.png" alt="" /></span>
							<strong>Office address</strong>
							LUCKNOW, INDIA..
						</div>
					</div>

					<!-- Contact Block -->
					<div class="contact-block">
						<div class="block-inner">
							<span class="icon"><img src="assets/images/icons/contact-2.png" alt="" /></span>
							<strong>Telephone number</strong>
							<a href="tel:+919559568522">+91 9559568522</a>
						</div>
					</div>

					<!-- Contact Block -->
					<div class="contact-block">
						<div class="block-inner">
							<span class="icon"><img src="assets/images/icons/contact-3.png" alt="" /></span>
							<strong>Mail address</strong>
							<a href="mailto:herambsservices@gmail.com">herambsservices@gmail.com</a>
						</div>
					</div>

				</div>
			</div>

			<!-- Form Column -->
			<div class="form-column col-lg-8 col-md-12 col-sm-12">
				<div class="inner-column">

					<!-- Contact Form -->
					<div class="contact-form">
						<form method="post" action="assets/mail/send.php" id="add_slider">
							<div class="row clearfix">

								<div class="col-lg-6 col-md-6 col-sm-12 form-group">
									<label>Name </label>
									<input type="text" name="name" placeholder="Your name*" required="">
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12 form-group">
									<label>Email address </label>
									<input type="text" name="email" placeholder="Email" required="">
								</div>

								<div class="col-lg-6 col-md-12 col-sm-12 form-group">
									<label>Phone</label>
									<input type="text" name="phone" placeholder="Phone" required="">
								</div>

								<div class="col-lg-6 col-md-12 col-sm-12 form-group">
									<label>Subject </label>
									<input type="text" name="subject" placeholder="Subject" required="">
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12 form-group">
									<label>Your message</label>
									<textarea class="" name="message" placeholder="Your text here..."></textarea>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 form-group">
									<?php
									$stmt = $conn->prepare("SELECT * FROM `manage_web` ");
									$stmt->execute();
									$record = $stmt->fetchAll();

									foreach ($record as $key) { ?>
										<div class="g-recaptcha" data-sitekey="<?php echo $key['sitekey'] ?>"></div>
									<?php } ?>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 form-group">
									<button class="btn-style-seven theme-btn" type="submit" name="submit" onclick="addSlider()">
										<span class="btn-wrap">
											<span class="text-one">Send message</span>
											<span class="text-two">Send message</span>
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
</section>
<!-- End Contact One -->

<!-- Map One -->
<section class="map-one">
	<div class="map-outer">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d227821.98710305037!2d80.77769789898673!3d26.848902830186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd991f32b16b%3A0x93ccba8909978be7!2sLucknow%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1704723639322!5m2!1sen!2sin" allowfullscreen=""></iframe>
	</div>
</section>
<!-- End Map One -->




<?php include('include/footer.php'); ?>