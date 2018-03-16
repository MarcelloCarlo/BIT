<?php 
session_start();
$title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'AdCategoryBusiness';?>
<?php include('head.php'); ?>
<?php include('AdminNavbar.php'); ?>

 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>BUSINESS CATEGORY</h2>
</div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h2>
                        BUSINESS CATEGORY LIST
                        <small>The list of all the existing types of business in the barangay. Click "VIEW" to view all  or "Edit" to modify on the existing record</small>
                    </h2>
                    <br/>
                     <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addBusinessCategoryModal">
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
                                            <th class="hide">BusinessCategoryID</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th style="width: 15px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="hide">BusinessCategoryID</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                            <?php
                                                include('dbconn.php');

                                                $AdminBusinessCategorySQL = 'SELECT    bitdb_r_businesscategory.categoryID,
                                                                                bitdb_r_businesscategory.categoryName,
                                                                                bitdb_r_businesscategory.categoryDesc,
                                                                                bitdb_r_businesscategory.categoryDate
                                                                        FROM    bitdb_r_businesscategory';
                                                $AdminBusinessCategoryQuery = mysqli_query($bitMysqli,$AdminBusinessCategorySQL) or die (mysqli_error($bitMysqli));
                                                if(mysqli_num_rows($AdminBusinessCategoryQuery) > 0)
                                                {
                                                    while($row = mysqli_fetch_assoc($AdminBusinessCategoryQuery))
                                                    {
                                                        $CategoryID = $row['categoryID'];
                                                        $CategoryName = $row['categoryName'];
                                                        $CategoryDesc = $row['categoryDesc'];
                                                        $CategoryDate = $row['categoryDate'];

                                                        echo '  
                                                        <tr>    
                                                                <td class="hide">'.$CategoryID.'</td>
                                                                <td>'.$CategoryName.'</td>
                                                                <td>'.$CategoryDesc.'</td>
                                                                <td>'.$CategoryDate.'</td>
                                                                <td> 
                                                                    <button type="button" class="btn btn-success waves-effect editBusinessCategory" data-toggle="modal" data-target="#editBusinessCategoryModal">
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
<form id="BusinessAddCategory" action="AdminAddBusinessCategory.php" method="POST" >
<div class="modal fade" id="addBusinessCategoryModal" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                Add Business Category
                                <br/>
                                <button type="button" class="btn btn-success waves-effect"> Import from Excel</button>
                            </h2>
                        </div>
                        <div class="modal-body">
                           <div class="row clearfix margin-0">
                                <h4 class="card-inside-title">Category Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="CategoryName"/>
                                        <label class="form-label">Category Name</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Description</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="CategoryDesc"/>
                                        <label class="form-label">Description</label>
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

<form id="BusinessEditCategory" action="AdminEditBusinessCategory.php" method="POST" >
<div class="modal fade" id="editBusinessCategoryModal" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                Edit Business Category
                                <br/>
                            </h2>
                        </div>
                        <div class="modal-body">
                           <div class="row clearfix margin-0">
                                <h4 class="card-inside-title hide">Category ID</h4>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="editCategoryID" type="text" class="form-control hide" name="CategoryID"/>
                                        <label class="form-label hide">Category ID</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Category Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editCategoryName" type="text" class="form-control" name="CategoryName"/>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Description</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editCategoryDesc" type="text" class="form-control" name="CategoryDesc"/>
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
            $(".editBusinessCategory").click(function()
            {
                $("#editCategoryID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#editCategoryName").val($(this).closest("tbody tr").find("td:eq(1)").html());
                $("#editCategoryDesc").val($(this).closest("tbody tr").find("td:eq(2)").html());
            });
        });

    </script> 