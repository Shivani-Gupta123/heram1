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
                    <h4 class="page-title">Edit Photo</h4>
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
                                <form name="myform" action="app/photogallery_crud.php" class="row" method="POST" enctype="multipart/form-data">

                                    <?php
                                    $stmt = $conn->prepare("SELECT * FROM `photogallery` WHERE id='" . $_GET['id'] . "' ");
                                    $stmt->execute();
                                    $record = $stmt->fetchAll();

                                    foreach ($record as $key) { ?>

                                        <input class="form-control" type="hidden" name="id" value="<?php echo $key['id']; ?>">

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Caption*</label>
                                            <input class="form-control" type="text" name="caption" value="<?php echo $key['caption'] ?>" required="" pattern="^[a-z A-Z 0-9 ]+$" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Existing Photo</label><br>
                                            <input type="hidden" value="<?php echo $key['photo'] ?>" name="old_photo_img">
                                            <img class="img-fluid" src="../assets/images/<?php echo $key['photo'] ?>" style="width:100px;height:auto;"><br>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Change Photo</label>
                                            <input class="form-control" type="file" name="photo" value="<?php echo $key['photo'] ?>" accept=".jpeg, .jpg, .png, .svg, .ico">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Show on Home?*</label>
                                            <select class="form-control" name="showonhome" required>

                                                <option <?php if ($key['showonhome'] == "Show") {
                                                            echo "selected";
                                                        } ?> value="Show">Show</option>
                                                <option <?php if ($key['showonhome'] == "Hide") {
                                                            echo "selected";
                                                        } ?> value="Hide">Hide</option>
                                            </select><br>
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

<script type="text/javascript">
    var img = document.forms['myform']['photo'];
    var validExt = ["jpeg", "png", "jpg"];

    function validation() {
        if (img.value != '') {


            var img_ext = img.value.substring(img.value.lastIndexOf('.') + 1);

            var result = validExt.includes(img_ext);
            if (result == false) {
                alert("Sorry, only JPEG, JPG & PNG  files are allowed.");
                return false;

            }

        }
    }
</script>