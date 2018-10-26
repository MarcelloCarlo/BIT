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

	if($_POST['Summon'] == "Active")
	{
		$BlotterMaxSQL = 'SELECT MAX(BlotterID) AS BlotterID FROM bitdb_r_blotter';
		$BlotterMaxQuery = mysqli_query($bitMysqli,$BlotterMaxSQL) or die (mysqli_error($bitMysqli));
		if(mysqli_num_rows($BlotterMaxQuery) > 0)
		{
			while($row = mysqli_fetch_assoc($BlotterMaxQuery))
			{
				$BlotterMax = $row['BlotterID'];
			}
		}
		$SummonSchedule = $_POST['SummonSched'];
		$SummonPlace = $_POST['SummonPlace'];

		$Level1AddSummonSQL = 'INSERT INTO bitdb_r_summons(BlotterID,SummonSched,SummonPlace,SummonStatus) VALUES('.$BlotterMax.',"'.$SummonSchedule.'","'.$SummonPlace.'",1)';
		$Level1AddSummonQuery = mysqli_query($bitMysqli,$Level1AddSummonSQL) or die (mysqli_error($bitMysqli));
	}
	$header = 'Location:Level1Blotter.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>