<?php
include('dbconn.php');
$query0 = 'SELECT bitdb_r_citizen.Citizen_ID, bitdb_r_barangayofficial.Brgy_Official_ID, bitdb_r_citizen.Salutation, bitdb_r_citizen.First_Name, IFNULL(bitdb_r_citizen.Middle_Name,"") AS Middle_Name, bitdb_r_citizen.Last_Name,IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Ext FROM bitdb_r_barangayofficial INNER JOIN bitdb_r_citizen ON bitdb_r_barangayofficial.CitizenID = bitdb_r_citizen.Citizen_ID INNER JOIN bitdb_r_barangayposition ON bitdb_r_barangayofficial.PosID = bitdb_r_barangayposition.PosID WHERE bitdb_r_barangayposition.PosName = "Barangay Captain"';
$RQuery0 = mysqli_query($bitMysqli,$query0) or die(mysqli_error());
if (mysqli_num_rows($RQuery0) > 0)
{
	while($row = mysqli_fetch_assoc($RQuery0))
			{	
				$OfficialID = $row['Brgy_Official_ID'];
				$CitizenID = $row['Citizen_ID'];
				$Salutation = $row['Salutation'];
				$FName = $row['First_Name'];
				$MName = $row['Middle_Name'];
				$LName = $row['Last_Name'];
				$XName = $row['Name_Ext'];
				$WName = $Salutation.' '.$FName.' '.$MName.' '.$MName.' '.$LName.' '.$XName.'';
			}
}
?>