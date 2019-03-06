<?php
	include('dbconn.php');
	$CertID = $_POST['CertID'];
	$FName = $_POST['FName'];
	$LName = $_POST['LName'];
	if($_POST['MName'] != '')
	{
		$MName = $_POST['MName'];
		$MNameSQL = 'AND bitdb_r_citizen.Middle_Name = "'.$MName.'" ';
	}
	else
	{
		$MNameSQL = '';
	}

	if($_POST['XName'] != '')
	{
		$XName = $_POST['XName'];
		$XNameSQL = 'AND bitdb_r_citizen.Name_Ext = "'.$XName.'" ';
	}
	else
	{
		$XNameSQL = '';
	}

	$Purpose = $_POST['Purpose'];

	$CheckSQL = 'SELECT bitdb_r_citizen.Citizen_ID 
				FROM bitdb_r_citizen 
				WHERE bitdb_r_citizen.First_Name ="'.$FName.'"
				AND bitdb_r_citizen.Last_Name ="'.$LName.'"
				'.$MNameSQL.' '.$XNameSQL.' ';
	$CheckQuery = mysqli_query($bitMysqli,$CheckSQL) or die (mysqli_error($bitMysqli));
	if(mysqli_num_rows($CheckQuery) > 0)
	{
		while($row = mysqli_fetch_assoc($CheckQuery))
		{
			$CitizenID = $row['Citizen_ID'];
		}
		$CheckBlotterSQL = 'SELECT DISTINCT BlotterID FROM bitdb_r_blotter WHERE Accused ='.$CitizenID.' AND ComplaintStatus = 1';
		$CheckBlotterQuery = mysqli_query($bitMysqli,$CheckBlotterSQL) or die (mysqli_error($bitMysqli));
		if(mysqli_num_rows($CheckBlotterQuery) > 0)
		{
			$response = 'You still have pending issue record in the barangay. Please settle the issue record first to clear your record and to be able to use this system.';
		}
		else
		{	

			$InsertRequestSQL = 'INSERT INTO bitdb_r_issuancerequest (CitizenID,IssuanceType,Purpose,RequestDate) VALUES ('.$CitizenID.','.$CertID.',"'.$Purpose.'",CURRENT_DATE)';
			mysqli_query($bitMysqli,$InsertRequestSQL) or die (mysqli_error($bitMysqli));
			$response = 'Successfully Requested. You can get your requested document in the office of your barangay while office hours.';
		}
	}
	else
	{
		$response = 'No Citizen Exists.';
	}

	echo $response;
?>