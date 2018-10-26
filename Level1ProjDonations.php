<?php 
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $user = 1;
    include_once('LoginCheck.php');
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
                                    <select id="ProjectItem" class="form-control show-tick">
                                        <option value="">-- Select Project --</option>
                                        <?php
                                            include_once('dbconn.php');

                                            if(isset($_GET['Project']))
                                            {
                                                $ViewSql = "SELECT * FROM bitdb_r_project";
                                                $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                                if(mysqli_num_rows($ViewQuery) > 0)
                                                {
                                                    while($row = mysqli_fetch_assoc($ViewQuery))
                                                    {
                                                        if($row['ProjectID'] == $_GET['Project'])
                                                        {
                                                            $ID = $row['ProjectID'];
                                                            $Name = $row['ProjectName'];
                                                            echo '<option value="'.$ID.'" selected>'.$Name.'</option>';  
                                                        }
                                                        else
                                                        {
                                                            $ID = $row['ProjectID'];
                                                            $Name = $row['ProjectName'];
                                                            echo '<option value="'.$ID.'">'.$Name.'</option>';  
                                                        }
                                                    }
                                                }

                                            }
                                            else
                                            {
                                                $ViewSql = "SELECT * FROM bitdb_r_project";
                                                $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                                if(mysqli_num_rows($ViewQuery) > 0)
                                                {
                                                    while($row = mysqli_fetch_assoc($ViewQuery))
                                                    {
                                                        $ID = $row['ProjectID'];
                                                        $Name = $row['ProjectName'];
                                                        echo '<option value="'.$ID.'">'.$Name.'</option>';
                                                    }
                                                }
                                            }
                                        ?>
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
                        <div id="ProjectTable" class="table-responsive">
                            <table class="table table-borderethd table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th class="hide">Project ID</th>
                                        <th class="hide">Donation ID</th>
                                        <th>Donor Name</th>
                                        <th>Amount Donated (PHP)</th>
                                        <th>Date Given</th>
                                        <th>Date Recorded</th>
                                        <th>Actions</th>
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
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        include('dbconn.php');

                                        if(isset($_GET['Project']))
                                        {
                                            $Level1ActivityViewSQL = 'SELECT 
                                                                    bitdb_r_projectdonation.DonationID,
                                                                    bitdb_r_projectdonation.ProjectID,
                                                                    bitdb_r_projectdonation.DonorName,
                                                                    bitdb_r_projectdonation.MoneyDonated,
                                                                    bitdb_r_projectdonation.DateGiven,
                                                                    bitdb_r_projectdonation.DateRecorded
                                                                FROM    bitdb_r_projectdonation
                                                                WHERE bitdb_r_projectdonation.ProjectID='.$_GET['Project'].' ';
                                        $Level1ActivityViewQuery = mysqli_query($bitMysqli,$Level1ActivityViewSQL) or die (mysqli_error($bitMysqli));
                                        if (mysqli_num_rows($Level1ActivityViewQuery) > 0) 
                                        {
                                            while($row = mysqli_fetch_assoc($Level1ActivityViewQuery))
                                            {
                                                $DonationID = $row['DonationID'];
                                                $ProjectID = $row['ProjectID'];
                                                $DonorName = $row['DonorName'];
                                                $MoneyDonated = $row['MoneyDonated'];
                                                $DateGiven = $row['DateGiven'];
                                                $DateRecorded = $row['DateRecorded'];

                                                echo'
                                                <tr>
                                                    <td class="hide">'.$ProjectID.'</td>
                                                    <td class="hide">'.$DonationID.'</td>
                                                    <td>'.$DonorName.'</td>
                                                    <td>'.$MoneyDonated.'</td>
                                                    <td>'.$DateGiven.'</td>
                                                    <td>'.$DateRecorded.'</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success waves-effect editProject" data-toggle="modal" data-target="#editProjDonationModal">
                                                        <i class="material-icons">mode_edit</i>
                                                        <span>EDIT</span></button>
                                                    </td>
                                                </tr>';
                                            }
                                        }
                                        }
                                        else
                                        {
                                            $Level1ActivityViewSQL = 'SELECT 
                                                                    bitdb_r_projectdonation.DonationID,
                                                                    bitdb_r_projectdonation.ProjectID,
                                                                    bitdb_r_projectdonation.DonorName,
                                                                    bitdb_r_projectdonation.MoneyDonated,
                                                                    bitdb_r_projectdonation.DateGiven,
                                                                    bitdb_r_projectdonation.DateRecorded
                                                                FROM    bitdb_r_projectdonation
                                                                WHERE bitdb_r_projectdonation.ProjectID';
                                        $Level1ActivityViewQuery = mysqli_query($bitMysqli,$Level1ActivityViewSQL) or die (mysqli_error($bitMysqli));
                                        if (mysqli_num_rows($Level1ActivityViewQuery) > 0) 
                                        {
                                            while($row = mysqli_fetch_assoc($Level1ActivityViewQuery))
                                            {
                                                $DonationID = $row['DonationID'];
                                                $ProjectID = $row['ProjectID'];
                                                $DonorName = $row['DonorName'];
                                                $MoneyDonated = $row['MoneyDonated'];
                                                $DateGiven = $row['DateGiven'];
                                                $DateRecorded = $row['DateRecorded'];

                                                echo'
                                                <tr>
                                                    <td class="hide">'.$ProjectID.'</td>
                                                    <td class="hide">'.$DonationID.'</td>
                                                    <td>'.$DonorName.'</td>
                                                    <td>'.$MoneyDonated.'</td>
                                                    <td>'.$DateGiven.'</td>
                                                    <td>'.$DateRecorded.'</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success waves-effect editProject" data-toggle="modal" data-target="#editProjDonationModal">
                                                        <i class="material-icons">mode_edit</i>
                                                        <span>EDIT</span></button>
                                                    </td>
                                                </tr>';
                                            }
                                        }
                                        }
                                        
                                        
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="Level1AddProjectAct" action="Level1AddProjectDonation.php" method="POST">
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
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="addProjectID" type="text" class="form-control hide" name="ProjectID"/>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="DonorName"/>
                                    <label class="form-label">Donor Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="DonationAmount"/>
                                    <label class="form-label">Amount</label>
                                </div>
                            </div>
                            <label class="form-label">Date Given</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="DateGiven"/>
                                </div>
                            </div>
                            <label class="form-label">Date Recorded</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="DateRecorded"/>
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

    <form id="Level1EditProjectAct" action="Level1EditProjectDonation.php" method="POST">
        <div class="modal fade" id="editProjDonationModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Edit Donation Details
                            <br/>
                        </h2>
                    </div>
                   <div class="modal-body">
                        <div class="row clearfix margin-0">
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="editProjectID" type="text" class="form-control hide" name="ProjectID"/>
                                </div>
                            </div>
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="editDonationID" type="text" class="form-control hide" name="DonationID"/>
                                </div>
                            </div>
                            <label class="form-label">Donor Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editDonorName" type="text" class="form-control" name="DonorName"/>
                                </div>
                            </div>
                            <label class="form-label">Donated Amount</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editAmount" type="text" class="form-control" name="DonationAmount"/>
                                </div>
                            </div>
                            <label class="form-label">Date Given</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editGiven" type="date" class="form-control" name="DateGiven"/>
                                </div>
                            </div>
                            <label class="form-label">Date Recorded</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editRecorded" type="date" class="form-control" name="DateRecorded"/>
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

<script type="text/javascript">
$(document).ready(function(){
    $('#addProjectID').val($('#ProjectItem').val());
    $('#ProjectItem').change(function() {
        $('#addProjectID').val($('#ProjectItem').val());
        history.pushState(null, null, '?Project='+$('#ProjectItem').val());
        $('#ProjectTable').load(location.href + ' #ProjectTable');
        location.reload();
    });
    $(".editProject").click(function()
            {
                console.log($(this).closest("tbody tr").find("td:eq(3)").html());

                $("#editProjectID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#editDonationID").val($(this).closest("tbody tr").find("td:eq(1)").html());
                $("#editDonorName").val($(this).closest("tbody tr").find("td:eq(2)").html());
                $("#editAmount").val($(this).closest("tbody tr").find("td:eq(3)").html());
                $("#editGiven").val($(this).closest("tbody tr").find("td:eq(4)").html());
                $("#editRecorded").val($(this).closest("tbody tr").find("td:eq(5)").html());
            });
    // $('#editProjectID').val("wew");
    // $(document).on("click", ".projectRefresh option", function(){
    //     // $("#editProjectID").val($(this).find('projectRefresh').text());
    //     // $("#editProjectID").val($('#ProjectID option:selected').val());
    //     // console.log(val($('#ProjectID option:selected').val().text()));
    //     // console.log($(this).closest("tbody tr").find("td:eq(2)").html());
    //     $('#editProjectID').val("1");
    // });
    // $('#ProjectItem').change(function() {
    //     var val = this.value;
        
    // });
});
</script>
</body>
</html>