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
                    <h4 class="page-title">Edit Career</h4>
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
                                <form name="myform" action="app/career_crud.php" class="row" method="POST" enctype="multipart/form-data" onsubmit="return validation()">
                                    <?php
                                    $stmt = $conn->prepare("SELECT * FROM `career` where id=? AND delete_status='0' ");
                                    $stmt->execute([$_GET['id']]);
                                    $record = $stmt->fetchAll();

                                    foreach ($record as $key) { ?>

                                        <input class="form-control" type="hidden" name="id" value="<?php echo $key['id']; ?>">

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Heading</label>
                                            <input class="form-control" type="text" value="<?php echo $key['heading'] ?>" name="heading" required="">
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label class="control-label">Short Text</label>
                                            <textarea class="form-control" id="ckeditor" type="text" name="short_text" required=""><?php echo $key['short_text'] ?></textarea>
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
    function addcareer() {
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            // Check if the value is empty
            if (value.trim() === "") {
                return false;
            }
            return /^[a-zA-Z\s]*$/.test(value);
        }, "Please enter alphabet characters only");

        $('#add_career').validate({
            rules: {
                heading: {
                    required: true
                },
                short_text: {
                    required: true
                }
            },
            messages: {
                heading: {
                    required: "Please enter the heading",
                    pattern: "Only alphanumeric characters are allowed"
                },
                short_text: {
                    required: "Please enter the short text",
                    pattern: "Only alphanumeric characters are allowed"
                },

            },

        });
    };
</script>