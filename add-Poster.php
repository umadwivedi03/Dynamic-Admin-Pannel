<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

// For adding post  
if(isset($_POST['submit']))
{
$posttitle=$_POST['posttitle'];
$catid=$_POST['category'];
$postedby=$_SESSION['login'];
$arr = explode(" ",$posttitle);
$url=implode("-",$arr);
$imgfile=$_FILES["postimage"]["name"];
// get the image extension
$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$imgnewfile=md5($imgfile).$extension;
// Code for move image into directory
move_uploaded_file($_FILES["postimage"]["tmp_name"],"postimages/".$imgnewfile);

$status=1;
$query=mysqli_query($con,"insert into tblposter(PostTitle,CategoryId,Is_Active,PostImage) values('$posttitle','$catid','$status','$imgnewfile')");
if($query)
{
$msg="Post successfully added ";
}
else{
$error="Something went wrong . Please try again.";    
} 

}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Newsportal | Add Post</title>

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
 <script>
function getSubCat(val) {
  $.ajax({
  type: "POST",
  url: "get_subcategory.php",
  data:'catid='+val,
  success: function(data){
    $("#subcategory").html(data);
  }
  });
  }
  </script>
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php include('includes/topheader.php');?>
            <!-- ========== Left Sidebar Start ========== -->
             <?php include('includes/leftsidebar.php');?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Add Our History</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Add History</a>
                                        </li>
                                        <li class="active">
                                            Add History
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

<div class="row">
<div class="col-sm-6">  
<!---Success Message--->  
<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong>Well done!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>

<!---Error Message--->
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
<?php } ?>


</div>
</div>


                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
<form name="addpost" method="post" enctype="multipart/form-data">
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Post Title</label>
<input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Enter title" required>
</div>
<div class="form-group m-b-20">
<label for="exampleInputEmail1">Year</label>
<select type="text"  class="form-control" id="posttitle" name="category"  required>
<option style="color:red;font-size:20px;">About Us</option>
<option value="Our Philosophy">Our Philosophy</option>
<option value="Our Culture">Our Culture</option>
<option value="Accreditation">Accreditations</option>
<option value="Our Sister Concerns">Our Sister Concerns</option>
<option value="Patient Testimonial">Patient Testimonial</option>
<option value="About The Hospital">About The Hospital</option>
<option value="Our Quality Policy">Our Quality Policy</option>
<option value="Our Satellite Centers">Our Satellite Centers</option>
<option value="Director Message">Director Message</option>
<option value="Chairmain Message">Chairmain Message</option>
<option value="About Choithram Cheritable Trust">About Choithram Cheritable Trust</option>
<option value="Our Accademic Institution">Our Accademic Institution</option>
<option value="Committee">Committee</option>
<option value="Our Global Presence">Our Global Presence</option>
<option value="How We Are Different">How We Are Different</option>
<option value="Mission Vision And Values">Mission Vision And Values</option>
<option value="Trustees Message">Trustees Message</option>
<option value="Affiation And Recognition">Affiation And Recognition</option>
<option value="Our History">Our History</option>
<option value="Our Team">Our Team</option>
<option value="Achievements, Awards & Accolades">Achievements, Awards & Accolades</option>
<option style="color:red;font-size:20px;">Department's</option>
<option value="Anaesthesia">Anaesthesia</option>
<option value="Burn & Plastic Surgery">Burn & Plastic Surgery</option>
<option value="Transfusion Medicine & Blood Bank">Transfusion Medicine & Blood Bank</option>
<option value="Casualty">Casualty</option>
<option value="Cardiac Services">Cardiac Services</option>
<option value="Dentistry">Dentistry</option>
<option value="Dermatology">Dermatology</option>
<option value="Endoscopy">Endoscopy</option>
<option value="Endocrinology">Endocrinology</option>
<option value="Ear Nose And Throat">Ear Nose And Throat</option>
<option value="Nuclear Medicine">Nuclear Medicine</option>
<option value="Gastrointestinal Surgery And Liver Transplantation">Gastrointestinal Surgery And Liver Transplantation</option>
<option value="General Surgery">General Surgery</option>
<option value="Gastroenterology">Gastroenterology</option>
<option value="Interventional Spine And Pain Centre">Interventional Spine And Pain Centre</option>
<option value="Medicine">Medicine</option>
<option value="Neuro Surgery">Neuro Surgery</option>
<option value="Radiotherapy">Radiotherapy</option>
<option value="Oncology">Oncology</option>
<option value="Ophthalmology">Ophthalmology</option>
<option value="Obstetrics And Gynaecology">Obstetrics And Gynaecology</option>
<option value="Orthopaedics">Orthopaedics</option>
<option value="Nephrology">Nephrology</option>
<option value="Pediatric Surgery">Pediatric Surgery</option>
<option value="Pediatrics">Pediatrics</option>
<option value="Pulmonary Medicine">Pulmonary Medicine</option>
<option value="Psychiatry">Psychiatry</option>
<option value="Physiotherapy">Physiotherapy</option>
<option value="Radiology">Radiology</option>
<option value="Rheumatology">Rheumatology</option>
<option value="Pathology">Pathology</option>
<option value="Dietetics">Dietetics</option>
<option value="Neurology">Neurology</option>
<option value="Urology">Urology</option>
<option style="color:red;font-size:20px;">Doctor's</option>
<option value="Doctor">Doctor</option>
<option value="Doctor Detail">Doctor Detail</option>
<option style="color:red;font-size:20px;">Patient</option>
<option value="Self-Financed Patients">Self-Financed Patients</option>
<option value="Admission Process">Admission Process</option>
<option value="Other Facilities">Other Facilities</option>
<option value="Guideline For Visitors">Guideline For Visitors</option>
<option value="Goverment Schemes">Goverment Schemes</option>
<option value="Patient & Attendant Rights">Patient & Attendant Rights</option>
<option value="International Patients">International Patients</option>
<option value="Facilities in OPD">Facilities in OPD</option>
<option value="Corparate Patients">Corparate Patients</option>
<option value="Online Conultation & telecnsultaion policy">Online Conultation & telecnsultaion policy</option>
<option value="Insurance Patients">Insurance Patients</option>
<option value="Home Isolation">Home Isolation</option>
<option value="Our Culture">Our Culture</option>
<option value="Discharge Process">Discharge Process</option>
<option value="Our Campus">Our Campus</option>
<option value="Facilities in IPD">Facilities in IPD</option>
<option style="color:red;font-size:20px;">Acedemic</option>
<option value="DNB">DNB</option>
<option value="Nursing">Nursing</option>
<option value="Physiotherapy">Physiotherapy</option>
<option value="Dietetics">Dietetics</option>
<option style="color:red;font-size:20px;">Resourcess</option>
<option value="Blog">Blog</option>
<option value="Video">Video</option>
<option value="Audio">Audio</option>
<option value="Download">Download</option>
<option value="Gallery">Gallery</option>
<option style="color:red;font-size:20px;">News & Updates</option>
 <option value="Latest News">Latest News</option>
 <option value="Testimonial">Testimonial</option>
 <option value="Event">Event</option>
 <option value="Media Coverage">Media Coverage</option>
<option value="BMW">BMW</option>
<option value="Health Care Updates">Health Care Updates</option>
<option style="color:red;font-size:20px;">Career</option>
<option value="Life At CHRC">Life At CHRC</option>
<option value="Our HR Policy">Our HR Policy</option>
<option value="Job Profiles">Job Profiles</option>
<option style="color:red;font-size:20px;">Checkup Packages</option>
    <option value="Packages">Packages</option>
    <option value="PackagesDescription">PackagesDescription</option>
    <option value="servicedetails">servicedetails</option>
<option style="color:red;font-size:20px;">Contact</option>
    <option value="Contact">Contact</option>
    </select>
</div>
<div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Feature Image</b></h4>
<input type="file" class="form-control" id="postimage" name="postimage"  required>
</div>
</div>
</div>


<button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save and Post</button>
 <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
                                        </form>
                                    </div>
                                </div> <!-- end p-20 -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



                    </div> <!-- container -->

                </div> <!-- content -->

           <?php include('includes/footer.php');?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>
        <!-- Select 2 -->
        <script src="../plugins/select2/js/select2.min.js"></script>
        <!-- Jquery filer js -->
        <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- page specific js -->
        <script src="assets/pages/jquery.blog-add.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>

            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 240,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });
                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });
            });
        </script>
  <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>

    


    </body>
</html>
<?php } ?>

