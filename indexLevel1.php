<<<<<<< HEAD
<?php 
	$title = 'Welcome | BarangayIT MK.II';
	$currentPage = 'indexLevel1';
	include('head.php'); 
	include('Level1Navbar.php'); 
	include('dbconn.php');
?>
=======
<?php $title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'indexLevel1';?>
<?php include('head.php'); ?>
<?php include('Level1Navbar.php'); ?>
>>>>>>> c6b28a28f7ce92b177ac24e9b2322df096fae32b

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
 <!--CUSTOM BLOCK INSERT HERE-->
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>Businesses Information</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">View</a></li>
                                        <li><a href="javascript:void(0);">Edit</a></li>
                                        <li><a href="javascript:void(0);">More</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Business Name</th>
                                            <th>Status</th>
                                            <th>Manager</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Sari Sari Store</td>
                                            <td><span class="label bg-green">Doing</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Food Stall</td>
                                            <td><span class="label bg-blue">To Do</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Computer Shop</td>
                                            <td><span class="label bg-light-blue">On Hold</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Cafe</td>
                                            <td><span class="label bg-orange">Wait Approvel</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Meat Shop</td>
                                            <td>
                                                <span class="label bg-red">Suspended</span>
                                            </td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-red" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->

                  <!-- Visitors -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-pink">
                            <div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
                                 data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
                                 data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                                 data-fill-Color="rgba(0, 188, 212, 0)">
                                <small> Recent Blotters </small>
                            </div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    TODAY
                                    <span class="pull-right"><b>1 200</b> <small>USERS</small></span>
                                </li>
                                <li>
                                    YESTERDAY
                                    <span class="pull-right"><b>3 872</b> <small>USERS</small></span>
                                </li>
                                <li>
                                    LAST WEEK
                                    <span class="pull-right"><b>26 582</b> <small>USERS</small></span>
                                </li>

                                <li>
                                    LAST WEEK
                                    <span class="pull-right"><b>26 582</b> <small>USERS</small></span>
                                </li>

                                <li>
                                    LAST WEEK
                                    <span class="pull-right"><b>26 582</b> <small>USERS</small></span>
                                </li>

                                 <li>
                                    LAST WEEK
                                    <span class="pull-right"><b>26 582</b> <small>USERS</small></span>
                                </li>

                                 <li>
                                    LAST WEEK
                                    <span class="pull-right"><b>26 582</b> <small>USERS</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Visitors -->

 <!-- Contextual Classes With Linked Items -->
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Barangay Information
                                <small>The complete details of the barangay.</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="list-group">
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">City/Municipality</h4>
                                    <p class="list-group-item-text">
                                        (None)
                                    </p>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">Independent/Component</h4>
                                    <p class="list-group-item-text">
                                       (None)
                                    </p>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">Province Name</h4>
                                    <p class="list-group-item-text">
                                       (Not Set)
                                    </p>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">City/Municipality Name</h4>
                                    <p class="list-group-item-text">
                                       (Not Set)
                                    </p>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">Barangay Name</h4>
                                    <p class="list-group-item-text">
                                       (Not Set)
                                    </p>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">Signatory (Barangay Chairman)</h4>
                                    <p class="list-group-item-text">
                                       (Not Set)
                                    </p>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">City/Municipal Seal</h4></h4>
                                    <p class="list-group-item-text">
                                       (Not Set)
                                    </p>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">Barangay Seal</h4></h4>
                                    <p class="list-group-item-text">
                                       (Not Set)
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Contextual Classes With Linked Items -->

<!-- Input --
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Main Dashboard
                                <small>Barangay Information Fields</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix margin-0">
                                <h3 class="card-inside-title">City or Municipality?</h3>
                                <div class="demo-radio-button">
                                    <input name="group1" type="radio" id="radio_1" checked />
                                    <label for="radio_1">City</label>
                                    <input name="group1" type="radio" id="radio_2" />
                                    <label for="radio_2">Municipality</label>
                                </div>
                                <h3 class="card-inside-title">Independent or Component?</h3>
                                <div class="demo-radio-button">
                                    <input name="group2" type="radio" id="radio_3" checked />
                                    <label for="radio_3">Independent</label>
                                    <input name="group2" type="radio" id="radio_4" />
                                    <label for="radio_4">Component</label>
                                </div>

                                <h3 class="card-inside-title">Province Name</h3>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Province Name</label>
                                    </div>
                                </div>
                                <h3 class="card-inside-title">City/Municipality Name</h3>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">City/Municipality Name</label>
                                    </div>
                                </div>
                                <h3 class="card-inside-title">Barangay Name</h3>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Barangay Name</label>
                                    </div>
                                </div>
                                <h3 class="card-inside-title">Signatory (Barangay Chairman)</h3>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" />
                                        <label class="form-label">Signatory (Barangay Chairman)</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
 <!-- File Upload | Drag & Drop OR With Click & Choose --
                                    <div class="header">
                                        <h3>
                                            City/Municipal Seal
                                        </h3>
                                    </div>
                                    <div class="body">
                                        <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                            <div class="dz-message">
                                                <div class="drag-icon-cph">
                                                    <i class="material-icons">touch_app</i>
                                                </div>
                                                <h4>Drop files here or click to upload.</h4>
                                                <em>City/Municipal Seal Image File</em>
                                            </div>
                                            <div class="fallback">
                                                <input name="file" type="file" multiple />
                                            </div>
                                        </form>
                                    </div>
 <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
                                    <!-- File Upload | Drag & Drop OR With Click & Choose --
                                    <div class="header">
                                        <h3>
                                            Barangay Seal
                                        </h3>
                                    </div>
                                    <div class="body">
                                        <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                            <div class="dz-message">
                                                <div class="drag-icon-cph">
                                                    <i class="material-icons">touch_app</i>
                                                </div>
                                                <h4>Drop files here or click to upload.</h4>
                                                <em>Barangay Seal Image File</em>
                                            </div>
                                            <div class="fallback">
                                                <input name="file" type="file" multiple />
                                            </div>
                                        </form>
                                    </div>
                                    <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
<!-- <! <button type="button" class="btn btn-warning waves-effect">UPDATE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  <!-- #END# Input -->

    </section>
    
   
<?php include('footer.php'); ?>










        
