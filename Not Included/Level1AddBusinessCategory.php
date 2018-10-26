<?php
	include_once('dbconn.php');

	$CategoryName = $_POST['CategoryName'];
	$CategoryDesc = $_POST['CategoryDesc'];

	$Level1AddBusinessCategorySQL = 'INSERT INTO bitdb_r_businesscategory(categoryName,categoryDesc,categoryDate) VALUES("'.$CategoryName.'","'.$CategoryDesc.'",CURRENT_DATE)';
	$Level1AddBusinessQuery = mysqli_query($bitMysqli,$Level1AddBusinessCategorySQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/Level1AddEditBusinessCategory.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>