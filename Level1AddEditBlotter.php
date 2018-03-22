<?php 
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $currentPage = 'Level1AddEditBlotter';
    include('head.php');
    include('Level1Navbar.php');
?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Blotter List</h2>
            </div>
 <!--CUSTOM BLOCK INSERT HERE-->
            <!--CUSTOM BLOCK INSERT HERE-->
        
            <!-- Basic Examples -->
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BLOTTER LIST
                                <small>The current list of barangay blotter. Click "Add New" to add a position or "Edit" to modify on the existing position</small>
                            </h2>
                            <br/>
                            <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addBlotterModal">
                            <i class="material-icons">add_circle_outline</i>
                            <span>ADD NEW</span>
                        </button>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                               <!--  <table class="table table-bordered table-striped table-hover js-basic-example dataTable"> -->
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable"> 
                                    <thead>
                                        <tr>
                                            <th class="hide">BlotterID</th>
                                            <th>Incident Date</th>
                                            <th class="hide">Incident Area ID</th>
                                            <th>Incident Area</th>
                                            <th>Complainant</th>
                                            <th class="hide">CitizenID</th>
                                            <th>Accused</th>
                                            <th>Subject</th>
                                            <th>Statement</th>
                                            <th>Status</th>
                                            <th>Decision</th>
                                            <th>Complaint Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include_once('dbconn.php');

                                        $CTanodSelectBlotterSQL = ' SELECT  bitdb_r_blotter.BlotterID,
                                                                            bitdb_r_blotter.IncidentDate,
                                                                            bitdb_r_barangayzone.ZoneID,
                                                                            bitdb_r_barangayzone.Zone,
                                                                            bitdb_r_blotter.Complainant,
                                                                            bitdb_r_blotter.Accused,
                                                                            bitdb_r_citizen.First_Name,
                                                                            IFNULL(bitdb_r_citizen.Middle_Name,"") AS Middle_Name,
                                                                            bitdb_r_citizen.Last_Name,
                                                                            IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Ext,
                                                                            bitdb_r_blotter.ComplaintStatement,
                                                                            bitdb_r_blotter.ComplaintStatus,
                                                                            bitdb_r_blotter.Resolution,
                                                                            bitdb_r_blotter.BlotterType,
                                                                            bitdb_r_blotter.ComplaintDate
                                                                    FROM    bitdb_r_blotter
                                                                    INNER JOIN bitdb_r_citizen
                                                                    ON bitdb_r_citizen.Citizen_ID = bitdb_r_blotter.Accused
                                                                    INNER JOIN bitdb_r_barangayzone
                                                                    ON bitdb_r_blotter.IncidentArea = bitdb_r_barangayzone.ZoneID';
                                        $CTanodSelectBlotterQuery = mysqli_query($bitMysqli,$CTanodSelectBlotterSQL) or die (mysqli_error($bitMysqli));
                                        if(mysqli_num_rows($CTanodSelectBlotterQuery) > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($CTanodSelectBlotterQuery))
                                            {
                                                $CitizenID = $row['Accused'];
                                                $BlotterID = $row['BlotterID'];
                                                $IDate = $row['IncidentDate'];
                                                $IAreaID = $row['ZoneID'];
                                                $IArea = $row['Zone'];
                                                $Complainant = $row['Complainant'];
                                                $CStatement = $row['ComplaintStatement'];
                                                if($row['ComplaintStatus'] == 1)
                                                {
                                                    $CStatus = "Active";
                                                }
                                                else
                                                {
                                                    $CStatus = "Inactive";
                                                }
                                                $Resolution = $row['Resolution'];
                                                $BlotterType = $row['BlotterType'];
                                                $CDate = $row['ComplaintDate'];
                                                $Accused = "".$row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name']." ".$row['Name_Ext']."";
                                                echo'
                                                    <tr>
                                                        <td class="hide">'.$BlotterID.'</td>
                                                        <td>'.$IDate.'</td>
                                                        <td class="hide">'.$IAreaID.'</td>
                                                        <td>'.$IArea.'</td>
                                                        <td>'.$Complainant.'</td>
                                                        <td class="hide">'.$CitizenID.'</td>
                                                        <td>'.$Accused.'</td>
                                                        <td>'.$BlotterType.'</td>
                                                        <td>'.$CStatement.'</td>
                                                        <td>'.$CStatus.'</td>
                                                        <td>'.$Resolution.'</td>
                                                        <td>'.$CDate.'</td>
                                                        <td>  
                                                            <button type="button" class="btn btn-success waves-effect editBlotter" data-toggle="modal" data-target="#editBlotterModal">
                                                                <i class="material-icons">mode_edit</i>
                                                                <span>EDIT</span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    ';    
                                            }
                                        }
                                   ?>



<!-- 
1.  Blotter No
2.  Date of Incident
3.  Complainant
4.  Accused
5.  Subject
6.  Status
7.  Resolution
8.  Date Recorded
9.  ACTIONS
a.  Edit
b.  Disable (Case Solved)
c.  Report Print -->


                                   <!--  unang column nang table -->
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            <div class="modal fade" id="addBlotterModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                ADD                                    
                                <br/>
                                <small>Add Blotter</small>
                            </h2>
                        </div>
                        <div class="body js-sweetalert">
                        <form id="CTanodBlotterForm" action="Level1AddBlotterForm.php" method="POST">
                        <div class="modal-body">
                           <div class="row clearfix margin-0">

                                <h4 class="card-inside-title">Date of incident</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="IncidentDate" required/>
                            
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Area</h4>
                                <select class="form-control browser-default" name="IncidentArea" required>
                                    <option value="None">None</option>  
                                    <?php
                                        include_once('dbconn.php');

                                        $ViewSql = "SELECT * FROM bitdb_r_barangayzone ORDER BY bitdb_r_barangayzone.Zone ASC";
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
                                <h4 class="card-inside-title">Complaint Date</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="ComplaintDate" required/>
                                        
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Complainant's Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="Complainant" required/>
                                        <label class="form-label">Complainant's Name</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title hide">AccusedID</h4>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="AccusedID" type="text" class="form-control hide" name="AccusedID" required/>
                                    </div>
                                </div>
<!--Add Search-->
                                <h4 class="card-inside-title">Accused' Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line search-box">
                                        <input id="AccusedName" type="text" class="form-control" name="Accused" required/>
                                        <label class="form-label">Accused' Name</label>
                                        <div class="result"></div>
                                    </div>
                                </div>
<!--end search-->
                                <h4 class="card-inside-title">Subject</h4>
                                <select class="form-control browser-default" name="Subject" required>
                                    <option value="None">None</option>
                                    <?php
                                        include_once('dbconn.php');

                                        $ViewSql = "SELECT * FROM bitdb_r_blottercategory";
                                        $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                        if(mysqli_num_rows($ViewQuery) > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($ViewQuery))
                                            {
                                                $ID = $row['BlotterCategoryID'];
                                                $Name = $row['BlotterCategoryName'];
                                                echo '<option value="'.$ID.'">'.$Name.'</option>';
                                                        
                                            }
                                        }
                                    ?>
                                </select>
                                <h4 class="card-inside-title">Complain Statement</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="ComplaintStatement" required/>
                                        <label class="form-label">Complain Statement</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Decision</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="Resolution" required/>
                                        <label class="form-label">Decision</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Complaint Status</h4>
                                <div class="form-group">
                                    <input type="radio" name="Comp_Status" id="editCheckA" value="Active" class="with-gap" checked>
                                    <label for="editCheckA">Active</label>

                                    <input type="radio" name="Comp_Status" id="editCheckI" value="Inactive" class="with-gap">
                                    <label for="editCheckI" class="m-l-20">Inactive</label>
                                </div>
                                <hr>
                                <h4 class="card-inside-title">Summon</h4>
                                    <div class="form-group">
                                        <input type="radio" name="Summon" id="editSummonA" value="Active" class="with-gap">
                                        <label for="editSummonA">Yes</label>
                                        <input type="radio" name="Summon" id="editSummonI" value="Inactive" class="with-gap" checked>
                                        <label for="editSummonI" class="m-l-20">No</label>
                                    </div>  
                                <div id="SummonDiv" class="form-group">
                                    <h4 class="card-inside-title">Schedule</h4>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input id="SummonSched" type="date" class="form-control" name="SummonSched"/>
                                        </div>
                                    </div>
                                    <h4 class="card-inside-title">Place</h4>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input id="SummonPlace" type="text" class="form-control" name="SummonPlace"/>
                                            <label class="form-label">Place</label>
                                        </div>
                                    </div>
                                </div>
                            <br/>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success waves-effect" data-type="confirm" type="submit">ADD</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </form>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="modal fade" id="editBlotterModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                EDIT                                    
                                <br/>
                                <small>Edit Blotter</small>
                            </h2>
                        </div>
                        <div class="body js-sweetalert">
                        <form id="CTanodBlotterForm" action="Level1EditBlotterForm.php" method="POST">
                        <div class="modal-body">
                           <div class="row clearfix margin-0">

                                <h4 class="card-inside-title hide">BlotterID</h4>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="editBlotterID" type="text" class="form-control hide" name="BlotterID" required/>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Date of incident</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editIncidentDate" type="date" class="form-control" name="IncidentDate" required/>
                            
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Area</h4>
                                <select id="editIncidentArea" class="form-control browser-default" name="IncidentArea" required>
                                    <option value="None">None</option>  
                                    <?php
                                        include_once('dbconn.php');

                                        $ViewSql = "SELECT * FROM bitdb_r_barangayzone ORDER BY bitdb_r_barangayzone.Zone ASC";
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
                                <h4 class="card-inside-title">Complaint Date</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editComplaintDate" type="date" class="form-control" name="ComplaintDate" required/>
                                        
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Complainant's Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editComplainant" type="text" class="form-control" name="Complainant" required/>
                                    </div>
                                </div>
                                <h4 class="card-inside-title hide">AccusedID</h4>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="editAccusedID" type="text" class="form-control hide" name="AccusedID" required/>
                                    </div>
                                </div>
<!--Add Search-->
                                <h4 class="card-inside-title">Accused' Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line search-box-edit">
                                        <input id="editAccusedName" type="text" class="form-control" name="Accused" required/>
                                        <div class="result"></div>
                                    </div>
                                </div>
<!--end search-->
                                <h4 class="card-inside-title">Subject</h4>
                                <select id="editSubject" class="form-control browser-default" name="BlotterType">
                                    <option value="None">None</option>
                                    <?php
                                        include_once('dbconn.php');

                                        $ViewSql = "SELECT * FROM bitdb_r_blottercategory";
                                        $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                        if(mysqli_num_rows($ViewQuery) > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($ViewQuery))
                                            {
                                                $ID = $row['BlotterCategoryID'];
                                                $Name = $row['BlotterCategoryName'];
                                                echo '<option value="'.$ID.'">'.$Name.'</option>';
                                                        
                                            }
                                        }
                                    ?>
                                </select>
                                <h4 class="card-inside-title">Complain Statement</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editComplaintStatement" type="text" class="form-control" name="ComplaintStatement" required/>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Decision</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editResolution" type="text" class="form-control" name="Resolution" required/>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Complaint Status</h4>
                                <div class="form-group">
                                    <input type="radio" name="Comp_Status" id="editStatusA" value="Active" class="with-gap">
                                    <label for="editStatusA">Active</label>
                                    <input type="radio" name="Comp_Status" id="editStatusI" value="Inactive" class="with-gap">
                                    <label for="editStatusI" class="m-l-20">Inactive</label>
                                </div>
                                <hr>
                                    <h4 class="card-inside-title">Summon</h4>
                                        <div class="form-group">
                                            <input type="radio" name="Summon" id="editSummonA" value="Active" class="with-gap">
                                            <label for="editSummonA">Yes</label>
                                            <input type="radio" name="Summon" id="editSummonI" value="Inactive" class="with-gap" checked>
                                            <label for="editSummonI" class="m-l-20">No</label>
                                        </div>  
                                    <div id="SummonDiv" class="form-group">
                                        <h4 class="card-inside-title">Schedule</h4>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id="SummonSched" type="date" class="form-control" name="SummonSched"/>
                                            </div>
                                        </div>
                                        <h4 class="card-inside-title">Place</h4>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id="SummonPlace" type="text" class="form-control" name="SummonPlace"/>
                                                <label class="form-label">Place</label>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success waves-effect" data-type="confirm" type="submit">SAVE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </form>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
        $("#AccusedName").val($(this).find('#NameResult').text());
        $("#AccusedID").val($(this).find('small').text());
        $(this).parent(".result").empty();
    });
});
</script>

<?php include('footer.php'); ?>

<script type="text/javascript">
        $(document).ready(function()
        {
            $(".editBlotter").click(function()
            {
                $("#editBlotterID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#editIncidentDate").val($(this).closest("tbody tr").find("td:eq(1)").html());
                $("#editIncidentArea").val($(this).closest("tbody tr").find("td:eq(2)").html()).trigger("change");
                $("#editComplainant").val($(this).closest("tbody tr").find("td:eq(4)").html());
                $("#editAccusedID").val($(this).closest("tbody tr").find("td:eq(5)").html());
                $("#editAccusedName").val($(this).closest("tbody tr").find("td:eq(6)").html());
                $("#editSubject").val($(this).closest("tbody tr").find("td:eq(7)").html()).trigger("change");
                $("#editComplaintStatement").val($(this).closest("tbody tr").find("td:eq(8)").html());
                $("#editResolution").val($(this).closest("tbody tr").find("td:eq(10)").html());
                $("#editComplaintDate").val($(this).closest("tbody tr").find("td:eq(11)").html());
                if ($(this).closest("tbody tr").find("td:eq(9)").text() === "Active"){
                    $("#editStatusA").prop("checked", true).trigger('click');
                    } else {
                    $("#editStatusI").prop("checked", true).trigger('click');
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
        $("#editAccusedName").val($(this).find('#NameResult').text());
        $("#editAccusedID").val($(this).find('small').text());
        $(this).parent(".result").empty();
    });
});
</script>
