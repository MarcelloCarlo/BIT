<?php $title='Officials';?>
<?php $currentPage='AdOfficials';?>
<?php include('head.php'); ?>
<?php include('AdminNavbar.php'); ?>

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
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>Barangay Captain</td>
                                            <td>M</td>
                                            <td>1977/04/25</td>
                                            <td>Parupao St.</td>
                                            <td>Takbuhan</td>
                                            <td><button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#delegateOfcModal">
                                                            <i class="material-icons">mode_edit</i>
                                                            <span>EDIT</span>
                                                        </button></td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

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
                                    <select class="form-control show-tick">
                                            <option>None</option>
                                            <option>Captain</option>
                                            <option>Treasurer</option>
                                            <option>Secretary</option>
                                        </select>
                                </div>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">UPDATE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
          
        
        </div>

      <?php include('footer.php'); ?>