<?php
	include('dbconn.php');

	$BusinessID = $_POST['BusinessID'];
	$BusinessName = $_POST['BusinessName'];
	$BusinessLoc = $_POST['BusinessLoc'];
	$BusinessCategory = $_POST['BusinessCategory'];
	$BusinessManager = $_POST['BusinessManager'];
	$ManagerAdd = $_POST['ManagerAdd'];

	$Level1BusinessCategorySQL = 'SELECT bitdb_r_businesscategory.categoryID FROM bitdb_r_businesscategory WHERE bitdb_r_businesscategory.categoryName = "'.$BusinessCategory.'"';
	$Level1BusinessCategoryQuery = mysqli_query($bitMysqli,$Level1BusinessCategorySQL) or die (mysqli_error($bitMysqli));
	if(mysqli_num_rows($Level1BusinessCategoryQuery) > 0)
	{
		while($row = mysqli_fetch_assoc($Level1BusinessCategoryQuery))
		{
			$CategoryID = $row['categoryID'];
		}
	}

	$Level1EditBusinessSQL = 'UPDATE bitdb_r_business SET Business_Name="'.$BusinessName.'", BusinessLoc="'.$BusinessLoc.'", Manager="'.$BusinessManager.'", Mgr_Address="'.$ManagerAdd.'", BusinessCategory='.$CategoryID.' WHERE BusinessID ='.$BusinessID.' ';
	$Level1EditBusinessQuery = mysqli_query($bitMysqli,$Level1EditBusinessSQL) or die (mysqli_error($bitMysqli));

	$header = 'Location:/BIT/Level1AddEditBusinesses.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>