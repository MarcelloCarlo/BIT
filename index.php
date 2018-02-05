<?php $title = 'Welcome | BarangayIT MK.II';?>
<?php include('head.php'); 
include ('config.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" )
{
    $Busername = mysqli_real_escape_string($db,$_POST['username']);
    $Bpassword = mysqli_real_escape_string($db,$_POST['password']);

    $error =" ";

/*    if($Busername ==='admin'&&$Bpassword==='admin')
*/

}
?>


<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Barangay<b> IT</b></a>
        </div>
        <div class="card">
            <div class="body">
                <form action="" id="sign_in" method="POST">
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
                    <?php

    if(isset($Busername) && isset($Bpassword))
    {
        if($Busername === 'admin' && $Bpassword === 'admin')
        {
            header("location: indexAdmin.php");
        }
         else 
        {
            echo "<strong>Oh snap!</strong> Change a few things up and try submitting again.";
        }   
    }
                    ?>                
                            
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            
                        </div>
                        <div class="col-xs-4">
                             <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>   
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                       <!-- <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div> -->
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>