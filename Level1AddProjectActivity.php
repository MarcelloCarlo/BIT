<?php
	include_once('dbconn.php');

	$ProjectID = $_POST['ProjectID'];
	$ActivityName = $_POST['ActivityName'];
	$ActivityDesc = $_POST['ActivityDesc'];
	$ActivityBudget = $_POST['ActivityBudget'];
	$CitizenID = $_POST['CitizenID'];
	$StartDate = $_POST['StartDate'];
	$FinishDate = $_POST['FinishDate'];
	if($_POST['ActStat'] == "Active")
	{
		$ActivityStatus = 1;
	}
	else
	{
		$ActivityStatus = 0;
	}

	$Level1AddProjectSQL = 'INSERT INTO bitdb_r_projectactivity(ProjectID,ActivityName,ActivityDesc,ActivityBudget,PeopleInvolve,StartDate,FinishDate,ActivityStatus) VALUES('.$ProjectID.',"'.$ActivityName.'","'.$ActivityDesc.'",'.$ActivityBudget.','.$CitizenID.',"'.$StartDate.'","'.$FinishDate.'","'.$ActivityStatus.'")';
	$Level1AddProjectQuery = mysqli_query($bitMysqli,$Level1AddProjectSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/Level1AddEditProjects.php?Project='.$ProjectID.' ';
	header($header);
?>