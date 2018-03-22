<?php 
    session_start();
    $title = 'Project Activities | BarangayIT MK.II';
    $currentPage = 'Level1AddEditActivities';
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

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

</head>
<?php include('Level1Navbar.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>PROJECTS</h2>
        </div>
        <div id="calendar"></div>
        <br/>

         <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ACTIVITY MONITORING
                            <small>The list of all the activites per projects in the barangay. Select first the project you want to monitor. Click "Add New" to add an activity all  or "Edit" to modify on the existing activity</small>
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
                                    <?php
                                        include_once('dbconn.php');
                                        if(isset($_GET['Project']))
                                        {
                                            $TotalBudgetSQL ='SELECT bitdb_r_project.ProjectID,
                                                               bitdb_r_project.ProjectName,
                                                               COALESCE(SUM(bitdb_r_projectdonation.MoneyDonated),0)+COALESCE(SUM(bitdb_r_project.ProjectBudget),0) AS TotalBudget,
                                                               bitdb_r_project.ProjectBudget
                                                        FROM   bitdb_r_project
                                                        INNER JOIN bitdb_r_projectdonation 
                                                        ON     bitdb_r_project.ProjectID =bitdb_r_projectdonation.ProjectID
                                                        WHERE bitdb_r_project.ProjectID='.$_GET['Project'].'';
                                            $TotalBudgetQuery = mysqli_query($bitMysqli,$TotalBudgetSQL) or die (mysqli_error($bitMysqli));
                                            if(mysqli_num_rows($TotalBudgetQuery) > 0)
                                            {
                                                while($row = mysqli_fetch_assoc($TotalBudgetQuery))
                                                {
                                                    $ID = $row['ProjectID'];
                                                    $Name = $row['ProjectName'];
                                                    $TotalBudget = $row['TotalBudget'];
                                                    echo '<h2 class="header">'.$Name.' Total Budget: PHP. '.$TotalBudget.'</h2>';
                                                }
                                            }
                                        }
                                        else
                                        {
                                            echo '<h2 class="header"> ---- Total Budget: PHP. ----  </h2>';
                                        }

                                    ?>
                            </div>
                        <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addProjectActModal">
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
                                        <th class="hide">Activity ID</th>
                                        <th>Activity Name</th>
                                        <th>Description</th>
                                        <th>Budget (PHP)</th>
                                        <th class="hide">PeopleInvolved ID</th>
                                        <th>People Involved</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                       <th class="hide">Project ID</th>
                                        <th class="hide">Activity ID</th>
                                        <th>Activity Name</th>
                                        <th>Description</th>
                                        <th>Budget (PHP)</th>
                                        <th class="hide">PeopleInvolved ID</th>
                                        <th>People Involved</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        include('dbconn.php');

                                        if(isset($_GET['Project']))
                                        {

                                            $Level1ActivityViewSQL = 'SELECT 
                                                                    bitdb_r_projectactivity.ActivityID,
                                                                    bitdb_r_projectactivity.ProjectID,
                                                                    bitdb_r_projectactivity.ActivityName,
                                                                    bitdb_r_projectactivity.ActivityDesc,
                                                                    bitdb_r_projectactivity.ActivityBudget,
                                                                    bitdb_r_projectactivity.PeopleInvolve,
                                                                    bitdb_r_citizen.First_Name,
                                                                    IFNULL(bitdb_r_citizen.Middle_Name,"") AS Middle_Name,
                                                                    bitdb_r_citizen.Last_Name,
                                                                    IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Ext,
                                                                    bitdb_r_projectactivity.StartDate,
                                                                    bitdb_r_projectactivity.FinishDate,
                                                                    bitdb_r_projectactivity.ActivityStatus
                                                                FROM    bitdb_r_projectactivity
                                                                INNER JOIN bitdb_r_citizen
                                                                ON bitdb_r_citizen.Citizen_ID = bitdb_r_projectactivity.PeopleInvolve
                                                                WHERE bitdb_r_projectactivity.ProjectID='.$_GET['Project'].' ';
                                            $Level1ActivityViewQuery = mysqli_query($bitMysqli,$Level1ActivityViewSQL) or die (mysqli_error($bitMysqli));
                                        if (mysqli_num_rows($Level1ActivityViewQuery) > 0) 
                                        {
                                            while($row = mysqli_fetch_assoc($Level1ActivityViewQuery))
                                            {
                                                $ActivityID = $row['ActivityID'];
                                                $ProjectID = $row['ProjectID'];
                                                $ActivityName = $row['ActivityName'];
                                                $ActivityDesc = $row['ActivityDesc'];
                                                $ActivityBudget = $row['ActivityBudget'];
                                                $PeopleInvolve = $row['PeopleInvolve'];
                                                $StartDate = $row['StartDate'];
                                                $FinishDate = $row['FinishDate'];
                                                if($row['ActivityStatus'] == 1)
                                                {
                                                    $ActivityStatus = "Active";
                                                }
                                                else
                                                {
                                                    $ActivityStatus = "Inactive";
                                                }
                                                $FullName = "".$row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name']." ".$row['Name_Ext']."";

                                                echo'
                                                <tr>
                                                    <td class="hide">'.$ActivityID.'</td>
                                                    <td class="hide">'.$ProjectID.'</td>
                                                    <td>'.$ActivityName.'</td>
                                                    <td>'.$ActivityDesc.'</td>
                                                    <td>'.$ActivityBudget.'</td>
                                                    <td class="hide">'.$PeopleInvolve.'</td>
                                                    <td>'.$FullName.'</td>
                                                    <td>'.$StartDate.'</td>
                                                    <td>'.$FinishDate.'</td>
                                                    <td>'.$ActivityStatus.'</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success waves-effect editActivity" data-toggle="modal" data-target="#editActivityModal">
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
                                                                    bitdb_r_projectactivity.ActivityID,
                                                                    bitdb_r_projectactivity.ProjectID,
                                                                    bitdb_r_projectactivity.ActivityName,
                                                                    bitdb_r_projectactivity.ActivityDesc,
                                                                    bitdb_r_projectactivity.ActivityBudget,
                                                                    bitdb_r_projectactivity.PeopleInvolve,
                                                                    bitdb_r_citizen.First_Name,
                                                                    IFNULL(bitdb_r_citizen.Middle_Name,"") AS Middle_Name,
                                                                    bitdb_r_citizen.Last_Name,
                                                                    IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Ext,
                                                                    bitdb_r_projectactivity.StartDate,
                                                                    bitdb_r_projectactivity.FinishDate,
                                                                    bitdb_r_projectactivity.ActivityStatus
                                                                FROM    bitdb_r_projectactivity
                                                                INNER JOIN bitdb_r_citizen
                                                                ON bitdb_r_citizen.Citizen_ID = bitdb_r_projectactivity.PeopleInvolve';
                                            $Level1ActivityViewQuery = mysqli_query($bitMysqli,$Level1ActivityViewSQL) or die (mysqli_error($bitMysqli));
                                        if (mysqli_num_rows($Level1ActivityViewQuery) > 0) 
                                        {
                                            while($row = mysqli_fetch_assoc($Level1ActivityViewQuery))
                                            {
                                                $ActivityID = $row['ActivityID'];
                                                $ProjectID = $row['ProjectID'];
                                                $ActivityName = $row['ActivityName'];
                                                $ActivityDesc = $row['ActivityDesc'];
                                                $ActivityBudget = $row['ActivityBudget'];
                                                $PeopleInvolve = $row['PeopleInvolve'];
                                                $StartDate = $row['StartDate'];
                                                $FinishDate = $row['FinishDate'];
                                                if($row['ActivityStatus'] == 1)
                                                {
                                                    $ActivityStatus = "Active";
                                                }
                                                else
                                                {
                                                    $ActivityStatus = "Inactive";
                                                }
                                                $FullName = "".$row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name']." ".$row['Name_Ext']."";

                                                echo'
                                                <tr>
                                                    <td class="hide">'.$ActivityID.'</td>
                                                    <td class="hide">'.$ProjectID.'</td>
                                                    <td>'.$ActivityName.'</td>
                                                    <td>'.$ActivityDesc.'</td>
                                                    <td>'.$ActivityBudget.'</td>
                                                    <td class="hide">'.$PeopleInvolve.'</td>
                                                    <td>'.$FullName.'</td>
                                                    <td>'.$StartDate.'</td>
                                                    <td>'.$FinishDate.'</td>
                                                    <td>'.$ActivityStatus.'</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success waves-effect editProject" data-toggle="modal" data-target="#editActivityModal">
                                                        <i class="material-icons">mode_edit</i>
                                                        <span>EDIT</span></button>
                                                    </td>
                                                </tr>';
                                            }
                                        }
                                        }
                                        
                                        
                                    ?><!-- 
                                    <td class="hide">1</td>
                                    <td class="hide">1</td>
                                    <td>Pagpupukpok</td>
                                    <td>Pagpukpok ng semento (if they can)</td>
                                    <td>500000</td>
                                    <td class="hide">1</td>
                                    <td>My Lowell</td>
                                    <td>03/23/2018</td>
                                    <td>03/24/2018</td>
                                    <td>1 day/s</td>
                                    <td><button type="button" class="btn btn-success waves-effect editBlotter" data-toggle="modal" data-target="#editActivityModal">
                                    <i class="material-icons">mode_edit</i>
                                    <span>EDIT</span></button>
                                    </td> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="Level1AddProjectAct" action="Level1AddProjectActivity.php" method="POST">
        <div class="modal fade" id="addProjectActModal" tabindex="-1" role="dialog">
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
                            <label class="form-label hide">Project ID</label>
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="addProjectID" type="text" class="form-control hide" name="ProjectID"/>
                                </div>
                            </div>
                            <label class="form-label">Activity Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="ActivityName"/>
                                    <label class="form-label">Activity Name</label>
                                </div>
                            </div>
                            <label class="form-label">Description</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="ActivityDesc"/>
                                    <label class="form-label">Description</label>
                                </div>
                            </div>
                            <label class="form-label">Budget</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="ActivityBudget">
                                    <label class="form-label">Budget</label>
                                </div>
                            </div>
<!--Add Search-->
                            <label class="form-label hide">InvolveID</label>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="addCitizenID" type="text" class="form-control hide" name="CitizenID" required/>
                                    </div>
                                </div>
                                <label class="form-label">People Involve</label>
                                <div class="form-group form-float">
                                    <div class="form-line search-box">
                                        <input id="CitizenName" type="text" class="form-control" name="Citizen" required/>
                                        <label class="form-label">People Involve</label>
                                        <div class="result"></div>
                                    </div>
                                </div>
<!--end search-->
                            <label class="form-label">Start Date</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="StartDate"/>
                                </div>
                            </div>
                            <label class="form-label">End Date</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="FinishDate"/>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Status</h4>
                                <div class="form-group">
                                    <input type="radio" name="ActStat" id="ActA" value="Active" class="with-gap" checked>
                                    <label for="ActA">Yes</label>
                                    <input type="radio" name="ActStat" id="ActI" value="Inactive" class="with-gap">
                                    <label for="ActI" class="m-l-20">No</label>
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

    <form id="Level1EditProjectAct" action="Level1EditProjectActivity.php" method="POST">
        <div class="modal fade" id="editActivityModal" tabindex="-1" role="dialog">
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
                            <label class="form-label hide">Project ID</label>
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="editProjectID" type="text" class="form-control hide" name="ProjectID"/>
                                </div>
                            </div>
                            <label class="form-label hide">Activity ID</label>
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="editActivityID" type="text" class="form-control hide" name="ActivityID"/>
                                </div>
                            </div>
                            <label class="form-label">Activity Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editActivityName" type="text" class="form-control" name="ActivityName"/>
                                </div>
                            </div>
                            <label class="form-label">Description</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editActivityDesc" type="text" class="form-control" name="ActivityDesc"/>
                                </div>
                            </div>
                            <label class="form-label">Budget</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editActivityBudget" type="text" class="form-control" name="ActivityBudget">
                                </div>
                            </div>
                            <label class="form-label hide">InvolveID</label>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="editCitizenID" type="text" class="form-control hide" name="CitizenID" required/>
                                    </div>
                                </div>
<!--Add Search-->
                                <label class="form-label">People Involve</label>
                                <div class="form-group form-float">
                                    <div class="form-line search-box-edit">
                                        <input id="editCitizenName" type="text" class="form-control" name="Citizen" required/>
                                        <div class="result"></div>
                                    </div>
                                </div>
<!--end search-->
                            <label class="form-label">Start Date</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editStart" type="date" class="form-control" name="ProjectStart"/>
                                </div>
                            </div>
                            <label class="form-label">End Date</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editFinish" type="date" class="form-control" name="ProjectFinish"/>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Status</h4>
                                <div class="form-group">
                                    <input type="radio" name="ActStat" id="editActA" value="Active" class="with-gap">
                                    <label for="editActA">Yes</label>
                                    <input type="radio" name="ActStat" id="editActI" value="Inactive" class="with-gap">
                                    <label for="editActI" class="m-l-20">No</label>
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

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/widgets/infobox/infobox-4.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>

<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("citizenSearchBackend.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $("#CitizenName").val($(this).find('#NameResult').text());
        $("#addCitizenID").val($(this).find('small').text());
        $(this).parent(".result").empty();
    });

    $('#addProjectID').val($('#ProjectItem').val());
    $('#ProjectItem').change(function() {
        $('#addProjectID').val($('#ProjectItem').val());
        history.pushState(null, null, '?Project='+$('#ProjectItem').val());
        $('#ProjectTable').load(location.href + ' #ProjectTable');
        location.reload();
    });    

    $(".editActivity").click(function()
            {
                $("#editProjectID").val($(this).closest("tbody tr").find("td:eq(1)").html());
                $("#editActivityID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#editActivityName").val($(this).closest("tbody tr").find("td:eq(2)").html());
                $("#editActivityDesc").val($(this).closest("tbody tr").find("td:eq(3)").html());
                $("#editActivityBudget").val($(this).closest("tbody tr").find("td:eq(4)").html());
                $("#editCitizenID").val($(this).closest("tbody tr").find("td:eq(5)").html());
                $("#editCitizenName").val($(this).closest("tbody tr").find("td:eq(6)").html());
                $("#editStart").val($(this).closest("tbody tr").find("td:eq(7)").html());
                $("#editFinish").val($(this).closest("tbody tr").find("td:eq(8)").html());
                if ($(this).closest("tbody tr").find("td:eq(9)").text() === "Active"){
                    $("#editActA").prop("checked", true).trigger('click');
                    } else {
                    $("#editActI").prop("checked", true).trigger('click');
                    }
            });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box-edit input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("citizenSearchBackend.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $("#editCitizenName").val($(this).find('#NameResult').text());
        $("#editCitizenID").val($(this).find('small').text());
        $(this).parent(".result").empty();
    });
});
</script>
</body>
</html>








        
