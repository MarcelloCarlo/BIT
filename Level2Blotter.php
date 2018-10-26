<?php 
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $user = 2;
    include_once('LoginCheck.php');
    $currentPage = 'Level2Blotter';
    include('head.php');
    include('Level2_Navbar.php');
?>

<?php
include('dbconn.php');

$query = "SELECT * FROM bitdb_r_blotter";

$result = mysqli_query($bitMysqli,$query)
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
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
                            <small>The current list of barangay blotter. Click "Edit" to modify on the existing blotter.</small>
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
                                      
                                    </tr>
                                </thead>
                                <tfoot>
                                   <th>Date of Incident</th>
                                   <th>Complainant</th>
                                   <th>Accused</th>
                                   <th>Subject</th>
                                   <th>Status</th>
                                   <th>Resolution</th>
                                   <th>Date Recorded</th>     
                                 
                               </tfoot>
                               <tbody>

                                 <!--  unang column nang table -->


                                 <?php 
                                 while ($row = mysqli_fetch_assoc($result)) {
                                        # code...
                                    ?>
                                    <tr>

                                        <td><?php echo $row['IncidentDate'];?></td>
                                        <td><?php echo $row['Complainant'];?></td>
                                        <td><?php echo $row['Accused'];?></td>
                                        <td><?php echo $row['ComplaintStatement'];?></td>
                                        <td><?php 
                                            if($row['ComplaintStatus'] == 1)
                                            {
                                             echo $row['ComplaintStatus'] = "Active";
                                         }
                                         else
                                         {
                                            echo $row['ComplaintStatus'] = "Inactive";
                                        }
                                        ?>
                                        
                                    </td>
                                        <td><?php echo $row['Resolution'];?></td>
                                        <td><?php echo $row['ComplaintDate'];?></td>
                                        
                                    </tr>
                                    <?php
                                }
                                mysqli_close($bitMysqli);
                                ?>
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
                                    <input type="Date" class="form-control" required />
                                    <!-- <label class="form-label">Date of incident</label> -->
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