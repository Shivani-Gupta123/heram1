<!-- Footer -->
<script>
	function submitForm(event, id, file) {
		event.preventDefault(); // Prevent the default link behavior

		// Create a form dynamically
		var form = document.createElement('form');
		form.action = file;
		form.method = 'post';

		// Create a hidden input field for the ID
		var input = document.createElement('input');
		input.type = 'hidden';
		input.name = 'id';
		input.value = id;

		// Append the input field to the form
		form.appendChild(input);

		// Append the form to the body and submit it
		document.body.appendChild(form);
		form.submit();
	}
</script>
<script>
	function addSlider() {

		$('#add_slider').validate({
			rules: {
				name: {
					required: true
				},
				email: {
					required: true
				},
				message: {
					required: true
				},
				subject: {
					required: true
				},
				phone: {
					required: true,
					digits: true,
					minlength: 10,
					maxlength: 10
				}
			},
			messages: {
				name: {
					required: "Please enter the name"
				},
				email: {
					required: "Please enter the email"
				},
				message: {
					required: "Please enter the message"
				},
				subject: {
					required: "Please enter the subject"
				},
				phone: {
					required: "Please enter the phone"
				}

			}
		});
	};
</script>
<!-- Contact One -->
<section class="contact-one pb-0" style="background-image:url(assets/images/background/form-desktop-banner.png)">

	<div class="auto-container">
		<!-- Sec Title Three -->
	
		<div class="row clearfix align-items-end">
			<!-- Form Column -->
			<div class="contact-one_form-column col-lg-6 col-md-12 col-sm-12">
				<div class="contact-one_form-inner col-md-10 mx-auto shadow">
				    <h5 class="text-center">  SPEAK WITH OUR EXPERTS </h5>
				    <p class="text-center"><small>Complete this form, and HERAMBS will reach out to you promptly</small></p>
				    <hr>
					<!-- Default Form -->
					<div class="default-form">
						<form method="post" action="assets/mail/send.php" id="add_slider">
							<div class="row clearfix">

								<div class="col-lg-6 col-md-6 col-sm-12 form-group">
									<input type="text" name="name" placeholder="Your name*" required="">
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12 form-group">
									<input type="text" name="email" placeholder="Email" required="">
								</div>

								<div class="col-lg-6 col-md-12 col-sm-12 form-group">
									<input type="text" name="phone" placeholder="Phone" required="">
								</div>

								<div class="col-lg-6 col-md-12 col-sm-12 form-group">
									<input type="text" name="subject" placeholder="Subject" required="">
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12 form-group">
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
					<!-- End Default Form -->

				</div>
			</div>
			<!-- Form Column -->
			<div class="contact-one_info-column col-lg-6 col-md-12 col-sm-12">
				<div class="contact-one_info-inner">
				<img src="assets/images/icon-about/SpeakExpert7.png">
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Contact One -->

<footer class="main-footer" style="background-image:url(assets/images/background/pattern-11.png)">
	<div class="container-fluid">
		<!-- Widgets Section -->
		<div class="widgets-section">
			<div class="row clearfix">

				<!-- Big Column -->
				<div class="big-column col-lg-12 col-md-12 col-sm-12">
					<div class="row clearfix">

						<!-- Footer Column -->
						<div class="footer-column col-lg-3">
							<div class="footer-widget logo-widget">
								<h4>About Us</h4>
								<div class="text">Welcome to HERAMBS GROUP OF SERVICES, your gateway to a world of opportunities in education, business, and career advancement. We believe in the transformative power of learning and the endless possibilities that lie within the intersection of education and business.</div>
							</div>
						</div>

						<!-- Footer Column -->
						<!-- Footer Column -->
						<div class="footer-column col-lg-3">
							<div class="footer-widget contact-widget">
								<h4>Quick Links</h4>
								<div class="d-flex ">
								<ul class="contact-list">
									<li><span class="icon fa fa-dot"></span><a class="ps-0" href="index.php">Home</a></li>
									<li><span class="icon fa fa-dot"></span><a class="ps-0" href="about-us.php">About Us</a></li>
									<li><span class="icon fa fa-dot"></span><a class="ps-0" href="services.php">Services</a></li>
									<li><span class="icon fa fa-dot"></span><a class="ps-0" href="gallery.php">Gallery</a></li>
									<li><span class="icon fa fa-dot"></span><a class="ps-0" href="register.php">Register</a></li>
								
								
								</ul>
								<ul class="contact-list">
									
									<li><span class="icon fa fa-dot"></span><a class="ps-0" href="blog.php">Blog</a></li>
									<li><span class="icon fa fa-dot"></span><a class="ps-0" href="career.php">Career</a></li>
									<li><span class="icon fa fa-dot"></span><a class="ps-0" href="team.php">Team</a></li>
									<li><span class="icon fa fa-dot"></span><a class="ps-0" href="contact-us.php">Contact Us</a></li>
									<li><span class="icon fa fa-dot"></span><a class="ps-0" href="term-cond.php">Terms and conditions</a></li>
								
								</ul>
								</div>
							</div>
						</div>


						<!-- Footer Column -->
						<div class="footer-column col-lg-3">
							<div class="footer-widget contact-widget newsletter-widget">
								<h4>Official info:</h4>
								<ul class="contact-list">
								    <?php
                                    $stmt = $conn->prepare("SELECT * FROM `manage_web`  ");
                                    $stmt->execute();
                                    $record = $stmt->fetchAll();

                                    foreach ($record as $key) { ?>
									<li><span class="icon fa fa-map-marker-alt"></span><?php echo $key['location']?></li>

									<li><span class="icon fa fa-phone"></span><a class="ps-0" href="tel:+919559568522"><?php echo $key['contact']?></a></li>
									<li><span class="icon fa fa-envelope"></span><a href="<?php echo $key['email']?>" class="ps-0"><?php echo $key['email']?></a></li>
									<?php }?>

								</ul>
								<ul class="social-box mt-3">
									<li><a href="#" target="_blank" class="fa-brands fa-facebook-f fa-fw"></a></li>
									<li><a target="_blank" href="https://www.instagram.com/herambsgroupofservices8/" class="fa-brands fa-instagram fa-fw"></a></li>
									<li><a  target="_blank" href="https://twitter.com/HerambsOf" class="fa-solid fa-twitter fa-fw"></a></li>
									<li><a href="https://www.linkedin.com/in/herambs-group-of-services-113782182?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" class="fa-solid fa-linkedin fa-fw"></a></li>
								</ul>
							</div>
						</div>

						<!-- Footer Column -->
						<div class="footer-column col-lg-3">
							<div class="footer-widget instagram-widget">
								<h4>Our Map</h4>
								<div class="widget-content">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d227821.98710305037!2d80.77769789898673!3d26.848902830186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd991f32b16b%3A0x93ccba8909978be7!2sLucknow%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1704723639322!5m2!1sen!2sin" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

								</div>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>

		<div class="footer-bottom row">
			<div class="copyright col-md-6"><?php echo date('Y'); ?> &copy; All rights reserved by <a href="index.php">Herambs Group of Services</a></div>
			<div class="col-md-6">
			    <ul class="d-flex justify-content-center">
			    	<li><a class="ps-0 text-secondary" href="refund-policy.php">Return & Refund Policies</a></li>
					<li><a class="px-3  text-secondary" href="staff-policy.php">Staff Policies</a></li> 	<li><span class="icon fa fa-dot"></span><a class="ps-0 text-secondary" href="privacy-policy.php">Privacy Policy</a></li>
				</ul>
			</div>
		</div>

	</div>
</footer>
<!-- Footer -->

<!-- Search Popup -->

<!-- End Search Popup -->

</div>
<!-- End PageWrapper -->
<a href="https://api.whatsapp.com/send?phone=919559568522&text=How%20Can%20I%20Help%20You?"  target="_blank" class="whatsapp"><img src="assets/images/Whatsapp-chat.png"></a>
<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/appear.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/odometer.js"></script>
<script src="assets/js/nav-tool.js"></script>
<script src="assets/js/mixitup.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/parallax.min.js"></script>
<script src="assets/js/parallax-scroll.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/tilt.jquery.min.js"></script>
<script src="assets/js/magnific-popup.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/security.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>