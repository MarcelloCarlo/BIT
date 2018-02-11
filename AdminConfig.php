<?php
	include_once('dbconn.php');
	
	$ConfigSQL = "
	SELECT bitdb_r_config.ProvinceName,bitdb_r_config.Municipality,bitdb_r_config.BarangayType,bitdb_r_config.CityType,bitdb_r_config.BarangayName,bitdb_r_citizen.Salutation, bitdb_r_citizen.First_Name, IFNULL(bitdb_r_citizen.Middle_Name,'') AS Middle_Name, bitdb_r_citizen.Last_Name,IFNULL(bitdb_r_citizen.Name_Ext,'') AS Name_Ext FROM bitdb_r_config INNER JOIN bitdb_r_BarangayOfficial ON bitdb_r_config.Signatory = bitdb_r_BarangayOfficial.Brgy_Official_ID INNER JOIN bitdb_r_citizen ON bitdb_r_citizen.Citizen_ID = bitdb_r_BarangayOfficial.CitizenID";
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