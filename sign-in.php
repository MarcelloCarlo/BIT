<?php 
    $title = 'Welcome | BarangayIT MK.II';
    include('head.php'); 
    session_start();
    if(isset($_SESSION['Logged_In']) && isset($_SESSION['AccountUserType']))
    {
        switch ($_SESSION['AccountUserType']) {
            case '0':
            //ADMIN
                $header ='Location:indexLevel0.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
                break;
            case '1':
            //SECRETARY
                $header ='Location:indexLevel1.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
                break;
            case '2':
            //CAPTAIN
                $header ='Location:indexLevel2.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
                break;
            case '3':
            //CHIEF TANOD
                $header ='Location:indexLevel3.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
                break;
            case '4':
            //CENSUS OFFICER
                $header ='Location:indexLevel4.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
            break;
            default:
                $header = 'Location:/BIT/sign-in.php';
                unset($_SESSION['Logged_In']);
                unset($_SESSION['AccountUserType']);
                session_destroy();
                break;
         }
            header($header);
    }
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

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page" style="background-color:Teal"    >
    <div class="login-box">
        <div class="logo">
            <a href="#">Barangay<b> IT</b></a>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" action ="SignInSession2.php"  method="POST">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div> -->
                        <div class="col-xs-12">
                             <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>   
                        </div>
                    </div>
                     <div class=" align-right">
                            <a href="forgot-password.php">Forgot Password?</a>
                        </div>
                    <div class="row m-t-15 m-b--20">
                       <!-- <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div> -->
                    </div>
                </form>
            </div>
            <?php include('footerblock.php'); ?>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="Js/pages/examples/sign-in.js"></script>
</body>

  
</html>
