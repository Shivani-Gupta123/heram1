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
                        <a href="add_service.php" class="btn btn-primary mb-3">Add New</a>
                    </div>
                    <h4 class="page-title">View service</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" enctype="multipart/form-data">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Photo</th>
                                        <!-- <th>Banner</th> -->
                                        <th>Heading</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $stmt = $conn->prepare("SELECT * FROM `service` WHERE delete_status='0' ");
                                    $stmt->execute();
                                    $record = $stmt->fetchAll();
                                    $i = 1;
                                    foreach ($record as $key) { ?>


                                        <tr>

                                            <td><?php echo $i; ?></td>
                                            <td>
                                                <img width="100" src="../assets/images/<?php echo $key['photo']; ?>">
                                            </td>
                                            <!-- <td>
                                                <img width="100" src="../assets/images/<?php echo $key['banner']; ?>">
                                            </td> -->
                                            <td><?php echo $key['heading']; ?></td>





                                            <td>
                                                <a href="#" onclick="submitServiceForm(event, <?php echo $key['id']; ?>)" class="btn btn-primary waves-effect waves-light"><i class="fa fa-edit" aria-hidden="true"></i>

                                                </a>


                                                <a href="app/service.php?id=<?php echo $key['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-alt" aria-hidden="true"></i></a>



                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                                </tbody>

                            </table>






                        </div><!--end /tableresponsive-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->


        </div><!--end row-->












    </div> <!-- Page content Wrapper -->

</div> <!-- content -->

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
                window.location = "manage_service.php";
            }, 1000);
        });
    </script>
    <p><?php $_SESSION['success'] = '';
    } ?></p>


    <?php if (!empty($_SESSION['update'])) { ?>
        <script>
            setTimeout(function() {
                swal({
                    title: "Congratulaions!",
                    text: "Record Updated",
                    type: "success",
                    confirmButtonText: "Ok"
                }, function() {
                    window.location = "manage_service.php";
                }, 1000);
            });
        </script>
        <p><?php $_SESSION['update'] = '';
        } ?></p>

        <?php if (!empty($_SESSION['delete'])) { ?>
            <script>
                setTimeout(function() {
                    swal({
                        title: "Congratulaions!",
                        text: "Record Deleted",
                        type: "success",
                        confirmButtonText: "Ok"
                    }, function() {
                        window.location = "manage_service.php";
                    }, 1000);
                });
            </script>
            <p><?php $_SESSION['delete'] = '';
            } ?></p>