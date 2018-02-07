<?php $title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'CapBlotter';?>
<?php include('head.php'); ?>
<?php include('CapBlotterNavigation.php'); ?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Blotter List</h2>
            </div>
 <!--CUSTOM BLOCK INSERT HERE-->
            <!--CUSTOM BLOCK INSERT HERE-->
        
            <!-- Basic Examples -->
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BLOTTER LIST
                                <small>The current list of barangay blotter. Click "Add New" to add a position or "Edit" to modify on the existing position</small>
                            </h2>
                            <br/>
                    
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Date of Incident</th>
                                            <th>Complainant</th>
                                            <th>Accused</th>
                                            <th>Subject</th>
                                            <th>Status</th>
                                            <th>Resolution</th>
                                            <th>Date Recorded</th>     
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
                                        <td>Active</td>
                                        <td>Single</td>
                                        <td>Sept. 20 2000</td>
                                      
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
                                        <td>Active</td>
                                        <td>Single</td>
                                        <td>Sept. 20 2000</td>
                                       
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

  <div class="modal fade" id="editPosModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                EDIT
                                <br/>
                                <small>Modify Blotter information</small>
                            </h2>
                        </div>

                        <div class="body js-sweetalert">
                            <form id="form_validation" method="POST">
                        <!-- edit -->
                              <div class="modal-body">
                           <div class="row clearfix margin-0">
                                <h4 class="card-inside-title">Date of incident</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" required />
                                        <label class="form-label">Date of incident</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Cpmplainant's Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" required />
                                        <label class="form-label">Cpmplainant's Name</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Accused' Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" required />
                                        <label class="form-label">Accused' Name</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Complain Statement</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" required/>
                                        <label class="form-label">Complain Statement</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Decision</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" required/>
                                        <label class="form-label">Decision</label>
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
                            <button class="btn btn-success waves-effect" data-type="confirm" type="submit">UPDATE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>


        
<?php include('footer.php'); ?>