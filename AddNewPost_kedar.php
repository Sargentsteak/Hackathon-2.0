<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php $_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"]; Confirm_Login(); ?>
<?php
if(isset($_POST["Submit"])){
 $PostTitle = $_POST["PostTitle"];
 $Category  = $_POST["Category"];
 $Image     = $_FILES["Image"]["name"];
 $Target    = "Uploads/".basename($_FILES["Image"]["name"]);
 $PostText  = $_POST["PostDescription"];
 $Admin = $_SESSION["AdminName"];
 date_default_timezone_set("Asia/Kolkata");
 $CurrentTime=time();
 $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);

 if(empty($PostTitle)){
  $_SESSION["ErrorMessage"]= "Title cannot be empty!";
  Redirect_to("AddNewPost.php");
}elseif (strlen($PostTitle)<6) {
  $_SESSION["ErrorMessage"]= "Post Title should be greater than 5 charachters";
  Redirect_to("AddNewPost.php");
}elseif (strlen($Category)>9999) {
  $_SESSION["ErrorMessage"]= "Post Description Should be lesser than 10000 charachters";
  Redirect_to("AddNewPost.php");
}else {
  // Query to insert Post into database when everything is ok
  global $ConnectingDB;
  $sql = "INSERT INTO posts(datetime,title,category,author,image,post)";
  $sql .="VALUES(:dateTime,:postTitle,:categoryName,:adminName,:imageName,:postDescription)";
  $stmt =$ConnectingDB->prepare($sql);
  $stmt->bindValue('dateTime',$DateTime);
  $stmt->bindValue('postTitle',$PostTitle);
  $stmt->bindValue(':categoryName',$Category);
  $stmt->bindValue(':adminName',$Admin);
  $stmt->bindValue('imageName',$Image);
  $stmt->bindValue('postDescription',$PostText);
  $Execute=$stmt->execute();
  move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);

  if($Execute){
  $_SESSION["SuccessMessage"]="Post with id : ".$ConnectingDB->lastInsertId()." Added Successfully";
  Redirect_to("AddNewPost.php");
}else {
  $_SESSION["ErrorMessage"]= "Something went wrong | Try again!";
  Redirect_to("AddNewPost.php");
}
}
}//end of submit button if condition
 ?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/93860edfe3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/Styles.css">
    <title>Add New Project</title>
  </head>
  <body>
    <!--NAVBAR-->
    <div style="height:10px; background:#27aae1;"></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <div class="container">
      <a href="Blog.php?page=1" class="navbar-brand">Dashboard</a>
       <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon"></span>
       </button>
    <div class="collapse navbar-collapse" id="navbarcollapseCMS">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <a href="MyProfile.php" class="nav-link"><i class="fas fa-user text-success"></i> My Profile</a>
        </li>
        <li class="nav-item">
        <a href="Dashboard.php" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item">
        <a href="Categories.php" class="nav-link">Categories</a>
        </li>
        <li class="nav-item">
        <a href="Admins.php" class="nav-link">Manage Admins</a>
        </li>
        <li class="nav-item">
        <a href="Comments.php" class="nav-link">Queries</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      <li><a href="Logout.php" class="navlink text-danger"><i class="fas fa-user-times "></i> Logout</a></li>
      </ul>
     </div>
     </div>
   </nav>

    <!-- NAVBAR END -->
    <!--HEADER-->
      <div style="height:10px; background:#27aae1;"></div>
    <header class="bg-dark text-white py-3">
      <div class="container">
       <div class="row">
         <div class="col-md-12">
       <h1 style="color:rgb(255 188 0)"><i class="fas fa-user-edit" style="color:#27aae1"></i>  Add New Project</h1>
        </div>
       </div>
      </div>
    </header>

    <!--HEADER END-->

    <!--Main Area-->
      <section class="container py-3 mb-4">
<div class="row" style="min-height:50px; ;">
  <div class="offset-lg-1 col-lg-10" style="min-height:650px;">
    <?php echo ErrorMessage();
          echo SuccessMessage();
    ?>
   <form class="" action="AddNewPost.php" method="post" enctype="multipart/form-data">
   <div class="card bg-secondary text-light mb-4">
       <div class="card-body bg-dark">
         <div class="form-group">
          <label for="title"><span class="FieldInfo" style="color:rgb(255 188 0)"> Project Name : </span></label>
          <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Enter Project Name"value="">
         </div>
         <div class="form-group">
          <label for="title"><span class="FieldInfo" style="color:rgb(255 188 0)"> Company : </span></label>
          <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Enter Company Name"value="">
         </div>
         <div class="form-group">
          <label for="title"><span class="FieldInfo" style="color:rgb(255 188 0)"> Lauch Date : </span></label>
          <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Enter the Lauch Date"value="">
         </div>
         <div class="form-group">
          <label for="title"><span class="FieldInfo" style="color:rgb(255 188 0)"> Priority : </span></label>
          <select class="form-control">
            <option class="form-control" disabled>Select Priority</option>
            <option class="form-control">High</option>
            <option class="form-control">Moderate</option>
            <option class="form-control">Low</option>
          </select>
         </div>

        <div class="form-group">
         <label for="title"><span class="FieldInfo" style="color:rgb(255 188 0)"> Choose Category : </span></label>
         <select class="form-control" id="CategoryTitle" name="Category">
          <?php
          //Fetching all categories from category table
        global $ConnectingDB;
         $sql = "SELECT id,title FROM category";
         $stmt = $ConnectingDB->query($sql);
         while ($DateRows = $stmt->fetch()) {
          $Id = $DateRows["id"];
          $CategoryName = $DateRows["title"];
           ?>
           <option><?php echo $CategoryName; ?></option>
         <?php } ?>

           </select>
       </div>
       <div class="form=group mb-1">
       <div class="custom-file">
        <input class="custom-file-input" type="File" name="Image" id="imageSelect"value="">
        <label for="imageSelect" class="custom-file-label">Select Image From Your Device</label>
        </div>
      <div class="form-group mb-1" >
        <label for="Post"><span class="FieldInfo" style="color:rgb(255 188 0)"> Message: </span></label>
        <textarea class="form-control">Special Requirements</textarea>
      </div>
       </div>
   <div class="row" >
     <div class="col-lg-6 mb-2">
       <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashboard</a>
     </div>
     <div class="col-lg-6 mb-2">
     <button type="submit" name="Submit" class="btn btn-success btn-block">
     <i class="fas fa-check"></i> Create Project
       </button>
     </div>
   </div>
   </div>
   </div>
   </form>
  </div>
</div>
</section>
  <div style="height:10px; background:#27aae1;"></div>



    <!--Main Area End-->

    <!-- FOOTER -->
    <div style="height:10px; background:#27aae1;"></div>
   <footer class="bg-dark text-white">
   <div class="container">
     <div class="row">
   <div class="col">
      <p class="lead text-center">This is a sample design | <span id="year"></span> &copy --- All rights reserved</p>
     </div>
     </div>
     </div>
   </footer>
   <div style="height:10px; background:#27aae1;"></div>
   <!--FOOTER END-->


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
 <script>
   $('#year').text(new Date().getFullYear());
 </script>

  </body>
  </html>
