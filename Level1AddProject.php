<?php
	include_once('dbconn.php');

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

	$Level1AddProjectSQL = 'INSERT INTO bitdb_r_project(ProjectName,ProjectCategory,ProjectLocation,ProjectDesc,ProjectStatus,ProjectBudget) VALUES("'.$ProjectName.'",'.$ProjectCategory.','.$ProjectZone.',"'.$ProjectDesc.'","'.$ProjectStatus.'","'.$ProjectBudget.'")';
	$Level1AddProjectQuery = mysqli_query($bitMysqli,$Level1AddProjectSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/Level1AddEditProjects.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>