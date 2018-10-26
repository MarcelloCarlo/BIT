<?php
	include_once('dbconn.php');
 
	$SelectOfficialSQL = "SELECT bitdb_r_citizen.Salutation, bitdb_r_citizen.First_Name, IFNULL(bitdb_r_citizen.Middle_Name,"") AS Middle_Name, bitdb_r_citizen.Last_Name, IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Ext, bitdb_r_citizen.Gender, bitdb_r_citizen.Birthdate, bitdb_r_citizen.Street, bitdb_r_citizen.Zone, bitdb_r_barangayposition.PosName FROM bitdb_r_barangayofficial INNER JOIN bitdb_r_citizen ON bitdb_r_citizen.Citizen_ID = bitdb_r_barangayofficial.CitizenID INNER JOIN bitdb_r_barangayposition ON bitdb_r_barangayofficial.PosID = bitdb_r_barangayposition.PosID";
	
	$SelectOfficialQuery = mysqli_query($bitMysqli,$SelectOfficialSQL) or die(mysqli_error($bitMysqli));
	if (mysqli_num_rows($SelectOfficialQuery) > 0)
	{
		while($row = mysqli_fetch_assoc($SelectOfficialQuery))
		{
			$Salutation = $row['Salutation'];
			$First_Name = $row['First_Name'];
			$Middle_Name = $row['Middle_Name'];
			$Last_Name = $row['Last_Name'];
			$Name_Ext = $row['Name_Ext'];
			$Gender = $row['Gender'];
			$Birthdate = $row['Birthdate'];
			$Street = $row['Street'];
			$Zone = $row['Zone'];
			$PosName = $row['PosName'];
			$WName = "".$Salutation." ".$First_Name." ".$Middle_Name." ".$Last_Name." ".$Name_Ext."";
			echo
			'<tr>
                <td>'.$WName.'</td>
                <td>'.$PosName.'</td>
                <td>'.$Gender.'</td>
                <td>'.$Birthdate.'</td>
                <td>Parupao St.</td>
                <td>Takbuhan</td>
                <td>
				<button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#delegateOfcModal">
					<i class="material-icons">mode_edit</i>
					<span>EDIT</span>
                </button>
				</td>
            </tr>';
		}
		
	}
?>