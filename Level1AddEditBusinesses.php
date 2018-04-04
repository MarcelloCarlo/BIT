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
                        <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addBusinessModal">
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
                                <!-- <table class="table table-bordered table-striped table-hover js-basic-example dataTable"> -->
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">    <thead>
                                        <tr>
                                            <th class="hide">BusinessID</th>
                                            <th>Business Name</th>
                                            <th>Category</th>
                                            <th class="hide">LocationID</th>
                                            <th>Location</th>
                                            <th>Owner</th>
                                            <th>Owner Address</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="hide">BusinessID</th>
                                            <th>Business Name</th>
                                            <th>Category</th>
                                            <th class="hide">LocationID</th>
                                            <th>Location</th>
                                            <th>Owner</th>
                                            <th>Owner Address</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody><?php
                                                include('dbconn.php');

                                                $Level1BusinessSQL = 'SELECT    bitdb_r_business.BusinessID,
                                                                                bitdb_r_business.Business_Name,
                                                                                bitdb_r_businesscategory.categoryName,
                                                                                bitdb_r_business.BusinessLoc,
                                                                                bitdb_r_barangayzone.Zone,
                                                                                bitdb_r_business.Manager,
                                                                                bitdb_r_business.Mgr_Address,
                                                                                bitdb_r_issuance.IssuanceID,
                                                                                DATE_ADD(bitdb_r_issuance.IssuanceDate, INTERVAL 1 HOUR) AS ExpireDate,
                                                                                (CURRENT_DATE) AS CurrentDate
                                                                        FROM    bitdb_r_issuance
                                                                        RIGHT JOIN bitdb_r_business
                                                                        ON bitdb_r_issuance.BusinessID = bitdb_r_business.BusinessID
                                                                        INNER JOIN bitdb_r_businesscategory
                                                                        ON bitdb_r_business.BusinessCategory = bitdb_r_businesscategory.categoryID
                                                                        INNER JOIN bitdb_r_barangayzone
                                                                        ON bitdb_r_business.BusinessLoc = bitdb_r_barangayzone.ZoneID';
                                                $Level1BusinessQuery = mysqli_query($bitMysqli,$Level1BusinessSQL) or die (mysqli_error($bitMysqli));
                                                if(mysqli_num_rows($Level1BusinessQuery) > 0)
                                                {
                                                    while($row = mysqli_fetch_assoc($Level1BusinessQuery))
                                                    {
                                                        $BusinessID = $row['BusinessID'];
                                                        $Business_Name = $row['Business_Name'];
                                                        $BusinessCat = $row['categoryName'];
                                                        $BusinessLoc = $row['BusinessLoc'];
                                                        $Zone = $row['Zone'];
                                                        $Manager = $row['Manager'];
                                                        $ManagerAdd = $row['Mgr_Address'];
                                                        $Date_Issued = $row['ExpireDate'];
                                                        $Date = $row['CurrentDate'];
                                                        
                                                        if(strtotime($Date_Issued) > strtotime($Date))
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
                                                                <td>'.$BusinessCat.'</td>
                                                                <td class="hide">'.$BusinessLoc.'</td>
                                                                <td>'.$Zone.'</td>
                                                                <td>'.$Manager.'</td>
                                                                <td>'.$ManagerAdd.'</td>
                                                                <td>'.$BusinessStatus.'</td>
                                                                <td> 
                                                                    <button type="button" class="btn btn-success waves-effect editBusiness" data-toggle="modal" data-target="#editBusinessModal">
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
<div class="modal fade" id="addBusinessModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                Add Business
                                <br/>
                                 <div style="height: 0px; overflow: hidden;">
                                <input type="file" accept=".xls, .xlsx" name="fileInput" id="fileInput"/>
                            </div>
                            <script>
                                function chooseFile(){
                                    document.getElementById("fileInput").click();
                                }
                            </script>
                                <button type="button" class="btn btn-success waves-effect" onclick="chooseFile()">Migrate from Excel</button>
                            </h2>
                        </div>
                        <div class="modal-body">
                           <div class="row clearfix margin-0">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="BusinessName"/>
                                        <label class="form-label">Business Name</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Category</h4>
                                <div class="form-group form-float">
                                    <div class="col s12 m8 l9">
                                        <select class="browser-default" name="BusinessCategory" required="true">
                                            <option value="" disabled="" selected="">Choose your option</option>
                                        <?php
                                            include ('dbconn.php');

                                            $Level1BusinessCategorySQL = 'SELECT    bitdb_r_businesscategory.categoryID,
                                                                                    bitdb_r_businesscategory.categoryName
                                                                            FROM    bitdb_r_businesscategory';
                                            $Level1BusinessCategoryQuery = mysqli_query($bitMysqli,$Level1BusinessCategorySQL) or die (mysqli_error($bitMysqli));
                                            if(mysqli_num_rows($Level1BusinessCategoryQuery) > 0)
                                            {
                                                while($row = mysqli_fetch_assoc($Level1BusinessCategoryQuery))
                                                {
                                                    $categoryID = $row['categoryID'];
                                                    $categoryName = $row['categoryName'];

                                                    echo '<option value="'.$categoryID.'">'.$categoryName.'</option>';
                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <label class="form-label">Location</label>
                                <div class="form-group form-float">
                                        <select class="form-control show-tick" name="BusinessLoc" required>
                                            <option value="">-- Please select --</option>
                                            <?php
                                                include_once('dbconn.php');

                                                $ViewSql = "SELECT * FROM bitdb_r_barangayzone";
                                                $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                                if(mysqli_num_rows($ViewQuery) > 0)
                                                {
                                                    while($row = mysqli_fetch_assoc($ViewQuery))
                                                    {
                                                        $ID = $row['ZoneID'];
                                                        $Name = $row['Zone'];
                                                        echo '<option value="'.$ID.'">'.$Name.'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="BusinessManager"/>
                                        <label class="form-label">Owner</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="ManagerAdd"/>
                                        <label class="form-label">Owner Address</label>
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
        <form id="BusinessEdit" action="Level1EditBusinesses.php" method="POST" >
            <div class="modal fade" id="editBusinessModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                Edit Business
                            </h2>
                        </div>
                        <div class="modal-body">
                           <div class="row clearfix margin-0">
                                <h4 class="card-inside-title hide">Business ID</h4>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="editBusinessID" type="text" class="form-control hide" name="BusinessID"/>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Business Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editBusinessName" type="text" class="form-control" name="BusinessName"/>
                                    </div>
                                </div>
                                
                                <h4 class="card-inside-title">Category</h4>
                                <div class="form-group form-float">
                                    <div class="col s12 m8 l9">
                                        <select id="editBusinessCat" class="form-control browser-default" name="BusinessCategory" required="true">
                                        <?php
                                            include ('dbconn.php');

                                            $Level1BusinessCategorySQL = 'SELECT    bitdb_r_businesscategory.categoryID,
                                                                                    bitdb_r_businesscategory.categoryName
                                                                            FROM    bitdb_r_businesscategory';
                                            $Level1BusinessCategoryQuery = mysqli_query($bitMysqli,$Level1BusinessCategorySQL) or die (mysqli_error($bitMysqli));
                                            if(mysqli_num_rows($Level1BusinessCategoryQuery) > 0)
                                            {
                                                while($row = mysqli_fetch_assoc($Level1BusinessCategoryQuery))
                                                {
                                                    $categoryID = $row['categoryID'];
                                                    $categoryName = $row['categoryName'];

                                                    echo '<option value="'.$categoryName.'">'.$categoryName.'</option>';
                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <!-- <div class="form-line">
                                        <input type="text" class="form-control" name="BusinessCat"/>
                                        <label class="form-label">Category</label>
                                    </div> -->
                                </div>
                                <label class="form-label">Location</label>
                            <div class="form-group form-float">
                                    <select id="editBusinessLoc" class="form-control show-tick" name="BusinessLoc" required>
                                        <option value="">-- Please select --</option>
                                        <?php
                                            include_once('dbconn.php');

                                            $ViewSql = "SELECT * FROM bitdb_r_barangayzone";
                                            $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                            if(mysqli_num_rows($ViewQuery) > 0)
                                            {
                                                while($row = mysqli_fetch_assoc($ViewQuery))
                                                {
                                                    $ID = $row['ZoneID'];
                                                    $Name = $row['Zone'];
                                                    echo '<option value="'.$ID.'">'.$Name.'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                            </div>
                                <h4 class="card-inside-title">Owner</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editBusinessManager" type="text" class="form-control" name="BusinessManager"/>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Owner Address</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editBusinessAddress" type="text" class="form-control" name="ManagerAdd"/>
                                    </div>
                                </div>
                            </div>
                            <br/>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">EDIT</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
<?php include('footer.php'); ?>
<script type="text/javascript">
        $(document).ready(function()
        {
            $(".editBusiness").click(function()
            {
                $("#editBusinessID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#editBusinessName").val($(this).closest("tbody tr").find("td:eq(1)").html());
                $("#editBusinessCat").val($(this).closest("tbody tr").find("td:eq(2)").html()).trigger("change");
                $("#editBusinessLoc").val($(this).closest("tbody tr").find("td:eq(3)").html()).trigger("change");
                $("#editBusinessManager").val($(this).closest("tbody tr").find("td:eq(5)").html());
                $("#editBusinessAddress").val($(this).closest("tbody tr").find("td:eq(6)").html());
                console.log($(this).closest("tbody tr").find("td:eq(2)").html());
            });
        });

    </script> 