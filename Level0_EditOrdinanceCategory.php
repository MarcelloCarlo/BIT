<?php
session_start();
	include_once('dbconn.php');

	$OrdID = $_POST['OrdinanceID'];
	$OrdTitle = $_POST['OrdinanceTitle'];

	$EditOrdCatSQL = 'UPDATE bitdb_r_ordinancecategory
						SET bitdb_r_ordinancecategory.OrdinanceTitle = "'.$OrdTitle.'" WHERE bitdb_r_ordinancecategory.OrdCategoryID ='.$OrdID.' ';
	$EditOrdCatQuery = mysqli_query($bitMysqli,$EditOrdCatSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:Level0CategoryOrdinance.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);

?>