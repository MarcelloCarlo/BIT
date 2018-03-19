<?php 
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $currentPage = 'Level1AddEditProjDonations';
    include('headblock.php');
 ?>
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

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

</head>
<?php include('Level1Navbar.php'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>PROJECTS</h2>
        </div>
        <br/>
         <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            PROJECT DONATION LIST
                            <small>The list of all the donations per projects in the barangay. Select first the project you want to monitor. Click "Add New" to add a donation all  or "Edit" to modify on the existing donation</small>
                        </h2>
                        <br/>
                            <label class="form-label">Project</label>
                            <div class="form-group form-float">
                                    <select class="form-control show-tick">
                                        <option value="">-- Select Project --</option>
                                        <option value="10">Proj 1</option>
                                        <option value="20">Proj 2</option>
                                        <option value="30">Proj 3</option>
                                        <option value="40">Proj 4</option>
                                        <option value="50">Proj 5</option>
                                    </select>
                            </div>
                        <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addProjectDonModal">
                            <i class="material-icons">add_circle_outline</i>
                            <span>ADD NEW</span>
                        </button>

                        <!--    <button type="button" class="btn bg-indigo waves-effect" href="Level1AddBusinesses.php"> 
                            <a href="Level1AddBusinesses.php" style= "text-decoration: none;"> 
                            <i class="material-icons">add_circle_outline</i>
                            <span>Add/Edit</span></a>
                        </button> -->
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-borderethd table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th class="hide">Project ID</th>
                                        <th class="hide">Donation ID</th>
                                        <th>Donor Name</th>
                                        <th>Amount Donated (PHP)</th>
                                        <th>Date Given</th>
                                        <th>Date Recorded</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="hide">Project ID</th>
                                        <th class="hide">Donation ID</th>
                                        <th>Donor Name</th>
                                        <th>Amount Donated (PHP)</th>
                                        <th>Date Given</th>
                                        <th>Date Recorded</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <td class="hide">1</td>
                                    <td class="hide">1</td>
                                    <td>Maganda Anda</td>
                                    <td>500000</td>
                                    <td>03/23/2018</td>
                                    <td>03/24/2018</td>
                                    <td><button type="button" class="btn btn-success waves-effect editBlotter" data-toggle="modal" data-target="#editProjDonationModal">
                                    <i class="material-icons">mode_edit</i>
                                    <span>EDIT</span></button>
                                    </td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="Level1AddProjectAct" action="Level1AddProject.php" method="POST">
        <div class="modal fade" id="addProjectDonModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Add Activity
                            <br/>
                        </h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix margin-0">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="donorName"/>
                                    <label class="form-label">Donor Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="donationAmount"/>
                                    <label class="form-label">Amount</label>
                                </div>
                            </div>
                            <label class="form-label">Date Given</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="dateGiven"/>
                                </div>
                            </div>
                            <label class="form-label">Date Recorded</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="dateRecorded"/>
                                </div>
                            </div>
                        </div>
                        <br/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link waves-effect">ADD</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="Level1EditProjectAct" action="Level1EditProject.php" method="POST">
        <div class="modal fade" id="editProjDonationModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Edit Project
                            <br/>
                        </h2>
                    </div>
                   <div class="modal-body">
                        <div class="row clearfix margin-0">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="donorName"/>
                                    <label class="form-label">Donor Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="donationAmount"/>
                                    <label class="form-label">Amount</label>
                                </div>
                            </div>
                            <label class="form-label">Date Given</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="dateGiven"/>
                                </div>
                            </div>
                            <label class="form-label">Date Recorded</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="dateRecorded"/>
                                </div>
                            </div>
                        </div>
                        <br/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link waves-effect">EDIT</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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

<script src="ProjectMonitoring/lib/moment.min.js"></script>
<script src="ProjectMonitoring/fullcalendar.min.js"></script>
<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="ProjectMonitoring/projectMonitoringCalendar.js"></script>
<script src="js/pages/widgets/infobox/infobox-4.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>

</body>
</html>