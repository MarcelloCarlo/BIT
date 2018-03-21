<?php
	include_once('dbconn.php');

	$ID = $_POST['ZoneID'];
	$Name = $_POST['ZoneName'];
	$Identity = $_POST['BarangayIdentity'];
	if($_POST['Zone_Status'] == "Active")
	{
		$Status = 1;
	}
	else
	{
		$Status = 0;
	}

	$AdminEditZoneSQL = 'UPDATE bitdb_r_barangayzone SET BarangayIdentity="'.$Identity.'",Zone="'.$Name.'",ZoneStatus='.$Status.' WHERE ZoneID='.$ID.' ';
	$AdminEditzoneQuery = mysqli_query($bitMysqli,$AdminEditZoneSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/AdBarangayZones.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>