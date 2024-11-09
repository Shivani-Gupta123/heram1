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
          <h4 class="page-title">Add product</h4>
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
                <form name="myform" action="app/product.php" class="row" method="POST" enctype="multipart/form-data" onsubmit="return validation()" id="add_product">




                  <div class="form-group col-md-6">
                    <label class="control-label">Heading<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="heading" required="" />
                  </div>




                  <div class="form-group col-md-6">
                    <label class="control-label">Short Content<span class="text-danger">*</span></label>
                    <textarea class="form-control" type="text" name="shortcontent" /></textarea>
                  </div>

                  <div class="form-group col-md-6">
                    <label class="control-label">Photo<span class="text-danger">*(file size must be less than 500 x 400 pixel)</span></label>
                    <input class="form-control" type="file" name="photo" accept=".png,.jpeg,.jpg">
                  </div>

                  <div class="form-group col-md-6">
                    <label class="control-label">Date<span class="text-danger">*</span></label>
                    <input class="form-control" type="date" name="date" required="" />
                  </div>

                  <div class="form-group col-md-6">
                    <label class="control-label">Content<span class="text-danger">*</span></label>
                    <textarea id="ckeditor" class="form-control" type="text" name="content"></textarea>
                  </div>

                  <div class="col-md-12">
                    <h6 class="p-2 seo-info" style="background-color: lightgrey;">SEO Information</h6>
                  </div>

                  <div class="form-group col-md-6">
                    <label class="control-label">Meta Title</label>
                    <input class="form-control" type="text" name="metatitle">
                  </div>

                  <div class="form-group col-md-6">
                    <label class="control-label">Meta Description</label>
                    <textarea class="form-control" type="text" name="metadescription"></textarea>
                  </div>

                  <div class="form-group col-md-6">
                    <label class="control-label">Meta keywords</label>
                    <textarea class="form-control" type="text" name="keywords"></textarea>
                  </div>

                  <div class="form-group col-md-6">
                    <label class="control-label">Meta robots</label>
                    <textarea class="form-control" type="text" name="robots"></textarea>
                  </div>

                  <div class="form-group col-md-12">

                    <button class="btn btn-primary" type="submit" name="submit" onclick="addproduct()">Submit</button>

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
  function addproduct() {
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
    $('#add_product').validate({
      rules: {
        heading: {
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
        date: {
          required: true
        }
      },
      messages: {
        heading: {
          required: "Please enter a heading",
          pattern: "Only alphanumeric characters and spaces are allowed"
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
        keywords: {
          required: "Please enter a keywords",
        },
        robots: {
          required: "Please enter a robots",
        },
        date: {
          required: "Please enter a date",
        }
      }
    });
  };
</script>