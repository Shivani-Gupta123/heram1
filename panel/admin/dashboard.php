<?php
session_start();
include "../assets/constant/config.php";



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
                  <ol class="breadcrumb hide-phone p-0 m-0">
                     <li class="breadcrumb-item active"></li>
                  </ol>
               </div>
               <h4 class="page-title">Dashboard</h4>
            </div>
         </div>
         <div class="clearfix"></div>
      </div>
      <!-- end page title end breadcrumb -->
      <div class="row dashboard">
         <div class="col-lg-4">
            <div class="card bg-success">
               <div class="card-body py-4">
                  <div class="d-flex flex-row">
                     <div class="col-3 align-self-center">
                        <div class="round">
                           <i class="fas fa-toolbox"></i>
                        </div>
                     </div>
                     <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                           <h3 class="mt-0 text-white">
                              <?php
                              $stmt = $conn->prepare("SELECT count(*) as cnt_name from service WHERE delete_status='0' ");
                              $stmt->execute();
                              $record = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                              <?PHP echo $record['cnt_name'];
                              $name = $record['cnt_name']; ?>
                           </h3>
                           <p class="mb-0 text-white">Total Services


                           </p>
                        </div>
                     </div>
                  </div>


               </div>
               <!--end card-body-->
            </div>
            <!--end card-->

         </div>

         <!--end col-->

         <!--end col-->
         <div class="col-lg-4">
            <div class="card bg-primary">
               <div class="card-body py-4">
                  <div class="d-flex flex-row">
                     <div class="col-3 align-self-center">
                        <div class="round">
                           <i class="fas fa-address-card"></i>
                        </div>
                     </div>
                     <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                           <h3 class="mt-0 text-white">
                              <?php
                              $stmt = $conn->prepare("SELECT count(*) as cnt_name from contactus WHERE delete_status='0' ");
                              $stmt->execute();
                              $record = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                              <?PHP echo $record['cnt_name'];
                              $name = $record['cnt_name']; ?>
                           </h3>
                           <p class="mb-0 text-white">Total Contacts


                           </p>
                        </div>
                     </div>
                  </div>


               </div>
               <!--end card-body-->
            </div>
            <!--end card-->

         </div>

         <!--end col-->
         <div class="col-lg-4">
            <div class="card bg-info">
               <div class="card-body py-4">
                  <div class="d-flex flex-row">
                     <div class="col-3 align-self-center">
                        <div class="round">
                           <i class="fab fa-blogger-b"></i>
                        </div>
                     </div>
                     <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                           <h3 class="mt-0 text-white">
                              <?php
                              $stmt = $conn->prepare("SELECT count(*) as cnt_name from product WHERE delete_status='0' ");
                              $stmt->execute();
                              $record = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                              <?PHP echo $record['cnt_name'];
                              $name = $record['cnt_name']; ?>
                           </h3>
                           <p class="mb-0 text-white">Total Blogs


                           </p>
                        </div>
                     </div>
                  </div>


               </div>
               <!--end card-body-->
            </div>
            <!--end card-->

         </div>

         <!--end col-->
         <div class="col-lg-4">
            <div class="card bg-danger">
               <div class="card-body py-4">
                  <div class="d-flex flex-row">
                     <div class="col-3 align-self-center">
                        <div class="round">
                           <i class="fas fa-user"></i>
                        </div>
                     </div>
                     <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                           <h3 class="mt-0 text-white">
                              <?php
                              $stmt = $conn->prepare("SELECT count(*) as cnt_name from testimonial WHERE delete_status='0' ");
                              $stmt->execute();
                              $record = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                              <?PHP echo $record['cnt_name'];
                              $name = $record['cnt_name']; ?>
                           </h3>
                           <p class="mb-0 text-white">Total Testimonial


                           </p>
                        </div>
                     </div>
                  </div>


               </div>
               <!--end card-body-->
            </div>
            <!--end card-->

         </div>


         <!--end col-->
         <div class="col-lg-4">
            <div class="card bg-danger">
               <div class="card-body py-4">
                  <div class="d-flex flex-row">
                     <div class="col-3 align-self-center">
                        <div class="round">
                           <i class="fas fa-user"></i>
                        </div>
                     </div>
                     <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                           <h3 class="mt-0 text-white">
                              <?php
                              $stmt = $conn->prepare("SELECT count(*) as cnt_name from career_info WHERE delete_status='0' ");
                              $stmt->execute();
                              $record = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                              <?PHP echo $record['cnt_name'];
                              $name = $record['cnt_name']; ?>
                           </h3>
                           <p class="mb-0 text-white">Total Job Applicants
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <!--end card-body-->
            </div>
            <!--end card-->
         </div>


         <div class="col-lg-4">
            <div class="card bg-danger">
               <div class="card-body py-4">
                  <div class="d-flex flex-row">
                     <div class="col-3 align-self-center">
                        <div class="round">
                           <i class="fas fa-registered"></i>
                        </div>
                     </div>
                     <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                           <h3 class="mt-0 text-white">
                              <?php
                              $stmt = $conn->prepare("SELECT count(*) as cnt_name from registration WHERE delete_status='0' ");
                              $stmt->execute();
                              $record = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                              <?PHP echo $record['cnt_name'];
                              $name = $record['cnt_name']; ?>
                           </h3>
                           <p class="mb-0 text-white">Total Registrations


                           </p>
                        </div>
                     </div>
                  </div>


               </div>
               <!--end card-body-->
            </div>
            <!--end card-->

         </div>

         <!--end col-->
         <div class="col-lg-4">
            <div class="card bg-danger">
               <div class="card-body py-4">
                  <div class="d-flex flex-row">
                     <div class="col-3 align-self-center">
                        <div class="round">
                           <i class="fas fa-images"></i>
                        </div>
                     </div>
                     <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                           <h3 class="mt-0 text-white">
                              <?php
                              $stmt = $conn->prepare("SELECT count(*) as cnt_name from photogallery WHERE delete_status='0' ");
                              $stmt->execute();
                              $record = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                              <?PHP echo $record['cnt_name'];
                              $name = $record['cnt_name']; ?>
                           </h3>
                           <p class="mb-0 text-white">Total Images


                           </p>
                        </div>
                     </div>
                  </div>


               </div>
               <!--end card-body-->
            </div>
            <!--end card-->

         </div>

      </div>
      <!--end row-->

   </div>
   <!-- Page content Wrapper -->
</div>
<!-- content -->
<?php include('include/footer.php'); ?>