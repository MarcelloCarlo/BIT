<?php
	session_start();
	include_once('dbconn.php');
	include_once('updateBarangayConfigCaptain.php');
	
	$BName = $_POST['BarangayName'];
	$MName = $_POST['MunicipalName'];
	$PName = $_POST['ProvinceName'];
	$morcRadio = $_POST['morcRadio'];
	$iorcRadio = $_POST['iorcRadio'];
	// $BarangaySealName = mysqli_real_escape_string($bitMysqli,$_FILES["BarangaySeal"]["name"]);
	// $BarangaySealData = mysqli_real_escape_string($bitMysqli,file_get_contents($_FILES["BarangaySeal"]["tmp_name"]));
	// $BarangaySealType = mysqli_real_escape_string($bitMysqli,$_FILES["BarangaySeal"]["type"]);
	// $MunicipalSealName = mysqli_real_escape_string($bitMysqli,$_FILES["MunicipalSeal"]["name"]);
	// $MunicipalSealData = mysqli_real_escape_string($bitMysqli,file_get_contents($_FILES["MunicipalSeal"]["tmp_name"]));
	// $MunicipalSealType = mysqli_real_escape_string($bitMysqli,$_FILES["MunicipalSeal"]["type"]);
	$BarangaySealName = $_FILES["BarangaySeal"]["name"];
	$MunicipalSealName = $_FILES["MunicipalSeal"]["name"];
	$DirTargetB = "images/".basename($BarangaySealName);
	$DirTargetM = "images/".basename($MunicipalSealName);
	// if(substr($BarangaySealType,6) == "png" || substr($BarangaySealType,6) == "jpg" || substr($BarangaySealType,6) == "jpeg" )
	// {
		$CheckQuery = "SELECT * FROM bitdb_r_config";
		$CheckQuery1 = mysqli_query($bitMysqli,$CheckQuery) or die(mysqli_error($bitMysqli));
		if (mysqli_num_rows($CheckQuery1) > 0)
		{
			$UpdateQuery = 'UPDATE bitdb_r_config SET ProvinceName="'.$PName.'", CityType="'.$morcRadio.'", Municipality="'.$MName.'", BarangayType="'.$iorcRadio.'", BarangayName="'.$BName.'", MunicipalSeal="'.$MunicipalSealName.'",BarangaySeal="'.$BarangaySealName.'" ';
			mysqli_query($bitMysqli,$UpdateQuery) or die (mysqli_error($bitMysqli));
            //Developent Build
            // $header = 'Location:/BRGYIT-UI/indexAdmin.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
            //Testing and Deployment Build
            move_uploaded_file($_FILES["BarangaySeal"]["tmp_name"], $DirTargetB);
            move_uploaded_file($_FILES["MunicipalSeal"]["tmp_name"], $DirTargetM);
			$header = 'Location:indexLevel0.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].''; 
			header($header);
		}
		else
		{
			$InsertQuery = 'INSERT INTO bitdb_r_config(ProvinceName,CityType,Municipality,BarangayType,BarangayName,MunicipalSeal,BarangaySeal) VALUES ("'.$PName.'","'.$morcRadio.'","'.$MName.'","'.$iorcRadio.'","'.$BName.'","'.$MunicipalSealName.'","'.$BarangaySealName.'")';
			mysqli_query($bitMysqli,$InsertQuery);
            //Development Build
			// $header = 'Location:/BRGYIT-UI/indexAdmin.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
            //Testing and Deployment Build
            move_uploaded_file($_FILES["BarangaySeal"]["tmp_name"], $DirTargetB);
            move_uploaded_file($_FILES["MunicipalSeal"]["tmp_name"], $DirTargetM);
			$header = 'Location:indexLevel0.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
			header($header);
		}
		
	// }
	// else
	// {
	// 	echo "Nope";
	// }
?>