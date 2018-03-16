<?php
include_once('dbconn.php');
// Check connection
if($bitMysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST['term'])){
    // Prepare a select statement
    $sql = "SELECT bitdb_r_citizen.Citizen_ID,CONCAT_WS('',bitdb_r_citizen.First_Name,' ',bitdb_r_citizen.Middle_Name,' ',bitdb_r_citizen.Last_Name,' ',bitdb_r_citizen.Name_Ext) AS FullName FROM `bitdb_r_barangayofficial` INNER JOIN `bitdb_r_citizen` ON bitdb_r_barangayofficial.CitizenID = bitdb_r_citizen.Citizen_ID WHERE LOWER(CONCAT(IFNULL(bitdb_r_citizen.Salutation,''),IFNULL(bitdb_r_citizen.First_Name,''),IFNULL(bitdb_r_citizen.Middle_Name,''),IFNULL(bitdb_r_citizen.Last_Name,''),IFNULL(bitdb_r_citizen.Name_Ext,''))) LIKE ?";
    
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
                    echo '<p>
                            <label id="NameResult">' . $row["FullName"] . '</label>
                            <small class="hide"> '.$row["Citizen_ID"].'</small>
                            </p>';
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