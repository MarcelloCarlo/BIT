<?php
include_once('dbconn.php');

	$CategoryTitle = $_POST['IssuanceTitle'];
	$Option = $_POST['IssuanceOption'];

	$IssueCatAddSQL = "INSERT INTO bitdb_r_issuancetype(IssuanceType,IssuanceOption) VALUES('".$CategoryTitle."','".$Option."')";

	mysqli_query($bitMysqli,$IssueCatAddSQL);
	$header = 'Location:/BIT/AdCategoryIssuance.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>