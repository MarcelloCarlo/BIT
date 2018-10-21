<?php
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $currentPage = 'Level0BarangayZones';
    $user = 0;
    include_once('LoginCheck.php');
    include('head.php');
    include('Level0_Navbar.php');
?>
<section class="content">
    <div class="container-fluid">

        <!--CUSTOM BLOCK INSERT HERE-->
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            LIST OF BARANGAY ZONES
                            <small>The following are the current zones found in the barangay. Click "Add New" or "Edit" to modify an existing record</small>
                        </h2>
                        <br/>
                        <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addZoneSubModal">
                            <i class="material-icons">add_circle_outline</i>
                            <span>ADD NEW</span>
                        </button>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th class="hide">ZoneID</th>
                                        <th class="hide">Barangay</th>
                                        <th>Zone</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th style="width: 15px; ">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                    include_once('dbconn.php');

                                    $ZoneSQL = "SELECT * FROM bitdb_r_barangayzone";
                                    $ZoneQuery = mysqli_query($bitMysqli,$ZoneSQL) or die(mysqli_error($bitMysqli));
                                    if (mysqli_num_rows($ZoneQuery) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($ZoneQuery))
                                                {
                                                    $ID = $row['ZoneID'];
                                                    $Identity = $row['BarangayIdentity'];
                                                    $Zone = $row['Zone'];
                                                    $Date = $row['ZoneDate'];
                                                    if($row['ZoneStatus'] == 1)
                                                    {
                                                        $Status = "Active";
                                                    }
                                                    else
                                                    {
                                                        $Status = "Inactive";
                                                    }
                                                    echo
                                                    '<tr>
                                                        <td class="hide">'.$ID.'</td>
                                                        <td class="hide">'.$Identity.'</td>
                                                        <td>'.$Zone.'</td>
                                                        <td>'.$Status.'</td>
                                                        <td>'.$Date.'</td>
                                                        <td>
                                                            <button type="button" class="btn btn-success waves-effect editZoneModal" data-toggle="modal" data-target="#editZoneSubModal">
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
        <!-- #END# Basic Examples -->
        <form id="addZone" action="Level0_AddZone.php" method="POST">
        <div class="modal fade" id="addZoneSubModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Add Barangay Zone
                            <br/>
                        </h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix margin-0">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="ZoneName"/>
                                        <label class="form-label">Zone Name</label>
                                    </div>
                                </div>
                            <label class="form-label">Barangay</label>
                                <select class="form-control browser-default" name="BarangayIdentity">
                                    <option value="None">None</option>
                                    <?php
                                        include_once('dbconn.php');
                                        $ctr = 0;
                                        $ViewSql = "SELECT * FROM bitdb_r_config";
                                        $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                        if(mysqli_num_rows($ViewQuery) > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($ViewQuery))
                                            {
                                                if($ctr == 0)
                                                {
                                                    $ID = $row['BarangayIdentity'];
                                                    $Name = $row['BarangayName'];
                                                    echo '<option value="'.$ID.'" selected>'.$Name.'</option>';
                                                    $ctr++;
                                                }
                                                else
                                                {
                                                    $ID = $row['BarangayIdentity'];
                                                    $Name = $row['BarangayName'];
                                                    echo '<option value="'.$ID.'">'.$Name.'</option>';
                                                }

                                            }
                                        }
                                    ?>
                                </select>
                            <label class="form-label">Status</label>
                                <div class="form-group">
                                    <input type="radio" name="Zone_Status" id="CheckA" value="Active" class="with-gap" checked>
                                    <label for="CheckA">Active</label>

                                    <input type="radio" name="Zone_Status" id="CheckI" value="Inactive" class="with-gap">
                                    <label for="CheckI" class="m-l-20">Inactive</label>
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
        <form id="editZone" action="Level0_EditZone.php" method="POST">
        <div class="modal fade" id="editZoneSubModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Edit Barangay Zone
                            <br/>

                        </h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix margin-0">
                            <h4 class="card-inside-title hide">Zone ID</h4>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="editZoneID" type="text" class="form-control hide" name="ZoneID"/>
                                    </div>
                                </div>
                            <label class="form-label">Zone</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editZoneName" type="text" class="form-control" name="ZoneName"/>
                                    </div>
                                </div>
                            <label class="form-label">Barangay</label>
                                <select id="editZoneIdentity" class="form-control browser-default" name="BarangayIdentity">
                                    <option value="None">None</option>
                                    <?php
                                        include_once('dbconn.php');

                                        $ViewSql = "SELECT * FROM bitdb_r_config";
                                        $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                        if(mysqli_num_rows($ViewQuery) > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($ViewQuery))
                                            {
                                                $ID = $row['BarangayIdentity'];
                                                $Name = $row['BarangayName'];
                                                echo '<option value="'.$ID.'">'.$Name.'</option>';

                                            }
                                        }
                                    ?>
                                </select>
                            <label class="form-label">Status</label>
                                <div class="form-group">
                                    <input type="radio" name="Zone_Status" id="editCheckA" value="Active" class="with-gap" checked>
                                    <label for="editCheckA">Active</label>

                                    <input type="radio" name="Zone_Status" id="editCheckI" value="Inactive" class="with-gap">
                                    <label for="editCheckI" class="m-l-20">Inactive</label>
                                </div>
                        </div>
                        <br/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link waves-effect">UPDATE</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <?php include('footer.php'); ?>

        <script type="text/javascript">
    $(document).ready(function()
    {
        $(".editZoneModal").click(function()
        {
            $("#editZoneID").val($(this).closest("tbody tr").find("td:eq(0)").html());
            $("#editZoneName").val($(this).closest("tbody tr").find("td:eq(2)").html());
            $("#editZoneIdentity").val($(this).closest("tbody tr").find("td:eq(1)").html()).trigger("change");
            if ($(this).closest("tbody tr").find("td:eq(3)").text() === "Active")
            {
                $("#editCheckA").prop("checked", true).trigger('click');
            }
            else
            {
                $("#editCheckI").prop("checked", true).trigger('click');
            }
        });
    });

</script>
