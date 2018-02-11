<?php 
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $currentPage = 'AdCategoryOrdinance';
    include('head.php');
    include('AdminNavbar.php'); 
?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ORDINANCE CATEGORY</h2>
            </div>
            <!--CUSTOM BLOCK INSERT HERE-->
           <!-- Basic Examples -->
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LIST OF ORDINANCE CATEGORIES
                                <small>The current list of ordinance categories of the Barangay. Click "Add New" to add a category or "Edit" to modify on the existing category</small>
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
                                            <th>Title</th>
                                            <th class="hide"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>

                                
                                        <td>N1</td>
                                        <td>
                                            <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#editOrdiCatModal">
                                                        <i class="material-icons">mode_edit</i>
                                                        <span>EDIT</span>
                                                    </button>
                                        </td>

                                    </tr>
                                    <tr>
                                    
                                        <td>OR1</td>
                                        <td>
                                            <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#editOrdiCatModal">
                                                            <i class="material-icons">mode_edit</i>
                                                            <span>EDIT</span>
                                                        </button>
                                        </td>
                                    </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit
                                <small>Modify Fields</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <h3 class="card-inside-title">Title</h3>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Title</label>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <button type="button" class="btn btn-success waves-effect">UPDATE</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add
                                <small>Add Ordinance Title</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <h3 class="card-inside-title">Ordinance Title</h3>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Ordinance Title</label>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <button type="button" class="btn bg-indigo waves-effect">ADD</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Input -->



          <div class="modal fade" id="addOrdiCatModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                Add
                                <br/>
                                <small>Add Ordinance</small>
                            </h2>
                        </div>
                        <div class="modal-body">
                           <div class="row clearfix margin-0">
                                <h4 class="card-inside-title">Ordinance Title</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Ordinance Title</label>
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

 <div class="modal fade" id="editOrdiCatModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                Edit
                                <br/>
                                <small>Edit Ordinance</small>
                            </h2>
                        </div>
                        <div class="modal-body">
                           <div class="row clearfix margin-0">
                                <h4 class="card-inside-title">Ordinance Title</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Ordinance Title</label>
                                    </div>
                                </div>

                            </div>
                            <br/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">UPDATE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>

<?php include('footer.php'); ?>