<?php
	include_once('dbconn.php');

	$IncidentDate = $_POST['IncidentDate'];
	$ComplaintDate = $_POST['ComplaintDate'];
	$Complainant = $_POST['Complainant'];
	$Accused = $_POST['name'];
	echo $Accused;
	$AccusedID = $_POST['AccusedID'];
	echo $AccusedID;
?>