<?php
	session_start();
	include('dbconn.php');

	$Salutation = $_POST['Salutation'];
	$First_Name = $_POST['First_Name'];
	$Middle_Name = $_POST['Middle_Name'];
	$Last_Name = $_POST['Last_Name'];
	$Name_Ext = $_POST['Name_Ext'];
	$Email = $_POST['Email'];
	$Height = $_POST['Height'];
	$Weight = $_POST['Weight'];
	$Birth_Place = $_POST['Birth_Place'];
	$Birthdate = $_POST['Birthdate'];
	$Nationality = $_POST['Nationality'];
	$Occupation = $_POST['Occupation'];
	$Civil_Status = $_POST['Civil_Status'];
	$Gender = $_POST['Gender'];
	$Blood_Type = $_POST['Blood_Type'];
	$House_No = $_POST['House_No'];
	$Street = $_POST['Street'];
	$Zone = $_POST['Zone'];
	$Person_Con = $_POST['Person_Con'];
	$Contact = $_POST['Contact'];
	$Res_Status = 1;

	$CensusOfficerInsertCitizenSQL = 'INSERT INTO bitdb_r_citizen(Salutation,First_Name,Middle_Name,Last_Name,Name_Ext,Citizen_Email,Height,Weight,Birthdate,Birth_Place,Nationality,Res_Status,Civil_Status,Occupation,Gender,Blood_Type,House_No,Street,Zone,Person_Con,Contact,Date_Rec) VALUES("'.$Salutation.'","'.$First_Name.'","'.$Middle_Name.'","'.$Last_Name.'","'.$Name_Ext.'","'.$Email.'","'.$Height.'","'.$Weight.'","'.$Birthdate.'","'.$Birth_Place.'","'.$Nationality.'",'.$Res_Status.',"'.$Civil_Status.'","'.$Occupation.'","'.$Gender.'","'.$Blood_Type.'","'.$House_No.'","'.$Street.'","'.$Zone.'","'.$Person_Con.'","'.$Contact.'",CURRENT_DATE)';
	
	$CensusOfficerInsertCitizenQuery = mysqli_query($bitMysqli,$CensusOfficerInsertCitizenSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:indexLevel4.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>