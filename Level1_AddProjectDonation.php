<?php
	include_once('dbconn.php');

	$ProjectID = $_POST['ProjectID'];
	$DonorName = $_POST['DonorName'];
	$DonationAmount = $_POST['DonationAmount'];
	$DateGiven = $_POST['DateGiven'];

	$Level1AddProjectSQL = 'INSERT INTO bitdb_r_projectdonation(ProjectID,DonorName,MoneyDonated,DateGiven,DateRecorded) VALUES('.$ProjectID.',"'.$DonorName.'",'.$DonationAmount.',"'.$DateGiven.'",CURRENT_DATE)';
	$Level1AddProjectQuery = mysqli_query($bitMysqli,$Level1AddProjectSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/Level1AddEditProjects.php?Project='.$ProjectID.' ';
	header($header);
?>