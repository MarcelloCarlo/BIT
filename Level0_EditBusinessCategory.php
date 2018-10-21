<?php
session_start();
	include_once('dbconn.php');

	$CategoryID = $_POST['CategoryID'];
	$CategoryName = $_POST['CategoryName'];
	$CategoryDesc = $_POST['CategoryDesc'];

	$AdminEditBusinessCategorySQL = 'UPDATE bitdb_r_businesscategory SET categoryName="'.$CategoryName.'",CategoryDesc="'.$CategoryDesc.'" WHERE categoryID='.$CategoryID.' ';
	$AdminEditBusinessQuery = mysqli_query($bitMysqli,$AdminEditBusinessCategorySQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:Level0CategoryBusiness.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>