<?php
	include ("dbconn.php");
	$User = $_POST['username'];
	$Pass = $_POST['password'];

	$dbh = new PDO('mysql:host=localhost;dbname=bitdb', 'root', '');
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$q = "SELECT AccountUserType 
	FROM bitdb_r_barangayuseraccounts
	WHERE AccountUsername = :usr AND AccountPassword = :pass";

	if(empty($User) === true || empty($Pass) === true)
	{
		echo 'You need to enter a username and password';
	}
	else
	{
		$query = 'SELECT bitdb_r_barangayuseraccounts.AccountUsername,bitdb_r_barangayuseraccounts.AccountPassword,bitdb_r_barangayuseraccounts.AccountUserType,bitdb_r_barangayofficial.Brgy_Official_ID,bitdb_r_barangayofficial.ActUser,bitdb_r_barangayposition.PosName,bitdb_r_citizen.Salutation,bitdb_r_citizen.First_Name,bitdb_r_citizen.Last_Name,IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Extension,bitdb_r_barangayposition.PosName FROM bitdb_r_barangayuseraccounts INNER JOIN bitdb_r_barangayofficial ON bitdb_r_barangayuseraccounts.Brgy_Official_ID = bitdb_r_barangayofficial.Brgy_Official_ID INNER JOIN bitdb_r_barangayposition ON bitdb_r_barangayposition.PosID = bitdb_r_barangayofficial.PosID INNER JOIN bitdb_r_citizen ON bitdb_r_barangayofficial.CitizenID = bitdb_r_citizen.Citizen_ID WHERE bitdb_r_barangayuseraccounts.AccountUsername = "'.$User.'" AND bitdb_r_barangayuseraccounts.AccountPassword = "'.$Pass.'"';
		$RQuery = mysqli_query($bitMysqli,$query) or die(mysqli_error($bitMysqli));
		if (mysqli_num_rows($RQuery) > 0)
		{
			while($row = mysqli_fetch_assoc($RQuery))
			{
				$OfficialID = $row['Brgy_Official_ID'];
				$OfficialFName = $row['First_Name'];
				$OfficialLName = $row['Last_Name'];
				$OfficialXName = $row['Name_Extension'];
				$OfficialPos = $row['AccountUserType'];
				$OfficialPosName = $row['PosName'];
				$OfficialActUser = $row['ActUser'];
			}
			echo 'Session Started.';
			session_start();
			$_SESSION['Logged_In'] = $OfficialID;
			$_SESSION['First_Name'] = $OfficialFName;
			$_SESSION['Last_Name'] = $OfficialLName;
			$_SESSION['Name_Extension'] = $OfficialXName;
			$_SESSION['AccountUserType'] = $OfficialPos;
            //Development Build
   //          if($_SESSION['AccountUserType'] == "1" && $OfficialPosName == "Secretary" && $OfficialActUser == 1)
			// {
			// 	$header ='Location:/BRGYIT-UI/indexLevel1.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
			// }
			// else if ($_SESSION['AccountUserType'] == "2" && $OfficialPosName == "Barangay Captain" && $OfficialActUser == 1)
			// {
			// 	$header ='Location:/BRGYIT-UI/indexCaptain.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
			// }
			// else if ($_SESSION['AccountUserType'] == "0" && $OfficialPosName == "Admin" && $OfficialActUser == 1)
			// {
			// 	$header = 'Location:/BRGYIT-UI/indexAdmin.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
   //          }
            
            //Testing and Deployment Build
			if($_SESSION['AccountUserType'] == "1" && $OfficialPosName == "Secretary" && $OfficialActUser == 1)
			{
				$header ='Location:/BIT/indexLevel1.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
			}
			else if ($_SESSION['AccountUserType'] == "2" && $OfficialPosName == "Barangay Captain" && $OfficialActUser == 1)
			{
				$header ='Location:/BIT/indexCaptain.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
			}
			else if ($_SESSION['AccountUserType'] == "3" && $OfficialPosName == "Chief Tanod" && $OfficialActUser == 1)
			{
				$header ='Location:/BIT/ChiefTanodAddBlotter.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
			}
			else if ($_SESSION['AccountUserType'] == "4" && $OfficialPosName == "Census Officer" && $OfficialActUser == 1)
			{
				$header = 'Location:/BIT/CensusOfficerAddCitizenOnly.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
			}
			else if ($_SESSION['AccountUserType'] == "0" && $OfficialPosName == "Admin" && $OfficialActUser == 1)
			{
				$header = 'Location:/BIT/indexAdmin.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
			} else
			{   
				/* $sth = $dbh->prepare($q);
				$sth->bindParam(':id', $id);
				// Execute statement
				$sth->execute();
				// Set fetch mode to FETCH_ASSOC to return an array indexed by column name
				$sth->setFetchMode(PDO::FETCH_ASSOC);
				// Fetch result
				$result = $sth->fetchColumn(); */

				 
				
	            //Development Build
	            // $header = 'Location:/BRGYIT-UI/sign-in.php';
	            //Testing and Deployment Build
				$header = 'Location:/BIT/sign-in.php';
				
			}
			// echo $OfficialPosName;
			// echo $_SESSION['First_Name'];
			// echo $_SESSION['Last_Name'];
			// echo $_SESSION['Name_Extension'];
			// echo $_SESSION['AccountUserType'];
		}
		else
		{   


			$stmt = $bitMysqli->prepare("SELECT AccountUserType 
			FROM bitdb_r_barangayuseraccounts
			WHERE AccountUsername = ? AND AccountPassword = ?");

				// Bind a variable to the parameter as a string. 
				$stmt->bind_param("ss", $User,$Pass);
			 
				// Execute the statement.
				$stmt->execute();
			 
				// Get the variables from the query.
				$stmt->bind_result($UsrTyp);
			 
				// Fetch the data.
				$stmt->fetch();
			 
				// Display the data.
				if ($UsrTyp == "0")
				{
					$_SESSION['Logged_In'] = $UsrTyp;
					$_SESSION['AccountUserType'] = $UsrTyp;
					$header = 'Location:/BIT/indexAdmin.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
				} else {
					$header = 'Location:/BIT/sign-in.php';
				}
			 
				// Close the prepared statement.
				$stmt->close();
			
            //Development Build
            // $header = 'Location:/BRGYIT-UI/sign-in.php';
            //Testing and Deployment Build
			//$header = 'Location:/BIT/sign-in.php';
			
		}
		header($header);
	}

?>