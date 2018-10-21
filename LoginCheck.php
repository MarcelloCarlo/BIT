<?php
if(!isset($_SESSION['AccountUserType']))
{
    $header = 'Location:sign-in.php';
    header($header);
}
elseif($_SESSION['AccountUserType'] != $user)
{
    switch ($_SESSION['AccountUserType']) 
    {
        case 0:
        //ADMIN
            $header ='Location:indexLevel0.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
            break;
        case 1:
        //SECRETARY
            $header ='Location:indexLevel1.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
            break;
        case 2:
        //CAPTAIN
            $header ='Location:indexLevel2.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
            break;
        case 3:
        //CHIEF TANOD
            $header ='Location:indexLevel3.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
            break;
        case 4:
        //CENSUS OFFICER
            $header ='Location:indexLevel4.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
            break;
        default:
            $header = 'Location:sign-in.php';
            unset($_SESSION['Logged_In']);
            unset($_SESSION['AccountUserType']);
            session_destroy();
            break;
    }
    header($header);
}

?>