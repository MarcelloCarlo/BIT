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
                                            <th>Ordinance ID</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Authors</th>
                                            <th>Description</th>
                                            <th>Date of Implementation</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>Ordinance ID</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Authors</th>
                                            <th>Description</th>
                                            <th>Date of Implementation</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                    </tfoot>
                                    <tbody>
                                            <?php
                                            include_once('dbconn.php');

                                            $OrdinanceSQL = "SELECT 
                                                                    bitdb_r_ordinance.OrdinanceID,
                                                                    bitdb_r_ordinance.OrdinanceTitle,
                                                                    bitdb_r_ordinance.CategoryID,
                                                                    bitdb_r_ordinance.Author,
                                                                    IFNULL(bitdb_r_ordinance.Persons_Involved,'') AS Persons_Involved,
                                                                    bitdb_r_ordinance.OrdDesc,
                                                                    bitdb_r_ordinance.DateImplemented,
                                                                    bitdb_r_ordinance.OrdStatus,
                                                                    bitdb_r_ordinance.Sanction
                                                    
                                                                FROM
                                                                    bitdb_r_ordinance
                                                                ";
                                            $OrdinanceQuery = mysqli_query($bitMysqli,$OrdinanceSQL) or die(mysqli_error($bitMysqli));
                                                if (mysqli_num_rows($OrdinanceQuery) > 0)
                                                {
                                                    while($row = mysqli_fetch_assoc($OrdinanceQuery))
                                                    {   
                                                        $OrdinanceID = $row['OrdinanceID'];
                                                        $OrdinanceTitle = $row['OrdinanceTitle'];
                                                        $CategoryID = $row['CategoryID'];
                                                        $Author = $row['Author'];
                                                        $Persons_Involved = $row['Persons_Involved'];
                                                        $OrdDesc = $row['OrdDesc'];
                                                        $DateImplemented = $row['DateImplemented'];
                                                        $OrdStatus = $row['OrdStatus'];
                                                        $Sanction = $row['Sanction'];

                                                        echo
                                                        '<tr>
                                                            <td class="hide">'.$OrdinanceID.'</td>
                                                            <td>'.$OrdinanceTitle.'</td>
                                                            <td>'.$CategoryID.'</td>
                                                            <td>'.$Author.'</td>
                                                            <td>'.$Persons_Involved.'</td>
                                                            <td>'.$OrdDesc.'</td>
                                                            <td>'.$DateImplemented.'</td>
                                                            <td>'.$OrdStatus.'</td>
                                                            <td>'.$Sanction.'</td>
                                                            
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
<form id="Level1EditOrdinance" action="Level1EditOrdinance.php" Method="POST">
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
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Title</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Category</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Sample Category</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Authors</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Authors</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Description</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Description</label>
                                    </div>
                                <h4 class="card-inside-title">Date</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="data-target" class="form-control" />
                                        <label class="form-label">Date</label>
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
                            <button type="button" class="btn btn-link waves-effect">ADD</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
        </div>
    </div>
</form>

</section>


