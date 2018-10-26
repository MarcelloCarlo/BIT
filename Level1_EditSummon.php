<?php
	session_start();
	include_once('dbconn.php');

	$SummonID = $_POST['SummonID'];
	$SummonSchedule = $_POST['SummonSched'];
	$SummonPlace = $_POST['SummonPlace'];
	if($_POST['Summon_Status'] == "Active")
	{
		$SummonStatus = 1;
	}
	else
	{
		$SummonStatus = 0;
	}

	$Level1EditSummonSQL = 'UPDATE bitdb_r_summons SET SummonSched="'.$SummonSchedule.'",SummonPlace="'.$SummonPlace.'",SummonStatus='.$SummonStatus.' WHERE SummonID = '.$SummonID.' ';
	$Level1EditSummonQuery = mysqli_query($bitMysqli,$Level1EditSummonSQL) or die (mysqli_error($bitMysqli));
	

	$header = 'Location:Level1Patawag.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
	?>