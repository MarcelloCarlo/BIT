<?php
	include_once('dbconn.php');

	$OrdID = $_POST['OrdinanceID'];
	$OrdTitle = $_POST['OrdinanceTitle'];

	$EditOrdCatSQL = 'UPDATE bitdb_r_ordinancecategory
						SET bitdb_r_ordinancecategory.OrdinanceTitle = "'.$OrdTitle.'" ';
	$EditOrdCatQuery = mysqli_query($bitMysqli,$EditOrdCatSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/AdCategoryOrdinance.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);

?>