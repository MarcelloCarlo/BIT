<?php
	include_once('dbconn.php');

	$ProjectID = $_POST['ProjectID'];
	$ProjectName = $_POST['ProjectName'];
	$ProjectCategory = $_POST['ProjectCategory'];
	$ProjectZone = $_POST['ProjectZone'];
	$ProjectDesc = $_POST['ProjectDesc'];
	$ProjectBudget = $_POST['ProjectBudget'];
	if($_POST['ProjectStatus'] == "Active")
	{
		$ProjectStatus = 1;
	}
	else
	{
		$ProjectStatus = 0;
	}

	$Level1EditProjectSQL = 'UPDATE bitdb_r_project SET ProjectName="'.$ProjectName.'", ProjectCategory='.$ProjectCategory.', ProjectLocation='.$ProjectZone.', ProjectDesc="'.$ProjectDesc.'", ProjectBudget="'.$ProjectBudget.'", ProjectStatus='.$ProjectStatus.' WHERE ProjectID='.$ProjectID.' ';
	$Level1EditProjectQuery = mysqli_query($bitMysqli,$Level1EditProjectSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/Level1AddEditProjects.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>