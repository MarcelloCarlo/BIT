<?php 
    $title = 'Welcome | BarangayIT MK.II';
    include('head.php'); 
    include('dbconn.php')
    // session_start();
    // if(isset($_SESSION['Logged_In']) && isset($_SESSION['AccountUserType']))
    // {
    //     switch ($_SESSION['AccountUserType']) {
    //         case '0':
    //         //ADMIN
    //             $header ='Location:indexLevel0.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
    //             break;
    //         case '1':
    //         //SECRETARY
    //             $header ='Location:indexLevel1.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
    //             break;
    //         case '2':
    //         //CAPTAIN
    //             $header ='Location:indexLevel2.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
    //             break;
    //         case '3':
    //         //CHIEF TANOD
    //             $header ='Location:indexLevel3.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
    //             break;
    //         case '4':
    //         //CENSUS OFFICER
    //             $header ='Location:indexLevel4.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
    //         break;
    //         default:
    //             $header = 'Location:sign-in.php';
    //             unset($_SESSION['Logged_In']);
    //             unset($_SESSION['AccountUserType']);
    //             session_destroy();
    //             break;
    //      }
    //         header($header);
    // }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome | BarangayIT MK.II</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
        body{
            background: url('images/OA_BG.jpg') center center no-repeat;
            background-size: cover;
            padding: 50px;
            overflow: hidden;
        }
        .Title{
            font-family:Montserrat;
            font-size: 3em;
            display:flex;
            justify-content: center;
        }
        .subTitle{
            font-family:Montserrat;
            font-size: 1em;
            display:flex;
            justify-content: center;
        }
        .ApplicationCard{
            width:50%;
            text-align: center;
            margin: auto;
            display: block;
        }
    </style>
</head>

<body>
    <div class="ApplicationCard">
        <div class="logo">
            <label class="Title">Barangay<b> IT</b></label><br>
            <label class="subTitle">Online Certification System</label>
        </div>
        <div class="card">
            <div class="body">
                <div class="msg">Please insert the required information.</div><br>
                
                <div class="form-group">
                    <input id="FName" type="text" class="form-control" name="FName" placeholder="First Name" required autofocus>
                </div>
                <div class="form-group">
                    <input id="MName" type="text" class="form-control" name="MName" placeholder="Middle Name (*if applicable)">
                </div>
                <div class="form-group">
                    <input id="LName" type="text" class="form-control" name="LName" placeholder="Last Name" required>
                </div>
                <div class="form-group">
                    <input id="XName" type="text" class="form-control" name="XName" placeholder="Extension Name (*if applicable)">
                </div>
                <div class="form-group">
                    <label>Certificate</label>
                    <select id="CertID" class="form-control" style="background-color: #f2f2f2;">
                        <?php
                            $IssuanceCatSQL = 'SELECT * FROM bitdb_r_issuancetype';
                            $IssuanceCatQuery = mysqli_query($bitMysqli,$IssuanceCatSQL) or die (mysqli_error($bitMysqli));
                            if(mysqli_num_rows($IssuanceCatQuery) > 0)
                            {
                                while($row = mysqli_fetch_assoc($IssuanceCatQuery))
                                {
                                    $ID = $row['IssuanceID'];
                                    $Type = $row['IssuanceType'];
                                    echo '<option value="'.$ID.'" class="form-control">'.$Type.'</option>';
                                }
                            }
                            else
                            {
                                echo '<option disabled>No Category</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input id="Purpose" type="textarea" class="form-control" name="Purpose" placeholder="Purpose" rows="2" required="">
                </div>
                <div class="row">
                    <div class="col-xs-12">
                         <button id="submitBtn" class="btn btn-block bg-pink waves-effect">APPLY</button>   
                    </div>
                </div>
                <div class="row m-t-15 m-b--20">
                </div>
            </div>
            <?php include('footerblock.php'); ?>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <!-- <script src="plugins/node-waves/waves.js"></script> -->

    <!-- Validation Plugin Js -->
    <!-- <script src="plugins/jquery-validation/jquery.validate.js"></script> -->

    <!-- Custom Js -->
    <!-- <script src="Js/pages/examples/sign-in.js"></script> -->
</body>

  
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $('#submitBtn').on('click',function(){
            if($('#FName').val() != '')
            {
                if($('#LName').val() != '')
                {
                    // alert($('#FName').val()+' '+$('#MName').val()+' '+$('#LName').val()+' '+$('#XName').val()+' '+$('#Purpose').val());
                    let FName = $('#FName').val();
                    let MName = $('#MName').val();
                    let LName = $('#LName').val();
                    let XName = $('#XName').val();
                    let Purpose = $('#Purpose').val();
                    let Cert = $('#CertID').val();

                    $.ajax({
                        url:'OnlineApplicationSubmit.php',
                        type:'POST',
                        data:{FName:FName,MName:MName,LName:LName,XName:XName,Purpose:Purpose,CertID:Cert},
                        cache:false,
                        success:function(data){
                            alert(data);
                            setInterval(function(){location.reload();},0);
                        },
                        error:function(){
                            alert('error');
                        }
                    });

                }
                else
                {
                    alert('Please fill all the required fields.');
                }
            }
            else
            {
                alert('Please fill all the required fields.');
            }
        });
    });
</script>
