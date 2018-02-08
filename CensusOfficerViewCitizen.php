<?php $title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'CensusOfficerViewCitizen';?>
<?php include('head.php'); ?>
<?php include('CensusOfficerNavigation.php'); ?>

<link rel="icon" href="../../favicon.ico" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

<!-- Bootstrap Core Css -->
<link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

<!-- Animation Css -->
<link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

<!-- Custom Css -->
<link href="../../css/style.css" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="../../css/themes/all-themes.css" rel="stylesheet" />

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>CITIZEN INFORMATION LIST</h2>
        </div>
        
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            CITIZEN INFORMATION LIST 
                            <small>The current list of barangay citizen information.</small>
                        </h2>
                        <br/>

                    </div>           

                    
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="active"><a href="#home" data-toggle="tab">HOME</a></li>
                            <li role="presentation"><a href="#profile" data-toggle="tab">PROFILE</a></li>
                            <li role="presentation"><a href="#OFFICERS" data-toggle="tab">OFFICERS</a></li>
                            <li role="presentation"><a href="#BLOTTERS" data-toggle="tab">BLOTTERS</a></li>
                            <li role="presentation"><a href="#ORDIANCES" data-toggle="tab">ORDIANCES</a></li>
                            <li role="presentation"><a href="#PROJECT" data-toggle="tab">PROJECT</a></li>
                            <li role="presentation"><a href="#BUSINESS" data-toggle="tab">BUSINESS</a></li>

                        </ul>

                        <!-- Tab panes -->

                        <!-- Home -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                            <b>Home</b>
                            </div>

                               <!-- OFFICERS -->
                            <div role="tabpanel" class="tab-pane fade" id="OFFICERS">
                            <b>Business</b>
                            </div>

                              <!-- ORDINANCES -->
                            <div role="tabpanel" class="tab-pane fade" id="ORDIANCES">
                                <b>Ordinances</b>
                            </div>

                            <!-- PROJECT -->
                            <div role="tabpanel" class="tab-pane fade" id="PROJECT">
                                <b>Project</b>
                            </div>

                            <!-- BUSINESS-->
                            <div role="tabpanel" class="tab-pane fade" id="BUSINESS">
                                <b>Business</b>
                            </div>

                            <!-- profile -->
                            <div role="tabpanel" class="tab-pane fade" id="profile">
                               <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                       <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Birth Place</th>
                                            <th>Birthday</th>
                                            <th>Nationality</th>
                                            <th>Civil Status</th>
                                            <th>Status</th>
                                            <th>Address</th>
                                            <th>Date/Time Recorder</th>     
                                            <th>Actions</th>                                       
                                            <th class="hide"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                     <!--  unang column nang table -->
                                     <tr>

                                        <td>Remmel Ocay</td>
                                        <td>Male</td>
                                        <td>Hospital</td>
                                        <td>Sept. 20, 2000</td>
                                        <td>Filipino</td>
                                        <td>Single</td>
                                        <td>Active</td>
                                        <td>Area A</td>
                                        <td> Feb. 05, 2018/12:00 PM</td>
                                        <td>                               
                                        </table>
                                    </div>
                                </div>
                            </div>



                            <!-- blotters -->
                            <div role="tabpanel" class="tab-pane fade" id="BLOTTERS">
                               <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>Date Of Incident</th>
                                                <th>Complainamt</th>
                                                <th>Accused</th>
                                                <th>Subject</th>
                                                <th>Status</th>
                                                <th>Resolution</th>
                                                <th>Date Recorded</th>     


                                                <th class="hide"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                         <!--  unang column nang table -->
                                         <tr>
                                            <td>Remmel Ocay</td>
                                            <td>Male</td>
                                            <td>Hospital</td>
                                            <td>Sept. 20, 2000</td>
                                            <td>Active</td>
                                            <td>Single</td>
                                            <td>Sept. 20 2000</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                         

                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- #END# Example Tab -->




       <!-- #END# Basic Examples -->


       <script src="../../plugins/jquery/jquery.min.js"></script>

       <!-- Bootstrap Core Js -->
       <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

       <!-- Select Plugin Js -->
       <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

       <!-- Slimscroll Plugin Js -->
       <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

       <!-- Waves Effect Plugin Js -->
       <script src="../../plugins/node-waves/waves.js"></script>

       <!-- Custom Js -->
       <script src="../../js/admin.js"></script>

       <!-- Demo Js -->
       <script src="../../js/demo.js"></script>

       <?php include('footer.php'); ?>