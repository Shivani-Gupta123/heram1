<?php include('include/header.php'); ?>
<!-- Main Slider Three -->
<!-- Page Title -->
<section class="page-title" style="background-image:url(assets/images/background/7.jpg)">
    <div class="auto-container">
        <h2>Register</h2>
        <ul class="bread-crumb clearfix">
            <li><a href="index.php">Home</a></li>
            <li>Register</li>
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
                    <div class="sec-title_title">Register</div>
                    <h2 class="sec-title_heading">Join HERAMBS GROUP and unlock a world of opportunities</h2>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <!-- Form Column -->
            <div class="form-column col-lg-12 col-md-12 col-sm-12">
                <div class="inner-column">

                    <!-- Contact Form -->
                    <div class="contact-form">
    <form id="add_slider" onsubmit="return submitForm(event)">
        <div class="row clearfix">

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="text" name="name" placeholder="Your name*" required="">
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="email" name="email" placeholder="Email" required="">
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                <input type="text" name="address" placeholder="Address" required="">
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                <input type="text" name="education" placeholder="Education" required="">
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                <input type="text" name="phone" placeholder="Contact No" required="">
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                <input type="text" name="wapp_no" placeholder="WhatsApp No" required="">
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                <select name="service" required="">
                    <option value="">Service Name</option>
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM `service` WHERE delete_status = '0'");
                    $stmt->execute();
                    $record = $stmt->fetchAll();
                    foreach ($record as $key) { ?>
                        <option value="<?php echo $key['heading'] ?>"><?php echo $key['heading'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <button class="btn-style-seven theme-btn" type="submit">
                    <span class="btn-wrap">
                        <span class="text-one">Submit</span>
                        <span class="text-two">Submit</span>
                    </span>
                </button>
            </div>

        </div>
    </form>
</div>

<script>
function submitForm(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Get form values
    const name = event.target.name.value;
    const email = event.target.email.value;
    const address = event.target.address.value;
    const education = event.target.education.value;
    const phone = event.target.phone.value;
    const wapp_no = event.target.wapp_no.value;
    const service = event.target.service.value;

    // Construct WhatsApp message
    const message = `Name: ${name}\nEmail: ${email}\nAddress: ${address}\nEducation: ${education}\nContact No: ${phone}\nWhatsApp No: ${wapp_no}\nService Name: ${service}`;

    // Encode message for URL
    const encodedMessage = encodeURIComponent(message);

    // WhatsApp API link
    const whatsappURL = `https://api.whatsapp.com/send?text=${encodedMessage}`;

    // Redirect to WhatsApp
    window.open(whatsappURL, '_blank');
}
</script>

                    <!-- End Comment Form -->

                </div>
            </div>

        </div>
    </div>
</section>
<!-- End Contact One -->

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
                address: {
                    required: true
                },
                phone: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                wapp_no: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                emp_phone: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                ma_phone: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                education: {
                    required: true
                },
                age: {
                    required: true,
                    digits: true
                },
                service: {
                    required: true
                },
                total: {
                    required: true,
                    digits: true
                },
                tra_date: {
                    required: true
                },
                tra_id: {
                    required: true
                },
                emp_name: {
                    required: true
                },
                ma_name: {
                    required: true
                },
                date: {
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
                message: {
                    required: "Please enter the message"
                },
                address: {
                    required: "Please enter the address"
                },
                education: {
                    required: "Please enter the education"
                },
                age: {
                    required: "Please enter the age"
                },
                phone: {
                    required: "Please enter the phone"
                },
                wapp_no: {
                    required: "Please enter the wapp_no"
                },
                wapp_no: {
                    required: "Please enter the wapp_no"
                },
                service: {
                    required: "Please enter the service"
                },
                total: {
                    required: "Please enter the total"
                },
                tra_date: {
                    required: "Please enter the tra_date"
                },
                tra_id: {
                    required: "Please enter the tra_id"
                },
                emp_name: {
                    required: "Please enter the emp_name"
                },
                emp_phone: {
                    required: "Please enter the emp_phone"
                },
                ma_name: {
                    required: "Please enter the ma_name"
                },
                ma_phone: {
                    required: "Please enter the ma_phone"
                },
                date: {
                    required: "Please enter the date"
                }

            }
        });
    };
</script>

<?php include('include/footer.php'); ?>


<?php if (!empty($_SESSION['success'])) { ?>
    <script>
        setTimeout(function() {
            swal({
                title: "Congratulaions!",
                text: "Data Added Successfully",
                type: "success",
                confirmButtonText: "Ok"
            }, function() {
                window.location = "manage_testimonial.php";
            }, 1000);
        });
    </script>
    <p><?php $_SESSION['success'] = '';
    } ?></p>