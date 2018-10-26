<?php
	session_start();
	include_once('dbconn.php');

	$Title = $_POST['OrdTitle'];
	$OrdCategory = $_POST['OrdCategory'];
	$OrdAuthor = $_POST['OrdAuthor'];
	$PerInv = $_POST['Persons_Involved'];
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

	// $Level1AddOrdinanceSQL = 'INSERT INTO bitdb_r_ordinance(OrdinanceTitle,CategoryID,Author,Persons_Involved,OrdDesc,DateImplemented,OrdStatus,Sanction) VALUES ("'.$Title.'",'.$OrdCatID.',"'.$OrdAuthor.'","'.$PerInv.'","'.$OrdDesc.'","'.$DateImplemented.'","'.$Ord_Status.'","'.$OrdSanction.'")';
	// $Level1AddOrdinanceQuery = mysqli_query($bitMysqli,$Level1AddOrdinanceSQL) or die (mysqli_error($bitMysqli));


	$Level1AddOrdinanceSQL = 'INSERT INTO bitdb_r_ordinance(OrdinanceTitle,CategoryID,Persons_Involved,OrdDesc,DateImplemented,OrdStatus,Sanction) VALUES 
	("'.$Title.'","'.$OrdCatID.'","'.$PerInv.'","'.$OrdDesc.'","'.$DateImplemented.'","'.$Ord_Status.'","'.$OrdSanction.'")';
	$Level1AddOrdinanceQuery = mysqli_query($bitMysqli,$Level1AddOrdinanceSQL) or die (mysqli_error($bitMysqli));


	$Level1MaxOrdinanceSQL = 'SELECT MAX(OrdinanceID) AS OrdCount FROM bitdb_r_ordinance';
	$Level1MaxOrdinanceQuery = mysqli_query($bitMysqli,$Level1MaxOrdinanceSQL) or die(mysqli_error($bitMysqli));
	if(mysqli_num_rows($Level1MaxOrdinanceQuery) > 0)
		{
			while($row = mysqli_fetch_assoc($Level1MaxOrdinanceQuery))
			{
				$Count = $row['OrdCount'];
			}
		}

	$AuthorToken = strtok($OrdAuthor, ",");
	 
	while ($AuthorToken !== false)
	   {
	   // echo "$token<br>";
	   $Level1AddAuthorSQL = 'INSERT INTO bitdb_r_ordinanceauthor(OrdinanceID,Author) VALUES('.$Count.',"'.$AuthorToken.'")';
	   $Level1AddAuthorQuery = mysqli_query($bitMysqli,$Level1AddAuthorSQL) or die (mysqli_error($bitMysqli));
	   $AuthorToken = strtok(",");
	   }



	$header = 'Location:Level1Ordinance.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);

?>