<?php
include_once('dbconn.php');

	$CategoryTitle = $_POST['OrdinanceTitle'];

	$OrdCatAddSQL = "INSERT INTO bitdb_r_ordinancecategory(OrdinanceTitle) VALUES('".$CategoryTitle."')";

	mysqli_query($bitMysqli,$OrdCatAddSQL);
	$header = 'Location:/BIT/AdCategoryOrdinance.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>