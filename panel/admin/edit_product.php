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
          <h4 class="page-title">Edit product</h4>
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
                <form name="myform" action="app/product.php" class="row" method="POST" enctype="multipart/form-data" onsubmit="return validation()" id="edit_product">

                  <?php
                  $stmt = $conn->prepare("SELECT * FROM `product` WHERE id='" . $_POST['id'] . "' ");
                  $stmt->execute();
                  $record = $stmt->fetchAll();

                  foreach ($record as $key) { ?>

                    <input class="form-control" type="hidden" name="id" value="<?php echo $key['id']; ?>">




                    <div class="form-group col-md-6">
                      <label class="control-label">Heading*</label>
                      <input class="form-control" type="text" name="heading" value="<?php echo $key['heading'] ?>" required="" />
                    </div>




                    <div class="form-group col-md-6">
                      <label class="control-label">Short Content*</label>
                      <textarea class="form-control" type="text" name="shortcontent" required="" /><?php echo $key['shortcontent'] ?></textarea>
                    </div>


                    <div class="form-group col-md-6">
                      <label class="control-label">Content*</label>
                      <textarea class="form-control" type="text" name="content" required="" id="ckeditor"><?php echo $key['content'] ?></textarea>
                    </div>



                    <div class="form-group col-md-6">
                      <label class="control-label">Existing Photo</label><br>
                      <input type="hidden" value="<?php echo $key['photo'] ?>" name="old_photo_img">
                      <img class="img-fluid" src="../assets/images/<?php echo $key['photo'] ?>" style="width:100px;height:auto;"><br>
                    </div>

                    <div class="form-group col-md-6">
                      <label class="control-label">Change Photo</label>
                      <input class="form-control" type="file" name="photo" accept=".jpeg,.png,.jpg">


                    </div>

                    <div class="form-group col-md-6">
                      <label class="control-label">Date<span class="text-danger">*</span></label>
                      <input class="form-control" type="date" name="date" value="<?php echo $key['date'] ?>" required="" />
                    </div>

                    <div class="col-md-12">
                      <h6 class="p-2 seo-info" style="background-color: lightgrey;">SEO Information</h6>
                    </div>

                    <div class="form-group col-md-6">
                      <label class="control-label">Meta Title</label>
                      <input class="form-control" type="text" name="metatitle" value="<?php echo $key['metatitle'] ?>" />
                    </div>

                    <div class="form-group col-md-6">
                      <label class="control-label">Meta Description</label>
                      <textarea class="form-control" type="text" name="metadescription" /><?php echo $key['metadescription'] ?></textarea>
                    </div>

                    <div class="form-group col-md-6">
                      <label class="control-label">Meta keywords</label>
                      <textarea class="form-control" type="text" name="keywords" /><?php echo $key['keywords'] ?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label">Meta robots</label>
                      <textarea class="form-control" type="text" name="robots" /><?php echo $key['robots'] ?></textarea>
                    </div>

                    <div class="form-group col-md-12">

                      <button class="btn btn-primary" type="submit" name="update" onclick="editproduct()">Update</button>

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
  function validateFileInput(inputId) {
    var fileInput = document.getElementById(inputId);
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

<!-- Example usage for the first input -->
<script>
  function validateFirstInput() {
    return validateFileInput('edit_product').photo;
  }
</script>

<!-- Example usage for the second input -->
<script>
  function validateSecondInput() {
    return validateFileInput('edit_product').banner;
  }
</script>

<script type="text/javascript">
  function editproduct() {
    jQuery.validator.addMethod("alphanumeric", function(value, element) {
      return this.optional(element) || /^(?=.*[a-zA-Z])[a-zA-Z0-9\s!@#$%^&*()_-]+$/.test(value);
    }, "Please enter alphabet characters only");

    jQuery.validator.addMethod("lettersonly", function(value, element) {
      // Check if the value is empty
      if (value.trim() === "") {
        return false;
      }
      return /^[a-zA-Z\s]*$/.test(value);
    }, "Please enter alphabet characters only");
    $('#edit_product').validate({
      rules: {
        heading: {
          required: true
        },
        slug: {
          required: true
        },
        shortcontent: {
          required: true
        },
        content: {
          required: true
        },
        metatitle: {
          required: true
        },
        metadescription: {
          required: true
        },
        keywords: {
          required: true
        },
        robots: {
          required: true
        },
      },
      messages: {
        heading: {
          required: "Please enter a heading",
          pattern: "Only alphanumeric characters and spaces are allowed"
        },
        slug: {
          required: "Please enter a slug",
        },
        shortcontent: {
          required: "Please enter a short content",
          pattern: "Only alphanumeric characters and spaces are allowed"
        },
        content: {
          required: "Please enter a content",
          pattern: "Only alphanumeric characters and spaces are allowed"
        },
        metatitle: {
          required: "Please enter a metatitle",
        },
        metadescription: {
          required: "Please enter a metadescription",
        },
        c
      }
    });
  };
</script>