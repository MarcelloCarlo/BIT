<?php
session_start();
    include('dbconn.php');

	$BID = $_POST['BOffID'];
	$CID = $_POST['CID'];
    if($_POST['PositionName'] == "")
    {
        $OfficialEditSQL = "UPDATE 
                                bitdb_r_barangayofficial 
                            SET PosID = NULL, 
                                StartTerm = null,
                                EndTerm = null,
                                Official_Status = 0 
                            WHERE Brgy_Official_ID =".$BID." ";
        $OfficialEditQuery = mysqli_query($bitMysqli,$OfficialEditSQL) or die (mysqli_error($bitMysqli));   
    }
    else
    {
        $PosName = $_POST['PositionName'];

        $PositionSelectSQL ='SELECT 
                                bitdb_r_barangayposition.PosID, 
                                bitdb_r_barangayposition.PosName 
                            FROM bitdb_r_barangayposition 
                            WHERE bitdb_r_barangayposition.PosName ="'.$PosName.'"';
        $PositionSelectQuery = mysqli_query($bitMysqli,$PositionSelectSQL) or die (mysqli_error($bitMysqli));
        if(mysqli_num_rows($PositionSelectQuery) > 0)
        {
            while($row = mysqli_fetch_assoc($PositionSelectQuery))
            {
                $PosID = $row['PosID'];
            }
        } 
        $OfficialEditSQL = "UPDATE bitdb_r_barangayofficial 
                            SET PosID =".$PosID.",
                            Official_Status = 1
                            WHERE Brgy_Official_ID =".$BID." ";
        $OfficialEditQuery = mysqli_query($bitMysqli,$OfficialEditSQL) or die (mysqli_error($bitMysqli));
    }
    


    

    $header = 'Location:Level0Officials.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
	header($header);
?>