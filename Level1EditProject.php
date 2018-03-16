<?php
	include_once('dbconn.php');

	$ProjectID = $_POST['ProjectID'];
	$ProjectName = $_POST['ProjectName'];
	$ProjectLoc = $_POST['ProjectLoc'];
	$ProjectDesc = $_POST['ProjectDesc'];
	$ProjectPhase = $_POST['ProjectPhase'];
	$ProjectStart = $_POST['ProjectStart'];
	$ProjectFinish = $_POST['ProjectFinish'];
	$ProjectSponsorID = $_POST['ProjectSponsorID'];
	if($_POST['ProjectStatus'] == "Active")
	{
		$ProjectStatus = 1;
	}
	else
	{
		$ProjectStatus = 0;
	}

	$Level1EditProjectSQL = 'UPDATE bitdb_r_project SET ProjectName="'.$ProjectName.'",ProjectLoc="'.$ProjectLoc.'",ProjectDesc="'.$ProjectDesc.'",ProjectPhases='.$ProjectPhase.',DateStart="'.$ProjectStart.'",DateFinish="'.$ProjectFinish.'",ProjectStatus='.$ProjectStatus.', PeopleInvolved='.$ProjectSponsorID.' WHERE ProjectID='.$ProjectID.' ';
	$Level1EditProjectQuery = mysqli_query($bitMysqli,$Level1EditProjectSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/Level1ProjectMonitoring.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>