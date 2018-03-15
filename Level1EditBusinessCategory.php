<?php
	include_once('dbconn.php');

	$CategoryID = $_POST['CategoryID'];
	$CategoryName = $_POST['CategoryName'];
	$CategoryDesc = $_POST['CategoryDesc'];

	$Level1EditBusinessCategorySQL = 'UPDATE bitdb_r_businesscategory SET categoryName="'.$CategoryName.'",CategoryDesc="'.$CategoryDesc.'" WHERE categoryID='.$CategoryID.' ';
	$Level1EditBusinessQuery = mysqli_query($bitMysqli,$Level1EditBusinessCategorySQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/Level1AddEditBusinessCategory.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>