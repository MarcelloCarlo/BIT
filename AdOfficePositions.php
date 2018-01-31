<?php $title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'AdOfficePositions';?>
<?php include('head.php'); ?>
<?php include('AdminNavbar.php'); ?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>POSITIONS</h2>
            </div>
 <!--CUSTOM BLOCK INSERT HERE-->
            <!--CUSTOM BLOCK INSERT HERE-->
            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List Of Positions
                            </h2>
                        </div>
                        <div class="col-sm-12">
                            <br/>
                            <button type="button" class="btn bg-indigo waves-effect">
                                <i class="material-icons">add_circle_outline</i>
                                <span>ADD NEW</span>
                            </button>
                        </div>

                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Position</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td>Captain</td>
                                        <td>Lead</td>
                                        <td>Active</td>
                                        <td>
                                            <button type="button" class="btn btn-success waves-effect">
                                                        <i class="material-icons">mode_edit</i>
                                                        <span>EDIT</span>
                                                    </button>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Chairman</td>
                                        <td>Lorem</td>
                                        <td>Active</td>
                                        <td>
                                            <button type="button" class="btn btn-success waves-effect">
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
            <!-- #END# Hover Rows -->

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
                            <div class="row clearfix margin-0">
                                <h3 class="card-inside-title">Description</h3>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Description</label>
                                    </div>
                                </div>

                                <h2 class="card-inside-title">Status</h2>
                                <div class="demo-switch">
                                    <div class="switch">
                                        <label>Inactive<input type="checkbox" checked><span class="lever switch-col-orange"></span>Active</label>
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
                                <small>Add Position Fields</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix margin-0">
                                <h3 class="card-inside-title">Position Name</h3>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Position Name</label>
                                    </div>
                                </div>
                                <h3 class="card-inside-title">Description(Optional)</h3>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Description(Optional)</label>
                                    </div>
                                </div>

                                <h2 class="card-inside-title">Status</h2>
                                <div class="demo-switch">
                                    <div class="switch">
                                        <label>Inactive<input type="checkbox" checked><span class="lever switch-col-orange"></span>Active</label>
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
<?php include('footer.php'); ?>