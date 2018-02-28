<?php
include_once('dbconn.php');
// Check connection
if($bitMysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST['term'])){
    // Prepare a select statement
    $sql = "SELECT Citizen_ID,CONCAT_WS('',Salutation,' ',First_Name,' ',Middle_Name,' ',Last_Name,' ',Name_Ext) AS FullName FROM `bitdb_r_citizen` WHERE LOWER(CONCAT(IFNULL(Salutation,''),IFNULL(First_Name,''),IFNULL(Middle_Name,''),IFNULL(Last_Name,''),IFNULL(Name_Ext,''))) LIKE ?";
    
    if($stmt = mysqli_prepare($bitMysqli, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = '%'. $_REQUEST['term'] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<p>" . $row["FullName"] . "</p>";
                    echo "<p>".$row["Citizen_ID"]."</p>";
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($bitMysqli);
        }
    }
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($bitMysqli);
?>