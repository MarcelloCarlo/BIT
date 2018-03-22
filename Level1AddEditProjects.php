<?php 
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $currentPage = 'Level1AddEditProjects';
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

    <!-- CALENDAR THEME -->
    <link href="ProjectMonitoring/fullcalendar.min.css" rel="stylesheet" />
    <link href="ProjectMonitoring/fullcalendar.print.min.css" rel="stylesheet" media="print">
</head>
<?php include('Level1Navbar.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>PROJECTS</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                     <div class="body">
                         <div id="calendar"></div></div></div></div></div>
        <br/>

         <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            PROJECTS
                            <small>The list of all the projects in the barangay. Click "VIEW" to view all  or "Edit" to modify on the existing record</small>
                        </h2>
                        <br/>
                        <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addProjectModal">
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
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th class="hide">Project ID</th>
                                        <th>Project Name</th>
                                        <th class="hide">Project CategoryID</th>
                                        <th>Category</th>
                                        <th class="hide">Project Location ID</th>
                                        <th>Project Location</th>
                                        <th>Description</th>
                                        <th>Initial Budget</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="hide">Project ID</th>
                                        <th>Project Name</th>
                                        <th class="hide">Project CategoryID</th>
                                        <th>Category</th>
                                        <th class="hide">Project Location ID</th>
                                        <th>Project Location</th>
                                        <th>Description</th>
                                        <th>Initial Budget</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        include('dbconn.php');

                                        $Level1ProjectAddSQL = 'SELECT 
                                                                    bitdb_r_project.ProjectID,
                                                                    bitdb_r_project.ProjectName,
                                                                    bitdb_r_barangayzone.ZoneID,
                                                                    bitdb_r_barangayzone.Zone,
                                                                    bitdb_r_projectcategory.ProjectCategoryID,
                                                                    bitdb_r_projectcategory.ProjectCategory,
                                                                    bitdb_r_project.ProjectDesc,
                                                                    bitdb_r_project.ProjectStatus,
                                                                    bitdb_r_project.ProjectBudget
                                                            FROM    bitdb_r_project
                                                            INNER JOIN bitdb_r_projectcategory
                                                            ON bitdb_r_projectcategory.ProjectCategoryID = bitdb_r_project.ProjectCategory
                                                            INNER JOIN bitdb_r_barangayzone
                                                            ON bitdb_r_barangayzone.ZoneID = bitdb_r_project.ProjectLocation';
                                        $Level1ProjectAddQuery = mysqli_query($bitMysqli,$Level1ProjectAddSQL) or die (mysqli_error($bitMysqli));
                                        if (mysqli_num_rows($Level1ProjectAddQuery) > 0) 
                                        {
                                            while($row = mysqli_fetch_assoc($Level1ProjectAddQuery))
                                            {
                                                $ProjectID = $row['ProjectID'];
                                                $ProjectName = $row['ProjectName'];
                                                $ProjectZoneID = $row['ZoneID'];
                                                $ProjectZone = $row['Zone'];
                                                $ProjectCategoryID = $row['ProjectCategoryID'];
                                                $ProjectCategory = $row['ProjectCategory'];
                                                $ProjectDesc = $row['ProjectDesc'];
                                                $ProjectBudget = $row['ProjectBudget'];
                                                if($row['ProjectStatus'] == 1)
                                                {
                                                    $ProjectStatus = "Active";
                                                }
                                                else
                                                {
                                                    $ProjectStatus = "Inactive";
                                                }
                                                echo'
                                                <tr>
                                                    <td class="hide">'.$ProjectID.'</td>
                                                    <td>'.$ProjectName.'</td>
                                                    <td class="hide">'.$ProjectCategoryID.'</td>
                                                    <td>'.$ProjectCategory.'</td>
                                                    <td class="hide">'.$ProjectZoneID.'</td>
                                                    <td>'.$ProjectZone.'</td>
                                                    <td>'.$ProjectDesc.'</td>
                                                    <td>'.$ProjectBudget.'</td>
                                                    <td>'.$ProjectStatus.'</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success waves-effect editProject" data-toggle="modal" data-target="#editProjectModal">
                                                            <i class="material-icons">mode_edit</i>
                                                            <span>EDIT</span>
                                                        </button>
                                                    </td>
                                                </tr>';
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
    <form id="Level1AddProject" action="Level1AddProject.php" method="POST">
        <div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Add Project
                            <br/>
                            <!-- <button type="button" class="btn btn-success waves-effect"> Import from Excel</button> -->
                        </h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix margin-0">
                            <label class="form-label">Project Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="ProjectName"/>
                                    <label class="form-label">Project Name</label>
                                </div>
                            </div>
                            <label class="form-label">Category</label>
                            <div class="form-group form-float">
                                    <select class="form-control show-tick" name="ProjectCategory" required>
                                        <option value="">-- Please select --</option>
                                        <?php
                                            include_once('dbconn.php');

                                            $ViewSql = "SELECT * FROM bitdb_r_projectcategory";
                                            $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                            if(mysqli_num_rows($ViewQuery) > 0)
                                            {
                                                while($row = mysqli_fetch_assoc($ViewQuery))
                                                {
                                                    $ID = $row['ProjectCategoryID'];
                                                    $Name = $row['ProjectCategory'];
                                                    echo '<option value="'.$ID.'">'.$Name.'</option>';  
                                                }
                                            }
                                        ?>
                                    </select>
                            </div>
                            <label class="form-label">Zone</label>
                            <div class="form-group form-float">
                                    <select class="form-control show-tick" name="ProjectZone" required>
                                        <option value="">-- Please select --</option>
                                        <?php
                                            include_once('dbconn.php');

                                            $ViewSql = "SELECT * FROM bitdb_r_barangayzone";
                                            $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                            if(mysqli_num_rows($ViewQuery) > 0)
                                            {
                                                while($row = mysqli_fetch_assoc($ViewQuery))
                                                {
                                                    $ID = $row['ZoneID'];
                                                    $Name = $row['Zone'];
                                                    echo '<option value="'.$ID.'">'.$Name.'</option>';  
                                                }
                                            }
                                        ?>
                                    </select>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="ProjectDesc"/>
                                    <label class="form-label">Description</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line search-box">
                                    <input type="text" class="form-control" name="ProjectBudget"/>
                                    <label class="form-label">Budget</label>
                                </div>
                            </div>
                              <label class="form-label">Status</label>
                                <div class="form-group">
                                    <input type="radio" name="ProjectStatus" id="StatusA" value="Active" class="with-gap" checked>
                                    <label for="StatusA">Active</label>
                                    <input type="radio" name="ProjectStatus" id="StatusI" value="Inactive" class="with-gap">
                                    <label for="StatusI" class="m-l-20">Inactive</label>
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

    <form id="Level1EditProject" action="Level1EditProject.php" method="POST">
        <div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog">
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
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="editProjectID" type="text" class="form-control hide" name="ProjectID"/>
                                </div>
                            </div>
                            <label class="form-label">Project Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editProjectName" type="text" class="form-control" name="ProjectName"/>
                                </div>
                            </div>
                            <label class="form-label">Category</label>
                            <div class="form-group form-float">
                                    <select id="editProjectCategory" class="form-control show-tick" name="ProjectCategory" required>
                                        <option value="">-- Please select --</option>
                                        <?php
                                            include_once('dbconn.php');

                                            $ViewSql = "SELECT * FROM bitdb_r_projectcategory";
                                            $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                            if(mysqli_num_rows($ViewQuery) > 0)
                                            {
                                                while($row = mysqli_fetch_assoc($ViewQuery))
                                                {
                                                    $ID = $row['ProjectCategoryID'];
                                                    $Name = $row['ProjectCategory'];
                                                    echo '<option value="'.$ID.'">'.$Name.'</option>';  
                                                }
                                            }
                                        ?>
                                    </select>
                            </div>
                            <label class="form-label">Zone</label>
                            <div class="form-group form-float">
                                    <select id="editProjectZone" class="form-control show-tick" name="ProjectZone" required>
                                        <option value="">-- Please select --</option>
                                        <?php
                                            include_once('dbconn.php');

                                            $ViewSql = "SELECT * FROM bitdb_r_barangayzone";
                                            $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                            if(mysqli_num_rows($ViewQuery) > 0)
                                            {
                                                while($row = mysqli_fetch_assoc($ViewQuery))
                                                {
                                                    $ID = $row['ZoneID'];
                                                    $Name = $row['Zone'];
                                                    echo '<option value="'.$ID.'">'.$Name.'</option>';  
                                                }
                                            }
                                        ?>
                                    </select>
                            </div>
                            <label class="form-label">Project Description</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editProjectDesc" type="text" class="form-control" name="ProjectDesc"/>
                                </div>
                            </div>
                            <label class="form-label">Project Budget</label>
                            <div class="form-group form-float">
                                <div class="form-line search-box">
                                    <input id="editProjectBudget" type="text" class="form-control" name="ProjectBudget"/>
                                </div>
                            </div>
                              <label class="form-label">Status</label>
                                <div class="form-group">
                                    <input type="radio" name="ProjectStatus" id="editStatusA" value="Active" class="with-gap">
                                    <label for="editStatusA">Active</label>
                                    <input type="radio" name="ProjectStatus" id="editStatusI" value="Inactive" class="with-gap">
                                    <label for="editStatusI" class="m-l-20">Inactive</label>
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


<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
<!-- <script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("officialSearchBackend.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $("#SponsorName").val($(this).find('#NameResult').text());
        $("#SponsorID").val($(this).find('small').text());
        $(this).parent(".result").empty();
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
            $.get("officialSearchBackend.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $("#editSponsorName").val($(this).find('#NameResult').text());
        $("#editSponsorID").val($(this).find('small').text());
        $(this).parent(".result").empty();
    });
});
</script>
 -->
<script type="text/javascript">
        $(document).ready(function()
        {
            $(".editProject").click(function()
            {
                $("#editProjectID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#editProjectName").val($(this).closest("tbody tr").find("td:eq(1)").html());
                $("#editProjectCategory").val($(this).closest("tbody tr").find("td:eq(2)").html()).trigger("change");
                $("#editProjectZone").val($(this).closest("tbody tr").find("td:eq(4)").html()).trigger("change");
                $("#editProjectDesc").val($(this).closest("tbody tr").find("td:eq(6)").html());
                $("#editProjectBudget").val($(this).closest("tbody tr").find("td:eq(7)").html());
                if ($(this).closest("tbody tr").find("td:eq(8)").text() === "Active") {
                        $("#editStatusA").prop("checked", true).trigger('click');
                    } else {
                        $("#editStatusI").prop("checked", true).trigger('click');
                    }
            });
        });
</script> 



</body>
</html>