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

 <!-- Contextual Classes With Linked Items -->
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BARANGAY SITE CONFIGURATION
                                <small>List of currently stored Barangay information. Click "Update" below the list to modify</small>
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

            <!-- Input -->
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
                                    <!-- File Upload | Drag & Drop OR With Click & Choose -->
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
                                    <!-- File Upload | Drag & Drop OR With Click & Choose -->
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
                                    <button type="button" class="btn btn-warning waves-effect">UPDATE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  <!-- #END# Input -->
    
   
<?php include('footer.php'); ?>










        
