<?php $title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'CapBlotterView';?>
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
                                <small>The current list of barangay blotter.</small>
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
                                            <th>Date Of Incident</th>
                                            <th>Complainamt</th>
                                            <th>Accused</th>
                                            <th>Subject</th>
                                            <th>Status</th>
                                            <th>Resolution</th>
                                            <th>Date Recorded</th>     
                                          
                                                                     
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
                                       
                                       

                                    </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

            
        
<?php include('footer.php'); ?>