<?php 
session_start();
include('includes/config.php');

error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['submit']))
  {
  	//getting the post values
    $fname=$_POST['fname'];
   $discription=$_POST['discription'];
     $Address=$_POST['Address'];
      $History=$_POST['History'];
  
 $ppic=$_FILES["profilepic"]["name"];
$extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");

 $ppic1=$_FILES["profilepic1"]["name"];
$extension1 = substr($ppic1,strlen($ppic1)-4,strlen($ppic1));
$allowed_extensions1 = array(".pdf");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else{
 
$imgnewfile=md5($imgfile).time().$extension;
$imgnewfile1=md5($imgfile).time().$extension1;
// Code for move image into directory
move_uploaded_file($_FILES["profilepic"]["tmp_name"],"profilepics/".$imgnewfile);
move_uploaded_file($_FILES["profilepic1"]["tmp_name"],"profilepics/".$imgnewfile1);
// Query for data insertion
$query=mysqli_query($con, "insert into contact(FirstName, discription,Address,History,ProfilePic) value('$fname',  '$discription','$Address','$History','$imgnewfile' )");
if ($query) {
echo "<script>alert('You have successfully inserted the data');</script>";
echo "<script type='text/javascript'> document.location ='contact.php'; </script>";
} else{
echo "<script>alert('Something Went Wrong. Please try again');</script>";
}}
}
}
?>
 <?php include('includes/topheader.php');?>
            <!-- ========== Left Sidebar Start ========== -->
             <?php include('includes/leftsidebar.php');?>
              <?php include('style.php');?>
             <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
<link rel="shortcut icon" href="assets/images/favicon.ico">
        <title>Newsportal | About us Page</title>
<!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />
<link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

    </head>
<body>
<div class="signup-form"><br><br><br>
    <form  method="POST" enctype="multipart/form-data" >
		<h2>Fill Data</h2>
		<p class="hint-text">Fill below form.</p>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="fname" placeholder="URL" required="true"></div>
				
			</div>        	
        </div>
       <div class="form-group">
            <input type="email" class="form-control" name="discription" placeholder="Email" >
        </div> 
         <div class="form-group">
            <textarea class="form-control" name="Address" placeholder="Address" ></textarea>
        </div> 
         <div class="form-group">
            <input type="Number" class="form-control" name="History" placeholder="Contact No" >
        </div> 
        
      <div class="form-group">
        	<input type="file" class="form-control" name="profilepic" >
        	<span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
        </div> 
        	<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
        </div>
    </form>
	<div class="text-center">View Aready Inserted Data!!  <a href="contact.php">View</a></div>
</div>
</body>
</html>