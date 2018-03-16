<?php
	include_once('dbconn.php');

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

	$Level1AddBlotterSQL = 'INSERT INTO bitdb_r_blotter(IncidentDate,ComplaintDate,Complainant,Accused,ComplaintStatement,ComplaintStatus,Resolution,BlotterType) VALUES ("'.$IncidentDate.'","'.$ComplaintDate.'","'.$Complainant.'",'.$AccusedID.',"'.$ComplaintStatement.'",'.$ComplaintStatus.',"'.$Resolution.'","'.$BlotterType.'")';
	$Level1AddBlotterQuery = mysqli_query($bitMysqli,$Level1AddBlotterSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/Level1AddEditBlotter.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>