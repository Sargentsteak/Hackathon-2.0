<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
if (isset($_GET["id"])) {
  $SearchqueryParameter = $_GET["id"];
  global $ConnectingDB;
  $sql = "DELETE FROM  category WHERE id='$SearchqueryParameter'";
  $Execute = $ConnectingDB->query($sql);
  if ($Execute) {
    $_SESSION["SuccessMessage"]="Category Deleted Successfully !";
    Redirect_to("Priorities.php");

  }else {
    $_SESSION["ErrorMessage"]="Something Went Wrong | Try Again !";
    Redirect_to("Priorities.php");
  }
}

 ?>
