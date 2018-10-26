<?php
	session_start();
	include_once('dbconn.php');

	$IncidentDate = $_POST['IncidentDate'];
	$IncidentArea = $_POST['IncidentArea'];
	$ComplaintDate = $_POST['ComplaintDate'];
	$Complainant = $_POST['Complainant'];
	$Accused = $_POST['Accused'];
	$BlotterType = $_POST['Subject'];
	$ComplaintStatement = $_POST['ComplaintStatement'];

	if($_POST['AccusedID'] == '')
	{
		$Level1AddBlotterSQL = 'INSERT INTO bitdb_r_blotter
												(IncidentDate,
												IncidentArea,
												ComplaintDate,
												Complainant,
												ComplaintStatement,
												ComplaintStatus,
												BlotterType) 
										VALUES ("'.$IncidentDate.'",
												'.$IncidentArea.',
												"'.$ComplaintDate.'",
												"'.$Complainant.'",
												"'.$ComplaintStatement.'",
												1,
												'.$BlotterType.')';
	}
	else
	{
		$AccusedID = $_POST['AccusedID'];
		$Level1AddBlotterSQL = 'INSERT INTO bitdb_r_blotter
												(IncidentDate,
												IncidentArea,
												ComplaintDate,
												Complainant,
												Accused,
												ComplaintStatement,
												ComplaintStatus,
												BlotterType) 
										VALUES ("'.$IncidentDate.'",
												'.$IncidentArea.',
												"'.$ComplaintDate.'",
												"'.$Complainant.'",
												'.$AccusedID.',
												"'.$ComplaintStatement.'",
												1,
												'.$BlotterType.')';
	}
	
	$Level1AddBlotterQuery = mysqli_query($bitMysqli,$Level1AddBlotterSQL) or die (mysqli_error($bitMysqli));
	$header = 'Location:indexLevel3.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>