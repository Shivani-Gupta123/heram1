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
                    <h4 class="page-title">View Registrations</h4>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Address</th>
                                        <th>Education</th>
                                        <th>Age</th>
                                        <th>Phone</th>
                                        <th>Whatsapp No</th>
                                        <th>Service</th>
                                        <th>Total</th>
                                        <th>Transaction Date</th>
                                        <th>Transaction Id</th>
                                        <th>Employee Name</th>
                                        <th>Employee Phone</th>
                                        <th>Manager Name</th>
                                        <th>Manager Phone</th>
                                        <th>Date</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $stmt = $conn->prepare("SELECT * FROM `registration` WHERE delete_status='0' ORDER BY created_date DESC ");
                                    $stmt->execute();
                                    $record = $stmt->fetchAll();
                                    $i = 1;
                                    foreach ($record as $key) { ?>


                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $key['name']; ?></td>
                                            <td><?php echo $key['email']; ?></td>
                                            <td><?php echo $key['message']; ?></td>
                                            <td><?php echo $key['address']; ?></td>
                                            <td><?php echo $key['education']; ?></td>
                                            <td><?php echo $key['age']; ?></td>
                                            <td><?php echo $key['phone']; ?></td>
                                            <td><?php echo $key['wapp_no']; ?></td>
                                            <td><?php echo $key['service']; ?></td>
                                            <td><?php echo $key['total']; ?></td>
                                            <td><?php echo $key['tra_date']; ?></td>
                                            <td><?php echo $key['tra_id']; ?></td>
                                            <td><?php echo $key['emp_name']; ?></td>
                                            <td><?php echo $key['emp_phone']; ?></td>
                                            <td><?php echo $key['ma_name']; ?></td>
                                            <td><?php echo $key['ma_phone']; ?></td>
                                            <td><?php echo $key['date']; ?></td>
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
                window.location = "registration.php";
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
                    window.location = "registration.php";
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
                        window.location = "registration.php";
                    }, 1000);
                });
            </script>
            <p><?php $_SESSION['delete'] = '';
            } ?></p>