<?php
session_start();
	include_once('dbconn.php');

	$BusinessName = $_POST['BusinessName'];
	$BusinessLoc = $_POST['BusinessLoc'];
	$BusinessCategory = $_POST['BusinessCategory'];
	$BusinessManager = $_POST['BusinessManager'];
	$ManagerAdd = $_POST['ManagerAdd'];
	$BusinessStatus = 0;

	$Level1AddBusinessSQL = 'INSERT INTO bitdb_r_business(Business_Name,BusinessLoc,Manager,Mgr_Address,BusinessStatus,BusinessCategory) VALUES("'.$BusinessName.'","'.$BusinessLoc.'","'.$BusinessManager.'","'.$ManagerAdd.'",'.$BusinessStatus.','.$BusinessCategory.')';
	$Level1AddBusinessQuery = mysqli_query($bitMysqli,$Level1AddBusinessSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:Level1Businesses.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>