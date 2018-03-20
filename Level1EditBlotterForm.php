<?php
	include_once('dbconn.php');

	$BlotterID = $_POST['BlotterID'];
	$IncidentDate = $_POST['IncidentDate'];
	$ComplaintDate = $_POST['ComplaintDate'];
	$Complainant = $_POST['Complainant'];
	$AccusedID = $_POST['AccusedID'];
	$Accused = $_POST['Accused'];
	$BlotterType = $_POST['BlotterType'];
	$ComplaintStatement = $_POST['ComplaintStatement'];
	$Resolution = $_POST['Resolution'];
	if($_POST['Comp_Status'] == "Active")
	{
		$ComplaintStatus = 1;
	}
	else
	{
		$ComplaintStatus = 0;
	}
	
	$Level1EditBlotterSQL = 'UPDATE bitdb_r_blotter SET
								IncidentDate = "'.$IncidentDate.'",
								ComplaintDate = "'.$ComplaintDate.'",
								Complainant = "'.$Complainant.'",
								Accused = '.$AccusedID.',
								ComplaintStatement = "'.$ComplaintStatement.'",
								ComplaintStatus = '.$ComplaintStatus.',
								Resolution = "'.$Resolution.'",
								BlotterType = "'.$BlotterType.'" 
					WHERE BlotterID ='.$BlotterID.' ';
	$Level1EditBlotterQuery = mysqli_query($bitMysqli,$Level1EditBlotterSQL) or die (mysqli_error($bitMysqli));
	

	if($_POST['Summon'] == "Active")
	{
		$SummonSchedule = $_POST['SummonSched'];
		$SummonPlace = $_POST['SummonPlace'];

		$Level1AddSummonSQL = 'INSERT INTO bitdb_r_summons(BlotterID,SummonSched,SummonPlace,SummonStatus) VALUES('.$BlotterID.',"'.$SummonSchedule.'","'.$SummonPlace.'",1)';
		$Level1AddSummonQuery = mysqli_query($bitMysqli,$Level1AddSummonSQL) or die (mysqli_error($bitMysqli));
	}
	$header = 'Location:/BIT/Level1AddEditBlotter.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>