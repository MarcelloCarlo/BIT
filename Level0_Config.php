<?php
	include_once('dbconn.php');
	
	$CityType = "NOT SET";
	$BarangayType = "NOT SET";
	$BarangaySeal = "Default.png";
	$MunicipalSeal = "Default.png";
	$BarangayIdentity = "NOT SET";
	$ProvinceName = "NOT SET";
	$Municipality = "NOT SET";
	$BarangayName = "NOT SET";
	$FullName = "NOT SET";

	$ConfigSQL = 'SELECT 
					IFNULL(bitdb_r_config.BarangayIdentity,"NOT SET") AS BarangayIdentity,
					IFNULL(bitdb_r_config.ProvinceName,"NOT SET") AS ProvinceName,
					IFNULL(bitdb_r_config.Municipality,"NOT SET") AS Municipality,
					IFNULL(bitdb_r_config.BarangayType,"NOT SET") AS BarangayType,
					IFNULL(bitdb_r_config.CityType,"NOT SET") AS CityType,
					IFNULL(bitdb_r_config.BarangayName,"NOT SET") AS BarangayName,
					IFNULL(bitdb_r_config.MunicipalSeal,"NOT SET") AS MunicipalSeal,
					IFNULL(bitdb_r_config.BarangaySeal,"NOT SET") AS BarangaySeal
				FROM bitdb_r_config';

	$ConfigQuery = mysqli_query($bitMysqli,$ConfigSQL) or die(mysqli_error($bitMysqli));
	if (mysqli_num_rows($ConfigQuery) > 0)
	{
		while($row = mysqli_fetch_assoc($ConfigQuery))
		{	
			$CityType = $row['CityType'];
			$BarangayType = $row['BarangayType'];
			$BarangaySeal = $row['BarangaySeal'];
			$MunicipalSeal = $row['MunicipalSeal'];
			$BarangayIdentity = $row['BarangayIdentity'];
			$ProvinceName = $row['ProvinceName'];
			$Municipality = $row['Municipality'];
			$BarangayName = $row['BarangayName'];
		}
	}

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

	if($BarangayType == 'C')
	{
		$BarangayType = "Component";
	}
	elseif($BarangayType == 'I')
	{
		$BarangayType = "Independent";
	}
	else
	{
		$BarangayType = "NOT SET";
	}
	if($CityType == 'C')
	{
		$CityType = "City";
	}
	elseif($CityType == 'M')
	{
		$CityType = "Municipality";
	}
	else
	{
		$CityType = "NOT SET";
	}
	
?>
