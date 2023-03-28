<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['update']))
{
$doctor_name=$_POST['doctor_name'];
$education=$_POST['education'];
$designation=$_POST['designation'];
$department=$_POST['department'];
$speciality=$_POST['speciality'];
$day=$_POST['day'];
$time=$_POST['time'];
$postdetails=$_POST['postdescription'];
$url1=$_POST['url1'];
$url2=$_POST['url2'];
$url3=$_POST['url3'];
$url4=$_POST['url4'];
$lastuptdby=$_SESSION['login'];
$arr = explode(" ",$posttitle);
$url=implode("-",$arr);
$status=1;
$id=intval($_GET['cid']);
$query=mysqli_query($con,"update tbldoctor set doctor_name='$doctor_name',education='$education',designation='$designation',department='$department',speciality='$speciality',day='$day',time='$time',PostDetails='$postdetails',url1='$url1',url2='$url2',url3='$url3',url4='$url4' where id='$id'");
if($query)
{
$msg="Post updated ";
}
else{
$error="Something went wrong . Please try again.";    
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
                                    <h4 class="page-title">Edit Doctor</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Doctor</a>
                                        </li>
                                        <li class="active">
                                            Add Doctor
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

<?php
$id=intval($_GET['cid']);
$query=mysqli_query($con,"select * from tbldoctor where id='$id' ");
while($row=mysqli_fetch_array($query))
{
?>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
                                        <form name="addpost" method="post">
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Doctor Name</label>
<input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['doctor_name']);?>" name="doctor_name" placeholder="Enter title" required>
</div>
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Doctor Education</label>
<input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['education']);?>" name="education" placeholder="Enter title" required>
</div>
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Doctor Designation</label>
<input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['designation']);?>" name="designation" placeholder="Enter title" required>
</div>
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Doctor Department</label>
<input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['department']);?>" name="department" placeholder="Enter title" required>
</div>
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Doctor Speciality</label>
<input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['speciality']);?>" name="speciality" placeholder="Enter title" required>
</div>
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Day</label>
<input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['day']);?>" name="day" placeholder="Enter title" required>
</div>
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Time</label>
<input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['time']);?>" name="time" placeholder="Enter title" required>
</div>
<div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Post Details</b></h4>
<textarea class="summernote" name="postdescription" required><?php echo htmlentities($row['PostDetails']);?></textarea>
</div>
</div>
</div>
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Videos Url Link1</label>
<input type="text" class="form-control" id="posttitle" name="url1" value="<?php echo htmlentities($row['url1']);?>">
</div>
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Videos Url Link2</label>
<input type="text" class="form-control" id="posttitle" name="url2" value="<?php echo htmlentities($row['url2']);?>">
</div>
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Videos Url Link3</label>
<input type="text" class="form-control" id="posttitle" name="url3" value="<?php echo htmlentities($row['url3']);?>">
</div>
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Videos Url Link4</label>
<input type="text" class="form-control" id="posttitle" name="url4" value="<?php echo htmlentities($row['url4']);?>">
</div>
 <div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Post Image</b></h4>
<img src="postimages/<?php echo htmlentities($row['PostImage']);?>" width="300"/>
<br />
<a href="aboutimage.php?id=<?php echo htmlentities($row['id']);?>">Update Image</a>
</div>
</div>
</div>

<?php } ?>

<button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update </button>

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