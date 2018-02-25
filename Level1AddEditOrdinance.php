<?php
    session_start(); 
    $title = 'Welcome | BarangayIT MK.II'; 
    $currentPage = 'Level1AddEditOrdinance';
    include('head.php');
    include('Level1Navbar.php'); 
?>
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ORDINANCES</h2>
</div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h2>
                        EDIT ORDINANCES
                        <small>The list of all ordinances of the barangay. Click "VIEW" to view all  or "Edit" to modify on the existing record </small>
                    <br/>
                    </h2>
                    <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addCitModal">
                            <i class="material-icons">add_circle_outline</i>
                            <span>ADD NEW</span>
                        </button>
                         <!--   <button type="button" class="btn bg-indigo waves-effect">
                            <i class="material-icons">add_circle_outline</i>
                            <a  href="Level1AddCirtizen.php" style= "text-decoration: none;"> 
                            <span>View</span></a>
                        </button> -->
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th class="hide">Ordinance ID</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Authors</th>
                                            <th>Persons Involved</th>
                                            <th>Description</th>
                                            <th>Sanction</th>
                                            <th>Date of Implementation</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="hide">Ordinance ID</th>
                                            <th>Titles</th>
                                            <th>Category</th>
                                            <th>Authors</th>
                                            <th>Persons Involved</th>
                                            <th>Description</th>
                                            <th>Sanction</th>
                                            <th>Date of Implementation</th>                                            
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            include_once('dbconn.php');

                                            $Level1OrdinanceSQL = 'SELECT   bitdb_r_ordinance.OrdinanceID,
                                                                            bitdb_r_ordinance.OrdinanceTitle,
                                                                            bitdb_r_ordinancecategory.OrdinanceTitle AS Category,
                                                                            bitdb_r_ordinance.Author,
                                                                            bitdb_r_ordinance.Persons_Involved,
                                                                            bitdb_r_ordinance.OrdDesc,
                                                                            bitdb_r_ordinance.DateImplemented,
                                                                            bitdb_r_ordinance.OrdStatus,
                                                                            bitdb_r_ordinance.Sanction
                                                                    FROM bitdb_r_ordinance
                                                                    INNER JOIN bitdb_r_ordinancecategory
                                                                    ON bitdb_r_ordinance.CategoryID = bitdb_r_ordinancecategory.OrdCategoryID';
                                            $Level1OrdinanceQuery = mysqli_query($bitMysqli,$Level1OrdinanceSQL) or die (mysqli_error($bitMysqli));
                                            if(mysqli_num_rows($Level1OrdinanceQuery) > 0)
                                            {
                                                while($row = mysqli_fetch_assoc($Level1OrdinanceQuery))
                                                {
                                                    $OrdID = $row['OrdinanceID'];
                                                    $OrdTitle = $row['OrdinanceTitle'];
                                                    $Category = $row['Category'];
                                                    $Author = $row['Author'];
                                                    $PerInv = $row['Persons_Involved'];
                                                    $OrdDesc = $row['OrdDesc'];
                                                    $Date = $row['DateImplemented'];
                                                    $Sanction = $row['Sanction'];

                                                    if($row['OrdStatus'] == 1)
                                                    {
                                                        $OrdStatus = "Active";
                                                    }
                                                    else
                                                    {
                                                        $OrdStatus = "Inactive";
                                                    }

                                                    echo '  <tr>
                                                                <td class="hide">'.$OrdID.'</td>
                                                                <td>'.$OrdTitle.'</td>
                                                                <td>'.$Category.'</td>
                                                                <td>'.$Author.'</td>
                                                                <td>'.$PerInv.'</td>
                                                                <td>'.$OrdDesc.'</td>
                                                                <td>'.$Sanction.'</td>
                                                                <td>'.$Date.'</td>
                                                                <td>'.$OrdStatus.'</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-success waves-effect editOrd" data-toggle="modal" data-target="#editOrdModal">
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

        </div>
        <form id="Level1AddOrdinance" action="Level1AddOrdinance.php" method="POST">
            <div class="modal fade" id="addCitModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                Add Ordinance
                                <br/>
                                <button type="button" class="btn btn-success waves-effect"> Import from Excel</button>
                            </h2>
                        </div>
                        <div class="modal-body">
                           <div class="row clearfix margin-0">
                                <h4 class="card-inside-title">Title</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="OrdTitle" type="text" class="form-control" />
                                        <label class="form-label">Title</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Category</h4>
                                <select class="form-control show-tick" name="OrdCategory">
                                    <?php
                                    include_once('dbconn.php');
                                    $CategorySQL = "SELECT * FROM bitdb_r_ordinancecategory";
                                    $CategoryQuery = mysqli_query($bitMysqli,$CategorySQL) or die(mysqli_error($bitMysqli));
                                    if(mysqli_num_rows($CategoryQuery) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($CategoryQuery))
                                        {
                                            echo '<option>'.$row['OrdinanceTitle'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <h4 class="card-inside-title">Authors</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="OrdAuthor" type="text" class="form-control" />
                                        <label class="form-label">Authors</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Person Involved</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="PerInv" type="text" class="form-control" />
                                        <label class="form-label">Person Involved</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Description</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="OrdDesc" type="text" class="form-control" />
                                        <label class="form-label">Description</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Sanction</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="OrdSanction" type="text" class="form-control" />
                                        <label class="form-label">Sanction</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Date</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="DateImplemented" type="date" class="form-control" />
                                        <!-- <label class="form-label">Date</label> -->
                                    </div>    
                                </div>

                                <h4 class="card-inside-title">Ordinance Status</h4>
                                <div class="form-group">
                                    <input type="radio" name="Ord_Status" id="editCheckA" value="Active" class="with-gap">
                                    <label for="editCheckA">Active</label>

                                    <input type="radio" name="Ord_Status" id="editCheckI" value="Inactive" class="with-gap">
                                    <label for="editCheckI" class="m-l-20">Inactive</label>
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
        <form id="OrdinanceEdit" action="Level1EditOrdinance.php" method="POST">
        <div class="modal fade" id="editOrdModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Edit
                            <br/>
                            <small>Modify Position Fields</small>
                        </h2>
                    </div>
                    
                        <div class="modal-body">
                            <div class="row clearfix margin-0">
                                <h4 class="card-inside-title hide">ID</h4>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="editOrdID" name="OrdID" type="text" class="form-control hide" />
                                        <!-- <label class="form-label">Title</label> -->
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Title</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editOrdTitle" name="OrdTitle" type="text" class="form-control" />
                                        <!-- <label class="form-label">Title</label> -->
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Category</h4>
                                <select id="editOrdCategory" class="form-control show-tick" name="OrdCategory">
                                    <?php
                                    include_once('dbconn.php');
                                    $CategorySQL = "SELECT * FROM bitdb_r_ordinancecategory";
                                    $CategoryQuery = mysqli_query($bitMysqli,$CategorySQL) or die(mysqli_error($bitMysqli));
                                    if(mysqli_num_rows($CategoryQuery) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($CategoryQuery))
                                        {
                                            echo '<option>'.$row['OrdinanceTitle'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <h4 class="card-inside-title">Authors</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editOrdAuthors" name="OrdAuthor" type="text" class="form-control" />
                                        <!-- <label class="form-label">Authors</label> -->
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Person Involved</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editOrdPerInv" name="PerInv" type="text" class="form-control" />
                                        <!-- <label class="form-label">Person Involved</label> -->
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Description</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editOrdDesc" name="OrdDesc" type="text" class="form-control" />
                                        <!-- <label class="form-label">Description</label> -->
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Sanction</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editOrdSanction" name="OrdSanction" type="text" class="form-control" />
                                        <!-- <label class="form-label">Sanction</label> -->
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Date</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="editOrdDate" name="DateImplemented" type="date" class="form-control" />
                                        <!-- <label class="form-label">Date</label> -->
                                    </div>    
                                </div>

                                <h4 class="card-inside-title">Ordinance Status</h4>
                                <div class="form-group">
                                    <input type="radio" name="Ord_Status" id="editOrdA" value="Active" class="with-gap">
                                    <label for="editOrdA">Active</label>

                                    <input type="radio" name="Ord_Status" id="editOrdI" value="Inactive" class="with-gap">
                                    <label for="editOrdI" class="m-l-20">Inactive</label>
                                </div>
                            </div>
                            <br/>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">UPDATE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                </div>
            </div>
        </div>
        </form>

    </section>


<?php include('footer.php'); ?>

        <script type="text/javascript">
            $(document).ready(function() {
                $(".editOrd").click(function() {
                    $("#editOrdID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                    $("#editOrdTitle").val($(this).closest("tbody tr").find("td:eq(1)").html());
                    $("#editOrdCategory").val($(this).closest("tbody tr").find("td:eq(2)").html());
                    $("#editOrdAuthors").val($(this).closest("tbody tr").find("td:eq(3)").html());
                    $("#editOrdPerInv").val($(this).closest("tbody tr").find("td:eq(4)").html());
                    $("#editOrdDesc").val($(this).closest("tbody tr").find("td:eq(5)").html());
                    $("#editOrdSanction").val($(this).closest("tbody tr").find("td:eq(6)").html());
                    $("#editOrdDate").val($(this).closest("tbody tr").find("td:eq(7)").html());
                    if ($(this).closest("tbody tr").find("td:eq(8)").text() === "Active") {
                        $("#editOrdA").prop("checked", true).trigger('click');
                    } else 
                    {
                        $("#editOrdI").prop("checked", true).trigger('click');
                    }
                        });
                    });
        </script>