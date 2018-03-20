<?php
	include_once('dbconn.php');

	$CatID = $_POST['ProjID'];
	$Title = $_POST['ProjectCategoryName'];

	$EditCatSQL = 'UPDATE bitdb_r_projectcategory
						SET bitdb_r_projectcategory.ProjectCategory = "'.$Title.'" WHERE bitdb_r_projectcategory.ProjectCategoryID ='.$CatID.' ';
	$EditCatQuery = mysqli_query($bitMysqli,$EditCatSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/AdCategoryProjectMonitoring.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);

?>