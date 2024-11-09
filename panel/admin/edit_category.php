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
                    <h4 class="page-title">Edit category</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">


                        <!-- Nav tabs -->


                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="tab-pane active p-3" id="home" role="tabpanel">
                                <form name="myform" action="app/category.php" class="row" method="POST" enctype="multipart/form-data" onsubmit="return validation()">
                                    <?php
                                    $stmt = $conn->prepare("SELECT * FROM `category` WHERE id='" . $_GET['id'] . "' ");
                                    $stmt->execute();
                                    $record = $stmt->fetchAll();

                                    foreach ($record as $key) { ?>

                                        <input class="form-control" type="hidden" name="id" value="<?php echo $key['id']; ?>">

                                        <div class="form-group col-md-6">
                                            <label class="control-label">name</label>
                                            <input class="form-control" type="text" name="name" value="<?php echo $key['name'] ?>" required="" pattern="^[a-z A-Z 0-9 ]+$" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Existing Photo</label><br>
                                            <input type="hidden" value="<?php echo $key['photo'] ?>" name="old_photo_img">
                                            <img class="img-fluid" src="../assets/images/<?php echo $key['photo'] ?>" style="width:100px;height:auto;"><br>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Photo*<span class="text-danger">(file size must be less than 500 x 400 pixel)</span></label>
                                            <input class="form-control" type="file" name="photo" accept=".jpg,.jpeg">
                                        </div>

                                        <div class="form-group col-md-12">

                                            <button class="btn btn-primary" type="submit" name="update">Update</button>

                                        </div>
                                    <?php } ?>
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
        var fileInput = document.getElementById('edit_slider').photo;
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
    function addSlider() {
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            // Check if the value is empty
            if (value.trim() === "") {
                return false;
            }
            return /^[a-zA-Z\s]*$/.test(value);
        }, "Please enter alphabet characters only");

        $('#add_slider').validate({
            rules: {
                name: {
                    required: true,
                    lettersonly: true
                }
            },
            messages: {
                name: {
                    required: "Please enter the name",
                    pattern: "Only alphanumeric characters are allowed"
                }

            },

        });
    };
</script>