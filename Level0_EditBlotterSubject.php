<?php
session_start();
	include_once('dbconn.php');

	$CatID = $_POST['BlotterID'];
	$Title = $_POST['BlotterSubjectName'];

	$EditCatSQL = 'UPDATE bitdb_r_blottercategory
						SET bitdb_r_blottercategory.BlotterCategoryName = "'.$Title.'" WHERE bitdb_r_blottercategory.BlotterCategoryID ='.$CatID.' ';
	$EditCatQuery = mysqli_query($bitMysqli,$EditCatSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:Level0BlotterSubjects.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);

?>