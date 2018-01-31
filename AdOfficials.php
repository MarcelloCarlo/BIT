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
                                <small>The current list of officials of the Barangay. Click "Add New" to add an official or "Edit" to modify on the existing official </small>
                            </h2>
                            <br/>
                            <button type="button" class="btn bg-indigo waves-effect">
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
                                            <th>Position</th>
                                            <th>Gender</th>
                                            <th>Birthdate</th>
                                            <th>Street</th>
                                            <th>Sitio</th>
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
                                            <td><button type="button" class="btn btn-success waves-effect">
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
          
            <!-- Advanced Select -->
            
            
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Assign/Unassign
                                <small>Select A User to Assign/Unassign A Position</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <h3 class="card-inside-title">Insert Name</h3>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Search For Names of Citizen</label>
                                    </div>
                                </div>
                                <div class="col-md-3">

                                    <p>
                                        <b>Position</b>
                                    </p>
                                    <select class="form-control show-tick">
                                            <option>None</option>
                                            <option>Captain</option>
                                            <option>Treasurer</option>
                                            <option>Secretary</option>
                                        </select>
                                </div>


                            </div>
                            <button type="button" class="btn btn-success waves-effect">UPDATE</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Select -->





        </div>

      <?php include('footer.php'); ?>