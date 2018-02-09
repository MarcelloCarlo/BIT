<?php $title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'Level1ViewExpBusinesses';?>
<?php include('head.php'); ?>
<?php include('Level1navbar.php'); ?>

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
                          
                        <!--    <button type="button" class="btn bg-indigo waves-effect" href="Level1ViewEditBusinesses.php"> 
                            <a href="Level1ViewEditBusinesses.php" style= "text-decoration: none;"> 
                            <i class="material-icons">add_circle_outline</i>
                            <span>Add/Edit</span></a>
                        </button> -->
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Business Name</th>
                                            <th>Location</th>
                                            <th>Manager</th>
                                            <th>Man. Address</th>
                                            <th>Status</th>
                                        <!--    <th>Actions</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>Business Name</th>
                                            <th>Location</th>
                                            <th>Manager</th>
                                            <th>Man. Address</th>
                                            <th>Status</th>
                                    <!--        <th>Actions</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Siomai Stall</td>
                                            <td>Sitio Huhhu,  SJDC</td>
                                            <td>Edinburgh</td>
                                            <td>61St. asaehere</td>
                                            <td>Active</td>
                                                                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EXPORT TABLE
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
                                            <th>Business Name</th>
                                            <th>Location</th>
                                            <th>Manager</th>
                                            <th>Man. Address</th>
                                            <th>Status</th>
                                        <!--    <th>Actions</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>Business Name</th>
                                            <th>Location</th>
                                            <th>Manager</th>
                                            <th>Man. Address</th>
                                            <th>Status</th>
                                    <!--        <th>Actions</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Siomai Stall</td>
                                            <td>Sitio Huhhu,  SJDC</td>
                                            <td>Edinburgh</td>
                                            <td>61St. asaehere</td>
                                            <td>Active</td>
                                                                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>


<?php include('footer.php'); ?>