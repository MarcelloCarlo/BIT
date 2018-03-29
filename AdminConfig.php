<?php
	include_once('dbconn.php');
	
	$ConfigSQL = '
				SELECT 
					IFNULL(bitdb_r_config.BarangayIdentity,"NOT SET") AS BarangayIdentity,
					IFNULL(bitdb_r_config.ProvinceName,"NOT SET") AS ProvinceName,
					IFNULL(bitdb_r_config.Municipality,"NOT SET") AS Municipality,
					IFNULL(bitdb_r_config.BarangayType,"NOT SET") AS BarangayType,
					IFNULL(bitdb_r_config.CityType,"NOT SET") AS CityType,
					IFNULL(bitdb_r_config.BarangayName,"NOT SET") AS BarangayName,
					IFNULL(bitdb_r_config.MunicipalSeal,"NOT SET") AS MunicipalSeal,
					IFNULL(bitdb_r_config.BarangaySeal,"NOT SET") AS BarangaySeal
					
				FROM bitdb_r_config';
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
					$CaptainSQL = 'SELECT 
									IFNULL(bitdb_r_citizen.Salutation,"") AS Salutation, 
									IFNULL(bitdb_r_citizen.First_Name,"") AS First_Name, 
									IFNULL(bitdb_r_citizen.Middle_Name,"") AS Middle_Name, 
									IFNULL(bitdb_r_citizen.Last_Name,"") AS Last_Name,
									IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Ext 
							FROM bitdb_r_barangayofficial
							INNER JOIN bitdb_r_citizen
							ON bitdb_r_citizen.Citizen_ID = bitdb_r_barangayofficial.CitizenID
							INNER JOIN bitdb_r_barangayposition
							ON bitdb_r_barangayposition.PosID = bitdb_r_barangayofficial.PosID
							WHERE bitdb_r_barangayposition.PosName = "Barangay Captain"';
					$CaptainQuery = mysqli_query($bitMysqli,$CaptainSQL) or die (mysqli_error($bitMysqli));
					if(mysqli_num_rows($CaptainQuery) > 0)
					{
						while($row2 = mysqli_fetch_assoc($CaptainQuery))
						{
							$FName = $row2['First_Name'];
							$MName = $row2['Middle_Name'];
							$LName = $row2['Last_Name'];
							$XName = $row2['Name_Ext'];
							$Salutation = $row2['Salutation'];
							$FullName = ''.$Salutation.' '.$FName.' '.$MName.' '.$LName.' '.$XName.'';
						}
					}
					$BarangaySeal = $row['BarangaySeal'];
					$MunicipalSeal = $row['MunicipalSeal'];
					$BarangayIdentity = $row['BarangayIdentity'];
					$ProvinceName = $row['ProvinceName'];
					$Municipality = $row['Municipality'];
					$BarangayName = $row['BarangayName'];
					
					if($row['BarangayType'] == 'C')
					{
						$b_Type = "Component";
					}
					elseif($row['BarangayType'] == 'I')
					{
						$b_Type = "Independent";
					}
					else
					{
						$b_Type = "NOT SET";
					}
					if($row['CityType'] == 'C')
					{
						$c_Type = "City";
					}
					elseif($row['CityType'] == 'M')
					{
						$c_Type = "Municipality";
					}
					else
					{
						$c_Type = "NOT SET";
					}
					
				}
	}
	
?>
