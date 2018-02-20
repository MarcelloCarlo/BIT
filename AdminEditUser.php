<?php
	include('dbconn.php');

	$BID = $_POST['BarangayOffID'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($_POST['AccStatus'] == "Active")
	{
		$accstat = 1;
	}
	else
	{
		$accstat = 0;
	}
	$AuthorityLvl = $_POST['AccAuthority'];
	if($AuthorityLvl == "None")
	{
		$AuthorityLvl = null;
	}
	$AdminUserUpdateSQL = 'UPDATE bitdb_r_barangayuseraccounts SET bitdb_r_barangayuseraccounts.AccountUsername ="'.$username.'", bitdb_r_barangayuseraccounts.AccountPassword="'.$password.'", bitdb_r_barangayuseraccounts.AccountUserType='.$AuthorityLvl.' WHERE Brgy_Official_ID='.$BID.' ';
	$AdminUserUpdateQuery = mysqli_query($bitMysqli,$AdminUserUpdateSQL) or die (mysqli_error($bitMysqli));

	$AdminUserStatUpdateSQL = 'UPDATE bitdb_r_barangayofficial SET bitdb_r_barangayofficial.ActUser='.$accstat.' WHERE Brgy_Official_ID='.$BID.'';
	$AdminUserStatUpdateQuery = mysqli_query($bitMysqli,$AdminUserStatUpdateSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/AdUsers.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);

?>