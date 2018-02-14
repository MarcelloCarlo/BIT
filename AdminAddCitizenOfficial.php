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
	$Gender = $_POST['Gender'];
	$Blood_Type = $_POST['Blood_Type'];
	$House_No = $_POST['House_No'];
	$Street = $_POST['Street'];
	$Zone = $_POST['Zone'];
	$Position = $_POST['Position'];

	if($_POST['Res_Status'] == "Active")
	{
		$Res_Status = 1;
	}
	else
	{
		$Res_Status = 0;
	}

	$PositionSelectSQL = 'SELECT bitdb_r_barangayposition.PosID,bitdb_r_barangayposition.PosName FROM bitdb_r_barangayposition WHERE bitdb_r_barangayposition.PosName = "'.$Position.'" ';
	$PositionSelectQuery = mysqli_query($bitMysqli,$PositionSelectSQL) or die (mysqli_error($bitMysqli));
	if(mysqli_num_rows($PositionSelectQuery) > 0)
	{
		while($row = mysqli_fetch_assoc($PositionSelectQuery))
		{
			$PosID = $row['PosID'];
			$PosName = $row['PosID'];
		}
	}

	$CitizenOffAddSQL = 'INSERT INTO bitdb_r_citizen(Salutation,First_Name,Middle_Name,Last_Name,Name_Ext,Email,Height,Weight,Birthdate,Birth_Place,Nationality,ResStatus,Civil_Status,Occupation,Gender,Blood_Type,House_No,Street,Zone,Date_Rec) VALUES ("'.$Salutation.'","'.$First_Name.'","'.$Middle_Name.'","'.$Last_Name.'","'.$Name_Ext.'","'.$Email.'","'.$Height.'","'.$Weight.'","'.$Birthdate.'","'.$Birth_Place.'","'.$Nationality.'",'.$Res_Status.','.1.',"'.$Occupation.'","'.$Blood_Type.'","'.$House_No.'","'.$Street.'","'.$Zone.'")';
	$CitizenOffAddQuery = mysqli_query($bitMysqli,$CitizenCountSQL);

	$CitizenCountSQL = 'SELECT COUNT(bitdb_r_citizen.Citizen_ID) AS Citizen_Count FROM bitdb_r_citizen'
	$CitizenCountQuery = mysqli_query($bitMysqli,$CitizenCountSQL) or die (mysqli_error($bitMysqli))
	if(mysqli_num_rows($CitizenCountQuery) > 0)
	{
		while($row = mysqli_fetch_assoc($CitizenCountQuery))
		{
			$CitizenCount = $row['Citizen_Count'];
		}
	}

	
?>