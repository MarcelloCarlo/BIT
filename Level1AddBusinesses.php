<?php
	include_once('dbconn.php');

	$BusinessName = $_POST['BusinessName'];
	$BusinessLoc = $_POST['BusinessLoc'];
	$BusinessManager = $_POST['BusinessManager'];
	$ManagerAdd = $_POST['ManagerAdd'];
	$BusinessStatus = 0;

	$Level1AddBusinessSQL = 'INSERT INTO bitdb_r_business(Business_Name,BusinessLoc,Manager,Mgr_Address,BusinessStatus) VALUES("'.$BusinessName.'","'.$BusinessLoc.'","'.$BusinessManager.'","'.$ManagerAdd.'",'.$BusinessStatus.')';
	$Level1AddBusinessQuery = mysqli_query($bitMysqli,$Level1AddBusinessSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/Level1AddEditBusinesses.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);

?>