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
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="Search...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="#">BarangayIT V2</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
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
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Census Officer's Name Here</div>
                    <div class="email">Census Officer</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="index.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <!-- <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?php if ($currentPage==='CensusOfficerAddEditCitizen' ) {echo 'class="active"';} ?>>
                        <a href="CensusOfficerAddEditCitizen.php">
                            <i class="material-icons">people</i>
                            <span>Census Navigation</span>
                        </a>
                    </li>

                     <li <?php if ($currentPage==='CensusOfficerViewExpCitizen' ) {echo 'class="active"';} ?>>
                        <a href="CensusOfficerViewCitizen.php">
                            <i class="material-icons">settings_applications</i>
                            <span>Census Officer View</span>
                        </a>
                    </li>
                   
                </ul>
            </div> -->
             <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                                        
                    <li <?php if ($currentPage==='CensusOfficerAddEditCitizen' | $currentPage==='CensusOfficerViewExpCitizen') {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Citizens</span>
                        </a>
                        <ul class="ml-menu">
                            <li  <?php if ($currentPage==='CensusOfficerViewExpCitizen') {echo 'class="active"';} ?>>
                                <a href="CensusOfficerViewExpCitizen.php">View/Export</a>
                            </li>
                            <li  <?php if ($currentPage==='CensusOfficerAddEditCitizen') {echo 'class="active"';} ?>>
                                 <a href="CensusOfficerAddEditCitizen.php">Add/Edit</a>
                            </li>
                        </ul>
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