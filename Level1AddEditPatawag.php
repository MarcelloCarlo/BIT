<?php
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $currentPage = 'Level1AddEditPatawag';
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
                                PATAWAG
                                <small>The following are all of the blotter records that needs a patawag report. Click 'Issue' to generate a report.</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th class="hide">SummonID</th>
                                            <th class="hide">BlotterID</th>
                                            <th>Date Of Incident</th>
                                            <th>Date Recorded</th>
                                            <th>Complainant</th>
                                            <th>Accused</th>
                                            <th>Subject</th>
                                            <th>Resolution</th>
                                            <th>Summon Place</th>
                                            <th>Schedule</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include_once('dbconn.php');

                                        $CTanodSelectBlotterSQL = ' SELECT  bitdb_r_summons.SummonID,
                                                                            bitdb_r_summons.BlotterID,
                                                                            bitdb_r_summons.SummonSched,
                                                                            bitdb_r_summons.SummonPlace,
                                                                            bitdb_r_summons.SummonStatus,
                                                                            bitdb_r_blotter.IncidentDate,
                                                                            bitdb_r_blotter.Complainant,
                                                                            bitdb_r_citizen.First_Name,
                                                                            IFNULL(bitdb_r_citizen.Middle_Name,"") AS Middle_Name,
                                                                            bitdb_r_citizen.Last_Name,
                                                                            IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Ext,
                                                                            bitdb_r_blotter.ComplaintStatement,
                                                                            bitdb_r_blotter.ComplaintStatus,
                                                                            bitdb_r_blotter.Resolution,
                                                                            bitdb_r_blottercategory.BlotterCategoryName,
                                                                            bitdb_r_blotter.ComplaintDate
                                                                    FROM    bitdb_r_blotter
                                                                    INNER JOIN bitdb_r_citizen
                                                                    ON bitdb_r_citizen.Citizen_ID = bitdb_r_blotter.Accused
                                                                    INNER JOIN bitdb_r_summons
                                                                    ON bitdb_r_summons.BlotterID = bitdb_r_blotter.BlotterID
                                                                    INNER JOIN bitdb_r_blottercategory
                                                                    ON bitdb_r_blottercategory.BlotterCategoryID = bitdb_r_blotter.BlotterType';
                                        $CTanodSelectBlotterQuery = mysqli_query($bitMysqli,$CTanodSelectBlotterSQL) or die (mysqli_error($bitMysqli));
                                        if(mysqli_num_rows($CTanodSelectBlotterQuery) > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($CTanodSelectBlotterQuery))
                                            {
                                                $SummonID = $row['SummonID'];
                                                $BlotterID = $row['BlotterID'];
                                                $SummonSched = $row['SummonSched'];
                                                $SummonPlace = $row['SummonPlace'];
                                                if($row['SummonStatus'] == 1)
                                                {
                                                    $SummonStatus = "Unclosed";
                                                }
                                                else
                                                {
                                                    $SummonStatus = "Case Closed";
                                                }
                                                $IDate = $row['IncidentDate'];
                                                $Complainant = $row['Complainant'];
                                                $CStatement = $row['ComplaintStatement'];
                                                $CStatus = $row['ComplaintStatus'];
                                                $Resolution = $row['Resolution'];
                                                $BlotterType = $row['BlotterCategoryName'];
                                                $CDate = $row['ComplaintDate'];
                                                $Accused = "".$row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name']." ".$row['Name_Ext']."";
                                                echo'
                                                    <tr>
                                                        <td class="hide">'.$SummonID.'</td>
                                                        <td class="hide">'.$BlotterID.'</td>
                                                        <td>'.$IDate.'</td>
                                                        <td>'.$CDate.'</td>
                                                        <td>'.$Complainant.'</td>
                                                        <td>'.$Accused.'</td>
                                                        <td>'.$BlotterType.'</td>
                                                        <td>'.$Resolution.'</td>
                                                        <td>'.$SummonPlace.'</td>
                                                        <td>'.$SummonSched.'</td>
                                                        <td>'.$SummonStatus.'</td>
                                                        <td>
                                                            <button type="button" class="btn btn-success waves-effect editDetails" data-toggle="modal" data-target="#editSummonModal">
                                                                <i class="material-icons">mode_edit</i>
                                                                <span>EDIT</span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    ';
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
            <!-- #END# Basic Examples -->
            <div class="modal fade" id="editSummonModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                EDIT
                                <br/>
                                <small>Edit Summon Details</small>
                            </h2>
                        </div>
                        <div class="body js-sweetalert">
                        <form id="Level1EditSummon" action="Level1EditSummon.php" method="POST">
                        <div class="modal-body">
                           <div class="row clearfix margin-0">
                                <h4 class="card-inside-title hide">SummonID</h4>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="editSummonID" type="text" class="form-control hide" name="SummonID" required/>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Summon Schedule</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editSummonSched" type="date" class="form-control" name="SummonSched" required/>

                                    </div>
                                </div>
                                <h4 class="card-inside-title">Summon Place</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editSummonPlace" type="text" class="form-control" name="SummonPlace" required/>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Case Status</h4>
                                <div class="form-group">
                                    <input type="radio" name="Summon_Status" id="editSummonA" value="Active" class="with-gap">
                                    <label for="editSummonA">Unclosed</label>

                                    <input type="radio" name="Summon_Status" id="editSummonI" value="Inactive" class="with-gap">
                                    <label for="editSummonI" class="m-l-20">Closed</label>
                                </div>
                            <br/>
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

<?php include('footer.php'); ?>
<script type="text/javascript">
        $(document).ready(function()
        {
            $(".editDetails").click(function()
            {
                $("#editSummonID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#editSummonSched").val($(this).closest("tbody tr").find("td:eq(9)").html());
                $("#editSummonPlace").val($(this).closest("tbody tr").find("td:eq(8)").html()).trigger("change");
                if ($(this).closest("tbody tr").find("td:eq(10)").text() === "Unclosed") {
                        $("#editSummonA").prop("checked", true).trigger('click');
                    } else {
                        $("#editSummonI").prop("checked", true).trigger('click');
                    }
                console.log($(this).closest("tbody tr").find("td:eq(0)").html());
            });
        });

    </script>
