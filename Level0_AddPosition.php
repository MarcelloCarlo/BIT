<?php
include_once('dbconn.php');
session_start();

$PosName = $_POST['PositionName'];
$PosDesc = $_POST['PositionDesc'];

if ($_POST['PositionStatus'] == "Inactive")
{
	$PosStat = 0;
}
else
{
	$PosStat = 1;
}

$InsertPosQuery = "
					INSERT INTO bitdb_r_barangayposition(PosName,PosDesc,PosStat) 
					VALUES ('".$PosName."','".$PosDesc."','".$PosStat."')";

mysqli_query($bitMysqli,$InsertPosQuery);
$header = 'Location:Level0Positions.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
header($header);


?>