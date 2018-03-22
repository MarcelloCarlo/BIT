<?php
	include_once('dbconn.php');

	$ProjectID = $_POST['ProjectID'];
	$DonorName = $_POST['DonorName'];
	$DonationAmount = $_POST['DonationAmount'];
	$DateGiven = $_POST['DateGiven'];
	$DateRecorded = $_POST['DateRecorded'];

	$Level1AddProjectSQL = 'INSERT INTO bitdb_r_projectdonation(ProjectID,DonorName,MoneyDonated,DateGiven,DateRecorded) VALUES('.$ProjectID.',"'.$DonorName.'",'.$DonationAmount.',"'.$DateGiven.'","'.$DateRecorded.'")';
	$Level1AddProjectQuery = mysqli_query($bitMysqli,$Level1AddProjectSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/Level1AddEditProjDonations.php?Project='.$ProjectID.' ';
	header($header);
?>