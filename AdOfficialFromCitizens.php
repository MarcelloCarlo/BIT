<?php
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $currentPage = 'AdOfficialFromCitizens';
    include('head.php');
    include('AdminNavbar.php');
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">

        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Add Officials
                            <small>The list of all the citizens of the barangay. Click "Assign" to add them as an official of the barangay.</small>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                                     <!--  table table-bordered table-striped table-hover dataTable js-exportable -->
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                      <!--   <table class="table table-bordered table-striped table-hover dataTable js-exportable">  -->
                                <thead>
                                    <tr>
                                        <th class="hide">ID</th>
                                        <th class="hide">BarangayOfficialID</th>
                                        <th>Position</th>
                                        <th class="hide">Full Name</th>
                                        <th>Salutation</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Name Extension</th>
                                        <th>Start Term</th>
                                        <th>End Term</th>
                                        <th>Status</th>
                                        <th>Gender</th>
                                        <th>Date Recorded</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="hide">ID</th>
                                        <th class="hide">BarangayOfficialID</th>
                                        <th>Position</th>
                                        <th class="hide">Full Name</th>
                                        <th>Salutation</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Name Extension</th>
                                        <th>Start Term</th>
                                        <th>End Term</th>
                                        <th>Status</th>
                                        <th>Gender</th>
                                        <th>Date Recorded</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                            include_once('dbconn.php');

                                            $CitizenSQL = "SELECT
                                                                    bitdb_r_citizen.Citizen_ID,
                                                                    bitdb_r_barangayofficial.Brgy_Official_ID,
                                                                    IFNULL(bitdb_r_barangayposition.PosName,'Citizen') AS PosName,
                                                                    bitdb_r_citizen.Salutation,
                                                                    bitdb_r_citizen.First_Name,
                                                                    IFNULL(bitdb_r_citizen.Middle_Name,'') AS Middle_Name,
                                                                    bitdb_r_citizen.Last_Name,
                                                                    IFNULL(bitdb_r_citizen.Name_Ext,'') AS Name_Ext,
                                                                    bitdb_r_barangayofficial.StartTerm,
                                                                    bitdb_r_barangayofficial.EndTerm,
                                                                    bitdb_r_citizen.Res_Status,
                                                                    bitdb_r_citizen.Gender,
                                                                    bitdb_r_citizen.Date_Rec
                                                                FROM bitdb_r_citizen
                                                                LEFT JOIN bitdb_r_barangayofficial
                                                                ON bitdb_r_citizen.Citizen_ID = bitdb_r_barangayofficial.CitizenID
                                                                LEFT JOIN bitdb_r_barangayposition
                                                                ON bitdb_r_barangayofficial.PosID = bitdb_r_barangayposition.PosID
                                                                ";
                                            $CitizenQuery = mysqli_query($bitMysqli,$CitizenSQL) or die(mysqli_error($bitMysqli));
                                                if (mysqli_num_rows($CitizenQuery) > 0)
                                                {
                                                    while($row = mysqli_fetch_assoc($CitizenQuery))
                                                    {
                                                        $ID = $row['Citizen_ID'];
                                                        $OfficialID = $row['Brgy_Official_ID'];
                                                        $PosName = $row['PosName'];
                                                        $Salutation = $row['Salutation'];
                                                        $FName = $row['First_Name'];
                                                        $MName = $row['Middle_Name'];
                                                        $LName = $row['Last_Name'];
                                                        $Name_Ext = $row['Name_Ext'];
                                                        $Gender = $row['Gender'];
                                                        $Date_Rec = $row['Date_Rec'];
                                                        $StartTerm = $row['StartTerm'];
                                                        $EndTerm = $row['EndTerm'];

                                                        $FullName = "".$Salutation." ".$FName." ".$MName." ".$LName." ".$Name_Ext."";
                                                        if($row['Res_Status'] == 1)
                                                        {
                                                            $Res_Status = "Active";
                                                        }
                                                        else
                                                        {
                                                            $Res_Status = "Inactive";
                                                        }

                                                        echo
                                                        '<tr>
                                                            <td class="hide">'.$ID.'</td>
                                                            <td class="hide">'.$OfficialID.'</td>
                                                            <td>'.$PosName.'</td>
                                                            <td class="hide">'.$FullName.'</td>
                                                            <td>'.$Salutation.'</td>
                                                            <td>'.$FName.'</td>
                                                            <td>'.$MName.'</td>
                                                            <td>'.$LName.'</td>
                                                            <td>'.$Name_Ext.'</td>
                                                            <td>'.$StartTerm.'</td>
                                                            <td>'.$EndTerm.'</td>
                                                            <td>'.$Res_Status.'</td>
                                                            <td>'.$Gender.'</td>
                                                            <td>'.$Date_Rec.'</td>
                                                            <td>  <button type="button" class="btn btn-success waves-effect editCiti" data-toggle="modal" data-target="#AddOfficialFromCitizModal">
                                                                <i class="material-icons">add_circle_outline</i>
                                                                <span>Assign</span>
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
    <!--Edit-->
     <form id="OfficalAddFromCitiz" action="AdminAddOfficialExist.php" method="POST">
             <div class="modal fade" id="AddOfficialFromCitizModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                Assign
                                <br/>
                                <small>Select position in the barangay for the citizen.</small>
                            </h2>
                        </div>
                        <div class="modal-body">
                             <div class="row clearfix margin-0">
                                <h4 class="card-inside-title hide">CitizenID</h4>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="assignCitizenID" type="text" class="form-control hide" name="CitizenID" required>
                                    </div>
                                </div>
                                <h4 class="card-inside-title hide">BarangayOfficialID</h4>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="assignOfficialID" type="text" class="form-control hide" name="OfficialID">
                                    </div>
                                </div>
                                <label class="form-label">Name</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="assignName" type="text" class="form-control" name="Name" disabled>
                                    </div>
                                </div>
                                <label class="form-label">Position For: </label>
                                <br/>
                                <div class="col-md-12">

                                    <label class="form-label">Position</label>
                                    <select id="assignPosition" class="form-control browser-default" name="Position">
                                            <option value="None">None</option>
                                            <?php
                                                include_once('dbconn.php');

                                                $ViewPosSql = "SELECT * FROM bitdb_r_barangayposition WHERE bitdb_r_barangayposition.PosStat = 1";
                                                $ViewPosQuery = mysqli_query($bitMysqli,$ViewPosSql) or die (mysqli_error($bitMysqli));
                                                if(mysqli_num_rows($ViewPosQuery) > 0)
                                                {
                                                    while($row = mysqli_fetch_assoc($ViewPosQuery))
                                                    {
                                                        $PosID = $row['PosID'];
                                                        $PosName = $row['PosName'];
                                                        echo '<option value="'.$PosName.'">'.$PosName.'</option>';

                                                    }
                                                }
                                            ?>
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <label class="form-label">Start Term</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="assignStart" type="date" class="form-control date" name="Start_Term">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-5">
                                    <label class="form-label">End Term</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="assignEnd" type="date" class="form-control date" name="End_Term">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">ASSIGN</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
          </form>
</section>

<?php include('footer.php'); ?>

<script type="text/javascript">
        $(document).ready(function()
        {
            $(".editCiti").click(function()
            {
                $("#assignCitizenID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#assignOfficialID").val($(this).closest("tbody tr").find("td:eq(1)").html());
                $("#assignName").val($(this).closest("tbody tr").find("td:eq(3)").html());
                $("#assignPosition").val($(this).closest("tbody tr").find("td:eq(2)").html()).trigger("change");
                $("#assignStart").val($(this).closest("tbody tr").find("td:eq(9)").html());
                $("#assignEnd").val($(this).closest("tbody tr").find("td:eq(10)").html());
            });
        });

    </script>
