<?php include('include/header.php'); ?>

<head>
	<meta name="title" content="Herambs Group of Services - Empowering Education, Business, and Careers">
	<meta name="description" content="Discover a world of opportunities with Herambs Group of Services. From innovative Edutech programs to thriving Business solutions, we empower careers for a brighter future.">
	<meta name="keywords" content="Herambs Group of Services, Edutech, Business Solutions, Career Empowerment, Opportunities, Education, Innovation, Business Learning">
	<meta name="robots" content="index, follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="English">
   
	<style>
	.section {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 40px;
            justify-content: center;
        }
        .card {
            flex: 1 1 300px;
            max-width: 300px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 128, 0, 0.2);
            padding: 25px;
            margin: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
            border-top: 5px solid #2e7d32;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 128, 0, 0.3);
        }
        .card h3 {
            font-size: 22px;
            color: #2e7d32;
            margin-bottom: 15px;
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 2px solid #2e7d32;
            padding-bottom: 5px;
        }
        .card p {
            color: #4d4d4d;
            font-size: 16px;
            line-height: 1.6;
            margin-top: 10px;
        }
        @media (max-width: 768px) {
            .section {
                flex-direction: column;
                align-items: center;
                padding: 20px;
            }
            .card {
                width: 90%;
                max-width: 100%;
            }
        }

		.button-group {
    display: flex;
    justify-content: space-between; /* Pushes the button to the left and icon to the right */
    align-items: center; /* Vertically center both items */
    width: 100%; /* Ensures it takes the full width of the container */
    padding: 10px 0; /* Optional padding for spacing */
}

.contact-button {
    background-color: #28a745; /* Example background color */
    color: #fff;
    padding: 10px 20px;
    border: none;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
}

.whatsapp-button {
    display: inline-block;
}

.whatsapp-icon {
    width: 25px;
    height: 25px;
    vertical-align: middle;
}

/* Responsive behavior */
@media (max-width: 768px) {
    .button-group {
        flex-direction: row; /* Keep the row layout */
        justify-content: space-between; /* Still space between */
    }
}


    </style>
</head>

<!-- Main Slider Three -->
<div class="main-slider-three">
	<div class="slider-three_icon-one" data-parallax='{"y" : -80}' style="background-image:url(assets/images/icons/service-22.png)"></div>
	<div class="slider-three_icon-two" data-parallax='{"y" : 80}' style="background-image:url(assets/images/icons/service-23.png)"></div>
	<div class="single-item-carousel owl-carousel owl-theme">

		<!-- Slide -->
		<?php
		$stmt = $conn->prepare("SELECT * FROM `slider` where delete_status='0' ");
		$stmt->execute();
		$record = $stmt->fetchAll();

		foreach ($record as $key) { ?>
			<div class="slide">
				<div class="slider-three_image-layer" style="background-image:url(panel/assets/images/<?php echo $key['photo'] ?>)"></div>
				<div class="slider-three_curve-layer" style="background-image:url(assets/images/main-slider/herams 1.webp)"></div>
				<div class="auto-container">

					<!-- Content Column -->
					<div class="slider-three_content-box col-md-7">

						<h1 class="slider-three_title"><?php echo $key['heading'] ?></h1>
						<div class="slider-three_text mt-2"><?php echo $key['short_text'] ?> </div>
						<!-- Button Box -->
						<div class="slider-three_button-box">
							<a class="btn-style-seven theme-btn" href="contact-us.php">
								<div class="btn-wrap">
									<span class="text-one">Contact Us</span>
									<span class="text-two">Contact Us</span>
								</div>
							</a>
						</div>
					</div>

				</div>
			</div>
		<?php } ?>

	</div>
</div>
<!-- End Main Slider Three -->

<!-- Services Three -->
<section class="services-three">
	<div class="auto-container">
		<div class="row clearfix">

			<!-- Services Block Five -->
			<div class="service-block_five col-lg-4 col-md-6 col-sm-12">
				<div class="service-block_five-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
					<div class="service-block_five-color-layer"></div>
					<div class="service-block_five_pattern" style="background-image:url(assets/images/background/pattern-38.png)"></div>
					<div class="service-block_five_icon"><img src="assets/images/icons/1.png" alt="" /></div>
					<h5 class="service-block_five_heading"><a href="javascript:void(0);">Edutech Excellence</a></h5>
					<div class="service-block_five-text">Empower Your Skills: Join our cutting-edge Edutech programs for two and six months. Acquire valuable skills through online training, leading to guaranteed job placements. Shape your future with us.</div>
				</div>
			</div>

			<!-- Services Block Five -->
			<div class="service-block_five col-lg-4 col-md-6 col-sm-12">
				<div class="service-block_five-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
					<div class="service-block_five-color-layer"></div>
					<div class="service-block_five_pattern" style="background-image:url(assets/images/background/pattern-38.png)"></div>
					<div class="service-block_five_icon"><img src="assets/images/icons/2.png" alt="" /></div>
					<h5 class="service-block_five_heading"><a href="javascript:void(0);">Business Beyond Limits</a></h5>
					<div class="service-block_five-text">Franchise Opportunities: Become a Business Partner and enjoy the benefits of low-cost franchises. Promote HERAMBS services in your area and secure a share in our success. Your journey to financial prosperity starts here.</div>
				</div>
			</div>

			<!-- Services Block Five -->
			<div class="service-block_five col-lg-4 col-md-6 col-sm-12">
				<div class="service-block_five-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
					<div class="service-block_five-color-layer"></div>
					<div class="service-block_five_pattern" style="background-image:url(assets/images/background/healthcare.webp)"></div>
					<div class="service-block_five_icon"><img src="assets/images/icons/healthcare.webp" alt="" /></div>
					<h5 class="service-block_five_heading"><a href="javascript:void(0);">Empowering Health Careers</a></h5>
					<div class="service-block_five-text">Join the Healthcare Revolution: Our comprehensive training programs equip you with essential skills for a successful career in healthcare. From medical coding to patient care, gain the knowledge needed to excel in a fast-growing industry.</div>
				</div>
			</div>


		</div>
	</div>
</section>
<!-- End Company One -->

<!-- Company Three -->
<section class="company-three">
    <div class="company-three_icon-one" data-parallax='{"y" : -80}' style="background-image:url(assets/images/background/pattern-39.png)"></div>
    <div class="company-three_icon-two" data-parallax='{"y" : 80}' style="background-image:url(assets/images/background/pattern-40.png)"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="section">
                <?php
                $sections = [
                    "Internship Training and Guaranteed Job" => "Unlock your career potential with our comprehensive internship training program, designed to equip you with hands-on skills and industry insights. Our commitment goes beyond training; we offer guaranteed job placements to help you step confidently into your future career. Gain valuable experience, work alongside experts, and secure your dream job with us today!",
                    "Part-Time Job Opportunity" => "Explore flexible work options that fit your lifestyle with our part-time and work-from-home opportunities. Whether you're balancing studies, family, or another job, our positions offer the flexibility you need while building valuable experience. Join us and enjoy the freedom to work on your terms, from anywhere!",
                    "Full-Time Job Opportunity" => "Launch a rewarding career with our full-time job opportunities, designed for those ready to make an impact. We offer a supportive work environment, growth-focused roles, and competitive benefits to help you thrive in your field. Take the next step in your professional journey and become part of a team that values your skills and ambition.",
                    "Franchise Opportunity" => "Join our growing network and take advantage of an exciting franchise opportunity! As a franchise partner, you’ll gain access to our proven business model, comprehensive support, and established brand reputation. Be part of a success story, tap into an expanding market, and start your entrepreneurial journey with confidence. Let's grow together!",
                    "Healthcare Services" => "Our healthcare services are dedicated to providing compassionate, high-quality care tailored to meet your unique needs. From preventive health checks to specialized treatments, we prioritize your well-being with experienced professionals and advanced medical support. Trust us to be your partner in health, offering reliable care that you and your loved ones can count on."
                ];

                foreach ($sections as $title => $content) {
                    echo "<div class='card'>";
                    echo "<h3>$title</h3>";
                    echo "<p>$content</p>";
                    // Wrapper div for button and icon to style them inline
                    echo "<div class='button-group'>";
                    // Contact Us button
                    echo "<a href='register.php' class='contact-button'>Contact Us</a>";
                    // WhatsApp icon and link with prefilled message
                    echo "<a href='https://wa.me/919559568522?text=Hello, I would like more information about $title.' class='whatsapp-button' target='_blank'>";
                    echo "<img src='panel/assets/images/whatsapp.png' alt='WhatsApp' class='whatsapp-icon'>"; // WhatsApp icon
                    echo "</a>";
                    echo "</div>";
                    // Read more link positioned below the button group
                    echo "<a class='service-block_six-more theme-btn' href='#' onclick='submitForm(event, \"$title\", \"service-detail.php\")'>Read more</a>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</section>

<script>
// JavaScript function to handle the redirection for "Read more"
function submitForm(event, title, url) {
    event.preventDefault();
    const encodedTitle = encodeURIComponent(title); // encode title to pass safely in the URL
    window.location.href = `${url}?title=${encodedTitle}`;
}
</script>

<script>
function submitForm(event, title, url) {
    event.preventDefault();
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = url;
    
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'title';
    input.value = title;

    form.appendChild(input);
    document.body.appendChild(form);
    form.submit();
}
</script>



<style>
    /* Basic styles for the button */
    .contact-button {
        display: inline-block;
        background-color: #4CAF50; /* Green */
        color: white;
        padding: 10px 20px;
        text-decoration: none; /* Remove underline from link */
        border-radius: 5px;
        margin-top: 10px;
    }

    .contact-button:hover {
        background-color: #45a049; /* Darker green on hover */
    }
</style>


<!-- End Company Three -->

<!-- CTA Two -->
<section class="cta-two wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
	<div class="auto-container">
		<div class="cta-two_inner-container" style="background-image: url(assets/images/background/map.png)">
			<div class="d-flex justify-content-between align-items-center flex-wrap">

				<div class="cta-two_title">Contact with us Any time!</div>
				<!-- Button Box -->
				<div class="cta-two_button-box">
					<a class="btn-style-seven theme-btn" href="contact-us.php">
						<div class="btn-wrap">
							<span class="text-one">Contact us!</span>
							<span class="text-two">Contact us!</span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End CTA Two -->
<section class="services-four solution pt-2">
	<div class="auto-container">
		<!-- Sec Title Three -->
		<div class="sec-title_three centered">
			<div class="sec-title_three-title">Unleashing Solutions</div>
			<h2 class="sec-title_three-heading">Virtually Every Challenge<br> Resolved. Almost All </h2>
		</div>
		<br>
		<br>
		<div class="inner-container">
			<div class="row clearfix">

				<!-- Service Block Six -->
		
					<div class=" col-lg-4 col-md-6 col-sm-12 mb-3">
						<div class="">
							<div class=" solutiobox position-relative">
								<span class="solutiobox-img">
									<img src="assets/images/s1.jpg" alt="" />
								</span>
								<h4 class="solutiobox-heading"> Recruitment </h4>
							
							</div>
						</div>
					</div>
					<div class=" col-lg-4 col-md-6 col-sm-12 mb-3">
						<div class="">
							<div class=" solutiobox position-relative">
								<span class="solutiobox-img">
									<img src="assets/images/s2.jpg" alt="" />
								</span>
								<h4 class="solutiobox-heading">  Internship  </h4>
							
							</div>
						</div>
					</div>
					<div class=" col-lg-4 col-md-6 col-sm-12 mb-3">
						<div class="">
							<div class=" solutiobox position-relative">
								<span class="solutiobox-img">
									<img src="assets/images/s6.jpg" alt="" />
								</span>
								<h4 class="solutiobox-heading"> Part-Time Job </h4>
							
							</div>
						</div>
					</div>
					<div class=" col-lg-4 col-md-6 col-sm-12 mb-3">
						<div class="">
							<div class=" solutiobox position-relative">
								<span class="solutiobox-img">
									<img src="assets/images/s3.jpg" alt="" />
								</span>
								<h4 class="solutiobox-heading"> Full-Time Job</h4>
							
							</div>
						</div>
					</div>
					<div class=" col-lg-4 col-md-6 col-sm-12 mb-3">
						<div class="">
							<div class=" solutiobox position-relative">
								<span class="solutiobox-img">
									<img src="assets/images/s4.jpg" alt="" />
								</span>
								<h4 class="solutiobox-heading">Franchise Oppurtunity</h4>
							
							</div>
						</div>
					</div>
					<div class=" col-lg-4 col-md-6 col-sm-12 mb-3">
						<div class="">
							<div class=" solutiobox position-relative">
								<span class="solutiobox-img">
									<img src="assets/images/s5.jpg" alt="" />
								</span>
								<h4 class="solutiobox-heading">Healthcare Services </h4>
							
							</div>
						</div>
					</div>
					<!-- <div class=" col-lg-4 col-md-6 col-sm-12 mb-3">
						<div class="">
							<div class=" solutiobox position-relative">
								<span class="solutiobox-img">
									<img src="assets/images/s6.jpg" alt="" />
								</span>
								<h4 class="solutiobox-heading"> Internship </h4>
							
							</div>
						</div>
					</div> -->
			</div>

		

		</div>
	</div>
</section>

<!-- <section class="services-four industrie pt-2">
	<div class="auto-container">
		
		<div class="sec-title_three centered">
			<div class="sec-title_three-title">Industries that we serve</div>
			<h2 class="sec-title_three-heading">Harnessing Human Touch<br> in the Workplace </h2>
		</div>
		<br>
		<br>
		<div class="inner-container">
			<div class="row clearfix">
			    	<div class=" col-lg-6 col-md-6 col-sm-12 border-top border-end">
					    <div class="d-flex align-items-center p-2 p-md-4">
                        	<div class="fig col-4 me-2">
                        		<div class="column-inner">
                        			<div  class="jdb-image">
                        					<img src="assets/images/2coms-bpo-home.png" title="BPO/KPO" alt="BPO/KPO">
                        			</div>
                        		</div>
                        	</div>
                        	<div class="txt-area jdb-column col-8">
                        		<div class="jdb-column-inner">
                        			<div class="jdb-heading">
                        				<h4 class="jdb-heading-heading">
                        
                        					BPO/KPO</h4>
                        
                        				<h5 class="jdb-heading-subheading">2,300+</h5>
                        			</div>
                        			<div class=" jdb-element-content">
                        				<div class="jdb-content">
                        					<p style="text-align: left;">Candidates fuel the thriving BPO/KPO sector's growth. </p>
                        				</div>
                        			</div>
                        		</div>
                        	</div>
                        </div>
					</div>
					<div class=" col-lg-6 col-md-6 col-sm-12 border-top ">
					    <div class="d-flex align-items-center p-2 p-md-4">
                        	<div class="fig col-4 me-2">
                        		<div class="column-inner">
                        			<div  class="jdb-image">
                        					<img src="assets/images/i2.jpg" title="BPO/KPO" alt="BPO/KPO">
                        			</div>
                        		</div>
                        	</div>
                        	<div class="txt-area jdb-column col-8">
                        		<div class="jdb-column-inner">
                        			<div class="jdb-heading">
                        				<h4 class="jdb-heading-heading">
                        					Retail</h4>
                        
                        				<h5 class="jdb-heading-subheading">2,000+</h5>
                        			</div>
                        			<div class=" jdb-element-content">
                        				<div class="jdb-content">
                        					<p style="text-align: left;">Candidates drive sales and elevate performance for top Indian retail brands.</p>
                        				</div>
                        			</div>
                        		</div>
                        	</div>
                        </div>
					</div>
					<div class=" col-lg-6 col-md-6 col-sm-12 border-top border-end">
					    <div class="d-flex align-items-center p-2 p-md-4">
                        	<div class="fig col-4 me-2">
                        		<div class="column-inner">
                        			<div  class="jdb-image">
                        					<img src="assets/images/i3.jpg" title="BPO/KPO" alt="BPO/KPO">
                        			</div>
                        		</div>
                        	</div>
                        	<div class="txt-area jdb-column col-8">
                        		<div class="jdb-column-inner">
                        			<div class="jdb-heading">
                        				<h4 class="jdb-heading-heading">
                        
                        					IT</h4>
                        
                        				<h5 class="jdb-heading-subheading">2000+</h5>
                        			</div>
                        			<div class=" jdb-element-content">
                        				<div class="jdb-content">
                        					<p style="text-align: left;">Candidates have secured prestigious roles within IT companies. </p>
                        				</div>
                        			</div>
                        		</div>
                        	</div>
                        </div>
					</div>
					<div class=" col-lg-6 col-md-6 col-sm-12 border-top ">
					    <div class="d-flex align-items-center p-2 p-md-4">
                        	<div class="fig col-4 me-2">
                        		<div class="column-inner">
                        			<div  class="jdb-image">
                        					<img src="assets/images/apprentice-homepage-image.jpg" title="BPO/KPO" alt="BPO/KPO">
                        			</div>
                        		</div>
                        	</div>
                        	<div class="txt-area jdb-column col-8">
                        		<div class="jdb-column-inner">
                        			<div class="jdb-heading">
                        				<h4 class="jdb-heading-heading">  Apprentice</h4>
                        
                        				<h5 class="jdb-heading-subheading">2,300+</h5>
                        			</div>
                        			<div class=" jdb-element-content">
                        				<div class="jdb-content">
                        					<p style="text-align: left;">Candidates have been selected as apprentices in leading firms based on their aptitude. </p>
                        				</div>
                        			</div>
                        		</div>
                        	</div>
                        </div>
					</div>
			</div>
		</div>
	</div>
</section> -->
<!-- Steps Two -->
<section class="steps-two" style="background-image:url(assets/images/background/6.jpg)">
	<div class="steps-two_pattern" data-parallax='{"y" : 60}' style="background-image:url(assets/images/icons/service-23.png)"></div>
	<div class="steps-two_pattern-two" data-parallax='{"y" : 60}' style="background-image:url(assets/images/icons/service-22.png)"></div>

	<div class="auto-container">
		<!-- Sec Title Three -->
		<div class="sec-title_three light centered">
			<div class="sec-title_three-title">Working Steps</div>
			<h2 class="sec-title_three-heading">Some easy steps to process!</h2>
		</div>
		<div class="inner-container">
			<div class="row clearfix">

				<!-- Step Block Two -->
				<div class="step-block_two col-lg-3 col-md-6 col-sm-12">
					<div class="step-block_two-inner">
						<div class="step-block_two-number"><span class="icon fa-solid fa-check-double fa-fw"></span>01</div>
						<h4 class="step-block_two-heading">Explore Our Services</h4>
						<div class="step-two_block-text">Discover a world of possibilities by exploring our diverse range of services.</div>
					</div>
				</div>

				<!-- Step Block Two -->
				<div class="step-block_two col-lg-3 col-md-6 col-sm-12">
					<div class="step-block_two-inner">
						<div class="step-block_two-number"><span class="icon fa-solid fa-pencil fa-fw"></span>02</div>
						<h4 class="step-block_two-heading">Engage and Enroll</h4>
						<div class="step-two_block-text">Once you've identified the service that aligns with your goals, engage with us.</div>
					</div>
				</div>

				<!-- Step Block Two -->
				<div class="step-block_two col-lg-3 col-md-6 col-sm-12">
					<div class="step-block_two-inner">
						<div class="step-block_two-number"><span class="icon fa-solid fa-cube fa-fw"></span>03</div>
						<h4 class="step-block_two-heading">Transform with Training </h4>
						<div class="step-two_block-text">For Edutech enthusiasts, dive into transformative training programs.</div>
					</div>
				</div>

				<!-- Step Block Two -->
				<div class="step-block_two col-lg-3 col-md-6 col-sm-12">
					<div class="step-block_two-inner">
						<div class="step-block_two-number"><span class="icon fa-solid fa-link fa-fw"></span>04</div>
						<h4 class="step-block_two-heading">Prosper Together</h4>
						<div class="step-two_block-text">Whether you're a learner, a business partner, or an investor, HERAMBS.</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- End Steps Two -->

<!-- Services Four -->
<!-- <section class="services-four">
	<div class="auto-container">
	
		<div class="sec-title_three centered">
			<div class="sec-title_three-title">Our Feature Services</div>
			<h2 class="sec-title_three-heading">We provide some <span>exclusive</span> <br> services for clients</h2>
		</div>
		<br>
		<br>
		<div class="inner-container">
			<div class="row clearfix">

				
				<?php
				$stmt = $conn->prepare("SELECT * FROM `service` WHERE delete_status='0' LIMIT 3 ");
				$stmt->execute();
				$record = $stmt->fetchAll();

				foreach ($record as $key) { ?>
					<div class="service-block_six col-lg-4 col-md-6 col-sm-12">
						<div class="service-block_six-inner">
							<div class="service-block_six-content">
								<span class="service-block_six-icon">
									<img src="panel/assets/images/<?php echo $key['photo'] ?>" alt="" />
								</span>
								<h4 class="service-block_six-heading"><a href="#" onclick="submitForm(event, <?php echo $key['id'] ?>, 'service-detail.php')"><?php echo $key['heading'] ?></a></h4>
								<div class="service-block_six-text"><?php echo html_entity_decode($key['shortcontent']) ?></div>
								<a class="service-block_six-more theme-btn" href="#" onclick="submitForm(event, <?php echo $key['id'] ?>, 'service-detail.php')">Read more</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>

		
			<div class="services-four_button-box text-center">
				<a class="btn-style-seven theme-btn" href="services.php">
					<div class="btn-wrap">
						<span class="text-one">View More</span>
						<span class="text-two">View More</span>
					</div>
				</a>
			</div>

		</div>
	</div>
</section> -->
<!-- End Services Four -->

<section class="services-four industrie pt-2">
	<div style="margin-top:50px" class="auto-container">
		<!-- Sec Title Three -->
		<div class="sec-title_three centered">
			<div class="sec-title_three-title">Departments </div>
			<h2 class="sec-title_three-heading">Departments  </h2>
		</div>
		<br>
		<br>
		<div class="inner-container">
			<div class="row clearfix">
			    	<div class=" col-lg-4 col-md-4 col-sm-12">
					    <div class="d-flex p-2 p-md-4">
                        	<div class="fig me-2">
                        	    <img src="assets/images/department/1.png" width="150px">
                        	</div>
                        	<div class="txt-area jdb-column ">
                        		<h4>Internship Training Department</h4>
                        		<p>Provides comprehensive training programs with guaranteed job placements.</p>
                        	</div>
                        </div>
					</div>
					<!-- <div class=" col-lg-4 col-md-4 col-sm-12">
					    <div class="d-flex p-2 p-md-4">
                        	<div class="fig me-2">
                        	    <img src="assets/images/department/2.png" width="150px">
                        	</div>
                        	<div class="txt-area jdb-column ">
                        		<h4>Sales and Marketing Department</h4>
                        		<p>Drives growth through strategic sales and marketing initiatives.</p>
                        	</div>
                        </div>
					</div> -->
					<div class="col-lg-4 col-md-4 col-sm-12">
					    <div class="d-flex p-2 p-md-4">
                        	<div class="fig me-2">
                        	    <img src="assets/images/department/education.png" width="150px">
                        	</div>
                        	<div class="txt-area jdb-column ">
                        		<h4>Education Services Department</h4>
                        		<p>Offers diverse educational solutions and protection schemes.</p>
                        	</div>
                        </div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12">
					    <div class="d-flex p-2 p-md-4">
                        	<div class="fig me-2">
                        	    <img src="assets/images/department/hr.png" width="150px">
                        	</div>
                        	<div class="txt-area jdb-column ">
                        		<h4>Jobs, Career Department</h4>
                        		<p>Nurtures careers and manages human resources for organizational success.</p>
                        	</div>
                        </div>
					</div>
					<!-- <div class="col-lg-4 col-md-4 col-sm-12">
					    <div class="d-flex p-2 p-md-4">
                        	<div class="fig me-2">
                        	    <img src="assets/images/department/5.png" width="150px">
                        	</div>
                        	<div class="txt-area jdb-column ">
                        		<h4>Micro Finance Department</h4>
                        		<p>Empowers small businesses and individuals through accessible financial solutions.</p>
                        	</div>
                        </div>
					</div> -->
					<!-- <div class="col-lg-4 col-md-4 col-sm-12">
					    <div class="d-flex p-2 p-md-4">
                        	<div class="fig me-2">
                        	    <img src="assets/images/department/6.png" width="150px">
                        	</div>
                        	<div class="txt-area jdb-column ">
                        		<h4>Fundings and Investment Department</h4>
                        		<p>Facilitates investments and fundings with promising returns.</p>
                        	</div>
                        </div>
					</div> -->
					<!-- <div class="col-lg-4 col-md-4 col-sm-12">
					    <div class="d-flex p-2 p-md-4">
                        	<div class="fig me-2">
                        	    <img src="assets/images/department/7.png" width="150px">
                        	</div>
                        	<div class="txt-area jdb-column ">
                        		<h4>Property Services Department</h4>
                        		<p>Guides clients through buying, selling, leasing, and property management.</p>
                        	</div>
                        </div>
					</div> -->
					<!-- <div class="col-lg-4 col-md-4 col-sm-12">
					    <div class="d-flex p-2 p-md-4">
                        	<div class="fig me-2">
                        	    <img src="assets/images/department/8.png" width="150px">
                        	</div>
                        	<div class="txt-area jdb-column ">
                        		<h4>Accounts Department</h4>
                        		<p>Manages financial transactions and ensures fiscal responsibility.</p>
                        	</div>
                        </div>
					</div> -->
					<!-- <div class="col-lg-4 col-md-4 col-sm-12">
					    <div class="d-flex p-2 p-md-4">
                        	<div class="fig me-2">
                        	    <img src="assets/images/department/9.png" width="150px">
                        	</div>
                        	<div class="txt-area jdb-column ">
                        		<h4>Strategy and Policy Making Department</h4>
                        		<p>Shapes organizational strategies and policies for sustained growth.</p>
                        	</div>
                        </div>
					</div> -->
					<div class="col-lg-4 col-md-4 col-sm-12">
					    <div class="d-flex p-2 p-md-4">
                        	<div class="fig me-2">
                        	    <img src="assets/images/department/10.png" width="150px">
                        	</div>
                        	<div class="txt-area jdb-column ">
                        		<h4>Healthcare Services Department</h4>
                        		<p>Promotes well-being through comprehensive healthcare solutions.</p>
                        	</div>
                        </div>
					</div>
				
			</div>
		</div>
	</div>
</section>

<section class="services-four industrie pt-2">
	<div class="auto-container">
		<!-- Sec Title Three -->
		<div class="sec-title_three centered">
			<div class="sec-title_three-title">Post </div>
			<h2 class="sec-title_three-heading">Our Post  </h2>
		</div>
		<br>
		<br>
		<div class="inner-container post-images">
			<div class="row clearfix">
			    	<div class="col-lg-3 col-md-3 col-sm-12 text-center">
                        <img src="assets/images/post/post-2.jpg"> 
                        <!--<h5>Sharmila Thakur</h5>-->
                        <p>Chairman</p>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 text-center">
                        <img src="assets/images/post/post-1.jpg"> 
                        <!--<h5>Ravi Kapoor</h5>-->
                        <p>Managing Director</p>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 text-center">
                        <img src="assets/images/post/post-6.jpg"> 
                        <!--<h5>Arjun Sharma</h5>-->
                        <p>Ceo</p>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 text-center">
                        <img src="assets/images/post/post-3.jpg"> 
                        <!--<h5>Priya Verma</h5>-->
                        <p>Zonal Head</p>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 text-center">
                        <img src="assets/images/post/post-7.jpg"> 
                        <!--<h5>Alok Singh</h5>-->
                        <p>Area Manager</p>
					</div>
					<!-- <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                        <img src="assets/images/post/post-4.jpg"> 
                        <h5>Neha Gupta</h5>
                        <p>Hr Manager</p>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 text-center">
                        <img src="assets/images/post/post-9.jpg"> 
                        <h5>Rajesh Tiwari</h5>
                        <p>Team Leader</p>
					</div>
				    <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                        <img src="assets/images/post/post-5.jpg"> 
                        <h5>Sneha Kapoor</h5>
                        <p>Business Development Manager</p>
					</div>
				    <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                        <img src="assets/images/post/post-3.jpg"> 
                        <h5>Ananya Sharma</h5>
                        <p>Accountant</p>
					</div> -->
				
			</div>
		</div>
	</div>
</section>


<!-- Case Two -->
<section class="case-two">
	<div class="case-two_pattern" data-parallax='{"y" : 60}' style="background-image:url(assets/images/icons/service-22.png)"></div>
	<div class="case-two_pattern-two" data-parallax='{"y" : 60}' style="background-image:url(assets/images/icons/service-23.png)"></div>
	<div class="auto-container">
		<!-- Sec Title Three -->
		<div class="sec-title_three light">
			<div class="sec-title_three-title">Gallery</div>
			<h2 class="sec-title_three-heading">Explore our gallery showcasing successful stories,<br> events, and achievements </h2>
		</div>
		<div class="inner-container">
			<div class="case-carousel-two owl-carousel owl-theme">
				<!-- limit three -->
				<!-- Case Block Two -->
				<?php
				$stmt = $conn->prepare("SELECT * FROM `photogallery` where delete_status='0'  ORDER BY id DESC LIMIT 5");
				$stmt->execute();
				$record = $stmt->fetchAll();

				foreach ($record as $key) { ?>
					<div class="case-block-two">
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


<!-- Testimonial Section -->
<section class="testimonial-section">
	<div class="pattern-layer-one" style="background-image: url(assets/images/background/pattern-25.png)"></div>
	<div class="auto-container">
		<div class="row clearfix">

			<!-- Title Column -->
			<div class="title-column col-lg-5 col-md-12 col-sm-12">
				<div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
					<!-- Sec Title -->
					<div class="sec-title_two">
						<div class="sec-title_three-title">Testimonials ~</div>
						<h2 class="sec-title_two-heading">Here's what our <br> <span>customers</span> have said.</h2>
						<div class="sec-title_two-text">"Herambs Group made a significant impact on my career. The internship training opened doors to opportunities I hadn't imagined. The supportive team and innovative services set them apart. Highly recommended!"

						</div>
					</div>
					<!-- Button Box -->

				</div>
			</div>

			<!-- Carousel Column -->
			<div class="carousel-column col-lg-7 col-md-12 col-sm-12">
				<div class="inner-column" style="background-image: url(assets/images/background/pattern-26.png)">
					<div class="authors-outer">
						<div class="author-one">
							<img src="assets/images/resource/author-1.jpg" alt="" />
						</div>
						<div class="author-two">
							<img src="assets/images/resource/author-2.jpg" alt="" />
						</div>
						<div class="author-three">
							<img src="assets/images/resource/author-3.jpg" alt="" />
						</div>

					</div>
					<div class="single-item-carousel owl-carousel owl-theme">

						<?php
						$stmt = $conn->prepare("SELECT * FROM `testimonial` where delete_status='0' ");
						$stmt->execute();
						$record = $stmt->fetchAll();

						foreach ($record as $key) { ?>

							<div class="testimonial-block">
								<div class="inner-box">
									<div class="rating">
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									</div>
									<div class="text">“<?php echo $key['comment'] ?>”</div>
								</div>
								<div class="author-box">
									<div class="box-inner">
										<span class="author-image">
											<img src="panel/assets/images/<?php echo $key['photo'] ?>" alt="" />
										</span>
										<h5><?php echo $key['name1'] ?></h5>
										<div class="designation"><?php echo $key['designation'] ?></div>
									</div>
								</div>
							</div>
						<?php } ?>


					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- End Testimonial Section -->

<!-- CTA One -->
<section class="cta-one">
	<div class="auto-container">
		<div class="d-flex justify-content-between align-items-center flex-wrap">
			<div class="left-box">
				<h3 class="cta-one_heading">"Ready to Grow? Get a Free Consultation for Success"</h3>
			</div>
			<div class="right-box">
				<a class="btn-style-seven theme-btn" href="contact-us.php">
					<div class="btn-wrap">
						<span class="text-one">Get a Free Consultation </span>
						<span class="text-two">Get a Free Consultation</span>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
<!-- End CTA One -->

<?php include('include/footer.php'); ?>