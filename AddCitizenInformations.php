<?php $title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'AddCitizenInformations';?>
<?php include('head.php'); ?>
<?php include('CENSUSNAVBA.php'); ?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>CITIZEN'S INFORMATION</h2>
            </div>
 <!--CUSTOM BLOCK INSERT HERE-->
            <!--CUSTOM BLOCK INSERT HERE-->
        
            <!-- Basic Examples -->
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CITIZEN's INFORMATION LIST
                                <small>The current list of barangay citizen. Click "Add New" to add a position or "Edit" to modify on the existing position</small>
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
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Birth Place</th>
                                            <th>Birthday</th>
                                            <th>Nationality</th>
                                            <th>Civil Status</th>
                                            <th>Status</th>
                                            <th>Address</th>
                                            <th>Date/Time Recorder</th>     
                                            <th>Actions</th>                                       
                                            <th class="hide"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                   <!--  unang column nang table -->
                                       <tr>

                                        <td>Remmel Ocay</td>
                                        <td>Male</td>
                                        <td>Hospital</td>
                                        <td>Sept. 20, 2000</td>
                                        <td>Filipino</td>
                                        <td>Single</td>
                                        <td>Active</td>
                                        <td>Area A</td>
                                        <td> Feb. 05, 2018/12:00 PM</td>
                                        <td>
                                            <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#editPosModal">
                                                        <i class="material-icons">mode_edit</i>
                                                        <span>EDIT</span>
                                                    </button>
                                        </td>

                                    </tr>
                                      <!--  2nd column nang table -->
                                   <tr>
                                        <td>Remmel Ocay</td>
                                        <td>Male</td>
                                        <td>Hospital</td>
                                        <td>Sept. 20, 2000</td>
                                        <td>Filipino</td>
                                        <td>Single</td>
                                        <td>Active</td>
                                        <td>Area A</td>
                                        <td> Feb. 05, 2018/12:00 PM</td>
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
                                ADD                                    
                                <br/>
                                <small>Add Citizen</small>
                            </h2>
                        </div>

                        <div class="modal-body">
                           <div class="row clearfix margin-0">
                                <h4 class="card-inside-title">Salutation</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Salutation</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">First Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">First Name</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Middle Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Middle Name</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Last Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Last Name</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Name Extension</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Name Extension</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Height(ft)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Height(ft)</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Weight(kg)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Weight(kg)</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Place of Birth</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Place of Birth</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Birthdate</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Birthdate</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Nationality</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Nationality</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Residence Status</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Residence Status</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Civil Status</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Civil Status</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Gender</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Gender</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Blood Type</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Blood Type</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">House Number</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">House Number</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Street</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Street</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Zone</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Zone</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Person too Contact</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Person to Contact</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Contact Number</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Contact Number</label>
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
                                EDIT
                                <br/>
                                <small>Modify Citizen's information</small>
                            </h2>
                        </div>

                        <!-- edit -->
                             <div class="modal-body">
                           <div class="row clearfix margin-0">
                                <h4 class="card-inside-title">Salutation</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Salutation</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">First Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">First Name</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Middle Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Middle Name</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Last Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Last Name</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Name Extension</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Name Extension</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Height(ft)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Height(ft)</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Weight(kg)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Weight(kg)</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Place of Birth</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Place of Birth</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Birthdate</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Birthdate</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Nationality</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Nationality</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Residence Status</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Residence Status</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Civil Status</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Civil Status</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Gender</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Gender</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Blood Type</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Blood Type</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">House Number</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">House Number</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Street</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Street</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Zone</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Zone</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Person to Contact</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Person too Contact</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Contact Number</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Contact Number</label>
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

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">UPDATE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>

        
<?php include('footer.php'); ?>