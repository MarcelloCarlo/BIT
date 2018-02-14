<?php 	
session_start();
$title='Officials';
$currentPage='AdOfficials';
include('head.php'); 
include('AdminNavbar.php'); 
?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>OFFICIALS</h2>
            </div>

              <!--CUSTOM BLOCK INSERT HERE-->

             <!-- Basic Examples -->
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                OFFICIALS LIST
                                <small>The current list of officials of the Barangay. Click "Edit" to assign a barangay official. </small>
                            </h2>
                            <br/>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th class="hide">BarangayOffID</th>
                                            <th class="hide">CitizenID</th>
                                            <th class="hide">BarangayPos</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Gender</th>
                                            <th>Birthdate</th>
                                            <th>Street/Block</th>
                                            <th>Zone(Sitio)</th>
                                            <th class="hide"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										include_once('dbconn.php');
									 
										$SelectOfficialSQL = "SELECT bitdb_r_barangayofficial.Brgy_Official_ID, bitdb_r_Citizen.Citizen_ID, bitdb_r_barangayposition.PosID, bitdb_r_citizen.Salutation, bitdb_r_citizen.First_Name, IFNULL(bitdb_r_citizen.Middle_Name,'') AS Middle_Name, bitdb_r_citizen.Last_Name, IFNULL(bitdb_r_citizen.Name_Ext,'') AS Name_Ext, bitdb_r_citizen.Gender, bitdb_r_citizen.Birthdate, bitdb_r_citizen.Street, bitdb_r_citizen.Zone, bitdb_r_barangayposition.PosName FROM bitdb_r_barangayofficial INNER JOIN bitdb_r_citizen ON bitdb_r_citizen.Citizen_ID = bitdb_r_barangayofficial.CitizenID INNER JOIN bitdb_r_barangayposition ON bitdb_r_barangayofficial.PosID = bitdb_r_barangayposition.PosID WHERE bitdb_r_barangayposition.PosStat = 1 AND bitdb_r_citizen.Res_Status = 1";
										
										$SelectOfficialQuery = mysqli_query($bitMysqli,$SelectOfficialSQL) or die(mysqli_error($bitMysqli));
										if (mysqli_num_rows($SelectOfficialQuery) > 0)
										{
											while($row = mysqli_fetch_assoc($SelectOfficialQuery))
											{
                                                $barangayOff = $row['Brgy_Official_ID'];
                                                $CitizenID = $row['Citizen_ID'];
                                                $BarangayPos = $row['PosID'];
												$Salutation = $row['Salutation'];
												$First_Name = $row['First_Name'];
												$Middle_Name = $row['Middle_Name'];
												$Last_Name = $row['Last_Name'];
												$Name_Ext = $row['Name_Ext'];
												$Gender = $row['Gender'];
												$Birthdate = $row['Birthdate'];
												$Street = $row['Street'];
												$Zone = $row['Zone'];
												$PosName = $row['PosName'];
												$WName = "".$Salutation." ".$First_Name." ".$Middle_Name." ".$Last_Name." ".$Name_Ext."";
												echo
												'<tr>
                                                    <td class="hide">'.$barangayOff.'</td>
                                                    <td class="hide">'.$CitizenID.'</td>
                                                    <td class="hide">'.$BarangayPos.'</td>
													<td>'.$WName.'</td>
													<td>'.$PosName.'</td>
													<td>'.$Gender.'</td>
													<td>'.$Birthdate.'</td>
													<td>'.$Street.'</td>
													<td>'.$Zone.'</td>
													<td>
													<button type="button" class="btn btn-success waves-effect editBOff" data-toggle="modal" data-target="#delegateOfcModal">
														<i class="material-icons">mode_edit</i>
														<span>EDIT</span>
													</button>
													</td>
												</tr>';
											}
											
										}
										?>
<!--                                    <tr>
                                            <td>Tiger Nixon</td>
                                            <td>Barangay Captain</td>
                                            <td>M</td>
                                            <td>1977/04/25</td>
                                            <td>Parupao St.</td>
                                            <td>Takbuhan</td>
                                            <td>
												<button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#delegateOfcModal">
													<i class="material-icons">mode_edit</i>
                                                    <span>EDIT</span>
                                                </button>
											</td>
                                        </tr>
-->                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            <form id="OfficalEdit" action="AdminEditOfficial.php" method="POST">
             <div class="modal fade" id="delegateOfcModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                Assign/Unassign
                                <br/>
                                <small>Select A User to Assign/Unassign A Position</small>
                            </h2>
                        </div>
                        <div class="modal-body">
                             <div class="row clearfix margin-0">
                                <h4 class="card-inside-title">Position For: </h4>
                                <br/>
                                <div class="col-md-3">

                                  <h4>Position</h4>
                                    <select id="PositionOption" class="form-control show-tick" name="PositionName">
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
                                    <input id="BarangayOffID" type="text" class="form-control hide" name="BOffID"/>
                                    <input id="CitizenID" type="text" class="form-control hide" name="CID"/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">UPDATE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
          </form>
        </div>

    <?php include('footer.php'); ?>

    <script type="text/javascript">
        $(document).ready(function()
        {
            $(".editBOff").click(function()
            {
                $("#BarangayOffID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#CitizenID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#PositionOption").val($(this).closest("tbody tr").find("td:eq(4)").html()).trigger("change");
                // ActOption = "option[value="+val($(this).closest("tbody tr").find("td:eq(4)").html())+"]";
                // $("#PositionOption").find(ActOption).prop("selected",true);
            });
        });

    </script> 