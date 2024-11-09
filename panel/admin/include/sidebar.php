<?php


include '../assets/constant/config.php';
include '../assets/constant/checklogin.php';
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


?>

<?php

$stmt1 = $conn->prepare("SELECT * FROM `manage_web` ");
$stmt1->execute();
$record1 = $stmt1->fetchAll();
foreach ($record1 as $key1) { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo $key1['title']; ?></title>
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="../assets/images/<?php echo $key1['photos']; ?>">

        <!-- jvectormap -->
        <!-- <link href="../assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"> -->
        <link href="../assets/plugins/fullcalendar/vanillaCalendar.css" rel="stylesheet" type="text/css" />

        <link href="../assets/plugins/morris/morris.css" rel="stylesheet">

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="../assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link href="../assets/plugins/colorpicker/asColorPicker.min.css" rel="stylesheet" type="text/css" />


        <link href="../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <!-----------Select2---------->
        <link href="../assets/css/select2.css" rel="stylesheet" type="text/css">
        <!-------------Sweetalert----------->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <link href="bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css" rel="stylesheet">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner"></div>
            </div>
        </div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <!--<a href="index.html" class="logo"><i class="mdi mdi-assistant"></i>Zoter</a>-->
                        <a class="logo">
                            <img src="../assets/images/<?php echo $key1['photo1']; ?>" alt="" class="logo-large"><?php } ?>
                        </a>
                    </div>
                </div>

                <div class="sidebar-inner niceScrollleft">

                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="dashboard.php" class="waves-effect">
                                    <i class="fas fa-home"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-toolbox"></i> <span>Service</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_service.php">Add</a></li>
                                    <li><a href="manage_service.php">Manage</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fab fa-blogger-b"></i> <span>Blogs</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_product.php">Add</a></li>
                                    <li><a href="manage_product.php">Manage</a></li>
                                </ul>
                            </li>
                            <!-- <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fab fa-accusoft"></i> <span>Category</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_category.php">Add</a></li>
                                    <li><a href="manage_category.php">Manage</a></li>
                                </ul>
                            </li> -->

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-desktop"></i> <span>Careers</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_career.php">Add</a></li>
                                    <li><a href="manage_career.php">Manage</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-images"></i> <span>Gallery</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_photo.php">Add</a></li>
                                    <li><a href="manage_photo.php">Manage</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-user"></i> <span>Testimonial</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_testimonial.php">Add</a></li>
                                    <li><a href="manage_testimonial.php">Manage</a></li>
                                </ul>
                            </li>

                            <!-- <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-user"></i> <span>Customer</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_partner.php">Add</a></li>
                                    <li><a href="manage_partner.php">Manage</a></li>
                                </ul>
                            </li> -->

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-users"></i> <span>Teams</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_team.php">Add</a></li>
                                    <li><a href="manage_team.php">Manage</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-images"></i> <span>Slider</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_slider.php">Add</a></li>
                                    <li><a href="manage_slider.php">Manage</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="career.php" class="waves-effect">
                                    <i class="fas fa-address-book"></i>
                                    <span>Career Info</span>
                                </a>
                            </li>

                            <li>
                                <a href="registrations.php" class="waves-effect">
                                    <i class="fas fa-registered"></i>
                                    <span>Registrations</span>
                                </a>
                            </li>

                            <li>
                                <a href="contact.php" class="waves-effect">
                                    <i class="fas fa-address-book"></i>
                                    <span>Contacts</span>
                                </a>
                            </li>



                            <li>
                                <a href="web.php" class="waves-effect">
                                    <i class="fa fa-cog"></i>
                                    <span>Web Appearance</span>
                                </a>
                            </li>



                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">