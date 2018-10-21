<?php
	session_start();
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
	echo $BID;
	echo $username;
	echo $password;
	echo $accstat;
	echo $AuthorityLvl;
	$AdminUserCheckSQL = 'SELECT * FROM bitdb_r_barangayuseraccounts WHERE bitdb_r_barangayuseraccounts.Brgy_Official_ID = '.$BID.' ';
	$AdminUserCheckQuery = mysqli_query($bitMysqli,$AdminUserCheckSQL) or die (mysqli_error($bitMysqli));
	if(mysqli_num_rows($AdminUserCheckQuery) > 0)
	{
		$AdminUserUpdateSQL = 'UPDATE 	bitdb_r_barangayuseraccounts 
							SET 	bitdb_r_barangayuseraccounts.Brgy_Official_ID ='.$BID.',
									bitdb_r_barangayuseraccounts.AccountUsername ="'.$username.'", 
									bitdb_r_barangayuseraccounts.AccountPassword ="'.$password.'", 
									bitdb_r_barangayuseraccounts.AccountUserType ='.$AuthorityLvl.' 
							WHERE 	Brgy_Official_ID='.$BID.'';
		$AdminUserUpdateQuery = mysqli_query($bitMysqli,$AdminUserUpdateSQL) or die (mysqli_error($bitMysqli));

		$AdminUserStatUpdateSQL = 'UPDATE 	bitdb_r_barangayofficial 
									SET 	bitdb_r_barangayofficial.ActUser='.$accstat.' 
									WHERE 	Brgy_Official_ID='.$BID.'';
		$AdminUserStatUpdateQuery = mysqli_query($bitMysqli,$AdminUserStatUpdateSQL) or die (mysqli_error($bitMysqli));

		$header = 'Location:Level0Users.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
		header($header);
	}
	else
	{
		$AdminUserInsertSQL = 'INSERT INTO 	bitdb_r_barangayuseraccounts (
									bitdb_r_barangayuseraccounts.Brgy_Official_ID,
									bitdb_r_barangayuseraccounts.AccountUsername, 
									bitdb_r_barangayuseraccounts.AccountPassword, 
									bitdb_r_barangayuseraccounts.AccountUserType) 
								VALUES ('.$BID.',"'.$username.'","'.$password.'",'.$AuthorityLvl.')';
		$AdminUserInsertQuery = mysqli_query($bitMysqli,$AdminUserInsertSQL) or die (mysqli_error($bitMysqli));

		$AdminUserStatUpdateSQL = 'UPDATE 	bitdb_r_barangayofficial 
									SET 	bitdb_r_barangayofficial.ActUser='.$accstat.' 
									WHERE 	Brgy_Official_ID='.$BID.'';
		$AdminUserStatUpdateQuery = mysqli_query($bitMysqli,$AdminUserStatUpdateSQL) or die (mysqli_error($bitMysqli));

		$header = 'Location:Level0Users.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
		header($header);
	}
?>