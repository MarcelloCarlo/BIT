<?php
	include_once('dbconn.php');

	$CategoryName = $_POST['ProjectCategoryName'];

	$AdminAddProjectCategorySQL = 'INSERT INTO bitdb_r_projectcategory(ProjectCategory,ProjectCategoryDate) VALUES("'.$CategoryName.'",CURRENT_DATE)';
	$AdminAddProjectQuery = mysqli_query($bitMysqli,$AdminAddProjectCategorySQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/AdCategoryProjectMonitoring.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>