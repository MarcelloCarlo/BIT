<?php
include('dbconn.php');

	$OrdID = $_POST['ID'];
	$Status = $_POST['Status'];

	if($Status == "Active")
	{
		$OrdUpdateSQL = 'UPDATE bitdb_r_ordinance SET OrdStatus = 0 WHERE OrdinanceID = '.$OrdID.' ';
		$Echo = "Active -> Inactive";
	}
	elseif($Status == "Inactive")
	{
		$OrdUpdateSQL = 'UPDATE bitdb_r_ordinance SET OrdStatus = 1 WHERE OrdinanceID = '.$OrdID.' ';
		$Echo = "Inactive -> Active";
	}
	mysqli_query($bitMysqli,$OrdUpdateSQL) or die (mysqlil_error($bitMysqli));

	echo $Echo;
?>