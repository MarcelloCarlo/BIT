<?php
	include_once('dbconn.php');

	$TypeID = $_POST['IssuanceID'];
	$Title = $_POST['IssuanceTitle'];

	$EditCatSQL = 'UPDATE bitdb_r_issuancetype
						SET bitdb_r_issuancetype.IssuanceType = "'.$Title.'" WHERE bitdb_r_issuancetype.IssuanceID ='.$TypeID.' ';
	$EditCatQuery = mysqli_query($bitMysqli,$EditCatSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/AdCategoryIssuance.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);

?>