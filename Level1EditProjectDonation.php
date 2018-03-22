<?php
	include_once('dbconn.php');

	$ProjectID = $_POST['ProjectID'];
	$DonationID = $_POST['DonationID'];
	$DonorName = $_POST['DonorName'];
	$DonationAmount = $_POST['DonationAmount'];
	$DateGiven = $_POST['DateGiven'];
	$DateRecorded = $_POST['DateRecorded'];

	$Level1EditProjectSQL = 'UPDATE bitdb_r_projectdonation SET DonorName="'.$DonorName.'", MoneyDonated='.$DonationAmount.', DateGiven="'.$DateGiven.'", DateRecorded="'.$DateRecorded.'" WHERE DonationID='.$DonationID.' ';
	$Level1EditProjectQuery = mysqli_query($bitMysqli,$Level1EditProjectSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/Level1AddEditProjDonations.php?Project='.$ProjectID.' ';
	header($header);
?>