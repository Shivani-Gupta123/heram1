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
                        <a href="manage_partner.php" class="btn btn-primary mb-3">View All</a>
                    </div>
                    <h4 class="page-title">Add Customer</h4>
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
                                <form name="myform" action="app/partner_crud.php" class="row" method="POST" enctype="multipart/form-data" onsubmit="return validation()" id="add_partner">

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Name<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name1">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Photo<span class="text-danger">*</span>(file size must be less than 500 x 400 pixel)</label>
                                        <input class="form-control" type="file" name="photo" accept=".png,.jpeg">
                                    </div>

                                    <div class="form-group col-md-12">

                                        <button class="btn btn-primary" type="submit" name="submit" onclick="addPartner()">Submit</button>

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
    function validation() {
        var fileInput = document.getElementById('add_partner').photo;
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
<script>
    function addPartner() {
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
        }, "Please enter alphabet characters only");

        $('#add_partner').validate({
            rules: {
                name1: {
                    required: true
                }
            },
            messages: {
                name1: {
                    required: "Please enter a name"
                }
            },

        });
    };
</script>