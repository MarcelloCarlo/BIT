<?php
	include_once('dbconn.php');

	$CitizenID = $_POST['CitizenID'];
	$Category = $_POST['Category'];
	$Purpose = $_POST['txtPurpose'];

	$CategorySelectSQL = 'SELECT * FROM bitdb_r_issuancetype WHERE IssuanceType = "'.$Category.'" ';
	$CategorySelectQuery = mysqli_query($bitMysqli,$CategorySelectSQL) or die (mysqli_error($bitMysqli));
	if(mysqli_num_rows($CategorySelectQuery) > 0)
	{
		while($row = mysqli_fetch_assoc($CategorySelectQuery))
		{
			$CatID = $row['IssuanceID'];
		}
	}

	$Level1AddPersonalIssuanceSQL = 'INSERT INTO bitdb_r_issuance(CitizenID,IssuanceType,Purpose,IssuanceDate) VALUES('.$CitizenID.','.$CatID.',"'.$Purpose.'",CURRENT_DATE)';
	$Level1AddPersonalIssuanceQuery = mysqli_query($bitMysqli,$Level1AddPersonalIssuanceSQL) or die (mysqli_error($bitMysqli));


	$header = 'Location:/BIT/Level1IssuancePersonal.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
	
?>