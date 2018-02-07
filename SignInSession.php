<?php
	include ("dbconn.php");
	$User = $_POST['username'];
	$Pass = $_POST['password'];
	if(empty($User) === true || empty($Pass) === true)
	{
		echo 'You need to enter a username and password';
	}
	else
	{
		$query = "SELECT
					bitdb_r_barangayuseraccounts.AccountUsername,
					bitdb_r_barangayuseraccounts.AccountPassword,
					bitdb_r_barangayuseraccounts.AccountUserType,
					bitdb_r_barangayofficial.Brgy_Official_ID,
					bitdb_r_citizen.Salutation,
					bitdb_r_citizen.First_Name,
					bitdb_r_citizen.Last_Name,
					IFNULL(bitdb_r_citizen.Name_Ext,'') AS Name_Extension,
					bitdb_r_barangayposition.PosName
					FROM bitdb_r_barangayuseraccounts
					INNER JOIN bitdb_r_barangayofficial
					ON bitdb_r_barangayuseraccounts.Brgy_Official_ID = bitdb_r_barangayofficial.Brgy_Official_ID
					INNER JOIN bitdb_r_barangayposition
					ON bitdb_r_barangayposition.PosID = bitdb_r_barangayofficial.PosID
					INNER JOIN bitdb_r_citizen
					ON bitdb_r_barangayofficial.CitizenID = bitdb_r_citizen.Citizen_ID
					WHERE
					bitdb_r_barangayuseraccounts.AccountUsername = '".$User."'
					AND
					bitdb_r_barangayuseraccounts.AccountPassword = '".$Pass."'";
		$RQuery = mysqli_query($bitMysqli,$query) or die(mysqli_error());
		if (mysqli_num_rows($RQuery) > 0)
		{
			while($row = mysqli_fetch_assoc($RQuery))
			{
				$OfficialID = $row['Brgy_Official_ID'];
				$OfficialFName = $row['First_Name'];
				$OfficialLName = $row['Last_Name'];
				$OfficialXName = $row['Name_Ext'];
				$OfficialPos = $row['AccountUserType'];
			}
			echo 'Session Started.';
			session_start();
			$_SESSION['Logged_In'] = $OfficialID;
			$_SESSION['First_Name'] = $OfficialFName;
			$_SESSION['Last_Name'] = $OfficialLName;
			$_SESSION['Name_Extension'] = $OfficialXName;
			$_SESSION['AccountUserType'] = $OfficialPos;
			if($_SESSION['AccountUserType'] == "1")
			{
				$header ='Location:/BIT/indexLevel1.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
			}
			else if ($_SESSION['AccountUserType'] == "2")
			{
				$header ='Location:/BIT/indexCaptain.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
			}
			else if ($_SESSION['AccountUserType'] == "0")
			{
				$header = 'Location:/BIT/indexAdmin.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
			}
			header($header);
		}
		else
		{
			$header = 'Location:/BIT/sign-in.php';
			
		}
	}

?>