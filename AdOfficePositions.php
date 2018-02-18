<?php 
	session_start();
	$title = 'Welcome | BarangayIT MK.II';
	$currentPage = 'AdOfficePositions';
	include('head.php');
	include('AdminNavbar.php'); 
 ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>POSITIONS</h2>
        </div>
        <!--CUSTOM BLOCK INSERT HERE-->
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            POSITIONS LIST
                            <small>The current list of positions of the Barangay. Click "Add New" to add a position or "Edit" to modify on the existing position</small>
                        </h2>
                        <br/>
                        <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addPosModal">
                            <i class="material-icons">add_circle_outline</i>
                            <span>ADD NEW</span>
                        </button>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th class="hide"></th>
                                        <th>Position</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th class="hide"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									include_once('dbconn.php');

									$PViewSQL = "SELECT * FROM bitdb_r_barangayposition";
									$PViewQuery = mysqli_query($bitMysqli,$PViewSQL) or die(mysqli_error($bitMysqli));
									if (mysqli_num_rows($PViewQuery) > 0)
									{
										while($row = mysqli_fetch_assoc($PViewQuery))
												{	
													$PosID = $row['PosID'];
													$PosName = $row['PosName'];
													$PosDesc = $row['PosDesc'];
													$PosStat = $row['PosStat'];
													if ($PosStat == 1)
													{
														$PosStat = "Active";
													}
													else
													{
														$PosStat = "Inactive";
													}
													echo
													'<tr>
														<td class="hide">'.$PosID.'</td>
														<td>'.$PosName.'</td>
														<td>'.$PosDesc.'</td>
														<td>'.$PosStat.'</td>
														<td>
															<button type="button" class="btn btn-success waves-effect editPos" data-toggle="modal" 
														data-target="#editPosModal" value="'.$PosID.'">
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
        <div class="modal fade" id="addPosModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Add
                            <br/>
                            <small>Add Position Fields</small>
                        </h2>
                    </div>
                    <form id="PositionAdd" action="AdminAddPosition.php" method="POST">
                        <div class="modal-body">
                            <div class="row clearfix margin-0">
                                <h4 class="card-inside-title">Position Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="PositionName" />
                                        <label class="form-label">Position Name</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Description(Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="PositionDesc" />
                                        <label class="form-label">Description(Optional)</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Status</h4>
                                <div class="form-group">
                                    <input type="radio" name="PositionStatus" id="optAddPosActive" value="Active" class="with-gap">
                                    <label for="optAddPosActive">Active</label>

                                    <input type="radio" name="PositionStatus" id="optAddPosInactive" value="Inactive" class="with-gap">
                                    <label for="optAddPosInactive" class="m-l-20">Inactive</label>
                                </div>
                            </div>
                            <br/>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">ADD</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editPosModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Edit
                            <br/>
                            <small>Modify Position Fields</small>
                        </h2>
                    </div>
                    <form id="PositionEdit" action="AdminEditPosition.php" method="POST">
                        <div class="modal-body">
                            <div class="row clearfix margin-0">
                                <h4 class="card-inside-title hide">Position ID</h4>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="editPosID" type="text" class="hide" name="PositionID" />
                                        <label class="form-label hide">Position ID</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Position: </h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editPos" type="text" class="form-control" name="PositionName" placeholder="Position Name" />
                                        <!-- <label class="form-label">Position Name</label> -->
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Description</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editDesc" type="text" class="form-control" placeholder="Description" name="Description" />
                                        <!-- <label class="form-label">Description</label> -->
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Status</h4>
                                <div class="form-group">
                                    <input type="radio" name="PositionStatus" id="editCheckA" value="Active" class="with-gap">
                                    <label for="editCheckA">Active</label>

                                    <input type="radio" name="PositionStatus" id="editCheckI" value="Inactive" class="with-gap">
                                    <label for="editCheckI" class="m-l-20">Inactive</label>
                                </div>
                            </div>
                            <br/>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">UPDATE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".editPos").click(function() {
                    $("#editPosID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                    $("#editPos").val($(this).closest("tbody tr").find("td:eq(1)").html());
                    $("#editDesc").val($(this).closest("tbody tr").find("td:eq(2)").html());
                    if ($(this).closest("tbody tr").find("td:eq(3)").text() === "Active") {
                        $("#editCheckA").prop("checked", true).trigger('click');
                    } else {
                        $("#editCheckI").prop("checked", true).trigger('click');
                    }
                });
            });
        </script>
