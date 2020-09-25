<?php require_once("functions.php");
session_start();
?>

<?php
if (!isset($_SESSION["USER"])) {
  Redirect_to("login.php");
}

$userList = getAllUser();
include 'header.php'; ?>


<div style="margin-left: 15%;">
<div class="card" style="width: 800px;">
  <div class="card-header" style="padding-left: 325px;">
    Create New User
  </div>
  <div class="card-body" style="margin-left: 250px;">
      <form action = "controllers/createUserController.php" method = "POST">
   
<input type="hidden" name="projectManager" value="<?php echo $_SESSION["USER"]->ID ?>" required>
    <label class="form-control-label" style="padding-top: 50px;">Username: </label>
    <input type="text" class="form-control" style="width: 300px;" name="username" value="" required><br>
    <label class="form-control-label">Password </label>
    <input type="text" class="form-control" style="width: 300px;" name="password" value="" required><br>
    Email Id:<input type="email" class="form-control" style="width: 300px;" name="email" value="" required>
    <br><label class="form-control-label">User type : </label>
    <select name="usertype" class="form-control" style="width: 300px;">
      <option disabled>Select User Type</option>
      <option value="MANAGER">Manager</option>
      <option value="TEAMLEAD">Leader</option>
      <option value="RESOURCE">Resource</option>
  </select><br>
    <input type="submit" style="margin-left: 125px;" class="btn btn-primary" name="Submit" value="Create New User">
</form>
  </div>
</div>


<?php include('footer.php'); ?>