<?php
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
	$StartTerm = $_POST['Start_Term'];
	$EndTerm = $_POST['End_Term'];
	$Zone = $_POST['Zone'];
	$Position = $_POST['Position'];

	// if($_POST['Res_Status'] == "Active")
	// {
	// 	$Res_Status = 1;
	// }
	// else
	// {
	// 	$Res_Status = 0;
	// }

	echo $Salutation;
	echo $First_Name;
	echo $Middle_Name;
	echo $Last_Name;
	echo $Name_Ext;
	echo $Email;
	echo $Height;
	echo $Weight;
	echo $Birth_Place;
	echo $Birthdate;
	echo $Nationality;
	echo $Gender;
	echo $Blood_Type;
	echo $House_No;
	echo $Street;
	echo $StartTerm;
	echo $EndTerm;
	echo $Zone;
	echo $Position;

	// $PositionSelectSQL = 'SELECT bitdb_r_barangayposition.PosID,bitdb_r_barangayposition.PosName FROM bitdb_r_barangayposition WHERE bitdb_r_barangayposition.PosName = "'.$Position.'" ';
	// $PositionSelectQuery = mysqli_query($bitMysqli,$PositionSelectSQL) or die (mysqli_error($bitMysqli));
	// if(mysqli_num_rows($PositionSelectQuery) > 0)
	// {
	// 	while($row = mysqli_fetch_assoc($PositionSelectQuery))
	// 	{
	// 		$PosID = $row['PosID'];
	// 		$PosName = $row['PosID'];
	// 	}
	// }

	$CitizenOffAddSQL = 'INSERT INTO bitdb_r_citizen(
											Salutation,
											First_Name,
											Middle_Name,
											Last_Name,
											Name_Ext,
											Citizen_Email,
											Height,
											Weight,
											Birthdate,
											Birth_Place,
											Nationality,
											Res_Status,
											Civil_Status,
											Occupation,
											Gender,
											Blood_Type,
											House_No,
											Street,
											Zone,
											Date_Rec) 
								VALUES ("'.$Salutation.'",
										"'.$First_Name.'",
										"'.$Middle_Name.'",
										"'.$Last_Name.'",
										"'.$Name_Ext.'",
										"'.$Email.'",
										"'.$Height.'",
										"'.$Weight.'",
										"'.$Birthdate.'",
										"'.$Birth_Place.'",
										"'.$Nationality.'",
										'.$Res_Status.',
										"'.$Civil_Status.'",
										"'.$Occupation.'",
										"'.$Gender.'",
										"'.$Blood_Type.'",
										"'.$House_No.'",
										"'.$Street.'",
										"'.$Zone.'",
										CURRENT_DATE)';
	$CitizenOffAddQuery = mysqli_query($bitMysqli,$CitizenOffAddSQL) or die (mysqli_error($bitMysqli));

	$CitizenCountSQL = 'SELECT MAX(bitdb_r_citizen.Citizen_ID) AS Citizen_Count FROM bitdb_r_citizen';
	$CitizenCountQuery = mysqli_query($bitMysqli,$CitizenCountSQL) or die (mysqli_error($bitMysqli));
	if(mysqli_num_rows($CitizenCountQuery) > 0)
	{
		while($row = mysqli_fetch_assoc($CitizenCountQuery))
		{
			$CitizenCount = $row['Citizen_Count'];
		}
	}

	$BarangayOffAddSQL = 'INSERT INTO bitdb_r_barangayofficial(CitizenID,PosID,StartTerm,EndTerm,ActUser) VALUES('.$CitizenCount.','.$Position.',"'.$StartTerm.'","'.$EndTerm.'",0)';
	$BarangayOffAddQuery = mysqli_query($bitMysqli,$BarangayOffAddSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/AdOfficials.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
	
?>