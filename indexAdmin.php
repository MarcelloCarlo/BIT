<?php $title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'indexAdmin';?>
<?php include('head.php'); ?>
<?php include('AdminNavbar.php'); ?>

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
                                <h4 class="list-group-item-heading">City/Municipal Seal</h4>
                                <p class="list-group-item-text">
                                    (Not Set)
                                </p>
                            </a>
                            <a href="javascript:void(0);" class="list-group-item">
                                <h4 class="list-group-item-heading">Barangay Seal</h4>
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

        <!-- Colorful Panel Items With Icon -->


        <div class="body">
            <div class="row clearfix">
                <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                    <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">


                        <div class="panel btn-success">
                            <div class="panel-heading" role="tab" id="headingThree_17">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseThree_17" aria-expanded="false" aria-controls="collapseThree_17">
                                                        <i class="material-icons">mode_edit</i>Update
                                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree_17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_17">

                                <!-- Basic Validation -->
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <div class="header">
                                                <h2>Update Barangay Information<small>Fill out required fields and click "UPDATE" button to update the Barangay Information.</small></h2>
                                            </div>
                                            <div class="body js-sweetalert">
                                                <form id="form_validation" method="POST">
                                                    <div class="form-group form-float">
                                                        <h3 class="card-inside-title">Barangay Name</h3>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="name" required>
                                                            <label class="form-label">Barangay Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <h3 class="card-inside-title">City/Municipal Name</h3>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="surname" required>
                                                            <label class="form-label">City/Municipal Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <h3 class="card-inside-title">Province Name</h3>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="email" required>
                                                            <label class="form-label">Province Name</label>
                                                        </div>
                                                    </div>
                                                    <h3 class="card-inside-title">City or Municipality?</h3>
                                                    <div class="form-group">
                                                        <input type="radio" name="group1" id="optCity" class="with-gap">
                                                        <label for="optCity">City</label>

                                                        <input type="radio" name="group1" id="optMunicipal" class="with-gap">
                                                        <label for="optMunicipal" class="m-l-20">Municipality</label>
                                                    </div>
                                                    <h3 class="card-inside-title">Independent or Component?</h3>
                                                    <div class="form-group">
                                                        <input type="radio" name="group2" id="optIndependent" class="with-gap">
                                                        <label for="optIndependent">Independent</label>

                                                        <input type="radio" name="group2" id="optComponent" class="with-gap">
                                                        <label for="optComponent" class="m-l-20">Component</label>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <h3 class="card-inside-title">Signatory (Barangay Chairman)</h3>
                                                        <div class="form-line">
                                                            <input name="description" cols="30" rows="5" class="form-control no-resize" required/>
                                                            <label class="form-label">Signatory (Barangay Chairman)</label>
                                                        </div>
                                                    </div>

                                                    <!-- File Upload | Drag & Drop OR With Click & Choose -->
                                                    <h3 class="card-inside-title">
                                                        Barangay Seal
                                                    </h3>
                                                    <div class="dz-message form-group form-float">

                                                        <div class="drag-icon-cph">
                                                            <i class="material-icons">touch_app</i>
                                                        </div>
                                                        <em>Barangay Seal Image File</em>
                                                        <div class="fallback">
                                                            <input name="file" type="file" multiple required />
                                                        </div>
                                                    </div>


                                                    <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->

                                                    <!-- File Upload | Drag & Drop OR With Click & Choose -->
                                                    <h3 class="card-inside-title">
                                                        Municipal Seal
                                                    </h3>
                                                    <div class="dz-message form-group form-float">

                                                        <div class="drag-icon-cph">
                                                            <i class="material-icons">touch_app</i>
                                                        </div>
                                                        <em>Municipal Seal Image File</em>
                                                        <div class="fallback">
                                                            <input name="file" type="file" multiple required />
                                                        </div>
                                                    </div>


                                                    <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->

                                                    <button class="btn btn-success waves-effect" data-type="confirm" type="submit">UPDATE</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- #END# Basic Validation -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- #END# Colorful Panel Items With Icon -->

        <?php include('footer.php'); ?>
