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
                                                    $CStatus = "Unclosed";
                                                }
                                                else
                                                {
                                                    $CStatus = "Case Closed";
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

                                <label class="form-label">Date of incident</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="IncidentDate" required/>

                                    </div>
                                </div>
                                <label class="form-label">Area</label>
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
                                <br/>
                                <br/>
                                <label class="form-label">Complaint Date</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="ComplaintDate" required/>

                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="Complainant" required/>
                                        <label class="form-label">Complainant's Name</label>
                                    </div>
                                </div>

                                <label class="form-label hide">AccusedID</label>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="AccusedID" type="text" class="form-control hide" name="AccusedID" required/>
                                    </div>
                                </div>
<!--Add Search-->
                                <div class="form-group form-float">
                                    <div class="form-line search-box">
                                        <input id="AccusedName" type="text" class="form-control" name="Accused" required/>
                                        <label class="form-label">Accused' Name</label>
                                        <div class="result"></div>
                                    </div>
                                </div>
<!--end search-->
                                <label class="form-label">Subject</label>
                                <div class="form-group">
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
                                </div>
                                <label class="form-label">Complaint Statement</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="ComplaintStatement" required/>
                                        <label class="form-label">Complain Statement</label>
                                    </div>
                                </div>
                                <!-- 
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="Resolution" required/>
                                        <label class="form-label">Decision</label>
                                    </div>
                                </div> -->
                                <label class="form-label hide">Complaint Status</label>
                                <div class="form-group hide">
                                    <input type="radio" name="Comp_Status" id="editCheckA" value="Active" class="with-gap" checked>
                                    <label for="editCheckA">Unclosed</label>

                                    <input type="radio" name="Comp_Status" id="editCheckI" value="Inactive" class="with-gap">
                                    <label for="editCheckI" class="m-l-20">Case Closed</label>
                                </div>
                                <hr>
                                <label class="form-label">Patawag?</label>
                                    <div class="form-group">
                                        <input type="radio" name="Summon" id="SummonA" value="Active" class="with-gap">
                                        <label for="SummonA">Yes</label>
                                        <input type="radio" name="Summon" id="SummonI" value="Inactive" class="with-gap" checked>
                                        <label for="SummonI" class="m-l-20">No</label>
                                    </div>
                                <div id="SummonDiv" class="form-group">
                                    <label class="form-label">Schedule</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input id="SummonSched" type="date" class="form-control" name="SummonSched"/>
                                        </div>
                                    </div>
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

                                <label class="form-label hide">BlotterID</label>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="editBlotterID" type="text" class="form-control hide" name="BlotterID" required/>
                                    </div>
                                </div>
                                <label class="form-label">Date of incident</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editIncidentDate" type="date" class="form-control" name="IncidentDate" required/>

                                    </div>
                                </div>
                                <label class="form-label">Area</label>
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
                                <label class="form-label">Complaint Date</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editComplaintDate" type="date" class="form-control" name="ComplaintDate" required/>

                                    </div>
                                </div>
                                <label class="form-label">Complainant's Name</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editComplainant" type="text" class="form-control" name="Complainant" required/>
                                    </div>
                                </div>
                                <label class="form-label hide">AccusedID</label>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="editAccusedID" type="text" class="form-control hide" name="AccusedID"/>
                                    </div>
                                </div>
<!--Add Search-->
                                <label class="form-label">Accused' Name</label>
                                <div class="form-group form-float">
                                    <div class="form-line search-box-edit">
                                        <input id="editAccusedName" type="text" class="form-control" name="Accused"/>
                                        <div class="result"></div>
                                    </div>
                                </div>
<!--end search-->
                                <label class="form-label">Subject</label>
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
                                <label class="form-label">Complain Statement</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editComplaintStatement" type="text" class="form-control" name="ComplaintStatement" required/>
                                    </div>
                                </div>
                                <label class="form-label">Decision</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editResolution" type="text" class="form-control" name="Resolution" required/>
                                    </div>
                                </div>

                                <label class="form-label">Complaint Status</label>
                                <div class="form-group">
                                    <input type="radio" name="Comp_Status" id="editStatusA" value="Active" class="with-gap">
                                    <label for="editStatusA">Unclosed</label>
                                    <input type="radio" name="Comp_Status" id="editStatusI" value="Inactive" class="with-gap">
                                    <label for="editStatusI" class="m-l-20">Case Closed</label>
                                </div>
                                <hr>
                                    <label class="form-label">Patawag?</label>
                                        <div class="form-group">
                                            <input type="radio" name="Summon" id="editSummonA" value="Active" class="with-gap">
                                            <label for="editSummonA">Yes</label>
                                            <input type="radio" name="Summon" id="editSummonI" value="Inactive" class="with-gap" checked>
                                            <label for="editSummonI" class="m-l-20">No</label>
                                        </div>
                                    <div id="SummonDiv" class="form-group">
                                        <label class="form-label">Schedule</label>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id="SummonSched" type="date" class="form-control" name="SummonSched"/>
                                            </div>
                                        </div>
                                        <label class="form-label">Place</label>
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

<?php include('footerblock.php');?>
</section>
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

<!-- noUISlider Plugin Js -->
<script src="plugins/nouislider/nouislider.js"></script>


<!-- Jquery Validation Plugin Css -->
<script src="plugins/jquery-validation/jquery.validate.js"></script>

<!-- JQuery Steps Plugin Js -->
<script src="plugins/jquery-steps/jquery.steps.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/tables/jquery-datatable.js"></script>
<script src="js/pages/forms/form-validation.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>
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
                if ($(this).closest("tbody tr").find("td:eq(9)").text() === "Unclosed"){
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
</html>
