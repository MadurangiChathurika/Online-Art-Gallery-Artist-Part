<?php
// Check existence of id parameter before processing further
if(isset($_GET["Id"]) && !empty(trim($_GET["Id"]))){
   
$conn=mysqli_connect("localhost","root","","arts");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}
    
    // Prepare a select statement
    $sql = "SELECT * FROM arts_info WHERE Id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_Id);
        
        // Set parameters
        $param_Id = trim($_GET["Id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $Name = $row["Name"];
                $Art_Name = $row["Art_Name"];
                $Category = $row["Category"];
                $Size = $row["Size"];
                $Date = $row["Date"];
                $Directory = $row["Directory"];

            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($conn);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error");
    exit();
}
?>
<?php include 'partials/header.php' ?>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Display Arts</h1>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["Name"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>Art Name</label>
                        <p class="form-control-static"><?php echo $row["Art_Name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <p class="form-control-static"><?php echo $row["Category"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Size</label>
                        <p class="form-control-static"><?php echo $row["Size"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <p class="form-control-static"><?php echo $row["Date"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Directory</label>
                        <p class="form-control-static"><?php echo $row["Directory"]; ?></p>
                    </div>
                    <p><a href="<?php echo base_url ('index.php/Home/go'); ?>" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>

   <?php include 'partials/footer.php' ?>