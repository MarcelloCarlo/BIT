<?php
	include_once('dbconn.php');

	$ProjectName = $_POST['ProjectName'];
	$ProjectLoc = $_POST['ProjectLoc'];
	$ProjectDesc = $_POST['ProjectDesc'];
	$ProjectPhase = $_POST['ProjectPhase'];
	$ProjectStart = $_POST['ProjectStart'];
	$ProjectFinish = $_POST['ProjectFinish'];
	$ProjectSponsor = $_POST['ProjectSponsor'];

	$Level1AddProjectSQL = 'INSERT INTO bitdb_r_project(
											ProjectName,
											ProjectLoc,
											ProjectDesc,
											ProjectPhases,
											DateStart,
											DateFinish,
											ProjectStatus,
											PeopleInvolved) 
							VALUES(
									"'.$ProjectName.'",
									"'.$ProjectLoc.'",
									"'.$ProjectDesc.'",
									"'.$ProjectPhase.'",
									"'.$ProjectStart.'",
									"'.$ProjectFinish.'",
									1,
									"'.$ProjectSponsor.'")';
	$Level1AddProjectQuery = mysqli_query($bitMysqli,$Level1AddProjectSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/Level1ProjectMonitoring.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>