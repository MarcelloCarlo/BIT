<body class="theme-orange">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-orange">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Loading...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
 <!--REMOVED Search    <div class="search-bar">
       <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="Search...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>-->
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="#">BarangayIT v2</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true">  
                    <!--  <i class="material-icons">search</i> --> </a></li> 
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <!--<span class="label-count">7</span>-->
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>

                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                </ul>
            </div>
        </div>
    </nav>


    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/femaleuser.jpg" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Name here ng Secretary</div>
                    <div class="email">Secretary</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="sign-in.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?php if ($currentPage==='indexLevel1' ) {echo 'class="active"';} ?>>
                            <a href="indexLevel1.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    
                    <li <?php if ($currentPage==='Level1ViewExpCitizen' | $currentPage==='Level1AddEditCitizen') {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Citizens</span>
                        </a>
                        <ul class="ml-menu">
                            <li  <?php if ($currentPage==='Level1ViewExpCitizen') {echo 'class="active"';} ?>>
                                <a href="Level1ViewExpCitizen.php">View/Export</a>
                            </li>
                            <li  <?php if ($currentPage==='Level1AddEditCitizen') {echo 'class="active"';} ?>>
                                 <a href="Level1AddEditCitizen.php">Add/Edit</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php if ($currentPage==='Level1ViewExpBusinesses' | $currentPage==='Level1AddEditBusinesses') {echo 'class="active"';} ?>>
                         <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">business</i>
                            <span>Businesses</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if ($currentPage==='Level1ViewExpBusinesses') {echo 'class="active"';} ?>>
                                <a href="Level1ViewExpBusinesses.php">View/Export</a>
                            </li>
                            <li <?php if ($currentPage==='Level1AddEditBusinesses') {echo 'class="active"';} ?>>
                                <a href="Level1AddEditBusinesses.php">Add/Edit</a>
                            </li>
                        </ul>
                       <!-- <a href="businesses.html">
                            <i class="material-icons">business</i>
                            <span>Businesses</span>
                        </a>-->

                    </li>

                    <li <?php if ($currentPage==='Level1IssuanceBarangayCert' | $currentPage==='Level1IssuancePermit' | $currentPage==='Level1IssuanceBarangayClearance' | $currentPage==='Level1IssuancePolice' | $currentPage==='Level1IssuanceBarangayId') {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">featured_play_list</i>
                            <span>Issuance</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if ($currentPage==='Level1IssuanceBarangayId') {echo 'class="active"';} ?>>
                                <a href="Level1IssuanceBarangayId.php">Barangay ID</a>
                            </li>
                            <li <?php if ($currentPage==='Level1IssuanceBarangayCert') {echo 'class="active"';} ?>>
                                <a href="Level1IssuanceBarangayCert.php">Barangay Certificate</a>
                            </li>
                            <li <?php if ($currentPage==='Level1IssuanceBarangayClearance') {echo 'class="active"';} ?>>
                                <a href="Level1IssuanceBarangayClearance.php">Barangay Clearance</a>
                            </li>
                            <li <?php if ($currentPage==='Level1IssuancePermit') {echo 'class="active"';} ?>>
                                <a href="Level1IssuancePermit.php">Business Permit </a>
                            </li>
                            <li <?php if ($currentPage==='Level1IssuancePolice') {echo 'class="active"';} ?>>
                                <a href="Level1IssuancePolice.php">Police Clearance</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">report_problem</i>
                            <span>Blotter</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="AddBlotter.html">View Blotter</a>
                            </li>
                            <li>
                                <a href="BlotterList.html">Add/Edit</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                       <a href="ordinances.html">
                            <i class="material-icons">gavel</i>
                            <span>Patawag</span></a>
                    </li>
                       <!-- </a>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">gavel</i>
                            <span>Patawag</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/maps/google.html">Google Map</a>
                            </li>
                            <li>
                                <a href="pages/maps/yandex.html">YandexMap</a>
                            </li>
                            <li>
                                <a href="pages/maps/jvectormap.html">jVectorMap</a>
                            </li>
                        </ul> -->
                    

                    <li<?php if ($currentPage==='Level1ViewExpOrdinances' | $currentPage==='Level1AddEditOrdinance') {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Ordinances</span>
                        </a>
                        <ul class="ml-menu">
                            <li  <?php if ($currentPage==='Level1ViewExpOrdinances') {echo 'class="active"';} ?>>
                                <a href="Level1ViewExpOrdinances.php">View/Export</a>
                            </li>
                            <li  <?php if ($currentPage==='Level1AddEditOrdinance') {echo 'class="active"';} ?>>
                                 <a href="Level1AddEditOrdinance.php">Add/Edit</a>
                            </li>
                        </ul>
                        <!--<a href="ordinances.html">
                            <i class="material-icons">assignment</i>
                            <span>Ordinances</span>
                        </a>-->
                    </li>
                                       
                    <li>
                        <a href="javascript:void(0);" > <!--class="menu-toggle"-->
                            <i class="material-icons">assessment</i>
                            <span>Project Monitoring</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
    </section>