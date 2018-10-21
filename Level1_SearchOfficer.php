<?php
include('dbconn.php');
	$Search = $_POST['Search'];

	$Output = '';

	$SearchSQL = 'SELECT 
                        bitdb_r_barangayofficial.Brgy_Official_ID,
                        bitdb_r_Citizen.Citizen_ID, 
                        bitdb_r_barangayposition.PosID, 
                        bitdb_r_citizen.Salutation, 
                        bitdb_r_citizen.First_Name, 
                        IFNULL(bitdb_r_citizen.Middle_Name,"") AS Middle_Name, 
                        bitdb_r_citizen.Last_Name, 
                        IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Ext, 
                        bitdb_r_citizen.Gender, 
                        bitdb_r_citizen.Birthdate, 
                        bitdb_r_citizen.Street, 
                        bitdb_r_barangayzone.Zone, 
                        bitdb_r_barangayposition.PosName 
                FROM    bitdb_r_barangayofficial 
                INNER JOIN bitdb_r_citizen 
                    ON bitdb_r_citizen.Citizen_ID = bitdb_r_barangayofficial.CitizenID 
                INNER JOIN bitdb_r_barangayposition 
                    ON bitdb_r_barangayofficial.PosID = bitdb_r_barangayposition.PosID 
                INNER JOIN bitdb_r_barangayzone
                    ON bitdb_r_citizen.Zone = bitdb_r_barangayzone.ZoneID
                WHERE bitdb_r_citizen.First_Name LIKE "%'.$Search.'%"
                	OR bitdb_r_citizen.Middle_Name LIKE "%'.$Search.'%"
                	OR bitdb_r_citizen.Last_Name LIKE "%'.$Search.'%"
                	OR bitdb_r_citizen.Name_Ext LIKE "%'.$Search.'%"
                LIMIT 5';
    $SearchQuery = mysqli_query($bitMysqli,$SearchSQL) or die (mysqli_error($bitMysqli));
    if(mysqli_num_rows($SearchQuery) > 0)
    {	
    	while($row = mysqli_fetch_assoc($SearchQuery))
    	{
    		$Citizen_ID = $row['Citizen_ID'];
    		$Official_ID = $row['Brgy_Official_ID'];
    		$First_Name = $row['First_Name'];
    		$Middle_Name = $row['Middle_Name'];
    		$Last_Name = $row['Last_Name'];
    		$Name_Ext = $row['Name_Ext'];
    		$Fullname = ''.$First_Name.' '.$Middle_Name.' '.$Last_Name.' '.$Name_Ext.' ';
    		$Output .= '<li style="list-style-type:none"><small class="hide">'.$Citizen_ID.'</small>'.$Fullname.'</li>';
    	}
    }
    else
    {
    	$Output .= '<li style="list-style-type:none"><small></small>No Officer</li>';
    }
    echo $Output;
?>