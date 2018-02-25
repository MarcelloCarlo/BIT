<?php 
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $currentPage = 'AdUsers';
    include('head.php');
    include('AdminNavbar.php');
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>USERS</h2>
            <br/>

            <!--CUSTOM BLOCK INSERT HERE-->

            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                USERS LIST
                                <small>The current list of officials of the Barangay. Click "Edit" to modify the level of authority of official </small>
                            </h2>
                            <br/>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th class="hide">ID</th>
                                            <th class="hide">Username</th>
                                            <th class="hide">Password</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Gender</th>
                                            <th>Authority</th>
                                            <th>Status</th>
                                            <th class="hide"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include_once('dbconn.php');

                                            $AdminUserSelectSQL = 'SELECT
                                                                    IFNULL(bitdb_r_barangayuseraccounts.AccountUsername,"") AS AccountUsername,
                                                                    IFNULL(bitdb_r_barangayuseraccounts.AccountPassword,"") AS AccountPassword,
                                                                    IFNULL(bitdb_r_barangayuseraccounts.AccountUserType,"None") AS AccountUserType,
                                                                    bitdb_r_barangayofficial.Brgy_Official_ID,
                                                                    bitdb_r_barangayofficial.ActUser,
                                                                    bitdb_r_barangayposition.PosName,
                                                                    bitdb_r_citizen.Salutation,
                                                                    bitdb_r_citizen.First_Name,
                                                                    IFNULL(bitdb_r_citizen.Middle_Name,"") AS Middle_Name,
                                                                    bitdb_r_citizen.Last_Name,
                                                                    IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Ext,
                                                                    bitdb_r_citizen.Gender
                                                                FROM bitdb_r_barangayofficial
                                                                LEFT JOIN bitdb_r_barangayuseraccounts
                                                                ON bitdb_r_barangayuseraccounts.Brgy_Official_ID = bitdb_r_barangayofficial.Brgy_Official_ID
                                                                INNER JOIN bitdb_r_barangayposition
                                                                ON bitdb_r_barangayofficial.PosID = bitdb_r_barangayposition.PosID
                                                                INNER JOIN bitdb_r_citizen
                                                                ON bitdb_r_barangayofficial.CitizenID = bitdb_r_citizen.Citizen_ID';

                                            $AdminUserSelectQuery = mysqli_query($bitMysqli,$AdminUserSelectSQL) or die (mysqli_error($bitMysqli));
                                            if(mysqli_num_rows($AdminUserSelectQuery) > 0)
                                            {
                                                while($row = mysqli_fetch_assoc($AdminUserSelectQuery))
                                                {
                                                    $AccountUsername = $row['AccountUsername'];
                                                    $AccountPassword = $row['AccountPassword'];
                                                    $AccountUserType = $row['AccountUserType'];
                                                    $BarangayOffID = $row['Brgy_Official_ID'];
                                                    $PosName = $row['PosName'];
                                                    $Salutation = $row['Salutation'];
                                                    $First_Name = $row['First_Name'];
                                                    $Middle_Name = $row['Middle_Name'];
                                                    $Last_Name = $row['Last_Name'];
                                                    $Name_Ext = $row['Name_Ext'];
                                                    if($row['ActUser'] == 1 && isset($row['AccountUsername']) && isset($row['AccountPassword']) && isset($row['AccountUserType']))
                                                    {
                                                        $ActUser = "Active";    
                                                    }
                                                    else if(!isset($row['AccountUsername']) || !isset($row['AccountPassword']) || !isset($row['AccountUserType']))
                                                    {
                                                        $ActUser = "Inactive";
                                                    }
                                                    else if($row['ActUser'] == 0)
                                                    {
                                                        $ActUser = "Inactive";
                                                    }
                                                    if($row['Gender'] == 'M')
                                                    {
                                                        $Gender = "Male";
                                                    }
                                                    else
                                                    {
                                                        $Gender = "Female";
                                                    }
                                                    

                                                    $WName = "".$Salutation." ".$First_Name." ".$Middle_Name." ".$Last_Name." ".$Name_Ext." ";

                                                    echo   '<tr>
                                                                <td class="hide">'.$BarangayOffID.'</td>
                                                                <td class="hide">'.$AccountUsername.'</td>
                                                                <td class="hide">'.$AccountPassword.'</td>
                                                                <td>'.$WName.'</td>
                                                                <td>'.$PosName.'</td>
                                                                <td>'.$Gender.'</td>
                                                                <td>'.$AccountUserType.'</td>
                                                                <td>'.$ActUser.'</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-success waves-effect editUser" data-toggle="modal" data-target="#delegateUsrModal">
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

            <div class="modal fade" id="delegateUsrModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                Assign/Unassign
                                <br/>
                                <small>Select A User to Assign/Unassign Level of Authority</small>
                            </h2>
                        </div>
                        <div class="modal-body">
                            <form id="EditUser" action="AdminEditUser.php" method="POST">
                                <h4 class="card-inside-title hide">ID</h4>
                                <div class="input-group hide">
                                    <div class="form-line hide">
                                        <input id="BID" type="text" class="form-control hide" name="BarangayOffID">
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Username</h4>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input id="AccUser" type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Password</h4>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input id="AccPass" type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                </div>

                                <div class="modal-body">
                                    <div class="row clearfix margin-0">
                                        <h4 class="card-inside-title">Status</h4>
                                        <div class="form-group">
                                            <input type="radio" name="AccStatus" id="UserAct" value="Active" class="with-gap">
                                            <label for="UserAct">Active</label>
                                            <input type="radio" name="AccStatus" id="UserInact" value="Inactive" class="with-gap">
                                            <label for="UserInact" class="m-l-20">Inactive</label>
                                        </div>
                                        <h4 class="card-inside-title">Position For: </h4>
                                        <br/>
                                        <h5 class="card-inside-title">Authority Level</h5>
                                        <select id="AccLevel" name="AccAuthority" class="form-control show-tick" required>
                                            <option>None</option>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>  
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-link waves-effect " type="submit">UPDATE</button>
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>


        </div>


        <?php include('footer.php'); ?>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $(".editUser").click(function()
                {
                    $("#BID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                    $("#AccUser").val($(this).closest("tbody tr").find("td:eq(1)").html());
                    $("#AccPass").val($(this).closest("tbody tr").find("td:eq(2)").html());
                    if($(this).closest("tbody tr").find("td:eq(7)").text() === "Active")
                    {
                        $("#UserAct").prop("checked", true).trigger('click');
                    }
                    else
                    {
                        $("#UserInact").prop("checked", true).trigger('click');
                    }
                    $("#AccLevel").val($(this).closest("tbody tr").find("td:eq(6)").html()).trigger("change");

                });
            });

        </script>
