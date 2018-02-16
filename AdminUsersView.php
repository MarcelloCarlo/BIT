<?php
	include_once('dbconn.php');

	$AdminUserSelectSQL = 'SELECT
							IFNULL(bitdb_r_barangayuseraccounts.AccountUsername,"") AS AccountUsername,
							IFNULL(bitdb_r_barangayuseraccounts.AccountPassword,"") AS AccountPassword,
							IFNULL(bitdb_r_barangayuseraccounts.AccountUserType,"") AS AccountUserType,
							bitdb_r_barangayofficial.ActUser,
							bitdb_r_barangayofficial.AccAuthority,
							bitdb_r_barangayposition.PosName,
							bitdb_r_citizen.Salutation.
							bitdb_r_citizen.First_Name,
							IFNULL(bitdb_r_citizen.Middle_Name,"") AS Middle_Name,
							bitdb_r_citizen.Last_Name,
							IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Ext,
							bitdb_r_citizen.Gender
						FROM bitdb_r_barangayuseraccounts
						INNER JOIN bitdb_r_barangayofficial
						ON bitdb_r_barangayuseraccounts.Brgy_Official_ID = bitdb_r_barangayofficial.Brgy_Official_ID
						INNER JOIN bitdb_r_barangayposition
						ON bitdb_r_barangayofficial.PosID = bitdb_r_barangayposition.PosID
						INNER JOIN bitdb_r_citizen
						ON bitdb_r_barangayofficial.CitizenID = bitdb_r_citizen.Citizen_ID';

	$AdminUserSelectQuery = mysqli_query($bitMysqli,$AdminUserSelectSQL) or die (mysqli_error($bitMysqli));
	if(mysqli_num_rows($AdminUserSelectQuery) > 0)
	{
		while($row = mysqli_fetch_assoc($AdminUserSelectQuery))
		{
			$AccountUsername = $row['AccountUsername'];
			$AccountPassword = $row['AccountPassword'];
			$AccountUserType = $row['AccountUserType'];
			$AccAuthority = $row['AccAuthority'];
			$PosName = $row['PosName'];
			$Salutation = $row['Salutation'];
			$First_Name = $row['First_Name'];
			$Middle_Name = $row['Middle_Name'];
			$Last_Name = $row['Last_Name'];
			$Name_Ext = $row['Name_Ext'];
			if($row['ActUser'] == 1)
			{
				$ActUser = "Active";	
			}
			else
			{
				$ActUser = "Inactive";
			}
			if($row['Gender'] == 'M')
			{
				$Gender = "Male";
			}
			else
			{
				$Gender = "Female";
			}
			

			$WName = "".$Salutation." ".$First_Name." ".$Middle_Name." ".$Last_Name." ".$Name_Ext." ";

			echo   '<tr>
                        <td>'.$WName.'</td>
                        <td>'.$PosName.'</td>
                        <td>'.$Gender.'</td>
                        <td>'.$AccAuthority.'</td>
                        <td>'.$ActUser.'</td>
                        <td>
                        	<button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#delegateUsrModal">
                                <i class="material-icons">mode_edit</i>
                                <span>EDIT</span>
                            </button>
                        </td>
                    </tr>';
		}
	}
?>