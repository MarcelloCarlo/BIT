<?php
	include ("dbconn.php");
	$User = $_POST['username'];
	$Pass = $_POST['password'];

	$LoginSQL = 'SELECT 			
						bitdb_r_barangayuseraccounts.AccountUsername,
		                bitdb_r_barangayuseraccounts.AccountPassword,
		                bitdb_r_barangayuseraccounts.AccountUserType,
		                IFNULL(bitdb_r_barangayofficial.Brgy_Official_ID,0) AS Official_ID,
		                IFNULL(bitdb_r_barangayofficial.ActUser,1) AS Official_User
				FROM bitdb_r_barangayuseraccounts 
				LEFT JOIN bitdb_r_barangayofficial 
					ON bitdb_r_barangayuseraccounts.Brgy_Official_ID = bitdb_r_barangayofficial.Brgy_Official_ID 
				WHERE bitdb_r_barangayuseraccounts.AccountUsername = "'.$User.'"
					AND bitdb_r_barangayuseraccounts.AccountPassword = "'.$Pass.'"';
	$LoginQuery = mysqli_query($bitMysqli,$LoginSQL) or die (mysqli_error($LoginQuery));
	if (mysqli_num_rows($LoginQuery) > 0)
		{
			while($row = mysqli_fetch_assoc($LoginQuery))
			{
				$AccUser = $row['AccountUsername'];
				$AccPass = $row['AccountPassword'];
				$AccType = $row['AccountUserType'];
				$OfficialID = $row['Official_ID'];
				$OfficialUser = $row['Official_User'];
			}

			//Start Session
			session_start();
			$_SESSION['Logged_In'] = $OfficialID;
			$_SESSION['AccountUserType'] = $AccType;
            
            //Testing and Deployment Build
			if($_SESSION['AccountUserType'] == "1" && $OfficialUser == 1)
			{
				//SECRETARY
				$header ='Location:indexLevel1.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
			}
			else if ($_SESSION['AccountUserType'] == "2" && $OfficialUser  == 1)
			{
				//CAPTAIN
				$header ='Location:indexLevel2.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
			}
			else if ($_SESSION['AccountUserType'] == "3" && $OfficialUser  == 1)
			{
				//CHIEF TANOD
				$header ='Location:indexLevel3.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
			}
			else if ($_SESSION['AccountUserType'] == "4" && $OfficialUser  == 1)
			{
				//CENSUS OFFICER
				$header = 'Location:indexLevel4.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
			}
			else if ($_SESSION['AccountUserType'] == "0" && $OfficialUser  == 1)
			{
				//ADMIN
				$header = 'Location:indexLevel0.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
			} 
			else
			{   
	            //Development Build
	            // $header = 'Location:/BRGYIT-UI/sign-in.php';
	            //Testing and Deployment Build

				$header = 'Location:/BIT/sign-in.php';
				
			}
		}
		else
		{   
			$header = 'Location:/BIT/sign-in.php';
		}
		header($header);

?>