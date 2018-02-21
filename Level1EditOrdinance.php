<?php 
	include_once('dbconn.php');

	$OrdinanceTitle = $row['OrdinanceTitle'];
														$OrdinanceID = $row['OrdinanceID'];
                                                        $OrdinanceTitle = $row['OrdinanceTitle'];
                                                        $CategoryID = $row['CategoryID'];
                                                        $Author = $row['Author'];
                                                        $Persons_Involved = $row['Persons_Involved'];
                                                        $OrdDesc = $row['OrdDesc'];
                                                        $DateImplemented = $row['DateImplemented'];
                                                        $OrdStatus = $row['OrdStatus'];
                                                        $Sanction = $row['Sanction'];

	$Level1EditOrdinanceSQL = 'UPDATE bitdb_r_ordinance
							SET 	bitdb_r_ordinance.OrdinanceID = "'.$OrdinanceTitle.'",
									bitdb_r_ordinance.OrdinanceTitle = "'.$CategoryID.'",
									bitdb_r_ordinance.CategoryID = "'.$Author.'",
									bitdb_r_ordinance.Author = "'.$Persons_Involved.'",
									bitdb_r_ordinance.Persons_Involved = "'.$OrdDesc.'",
									bitdb_r_ordinance.OrdDesc = "'.$DateImplemented.'",
									bitdb_r_ordinance.DateImplemented= "'.$OrdStatus.'",
									bitdb_r_ordinance.Sanction = "'.$Sanction.'",
							WHERE 	bitdb_r_ordinance.OrdinanceID = "'.$OrdinanceID.'" ';
	$Level1EditOrdinanceQuery = mysqli_query($bitMysqli,$Level1EditOrdinanceSQL) or die (mysqli_error($bitMysqli));
	$header = 'Location:/BIT/Level1AddEditCitizen.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>
							WHERE 	bitdb_r_citizen.Citizen_ID = "'.$CID.'" ';
	$Level1EditCitizenQuery = mysqli_query($bitMysqli,$Level1EditCitizenSQL) or die (mysqli_error($bitMysqli));
	$header = 'Location:/BIT/Level1AddEditCitizen.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>