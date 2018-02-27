
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

<?php
	include_once('dbconn.php');

	$OID = $_POST['OrdID'];
	$Title = $_POST['OrdTitle'];
	$OrdCategory = $_POST['OrdCategory'];
	$OrdAuthor = $_POST['OrdAuthor'];
	$PerInv = $_POST['PerInv'];
	$OrdDesc = $_POST['OrdDesc'];
	$OrdSanction = $_POST['OrdSanction'];
	$DateImplemented = $_POST['DateImplemented'];

	if($_POST['Ord_Status'] == "Active")
	{
		$Ord_Status = 1;
	}
	else
	{
		$Ord_Status = 0;
	}

	// echo $OID;
	// echo $Title;
	// echo $OrdCategory;
	// echo $OrdAuthor;
	// echo $PerInv;
	// echo $OrdDesc;
	// echo $OrdSanction;
	// echo $DateImplemented;
	// echo $Ord_Status;
	$CategorySelectSQL = 'SELECT bitdb_r_ordinancecategory.OrdCategoryID,bitdb_r_ordinancecategory.OrdinanceTitle FROM bitdb_r_ordinancecategory WHERE bitdb_r_ordinancecategory.OrdinanceTitle = "'.$OrdCategory.'" ';
	$CategorySelectQuery = mysqli_query($bitMysqli,$CategorySelectSQL) or die (mysqli_error($bitMysqli));
	if(mysqli_num_rows($CategorySelectQuery) > 0)
	{
		while($row = mysqli_fetch_assoc($CategorySelectQuery))
		{
			$OrdCatID = $row['OrdCategoryID'];
			$OrdCatTitle = $row['OrdinanceTitle'];
		}
	}

	$Level1EditOrdinanceSQL = 'UPDATE 	bitdb_r_ordinance 
								SET 	bitdb_r_ordinance.OrdinanceTitle = "'.$Title.'",
										bitdb_r_ordinance.CategoryID ='.$OrdCatID.',
										bitdb_r_ordinance.Author = "'.$OrdAuthor.'",
										bitdb_r_ordinance.Persons_Involved = "'.$PerInv.'",
										bitdb_r_ordinance.OrdDesc = "'.$OrdDesc.'",
										bitdb_r_ordinance.DateImplemented = "'.$DateImplemented.'",
										bitdb_r_ordinance.OrdStatus = '.$Ord_Status.',
										bitdb_r_ordinance.Sanction = "'.$OrdSanction.'"
								WHERE 	bitdb_r_ordinance.OrdinanceID = '.$OID.' ';
	$Level1EditOrdinanceQuery = mysqli_query($bitMysqli,$Level1EditOrdinanceSQL) or die (mysqli_error($bitMysqli));
	$header = 'Location:/BIT/Level1AddEditOrdinance.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>