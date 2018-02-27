<?php
include_once(dbconn.php);
    if($bitMysqli === false){
        
        die("ERROR: Could not Connect.",.mysqli_connect_error());
    }
if (isset($_REQUEST['term'])){
    $sql = "ung string query";
    
    if($stmt = mysql_prepare($bitMysql,$sql)){
        mysqli_stmt_bind_param($stmt,"s",$param_term);
        
        $param_term = $_REQUEST['term'].'%';
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo"<p>".$row["name"]."</p>"; 
                }
            } else {
                echo"<p>No Matches found<p>";
            }
        } else {
            echo "ERROR: Could not able to execute $sql".mysqli_error($bitMysqli)
        }
        
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($bitMysqli);
?>