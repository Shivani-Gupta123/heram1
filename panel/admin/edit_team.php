z<?php
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
          <h4 class="page-title">Edit Director</h4>
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
                <form name="myform" action="app/team_crud.php" class="row" method="POST" enctype="multipart/form-data" onsubmit="return validation()" id="edit_team">
                  <?php
                  $stmt = $conn->prepare("SELECT * FROM `team` WHERE id='" . $_GET['id'] . "' ");
                  $stmt->execute();
                  $record = $stmt->fetchAll();

                  foreach ($record as $key) { ?>

                    <input class="form-control" type="hidden" name="id" value="<?php echo $key['id']; ?>">

                    <div class="form-group col-md-6">
                      <label class="control-label">Name*</label>
                      <input class="form-control" type="text" name="name1" value="<?php echo $key['name1'] ?>" required="" />
                    </div>

                    <div class="form-group col-md-6">
                      <label class="control-label">Designation<span class="text-danger">*</span></label>
                      <input class="form-control" type="text" name="designation" value="<?php echo $key['designation'] ?>">
                    </div>

                    <div class="form-group col-md-6">
                      <label class="control-label">Existing Photo</label><br>
                      <input type="hidden" value="<?php echo $key['photo'] ?>" name="old_photo_img">
                      <img class="img-fluid" src="../assets/images/<?php echo $key['photo'] ?>" style="width:100px;height:auto;"><br>
                    </div>



                    <div class="form-group col-md-6">
                      <label class="control-label">Change Photo</label>
                      <input class="form-control" type="file" name="photo" accept=".jpeg, .jpg, .png, .svg, .ico">
                    </div>

                    <div class="form-group col-md-12">

                      <button class="btn btn-primary" type="submit" name="update" onclick="editTeam()">Update</button>

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
  function editTeam() {
    jQuery.validator.addMethod("lettersonly", function(value, element) {
      return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
    }, "Please enter alphabet characters only");

    $('#edit_team').validate({
      rules: {
        name1: {
          required: true,
          lettersonly
        },
        designation: {
          required: true
        },
        photo: {
          required: true,
          extension: "png|jpeg"
        },
        facebook: {
          url: true
        },
        twitter: {
          url: true
        },
        linkedin: {
          url: true
        },
        youtube: {
          url: true
        },
        googleplus: {
          url: true
        },
        instagram: {
          url: true
        },
        flicker: {
          url: true
        }
      },
      messages: {
        name1: {
          required: "Please enter a name."
        },
        designation: {
          required: "Please select a designation."
        },
        photo: {
          required: "Please select a photo.",
          extension: "Only PNG and JPEG files are allowed."
        },
        facebook: {
          url: "Please enter a valid URL."
        },
        twitter: {
          url: "Please enter a valid URL."
        },
        linkedin: {
          url: "Please enter a valid URL."
        },
        youtube: {
          url: "Please enter a valid URL."
        },
        googleplus: {
          url: "Please enter a valid URL."
        },
        instagram: {
          url: "Please enter a valid URL."
        },
        flicker: {
          url: "Please enter a valid URL."
        }
      },

    });
  };
</script>
<script>
  function validation() {
    var fileInput = document.getElementById('add_team').photo;
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