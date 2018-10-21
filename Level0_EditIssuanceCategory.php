<?php
session_start();
	include_once('dbconn.php');

	$TypeID = $_POST['IssuanceID'];
	$Title = $_POST['IssuanceTitle'];
	$Option = $_POST['IssuanceOption'];

	$EditCatSQL = 'UPDATE bitdb_r_issuancetype
						SET bitdb_r_issuancetype.IssuanceType = "'.$Title.'", bitdb_r_issuancetype.IssuanceOption="'.$Option.'" WHERE bitdb_r_issuancetype.IssuanceID ='.$TypeID.' ';
	$EditCatQuery = mysqli_query($bitMysqli,$EditCatSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:Level0CategoryIssuance.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);

?>