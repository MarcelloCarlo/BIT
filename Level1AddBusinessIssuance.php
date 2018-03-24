<?php
	include_once('dbconn.php');

	$BusinessID = $_POST['BusinessID'];
	$Category = $_POST['Category'];

	$CategorySelectSQL = 'SELECT * FROM bitdb_r_issuancetype WHERE IssuanceType = "'.$Category.'" ';
	$CategorySelectQuery = mysqli_query($bitMysqli,$CategorySelectSQL) or die (mysqli_error($bitMysqli));
	if(mysqli_num_rows($CategorySelectQuery) > 0)
	{
		while($row = mysqli_fetch_assoc($CategorySelectQuery))
		{
			$CatID = $row['IssuanceID'];
		}
	}

	$Level1AddBusinessIssuanceSQL = 'INSERT INTO bitdb_r_issuance(BusinessID,IssuanceType,IssuanceDate) VALUES('.$BusinessID.','.$CatID.',CURRENT_DATE)';
	$Level1AddBusinessIssuanceQuery = mysqli_query($bitMysqli,$Level1AddBusinessIssuanceSQL) or die (mysqli_error($bitMysqli));


	$header = 'Location:/BIT/Level1IssuanceBusiness.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
	
?>