<?php
// Process delete operation after confirmation
if(isset($_POST["Id"]) && !empty($_POST["Id"])){
    // Include config file
$conn=mysqli_connect("localhost","root","","arts");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}
    
    // Prepare a delete statement
    $sql = "DELETE FROM arts_info WHERE Id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_Id);
        
        // Set parameters
        $param_Id = trim($_POST["Id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records deleted successfully. Redirect to landing page
            header("location: go");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($conn);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["Id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error");
        exit();
    }
}
?>

<?php include 'partials/header.php' ?>
  
  <div class="container">
    
	<main>
		<h1>Delete art <span><a href="#">< Delete</a></span></h1>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  class="userform">
		   	<div class="alert alert-danger fade in">
              <input type="hidden" name="Id" value="<?php echo trim($_GET["Id"]); ?>"/>
              <p>Are you sure you want to delete this record?</p><br>
              <p>
              <input type="submit" value="Yes" class="btn btn-danger">
              <a href="<?php echo base_url ('index.php/Home/go'); ?>" class="btn btn-default">No</a>
              </p>
        </div>	
		</form>	

<?php include 'partials/footer.php' ?>






	