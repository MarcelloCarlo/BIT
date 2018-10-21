<?php 
	session_start();
	include_once('dbconn.php');

	$CID = $_POST['CitizenID'];
	$Salutation = $_POST['Salutation'];
	$FNAme = $_POST['First_Name'];
	$MNAme = $_POST['Middle_Name'];
	$LNAme = $_POST['Last_Name'];
	$NExt = $_POST['Name_Ext'];
	$Email = $_POST['Email'];
	$Height = $_POST['Height'];
	$Weight = $_POST['Weight'];
	$Birth_Place = $_POST['Birth_Place'];
	$Birthdate = $_POST['Birthdate'];
	$Nationality = $_POST['Nationality'];
	$Occupation = $_POST['Occupation'];
	$Gender = $_POST['Gender'];
	$CivilStatus = $_POST['Civil_Status'];
	$Blood_Type = $_POST['Blood_Type'];
	$House_No = $_POST['House_No'];
	$Street = $_POST['Street'];
	$Zone = $_POST['Zone'];
	$PerCon = $_POST['Person_Con'];
	$Contact = $_POST['Contact'];
	if($_POST['Res_Status'] == "Active")
	{
		$Res_Status = 1;
	}
	else
	{
		$Res_Status = 0;
	}

	$Level1EditCitizenSQL = 'UPDATE bitdb_r_citizen
							SET 	bitdb_r_citizen.Salutation = "'.$Salutation.'",
									bitdb_r_citizen.First_Name = "'.$FNAme.'",
									bitdb_r_citizen.Middle_Name = "'.$MNAme.'",
									bitdb_r_citizen.Last_Name = "'.$LNAme.'",
									bitdb_r_citizen.Name_Ext = "'.$NExt.'",
									bitdb_r_citizen.Citizen_Email = "'.$Email.'",
									bitdb_r_citizen.Height = "'.$Height.'",
									bitdb_r_citizen.Weight = "'.$Weight.'",
									bitdb_r_citizen.Birthdate = "'.$Birthdate.'",
									bitdb_r_citizen.Birth_Place = "'.$Birth_Place.'",
									bitdb_r_citizen.Nationality = "'.$Nationality.'",
									bitdb_r_citizen.Occupation = "'.$Occupation.'",
									bitdb_r_citizen.Gender = "'.$Gender.'",
									bitdb_r_citizen.Res_Status = '.$Res_Status.',
									bitdb_r_citizen.Civil_Status = "'.$CivilStatus.'",
									bitdb_r_citizen.Blood_Type = "'.$Blood_Type.'",
									bitdb_r_citizen.House_No = "'.$House_No.'",
									bitdb_r_citizen.Street = "'.$Street.'",
									bitdb_r_citizen.Zone = "'.$Zone.'",
									bitdb_r_citizen.Person_Con = "'.$PerCon.'",
									bitdb_r_citizen.Contact = "'.$Contact.'"
							WHERE 	bitdb_r_citizen.Citizen_ID = "'.$CID.'" ';
	$Level1EditCitizenQuery = mysqli_query($bitMysqli,$Level1EditCitizenSQL) or die (mysqli_error($bitMysqli));
	$header = 'Location:Level1AddEditCitizen.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>