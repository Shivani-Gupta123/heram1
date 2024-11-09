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
                    <h4 class="page-title">Add Photo</h4>
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
                                <form name="myform" action="app/photogallery_crud.php" class="row" method="POST" enctype="multipart/form-data" onsubmit="return validation()" id="add_photo">

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Caption<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="caption">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Photo<span class="text-danger">*</span>(file size less than 500 x 400 pixel)</label>
                                        <input class="form-control" type="file" name="photo" accept=".jpeg, .jpg, .png, .svg, .ico">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Show on Home?<span class="text-danger">*</span></label>
                                        <select class="postName form-control" name="showonhome">
                                            <option value="">Select</option>
                                            <option value="Show">Show</option>
                                            <option value="Hide">Hide</option>
                                        </select><br>
                                    </div>

                                    <div class="form-group col-md-12">

                                        <button class="btn btn-primary" type="submit" name="submit" onclick="addPhoto()">Submit</button>

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

<!-- <script type="text/javascript">
    var img = document.forms['myform']['photo'];
    var validExt=["jpeg","png","jpg"];

    function validation() {
       var img_ext=img.value.substring(img.value.lastIndexOf('.')+1);

       var result=validExt.includes(img_ext);
       if(result==false){
        alert("Sorry, only JPEG, JPG & PNG  files are allowed.");
        return false;

       }
       
    }

</script> -->
<script>
    function validation() {
        var fileInput = document.getElementById('add_photo').photo;
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.svg)$/i;

        if (!allowedExtensions.exec(filePath)) {
            alert('Invalid file type! Please upload a JPG, JPEG, or PNG image.');
            fileInput.value = '';
            return false;
        }
        return true;
    }
</script>
<script>
    function addPhoto() {
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
        }, "Please enter alphabet characters only");

        $('#add_photo').validate({
            rules: {
                caption: {
                    required: true
                },
                showonhome: {
                    required: true
                }
            },
            messages: {
                caption: {
                    required: "Please enter a caption"
                },
                showonhome: {
                    required: "Please select an option"
                }
            },

        });
    };
</script>