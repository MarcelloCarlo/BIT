<?php
	include_once('dbconn.php');

	$CategoryName = $_POST['BlotterSubjectName'];

	$AdminAddBlotterCategorySQL = 'INSERT INTO bitdb_r_blottercategory(BlotterCategoryName,BlotterCategoryDate) VALUES("'.$CategoryName.'",CURRENT_DATE)';
	$AdminAddBlotterQuery = mysqli_query($bitMysqli,$AdminAddBlotterCategorySQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/AdBlotterSubjects.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>