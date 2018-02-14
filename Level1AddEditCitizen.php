<?php $title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'Level1AddEditCitizen';?>
<?php include('head.php'); ?>
<?php include('Level1navbar.php'); ?>

 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>CITIZENS</h2>
</div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h2>
                        EDIT CITIZENS
                        <small>The list of all the citizens of the barangay. Click "VIEW" to view all  or "Edit" to modify on the existing record </small>
                    </h2>
                    <br/>
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
                                            <th>Salutation</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Height</th>
                                            <th>Weight</th>
                                            <th>Birth Place</th>
                                            <th>Nationality</th>
                                            <th>Status</th>
                                            <th>Civil Status</th>
                                            <th>Occupation</th>
                                            <th>Gender</th>
                                            <th>Blood Type</th>
                                            <th>Address</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Salutation</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Height</th>
                                            <th>Weight</th>
                                            <th>Birth Place</th>
                                            <th>Nationality</th>
                                            <th>Status</th>
                                            <th>Civil Status</th>
                                            <th>Occupation</th>
                                            <th>Gender</th>
                                            <th>Blood Type</th>
                                            <th>Address</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <tr>
                                            <th>Atty.</th>
                                            <th>Remmel</th>
                                            <th>Pogi</th>
                                            <th>Ocay</th>
                                            <th>Remmelion@yahoo.com</th>
                                            <th>5'3</th>
                                            <th>62 kg</th>
                                            <th>Quezon City</th>
                                            <th>Filipino</th>
                                            <th>Active</th>
                                            <th>Single</th>
                                            <th>Programmer</th>
                                            <th>Male</th>
                                            <th>B+</th>
                                            <th>Not set</th>
                                            <th>
                                            <button type="button" class="btn btn-success waves-effect">
                                                        <i class="material-icons">mode_edit</i>
                                                        <span>EDIT</span>
                                                    </button>
                                            </th>
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
                                Add Citizen
                                <br/>
                                <button type="button" class="btn btn-success waves-effect"> Import from Excel</button>
                            </h2>
                        </div>
                        <div class="modal-body">
                           <div class="row clearfix margin-0">
                                <h4 class="card-inside-title">Full Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Full Name</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Age</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Age</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Gender</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Gender</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Address</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Address</label>
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