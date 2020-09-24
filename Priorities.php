<!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/93860edfe3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/Styles.css">
    <title>Categories</title>
  </head>
  <body>
    <!--NAVBAR-->
    <div style="height:10px; background:#27aae1;"></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <div class="container">
      <a href="Blog.php?page=1" class="navbar-brand">AtharvaLele.Com</a>
       <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon"></span>
       </button>
    <div class="collapse navbar-collapse" id="navbarcollapseCMS">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <a href="MyProfile.php" class="nav-link"><i class="fas fa-user text-success"></i>My Profile</a>
        </li>
        <li class="nav-item">
        <a href="Dashboard.php" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item">
        <a href="Posts.php" class="nav-link">Posts</a>
        </li>
        <li class="nav-item">
        <a href="Categories.php" class="nav-link">Categories</a>
        </li>
        <li class="nav-item">
        <a href="Admins.php" class="nav-link">Manage Admins</a>
        </li>
        <li class="nav-item">
        <a href="Comments.php" class="nav-link">Comments</a>
        </li>
        <li class="nav-item">
        <a href="Blog.php?page=1" class="nav-link">Live Blog</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      <li><a href="Logout.php" class="navlink text-danger"><i class="fas fa-user-times "></i>Logout</a></li>
      </ul>
     </div>
     </div>
   </nav>
   <div style="height:10px; background:#27aae1;"></div>
    <!-- NAVBAR END -->
    <!--HEADER-->
    <header class="bg-dark text-white py-3">
      <div class="container">
       <div class="row">
         <div class="col-md-12">
       <h1 style="color:#27aae1"><i class="fas fa-user-edit" style="color:#27aae1"></i>  Manage Categories</h1>
        </div>
       </div>
      </div>
    </header>
    <!--HEADER END-->

    <!--Main Area-->
<section class="container py-2 mb-4">
<div class="row" style="min-height:50px; ;">
  <div class="offset-lg-1 col-lg-10" style="min-height:650px;">
    <?php echo ErrorMessage();
          echo SuccessMessage();
    ?>
   <form class="" action="Categories.php" method="post">
   <div class="card bg-secondary text-light mb-3">
       <div class="card-header FieldInfo">
         <h1><span>Add New Category</span></h1>
       </div>
  <div class="card-body bg-dark">
         <div class="form-group">
          <label for="title"><span class="FieldInfo"> Category Title : </span></label>
          <input class="form-control" type="text" name="CategoryTitle" id="title" placeholder="Type Title Here"value="">
        </div>
   <div class="row" >
     <div class="col-lg-6 mb-2">
       <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashboard</a>
     </div>
     <div class="col-lg-6 mb-2">
     <button type="submit" name="Submit" class="btn btn-success btn-block">
     <i class="fas fa-check"></i> Publish
       </button>
     </div>
   </div>
   </div>
   </div>
   </form>
   <h2 class="FieldInfo" style="color:green">Existing Categories</h2>
   <table class="table tabel-striped table-hover">
     <thead class="thead-dark">
       <tr class="FieldInfo">
         <th>Sr No.</th>
         <th>Date & Time</th>
         <th>Category Name</th>
         <th>Creator name</th>
         <th>Action</th>
       </tr>
     </thead>


     <!--footer--->
     <div style="height:10px; background:#27aae1;"></div>
     <footer class="bg-dark text-white">
         <div class="container">
             <div class="row">
                 <p class="lead text-center"><Thisis a sample design | <span id="year"></span> &copy ---ALl rights reserved</p>
                </div>
                </div>
                </div>
</footer>
<div style="height:10px; background:27aae1;"></div>
<!---Footerend--->

    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script>
    $('#year').text(new date()).getFullYear());
</script>

</body>
</html>
