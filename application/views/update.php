<?php

$conn=mysqli_connect("localhost","root","","arts");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}
 
// Define variables and initialize with empty values
$Name = $Category = $Size = $Date = $Directory = $Art_Name ="";
$Name_err = $Category_err = $Size_err = $Date_err = $Directory_err = $Art_Name_err ="";
 
// Processing form data when form is submitted
if(isset($_POST['Id']) && !empty($_POST['Id'])){
    // Get hidden input value
    $Id = $_POST['Id'];
    
    // Validate Artist Name
    $input_Name = trim($_POST["Name"]);
    if(empty($input_Name)){
        $Name_err = "Please enter a name.";
    } elseif(!filter_var($input_Name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $Name_err = "Please enter a valid name.";
    } else{
        $Name = $input_Name;
    }

     // Validate  Art name
    $input_Art_Name = trim($_POST["Art_Name"]);
    if(empty($input_Art_Name)){
        $Art_Name_err = "Please enter the Art Name.";     
    } else{
        $Art_Name = $input_Art_Name;
    }
    
    // Validate  Category
    $input_Category = trim($_POST["Category"]);
    if(empty($input_Category)){
        $Category_err = "Please enter Category.";     
    } else{
        $Category = $input_Category;
    }
    
    // Validate Size
    $input_Size = trim($_POST["Size"]);
    if(empty($input_Size)){
        $Size_err = "Please enter the Size .";     
   
    } else{
        $Size = $input_Size;
    }

    // Validate Date
    $input_Date = trim($_POST["Date"]);
    if(empty($input_Date)){
         $Date_err = "Please enter the Date.";     
    } else{
         $Date = $input_Date;
    }
    
    // Validate Directory
    $input_Directory = trim($_POST["Directory"]);
    if(empty($input_Directory)){
        $Directory_err = "Please enter the Directory.";
    } else{
        $Directory = $input_Directory;
    }
    // Check input errors before inserting in database
   // if(empty($Name_err) && empty($Category_err) && empty($Size_err) empty($Date_err) && empty($Directory_err)){
        // Prepare an update statement
        $sql = "UPDATE arts_info SET ''=?, Name=?, Art_Name=?, Category=?, Size=? ,Date=? ,Directory=? WHERE Id=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_Name, $param_Art_Name, $param_Category, $param_Size,$param_Date, $param_Directory , $param_Id);
            
            // Set parameters
            $param_Name = $Name;
            $param_Art_Name = $Art_Name;
            $param_Category = $Category;
            $param_Size = $Size;
            $param_Date = $Date;
            $param_Directory = $Directory;
             $param_Id = $Id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: go");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    //}
    
    // Close connection
    mysqli_close($conn);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["Id"]) && !empty(trim($_GET["Id"]))){
        // Get URL parameter
        $Id =  trim($_GET["Id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM arts_info WHERE Id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_Id);
            
            // Set parameters
            $param_Id = $Id;
            
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
                    // URL doesn't contain valid id. Redirect to error page
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location:error");
        exit();
    }
}
?>

<?php include 'partials/header.php' ?>
  
  <div class="container">
    
	<main>
		<h1>Update art details <span><a href="#">< Update</a></span></h1>
		<p>Please edit the input values and submit to update the record.</p>
		<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($Name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="Name" class="form-control" value="<?php echo $Name; ?>">
                            <span class="help-block"><?php echo $Name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($Art_Name_err)) ? 'has-error' : ''; ?>">
                            <label>Art Name</label>
                            <input type="text" name="Art_Name" class="form-control" value="<?php echo $Art_Name; ?>">
                            <span class="help-block"><?php echo $Art_Name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($Category_err)) ? 'has-error' : ''; ?>">
                            <label>Category</label>
                            <input type="text" name="Category" class="form-control" value="<?php echo $Category; ?>">
                            <span class="help-block"><?php echo $Category_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Size_err)) ? 'has-error' : ''; ?>">
                            <label>Size</label>
                            <input type="varchar" name="Size" class="form-control" value="<?php echo $Size; ?>">
                            <span class="help-block"><?php echo $Size_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Date_err)) ? 'has-error' : ''; ?>">
                            <label>Date</label>
                            <input type="text" name="Date" class="form-control" value="<?php echo $Date; ?>">
                            <span class="help-block"><?php echo $Date_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Directory_err)) ? 'has-error' : ''; ?>">
                            <label>Directory</label>
                            <input type="text" name="Directory" class="form-control" value="<?php echo $Directory; ?>">
                            <span class="help-block"><?php echo $Directory_err;?></span>
                        </div>
                        <input type="hidden" name="Id" value="<?php echo $Id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="<?php echo base_url ('index.php/Home/go'); ?>" class="btn btn-default">Cancel</a>
                    </form>
		
		
		 <?php include 'partials/footer.php' ?>








	