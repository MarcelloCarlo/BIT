<?php 
      session_start();
      $title = 'Welcome | BarangayIT MK.II';
      $currentPage = 'Level1ProjectMonitoring';
      include('head.php');
      include('Level1Navbar.php'); ?>

<script src='ProjectMonitoring/lib/moment.min.js'></script>
<script src='ProjectMonitoring/lib/jquery.min.js'></script>
<script src='ProjectMonitoring/lib/jquery-ui.min.js'></script>
<script src='ProjectMonitoring/fullcalendar.min.js'></script>
<script src='ProjectMonitoring/calendarapp.js'> </script>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>PROJECT MONITORING</h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            PROJECT MONITORING
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
                                        <th>Location</th>
                                        <th>Description</th>
                                        <th>Phases</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th class="hide">Sponsor ID</th>
                                        <th>Sponsors</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="hide">Project ID</th>
                                        <th>Project Name</th>
                                        <th>Location</th>
                                        <th>Description</th>
                                        <th>Phases</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th class="hide">Sponsor ID</th>
                                        <th>Sponsors</th>
                                        <th>Actions</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        include('dbconn.php');

                                        $Level1ProjectAddSQL = 'SELECT 
                                                                    bitdb_r_project.ProjectID,
                                                                    bitdb_r_project.ProjectName,
                                                                    bitdb_r_project.ProjectLoc,
                                                                    bitdb_r_project.ProjectDesc,
                                                                    bitdb_r_project.ProjectPhases,
                                                                    bitdb_r_project.DateStart,
                                                                    bitdb_r_project.DateFinish,
                                                                    bitdb_r_project.ProjectStatus,
                                                                    bitdb_r_citizen.Citizen_ID,
                                                                    bitdb_r_citizen.First_Name,
                                                                    bitdb_r_citizen.Middle_Name,
                                                                    bitdb_r_citizen.Last_Name
                                                            FROM    bitdb_r_project
                                                            INNER JOIN bitdb_r_barangayofficial
                                                            ON bitdb_r_barangayofficial.Brgy_Official_ID = bitdb_r_project.PeopleInvolved
                                                            INNER JOIN bitdb_r_citizen
                                                            ON bitdb_r_citizen.Citizen_ID = bitdb_r_barangayofficial.CitizenID';
                                        $Level1ProjectAddQuery = mysqli_query($bitMysqli,$Level1ProjectAddSQL) or die (mysqli_error($bitMysqli));
                                        if (mysqli_num_rows($Level1ProjectAddQuery) > 0) 
                                        {
                                            while($row = mysqli_fetch_assoc($Level1ProjectAddQuery))
                                            {
                                                $ProjectID = $row['ProjectID'];
                                                $ProjectName = $row['ProjectName'];
                                                $ProjectLoc = $row['ProjectLoc'];
                                                $ProjectDesc = $row['ProjectDesc'];
                                                $ProjectPhases = $row['ProjectPhases'];
                                                $DateStart = $row['DateStart'];
                                                $DateFinish = $row['DateFinish'];
                                                $CitizenID = $row['Citizen_ID'];
                                                $First_Name = $row['First_Name'];
                                                $Middle_Name = $row['Middle_Name'];
                                                $Last_Name = $row['Last_Name'];
                                                if($row['ProjectStatus'] == 1)
                                                {
                                                    $ProjectStatus = "Active";
                                                }
                                                else
                                                {
                                                    $ProjectStatus = "Inactive";
                                                }
                                                $PeopleInvolved = ''.$First_Name.' '.$Middle_Name.' '.$Last_Name.'';
                                                echo'
                                                <tr>
                                                    <td class="hide">'.$ProjectID.'</td>
                                                    <td>'.$ProjectName.'</td>
                                                    <td>'.$ProjectLoc.'</td>
                                                    <td>'.$ProjectDesc.'</td>
                                                    <td>'.$ProjectPhases.'</td>
                                                    <td>'.$DateStart.'</td>
                                                    <td>'.$DateFinish.'</td>
                                                    <td>'.$ProjectStatus.'</td>
                                                    <td class="hide">'.$CitizenID.'</td>
                                                    <td>'.$PeopleInvolved.'</td>
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
                            <button type="button" class="btn btn-success waves-effect"> Import from Excel</button>
                        </h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix margin-0">
                            <h4 class="card-inside-title">Project Name</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="ProjectName"/>
                                    <label class="form-label">Project Name</label>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Location</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="ProjectLoc"/>
                                    <label class="form-label">Location</label>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Description</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="ProjectDesc"/>
                                    <label class="form-label">Description</label>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Phases</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="ProjectPhase"/>
                                    <label class="form-label">Phases</label>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Start Date</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="ProjectStart"/>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Finish Date</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="ProjectFinish"/>
                                </div>
                            </div>
                            <h4 class="card-inside-title hide">SponsorID</h4>
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="SponsorID" type="text" class="form-control hide" name="ProjectSponsor"/>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Sponsor</h4>
                            <div class="form-group form-float">
                                <div class="form-line search-box">
                                    <input id="SponsorName" type="text" class="form-control"/>
                                    <label class="form-label">Sponsor</label>
                                    <div class="result"></div>
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
                            <h4 class="card-inside-title">Project ID</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editProjectID" type="text" class="form-control" name="ProjectID"/>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Project Name</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editProjectName" type="text" class="form-control" name="ProjectName"/>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Location</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editProjectLoc" type="text" class="form-control" name="ProjectLoc"/>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Description</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editProjectDesc" type="text" class="form-control" name="ProjectDesc"/>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Phases</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editProjectPhase" type="text" class="form-control" name="ProjectPhase"/>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Start Date</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editProjectStart" type="date" class="form-control" name="ProjectStart"/>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Finish Date</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editProjectFinish" type="date" class="form-control" name="ProjectFinish"/>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Status</h4>
                                <div class="form-group">
                                    <input type="radio" name="ProjectStatus" id="editCheckA" value="Active" class="with-gap">
                                    <label for="editCheckA">Active</label>

                                    <input type="radio" name="ProjectStatus" id="editCheckI" value="Inactive" class="with-gap">
                                    <label for="editCheckI" class="m-l-20">Inactive</label>
                                </div>
                            <h4 class="card-inside-title hide">SponsorID</h4>
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="editSponsorID" type="text" class="form-control hide" name="ProjectSponsorID"/>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Sponsor</h4>
                            <div class="form-group form-float">
                                <div class="form-line search-box-edit">
                                    <input id="editSponsorName" type="text" class="form-control"/>
                                    <div class="result"></div>
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
<body>
<div style="margin-top: auto;">
<div id='wrapthis'>

    <div id='calendar';></div>

</div>
<div>
    <div id='external-events'>
      <h4>Draggable Events</h4>
      <div class='fc-event'>My Event 1</div>
      <div class='fc-event'>My Event 2</div>
      <div class='fc-event'>My Event 3</div>
      <div class='fc-event'>My Event 4</div>
      <div class='fc-event'>My Event 5</div>
      <p>
        <input type='checkbox' id='drop-remove' />
        <label for='drop-remove'>remove after drop</label>
      </p>
    </div>
</div>
<div style='clear:both'></div>
</div>
</body>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
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

<?php include('footer.php'); ?>

    <script type="text/javascript">
            $(document).ready(function()
            {
                $(".editProject").click(function()
                {
                    $("#editProjectID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                    $("#editProjectName").val($(this).closest("tbody tr").find("td:eq(1)").html());
                    $("#editProjectLoc").val($(this).closest("tbody tr").find("td:eq(2)").html());
                    $("#editProjectDesc").val($(this).closest("tbody tr").find("td:eq(3)").html());
                    $("#editProjectPhase").val($(this).closest("tbody tr").find("td:eq(4)").html());
                    $("#editProjectStart").val($(this).closest("tbody tr").find("td:eq(5)").html());
                    $("#editProjectFinish").val($(this).closest("tbody tr").find("td:eq(6)").html());
                    $("#editSponsorID").val($(this).closest("tbody tr").find("td:eq(8)").html());
                    $("#editSponsorName").val($(this).closest("tbody tr").find("td:eq(9)").html());
                    if ($(this).closest("tbody tr").find("td:eq(7)").text() === "Active") {
                            $("#editCheckA").prop("checked", true).trigger('click');
                        } else {
                            $("#editCheckI").prop("checked", true).trigger('click');
                        }
                });
            });
    </script> 