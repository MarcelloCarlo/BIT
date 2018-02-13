<?php $title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'Level1ViewExpProjects';?>
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
                        PROJECT MONITORING
                        <small>The list of all the projects in the barangay. Click "VIEW" to view all  or "Edit" to modify on the existing record</small>
                    </h2>
                    <br/>
                     <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addCitModal">
                            <i class="material-icons">add_circle_outline</i>
                            <span>ADD NEW</span>
                        </button>
                          
                        <!--    <button type="button" class="btn bg-indigo waves-effect" href="Level1AddBusinesses.php"> 
                            <a href="Level1AddBusinesses.php" style= "text-decoration: none;"> 
                            <i class="material-icons">add_circle_outline</i>
                            <span>Add/Edit</span></a>
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
                                            <td>Kasalang Barangay</td>
                                            <td>Barangay Hall</td>
                                            <td>Insert Description Here</td>
                                            <td>Not Set</td>
                                            <td>Feb 14, 2018</td>
                                            <td>Feb 20, 2018</td>
                                            <td>Not Set</td>
                                            <td>Remmel Ocay</td>
                                            <td> 
                                                 <button type="button" class="btn btn-success waves-effect">
                                                        <i class="material-icons">mode_edit</i>
                                                        <span>EDIT</span>
                                                    </button>
                                            </td>
                                                                                   
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
                                <h4 class="card-inside-title">Business Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Business Name</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Location</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Location</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Manager</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Manager</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Manager Address</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Manager Address</label>
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