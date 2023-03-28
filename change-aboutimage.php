<?php 
//Database Connection
include('dbconnection.php');
if(isset($_POST['submit']))
  {
  	$id=$_GET['id'];
  	//getting the post values
  $ppic=$_FILES["profilepic"]["name"];
   $oldppic=$_POST['oldpic'];
$oldprofilepic="profilepics"."/".$oldppic;
// get the image extension
$extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
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
$imgnewfile=md5($imgfile).time().$extension;
// Code for move image into directory
move_uploaded_file($_FILES["profilepic"]["tmp_name"],"profilepics/".$imgnewfile);
  // Query for data insertion
     $query=mysqli_query($con, "update tblabout set ProfilePic='$imgnewfile' where id='$id' ");
    if ($query) {
    	//Old pic
    	unlink($oldprofilepic);
    echo "<script>alert('Profile pic updated successfully');</script>";
    echo "<script type='text/javascript'> document.location ='add-about.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
}
include ('../style.php');
?>

<body>
<div class="signup-form">
    <form  method="POST" enctype="multipart/form-data">
 <?php
$id=$_GET['id'];
$ret=mysqli_query($con,"select * from tblabout where id='$id'");
while ($row=mysqli_fetch_array($ret)) {
?>
		<h2>Update </h2>
		<p class="hint-text">Update your profile pic.</p>
<input type="hidden" name="oldpic" value="<?php  echo $row['ProfilePic'];?>">
	<div class="form-group">
<img src="profilepics/<?php  echo $row['ProfilePic'];?>" width="120" height="120">
		</div>

         <div class="form-group">
        	<input type="file" class="form-control" name="profilepic"  required="true">
        	<span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
        </div> 



		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
        </div>
              <?php 
}?>
    </form>

</div>
</body>
</html>