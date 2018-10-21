<?php
	include_once('dbconn.php');
	session_start();
	$CategoryName = $_POST['CategoryName'];
	$CategoryDesc = $_POST['CategoryDesc'];

	$AdminAddBusinessCategorySQL = 'INSERT INTO bitdb_r_businesscategory(categoryName,categoryDesc,categoryDate) VALUES("'.$CategoryName.'","'.$CategoryDesc.'",CURRENT_DATE)';
	$AdminAddBusinessQuery = mysqli_query($bitMysqli,$AdminAddBusinessCategorySQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:Level0CategoryBusiness.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>