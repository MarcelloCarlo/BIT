<?php
session_start();
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
	$header = 'Location:Level1Ordinance.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>