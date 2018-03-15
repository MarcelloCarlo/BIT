<?php 
session_start();
$title = 'Welcome | BarangayIT MK.II';
$currentPage = 'Patawag';
include('head.php');
include('Level1Navbar.php'); 
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
                            <small>The current list of barangay patawag. Click "Print" to issue patawag.</small>
                        </h2>   
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">

                                <thead>
                                    <tr>
                                        <th>Date Of Incident</th>
                                        <th>Complainant</th>
                                        <th>Accused</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                     <th>Date Of Incident</th>
                                        <th>Complainant</th>
                                        <th>Accused</th>
                                        <th>Status</th>
                                        <th>Action</th>                
                                        </tfoot>
                                <tbody>
                                    <td>Sept. 20, 2000</td>
                                    <td>Remmel Ocay</td>
                                    <td>Lemmer Yaco</td>
                                    <td>Active</td>
                                    
                                    <td>
                                        <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#editPosModal">
                                            <i class="material-icons">mode_edit</i>
                                            <span>Print Summon</span>
                                        </button>
                                    </td>
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
                            Print Summon                           
                            <br/>
                            <small>Summon</small>
                        </h2>
                    </div>

                    <!-- form -->
                    <div class="body js-sweetalert">
                        <!-- id="form_validation" -->



                        <form method="post" action="ChiefTanodAddBlotter_DBaction.php">

                            <div class="modal-body">
                               
                            <h4 class="card-inside-title">Date of incident</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="Date" class="form-control" name="incidate" value="<?php echo $incidate; ?>" required/>
                                    <label class="form-label"></label>
                                </div>
                            </div>

                            <h4 class="card-inside-title">Complainant's Name</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Compname" value="<?php echo $Compname; ?>" required/>
                                    <label class="form-label">Complainant's Name</label>
                                </div>
                            </div>

                            <h4 class="card-inside-title">Accused' Name</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="btype" type="text" class="form-control" name="Accuname" value="<?php echo $Accuname; ?>" />
                                    <label class="form-label">Accused Name</label>
                                </div>
                            </div>

                            <h4 class="card-inside-title">Complain Statement</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Compstate" value="<?php echo $Compstate; ?>" required/>
                                    <label class="form-label">Complain Statement</label>
                                </div>
                            </div>

                            <h4 class="card-inside-title">Decision</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Decision" value="<?php echo $Decision; ?>" required/>
                                    <label class="form-label">Decision</label>
                                </div>
                            </div>


                            <h4 class="card-inside-title">Summon Schedule</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="Date" class="form-control" name="comp_date"  value="<?php echo $comp_date; ?>" required/>
                                    <label class="form-label"></label>
                                </div>
                            </div>

                             <h4 class="card-inside-title">Summon Place</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="Date" class="form-control" name="comp_date"  value="<?php echo $comp_date; ?>" required/>
                                    <label class="form-label"></label>
                                </div>
                            </div>



                            <br/>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success waves-effect" data-type="confirm" type="submit"  value="Submit">Print</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>

