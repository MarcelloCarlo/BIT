<?php
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $currentPage = 'Level0CategoryProjectMonitoring';
    $user = 0;
    include_once('LoginCheck.php');
    include('head.php');
    include('Level0_Navbar.php');
?>
<section class="content">
    <div class="container-fluid">

        <!--CUSTOM BLOCK INSERT HERE-->
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            LIST OF PROJECT CATEGORIES
                            <small>The current list of project categories of the Barangay. Click "Add New" to add a category or "Edit" to modify on the existing category</small>
                        </h2>
                        <br/>
                        <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addOrdiCatModal">
                            <i class="material-icons">add_circle_outline</i>
                            <span>ADD NEW</span>
                        </button>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th class="hide">ProjectCategoryID</th>
                                        <th>Name</th>
                                        <th style="width: 15px; ">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                    include_once('dbconn.php');

                                    $ProjectCatSQL = "SELECT * FROM bitdb_r_projectcategory";
                                    $ProjectCatQuery = mysqli_query($bitMysqli,$ProjectCatSQL) or die(mysqli_error($bitMysqli));
                                    if (mysqli_num_rows($ProjectCatQuery) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($ProjectCatQuery))
                                                {
                                                    $ID = $row['ProjectCategoryID'];
                                                    $Title = $row['ProjectCategory'];

                                                    echo
                                                    '<tr>
                                                        <td class="hide">'.$ID.'</td>
                                                        <td>'.$Title.'</td>
                                                        <td>
                                                            <button type="button" class="btn btn-success waves-effect editProjCat" data-toggle="modal" data-target="#editProjCatModal">
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
        <form id="addCategoryProj" action="Level0_AddProjectCategory.php" method="POST">
        <div class="modal fade" id="addOrdiCatModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Add Project Category
                            <br/>
                        </h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix margin-0">

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="ProjectCategoryName" class="form-control" />
                                    <label class="form-label">Project Category Name</label>
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
        <form id="editCategoryProj" action="Level0_EditProjectCategory.php" method="POST">
        <div class="modal fade" id="editProjCatModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Edit Project Category
                            <br/>

                        </h2>
                    </div>
                    <div class="modal-body hide">
                        <div class="row clearfix margin-0 hide">
                            <h4 class="card-inside-title hide">Project ID</h4>
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="editProjID" type="text" name="ProjID" class="form-control hide" />
                                   <!--  <label class="form-label hide">Ordinance ID</label> -->
                                </div>
                            </div>

                        </div>
                        <br/>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix margin-0">
                            <label class="form-label">Project Category Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editProjName" type="text" name="ProjectCategoryName" class="form-control" />

                                </div>
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
        <?php include('footer.php'); ?>

        <script type="text/javascript">
    $(document).ready(function()
    {
        $(".editProjCat").click(function()
        {
            $("#editProjID").val($(this).closest("tbody tr").find("td:eq(0)").html());
            $("#editProjName").val($(this).closest("tbody tr").find("td:eq(1)").html());

        });
    });

</script>
