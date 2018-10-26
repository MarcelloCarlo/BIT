<?php
	include_once('dbconn.php');

	$ActivityID = $_POST['ActivityID'];
	$ProjectID = $_POST['ProjectID'];
	$ActivityName = $_POST['editActivityName'];
	$ActivityDesc = $_POST['ActivityDesc'];
	$ActivityBudget = $_POST['ActivityBudget'];
	$CitizenID = $_POST['CitizenID'];
	$StartDate = $_POST['ProjectStart'];
	$FinishDate = $_POST['ProjectFinish'];
	if($_POST['ActStat'] == "Active")
	{
		$ActivityStatus = 1;
	}
	else
	{
		$ActivityStatus = 0;
	}


	$Level1EditProjectSQL = 'UPDATE bitdb_r_projectactivity 
							SET ProjectID='.$ProjectID.',
								ActivityName="'.$ActivityName.'",
								ActivityDesc="'.$ActivityDesc.'",
								ActivityBudget='.$ActivityBudget.',
								PeopleInvolve='.$CitizenID.',
								StartDate="'.$StartDate.'",
								FinishDate="'.$FinishDate.'",
								ActivityStatus='.$ActivityStatus.' 
							WHERE ActivityID='.$ActivityID.' ';
	$Level1EditProjectQuery = mysqli_query($bitMysqli,$Level1EditProjectSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/Level1AddEditProjects.php?Project='.$ProjectID.' ';
	header($header);
?>