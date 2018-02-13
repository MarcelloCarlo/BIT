<?php $title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'Level1AddEditProjects';?>
<?php include('head.php'); ?>
<?php include('Level1Navbar.php'); ?>

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
                        EDIT PROJECTS
                        <small>The list of all projects of the barangay. Click "VIEW" to view all  or "Edit" to modify on the existing record </small>
                    <br/>
                    </h2>
                    <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addCitModal">
                            <i class="material-icons">add_circle_outline</i>
                            <span>ADD NEW</span>
                        </button>
                         <!--   <button type="button" class="btn bg-indigo waves-effect">
                            <i class="material-icons">add_circle_outline</i>
                            <a  href="Level1AddCirtizen.php" style= "text-decoration: none;"> 
                            <span>View</span></a>
                        </button> -->
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Location</th>
                                            <th>Description</th>
                                            <th>Phases</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Sponsors</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Location</th>
                                            <th>Description</th>
                                            <th>Phases</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Sponsors</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>02</td>
                                            <td>Oplan No Tambay</td>
                                            <td>N/A</td>
                                            <td>Remmel Ocay</td>
                                            <td>Insert your description Here</td>
                                            <td>February 10,2018</td>
                                            <td>Not Set</td>
                                            <td>Remmel Ocay</td>
                                            <td>
                                            <button type="button" class="btn btn-success waves-effect">
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

        </div>
<form>
<div class="modal fade" id="addCitModal" tabindex="-1" role="dialog">
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
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Name of the project</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Location</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Place of Event</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Description</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Project Details</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Phases</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Project stages</label>
                                    </div>
                                <h4 class="card-inside-title">Start Date</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="data-target" class="form-control" />
                                        <label class="form-label">Date started</label>
                                    </div>    
                                </div>
                                <h4 class="card-inside-title">End Date</h4>
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="data-target" class="form-control" />
                                        <label class="form-label">Expiry date of a project</label>
                                    </div>    
                                </div>
                                <h4 class="card-inside-title">Sponsors</h4>
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="data-target" class="form-control" />
                                        <label class="form-label">People involve</label>
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
</form>

    </section>


<?php include('footer.php'); ?>