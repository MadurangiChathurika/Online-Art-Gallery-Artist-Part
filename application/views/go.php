<?php

$conn=mysqli_connect("localhost","root","","arts");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}

?>


<?php include 'partials/header.php' ?>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Art Details</h2>
                        <a href="<?php echo base_url ('index.php/Home/create'); ?>" class="btn btn-success pull-right">Add New Art</a>
                    </div>
                    <?php
                    // Include config file
                   
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM arts_info";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Art_Name</th>";
                                        echo "<th>Category</th>";
                                        echo "<th>Size</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>Directory</th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['Id'] . "</td>";
                                        echo "<td>" . $row['Name'] . "</td>";
                                        echo "<td>" . $row['Art_Name'] . "</td>";
                                        echo "<td>" . $row['Category'] . "</td>";
                                        echo "<td>" . $row['Size'] . "</td>";
                                        echo "<td>" . $row['Date'] . "</td>";
                                        echo "<td>" . $row['Directory'] . "</td>";

                                        echo "<td>";
                                            echo "<a href='view?Id=". $row['Id'] ." 'title='View Arts' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update?Id=". $row['Id'] ." 'title='Update Details' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete?Id=". $row['Id'] ." 'title='Delete Arts' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>        
        </div>
    </div>

   <?php include 'partials/footer.php' ?>