<?php
session_start();
include '../assets/constant/config.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<?php include('include/sidebar.php'); ?>
<!-- Top Bar End -->
<?php include('include/header.php'); ?>
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">

                    </div>
                    <h4 class="page-title">Add category</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-content">

                            <div class="tab-pane active p-3" id="home" role="tabpanel">
                                <form name="myform" action="app/category.php" class="row" method="POST" enctype="multipart/form-data" onsubmit="return validation()" id="add_slider">
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Name</label>
                                        <input class="form-control" type="text" name="name">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Photo<span class="text-danger">*</span> (file size less than 500 x 400 pixel)</label>
                                        <input class="form-control" type="file" name="photo" accept=".png,.jpeg">
                                    </div>

                                    <div class="form-group col-md-12">

                                        <button class="btn btn-primary" type="submit" name="submit" onclick="addSlider()">Submit</button>

                                    </div>
                                </form>
                            </div>




                        </div>

                    </div>
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
    </div> <!-- Page content Wrapper -->
</div> <!-- content -->

<?php include('include/footer.php'); ?>


<script>
    function addSlider() {
        jQuery.validator.addMethod("alphanumeric", function(value, element) {
            return this.optional(element) || /^(?=.*[a-zA-Z])[a-zA-Z0-9\s!@#$%^&*()_-]+$/.test(value);
        }, "Please enter alphanumeric characters only");

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-zA-Z\s]*$/.test(value);
        }, "Please enter alphabet characters only");
        $('#add_slider').validate({
            rules: {
                name: {
                    required: true
                }

            },
            messages: {
                name: {
                    required: "Please enter the heading"
                }

            },
        });
    };
</script>

<script>
    function validation() {
        var fileInput = document.getElementById('add_slider').photo;
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

        if (!allowedExtensions.exec(filePath)) {
            alert('Invalid file type! Please upload a JPG, JPEG, or PNG image.');
            fileInput.value = '';
            return false;
        }
        return true;
    }
</script>