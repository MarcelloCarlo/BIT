<?php 
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $currentPage = 'indexCaptain';
    include('AdminConfig.php');
    include('headblock.php');
 ?>
 <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Offline Google Fonts -->
    <link href="css/materialIcons.css" rel="stylesheet" type="text/css" />
    <link href="css/robotoFont.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    
    <!-- Morris Css -->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <!-- CALENDAR THEME -->
    <link href='ProjectMonitoring/fullcalendar.min.css' rel='stylesheet' />
    <link href='ProjectMonitoring/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <link href='ProjectMonitoring/calendarstyle.css' rel='stylesheet' />
</head>
<?php include('NavbarCaptain.php'); ?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
 <!--CUSTOM BLOCK INSERT HERE-->
             <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-red">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">CURRENT BUSINESSES</div>
                            <div class="number count-to" data-from="0" data-to="520" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-indigo">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">CURRENT POPULATION</div>
                            <div class="number count-to" data-from="0" data-to="50450" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-purple">
                        <div class="icon">
                            <i class="material-icons">report_problem</i>
                        </div>
                        <div class="content">
                            <div class="text">BLOTTERS REPORTED</div>
                            <div class="number count-to" data-from="0" data-to="1020" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-deep-purple">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">
                            <div class="text">ORDINANCES IMPOSED</div>
                            <div class="number count-to" data-from="0" data-to="1459" data-speed="1500" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
                 <div class="row clearfix">
                <!-- Line Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>BLOTTERS FOR THIS YEAR</h2>
                        </div>
                        <div class="body">
                            <canvas id="line_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Line Chart -->
                <!-- Bar Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>BLOTTER RECORDS PER MONTH</h2>
                        </div>
                        <div class="body">
                            <canvas id="bar_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Bar Chart -->
            </div>

            <div class="row clearfix">
                <!-- Pie Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>RECORDED BLOTTER PER ZONE</h2>
                        </div>
                        <div class="body">
                            <canvas id="pie_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Pie Chart -->
                 <!-- Donut Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>TOTAL RECORDED BLOTTER</h2>
                        </div>
                                <div class="body">
                            <div id="donut_chart" class="graph" style="height:240px"></div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- #END# Donut Chart -->
    </div>
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            BARANGAY INFORMATION
                            <small>Current Barangay information. Contact your System Administrator to modify this information.</small>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" class="list-group-item">
                                <h4 class="list-group-item-heading">City/Municipality</h4>
                                <p class="list-group-item-text">
                                    <?php echo $c_Type?>
                                </p>
                            </a>
                            <a href="javascript:void(0);" class="list-group-item">
                                <h4 class="list-group-item-heading">Independent/Component</h4>
                                <p class="list-group-item-text">
                                    <?php echo $b_Type?>
                                </p>
                            </a>
                            <a href="javascript:void(0);" class="list-group-item">
                                <h4 class="list-group-item-heading">Province Name</h4>
                                <p class="list-group-item-text">
                                    <?php echo $ProvinceName?>
                                </p>
                            </a>
                            <a href="javascript:void(0);" class="list-group-item">
                                <h4 class="list-group-item-heading">City/Municipality Name</h4>
                                <p class="list-group-item-text">
                                    <?php echo $Municipality?>
                                </p>
                            </a>
                            <a href="javascript:void(0);" class="list-group-item">
                                <h4 class="list-group-item-heading">Barangay Name</h4>
                                <p class="list-group-item-text">
                                    <?php echo $BarangayName?>
                                </p>
                            </a>
                            <a href="javascript:void(0);" class="list-group-item">
                                <h4 class="list-group-item-heading">Signatory (Barangay Chairman)</h4>
                                <p class="list-group-item-text">
                                    <?php echo $WName?>
                                </p>
                            </a>
                            <a href="javascript:void(0);" class="list-group-item">
                                <h4 class="list-group-item-heading">City/Municipal Seal</h4>
                                <p class="list-group-item-text">
                                    <?php echo $Municipality?>
                                </p>
                            </a>
                            <a href="javascript:void(0);" class="list-group-item">
                                <h4 class="list-group-item-heading">Barangay Seal</h4>
                                <p class="list-group-item-text">
                                    <?php echo $Municipality?>
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    
   
<?php include('footerblock.php'); ?>
    
<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->           
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- SweetAlert Plugin Js -->
<script src="plugins/sweetalert/sweetalert.min.js"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>

<!-- Bootstrap Colorpicker Js -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

<!-- Dropzone Plugin Js -->
<script src="plugins/dropzone/dropzone.js"></script>

<!-- Input Mask Plugin Js -->
<script src="plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

<!-- Multi Select Plugin Js -->
<script src="plugins/multi-select/js/jquery.multi-select.js"></script>

<!-- Jquery Spinner Plugin Js -->
<script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>

<!-- Bootstrap Tags Input Plugin Js -->
<script src="plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="plugins/jquery-countto/jquery.countTo.js"></script>
    
<!-- Sparkline Chart Plugin Js -->
<script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- JQuery Steps Plugin Js -->
<script src="plugins/jquery-steps/jquery.steps.js"></script>

<!-- Morris Plugin Js -->
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/morrisjs/morris.js"></script>

<!-- Chart Plugins Js -->
<script src="plugins/chartjs/Chart.bundle.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/charts/chartjs.js"></script>
<script src="js/pages/charts/morris.js"></script>
<script src="js/pages/widgets/infobox/infobox-4.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>

</body>
</html>








        
