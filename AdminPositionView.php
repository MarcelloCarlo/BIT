<?php
include_once('dbconn.php');

$PViewSQL = "SELECT * FROM bitdb_r_barangayposition";
$PViewQuery = mysqli_query($bitMysqli,$PViewSQL) or die(mysqli_error($bitMysqli));
if (mysqli_num_rows($PViewQuery) > 0)
{
	while($row = mysqli_fetch_assoc($PViewQuery))
			{	
				$PosID = $row['PosID'];
				$PosName = $row['PosName'];
				$PosDesc = $row['PosDesc'];
				$PosStat = $row['PosStat'];
				if ($PosStat == 1)
				{
					$PosStat = "Active";
				}
				else
				{
					$PosStat = "Inactive";
				}
				echo
				"<tr>
					<td>".$PosName."</td>
					<td>".$PosDesc."</td>
					<td>".$PosStat."</td>
					<td>
						<button type=""button"" class=""btn btn-success waves-effect"" data-toggle=""modal"" data-target=""#editPosModal"">
							<i class=""material-icons"">mode_edit</i>
							<span>EDIT</span>
						</button>
					</td>
				</tr>";
				
			}
}


?>