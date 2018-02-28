<?php 
session_start();
$title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'Level1AddEditBusinesses';?>
<?php include('head.php'); ?>
<?php include('Level1Navbar.php'); ?>

 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>BUSINESSES</h2>
</div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h2>
                        BUSINESSES LIST
                        <small>The list of all the businesses in the barangay. Click "VIEW" to view all  or "Edit" to modify on the existing record</small>
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
                                            <th class="hide">BusinessID</th>
                                            <th>Business Name</th>
                                            <th>Location</th>
                                            <th>Manager</th>
                                            <th>Man. Address</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="hide">BusinessID</th>
                                            <th>Business Name</th>
                                            <th>Location</th>
                                            <th>Manager</th>
                                            <th>Man. Address</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                            <?php
                                                include('dbconn.php');

                                                $Level1BusinessSQL = 'SELECT    bitdb_r_business.BusinessID,
                                                                                bitdb_r_business.Business_Name,
                                                                                bitdb_r_business.BusinessLoc,
                                                                                bitdb_r_business.Manager,
                                                                                bitdb_r_business.Mgr_Address,
                                                                                bitdb_r_business.Date_Issued,
                                                                                bitdb_r_business.BusinessStatus
                                                                        FROM    bitdb_r_business';
                                                $Level1BusinessQuery = mysqli_query($bitMysqli,$Level1BusinessSQL) or die (mysqli_error($bitMysqli));
                                                if(mysqli_num_rows($Level1BusinessQuery) > 0)
                                                {
                                                    while($row = mysqli_fetch_assoc($Level1BusinessQuery))
                                                    {
                                                        $BusinessID = $row['BusinessID'];
                                                        $Business_Name = $row['Business_Name'];
                                                        $BusinessLoc = $row['BusinessLoc'];
                                                        $Manager = $row['Manager'];
                                                        $ManagerAdd = $row['Mgr_Address'];
                                                        $Date_Issued = $row['Date_Issued'];

                                                        if($row['BusinessStatus'] == 1)
                                                        {
                                                            $BusinessStatus = "Active";
                                                        }
                                                        else
                                                        {
                                                            $BusinessStatus = "Inactive";
                                                        }

                                                        echo '  
                                                        <tr>    
                                                                <td class="hide">'.$BusinessID.'</td>
                                                                <td>'.$Business_Name.'</td>
                                                                <td>'.$BusinessLoc.'</td>
                                                                <td>'.$Manager.'</td>
                                                                <td>'.$ManagerAdd.'</td>
                                                                <td>'.$BusinessStatus.'</td>
                                                                <td> 
                                                                    <button type="button" class="btn btn-success waves-effect">
                                                                        <i class="material-icons">mode_edit</i>
                                                                        <span>EDIT</span>
                                                                    </button>
                                                                </td>
                                                        </tr>';
                                                    }
                                                }
                                            ?>
                                                                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            <!-- Exportable Table 
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EXPORTABLE TABLE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
<form id="BusinessAdd" action="Level1AddBusinesses.php" method="POST" >
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
                                <h4 class="card-inside-title">Business Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="BusinessName"/>
                                        <label class="form-label">Business Name</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Location</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="BusinessLoc"/>
                                        <label class="form-label">Location</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Manager</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="BusinessManager"/>
                                        <label class="form-label">Manager</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Manager Address</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="ManagerAdd"/>
                                        <label class="form-label">Manager Address</label>
                                    </div>
                                </div>
                            </div>
                            <br/>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">ADD</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
</div>
</div>
</form>
    </section>


<?php include('footer.php'); ?>