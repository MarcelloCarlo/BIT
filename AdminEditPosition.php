<?php
	include_once('dbconn.php');

	$PositionID = $_POST['PositionID'];
	$PositionName = $_POST['PositionName'];
	$PositionDesc = $_POST['Description'];
	if($_POST['PositionStatus'] == "Active")
	{
		$PositionStatus = 1;
	}
	else
	{
		$PositionStatus = 0;
	}

	$PositionUpdateSQL = 	'UPDATE bitdb_r_barangayposition SET bitdb_r_barangayposition.PosName = "'.$PositionName.'", bitdb_r_barangayposition.PosDesc ="'.$PositionDesc.'", bitdb_r_barangayposition.PosStat ='.$PositionStatus.' WHERE bitdb_r_barangayposition.PosID ='.$PositionID.'';
	$PositionUpdateQuery = mysqli_query($bitMysqli,$PositionUpdateSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/AdOfficePositions.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>