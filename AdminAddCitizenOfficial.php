<?php
	include_once('dbconn.php');

	$AddOffCitizenSQL = "SELECT 
							bitdb_r_citizen.Salutation,
							bitdb_r_citizen.First_Name,
							IFNULL(bitdb_r_citizen.Middle_Name,'') AS Middle_Name,
							bitdb_r_citizen.Last_Name,
							IFNULL(bitdb_r_citizen.Name_Ext,'') AS Nam_Ext,
							bitdb_r_barangayposition.PosName,
							IFNULL(bitdb_r_citizen.Birth_Place,'N/A') AS Birth_Place,
							bitdb_r_citizen.Birthdate,
							bitdb_r_citizen.Nationality,
							bitdb_r_citizen.Res_Status,
							bitdb_r_citizen.Civil_Status,
							bitdb_r_citizen.Gender,
							bitdb_r_citizen.Zone,
							bitdb_r_citizen.Street,
							bitdb_r_citizen.House_No,
	 						bitdb_r_citizen.Date_Rec
 						FROM
 							bitdb_r_barangayofficial
 						INNER JOIN
 							bitdb_r_citizen
	 						ON 
	 							bitdb_r_barangayofficial.CitizenID = bitdb_r_citizen.Citizen_ID
 						INNER JOIN
 							bitdb_r_barangayposition
 							ON
 								bitdb_r_barangayofficial.PosID = bitdb_r_barangayposition.PosID
						"
	$$AddOffCitizenQuery = mysqli_query($bitMysqli,$AddOffCitizenSQL) or die(mysqli_error($bitMysqli));
		if (mysqli_num_rows($$AddOffCitizenQuery) > 0)
		{
			while($row = mysqli_fetch_assoc($PViewQuery))
			{	
				$Name = "".$row['Salutation']." ".$row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name']." ".$row['Name_Ext']."";
				$PosName = $row['PosName'];
				$Birth_Place = $row['Birth_Place'];
				$Birthdate = $row['Birthdate'];
				$Nationality = $row['Nationality'];
				$Civil_Status = $row['Civil_Status'];
				$Gender = $row['Gender'];
				$Zone = $row['Zone'];
				$Street = $row['Street'];
				$House_No = $row['House_No'];
				$Date_Rec = $row['Date_Rec'];

				if($row['Res_Status']==1)
				{
					$Res_Status = "Active";
				}
				else
				{
					$Res_Status = "Inactive";
				}

				echo
				'<tr>
                    <td>'.$Name.'</td>
                    <td>'.$PosName.'</td>
                    <td>'.$Birth_Place.'</td>
                    <td>'.$Birthdate.'</td>
                    <td>'.$Nationality.'</td>
                    <td>'.$Res_Status.'</td>
                    <td>'.$Civil_Status.'</td>
                    <td>'.$Gender.'</td>
                    <td>'.$Zone.'</td>
                    <td>'.$House_No.' '.$Street.'</td>
                    <td>'.$Date_Rec.'</td>
                    <td>
                    <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#editCitizModal">
	                    <i class="material-icons">mode_edit</i>
	                    <span>EDIT</span>
                    </button>
                    </td>
                </tr>'
			}
		}
?>