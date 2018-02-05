<?php $title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'AdOfficePositions';?>
<?php include('head.php'); ?>
<?php include('AdminNavbar.php'); ?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>POSITIONS</h2>
            </div>
 <!--CUSTOM BLOCK INSERT HERE-->
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
                                            <th>Position</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th class="hide"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>

                                        <td>Captain</td>
                                        <td>Lead</td>
                                        <td>Active</td>
                                        <td>
                                            <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#editPosModal">
                                                        <i class="material-icons">mode_edit</i>
                                                        <span>EDIT</span>
                                                    </button>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Chairman</td>
                                        <td>Lorem</td>
                                        <td>Active</td>
                                        <td>
                                            <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#editPosModal">
                                                            <i class="material-icons">mode_edit</i>
                                                            <span>EDIT</span>
                                                        </button>
                                        </td>
                                    </tr>
                                       
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
                        <div class="modal-body">
                           <div class="row clearfix margin-0">
                                <h4 class="card-inside-title">Position Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Position Name</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Description(Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Description(Optional)</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Status</h4>
                                <div class="demo-switch">
                                    <div class="switch">
                                        <label>Inactive<input type="checkbox" checked><span class="lever switch-col-orange"></span>Active</label>
                                    </div>
                                </div>

                            </div>
                            <br/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">ADD</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
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
                        <div class="modal-body">
                           <div class="row clearfix margin-0">
                            <h4 class="card-inside-title">Position: </h4>
                            <br/>
                                <h4 class="card-inside-title">Description</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Description</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Status</h4>
                                <div class="demo-switch">
                                    <div class="switch">
                                        <label>Inactive<input type="checkbox" checked><span class="lever switch-col-orange"></span>Active</label>
                                    </div>
                                </div>

                            </div>
                            <br/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">UPDATE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>

        
<?php include('footer.php'); ?>