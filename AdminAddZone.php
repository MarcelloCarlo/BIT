<?php
	include_once('dbconn.php');

	$ZoneName = $_POST['ZoneName'];
	$Identity = $_POST['BarangayIdentity'];
	if($_POST['Zone_Status'] == "Active")
	{
		$Status = 1;
	}
	else
	{
		$Status = 0;
	}

	$AdminAddZoneSQL = 'INSERT INTO bitdb_r_barangayzone(BarangayIdentity,Zone,ZoneStatus,ZoneDate) VALUES("'.$Identity.'","'.$ZoneName.'",'.$Status.',CURRENT_DATE)';
	$AdminAddZoneQuery = mysqli_query($bitMysqli,$AdminAddZoneSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/AdBarangayZones.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>