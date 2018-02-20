<?php
	include_once('dbconn.php');
	
	$ConfigSQL = "
				SELECT 
					IFNULL(bitdb_r_config.ProvinceName,'NOT SET') AS ProvinceName,
					IFNULL(bitdb_r_config.Municipality,'NOT SET') AS Municipality,
					IFNULL(bitdb_r_config.BarangayType,'NOT SET') AS BarangayType,
					IFNULL(bitdb_r_config.CityType,'NOT SET') AS CityType,
					IFNULL(bitdb_r_config.BarangayName,'NOT SET') AS BarangayName,
					IFNULL(bitdb_r_citizen.Salutation,'') AS Salutation, 
					IFNULL(bitdb_r_citizen.First_Name,'') AS First_Name, 
					IFNULL(bitdb_r_citizen.Middle_Name,'') AS Middle_Name, 
					IFNULL(bitdb_r_citizen.Last_Name,'') AS Last_Name,
					IFNULL(bitdb_r_citizen.Name_Ext,'') AS Name_Ext 
				FROM bitdb_r_config 
				INNER JOIN bitdb_r_barangayofficial 
					ON 
					bitdb_r_config.Signatory = bitdb_r_barangayofficial.Brgy_Official_ID 
				INNER JOIN bitdb_r_citizen 
					ON 
					bitdb_r_citizen.Citizen_ID = bitdb_r_barangayofficial.CitizenID";
// If you have collation problems, uncomment this comment block below the above block to test the compatibility//
/* after you test which one suits you, Try to check the collation of your current database and make sure it is/isn't (Your decision)
    case sensitive */
/*    $ConfigSQL = "
				SELECT 
					IFNULL(bitdb_r_config.ProvinceName,'NOT SET') AS ProvinceName,
					IFNULL(bitdb_r_config.Municipality,'NOT SET') AS Municipality,
					IFNULL(bitdb_r_config.BarangayType,'NOT SET') AS BarangayType,
					IFNULL(bitdb_r_config.CityType,'NOT SET') AS CityType,
					IFNULL(bitdb_r_config.BarangayName,'NOT SET') AS BarangayName,
					IFNULL(bitdb_r_citizen.Salutation,'') AS Salutation, 
					IFNULL(bitdb_r_citizen.First_Name,'') AS First_Name, 
					IFNULL(bitdb_r_citizen.Middle_Name,'') AS Middle_Name, 
					IFNULL(bitdb_r_citizen.Last_Name,'') AS Last_Name,
					IFNULL(bitdb_r_citizen.Name_Ext,'') AS Name_Ext 
				FROM bitdb_r_config 
				INNER JOIN bitdb_r_BarangayOfficial 
					ON 
					bitdb_r_config.Signatory = bitdb_r_BarangayOfficial.Brgy_Official_ID 
				INNER JOIN bitdb_r_citizen 
					ON 
					bitdb_r_citizen.Citizen_ID = bitdb_r_BarangayOfficial.CitizenID"; */

	$ConfigQuery = mysqli_query($bitMysqli,$ConfigSQL) or die(mysqli_error($bitMysqli));
	if (mysqli_num_rows($ConfigQuery) > 0)
	{
		while($row = mysqli_fetch_assoc($ConfigQuery))
				{	
					$ProvinceName = $row['ProvinceName'];
					$Municipality = $row['Municipality'];
					$BarangayName = $row['BarangayName'];
					$Salutation = $row['Salutation'];
					$FName = $row['First_Name'];
					$MName = $row['Middle_Name'];
					$LName = $row['Last_Name'];
					$XName = $row['Name_Ext'];
					if($row['BarangayType'] == 'C')
					{
						$b_Type = "Component";
					}
					elseif($row['BarangayType'] == 'I')
					{
						$b_Type = "Independent";
					}
					if($row['CityType'] == 'C')
					{
						$c_Type = "City";
					}
					elseif($row['CityType'] == 'M')
					{
						$c_Type = "Municipality";
					}
					$WName = $Salutation.' '.$FName.' '.$MName.' '.$MName.' '.$LName.' '.$XName.'';
				}
	}
	
?>
