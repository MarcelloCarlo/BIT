<body class="theme-teal">
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

                      <!-- sign out na here newnewnewnew!! -->

                  <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">keyboard_arrow_down</i>
                            <!--<span class="label-count">7</span>-->
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Profile</li>

                            <li class="footer">
                                <a href="SignOutSession.php" >
                                    <iz class="material-icons">input</iz>
                                Sign Out
                                </a>
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
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <?php
                        include('dbconn.php');
                        $ID = $_SESSION['Logged_In'];


                        $UserInfoSQL = 'SELECT bitdb_r_citizen.Salutation,
                                                bitdb_r_citizen.First_Name,
                                                IFNULL(bitdb_r_citizen.Middle_Name,"") AS Middle_Name,
                                                bitdb_r_citizen.Last_Name,
                                                IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Ext,
                                                bitdb_r_barangayposition.PosName
                                        FROM bitdb_r_barangayofficial
                                        INNER JOIN bitdb_r_citizen
                                        ON bitdb_r_barangayofficial.CitizenID = bitdb_r_citizen.Citizen_ID
                                        INNER JOIN bitdb_r_barangayposition
                                        ON bitdb_r_barangayofficial.PosID = bitdb_r_barangayposition.PosID
                                        WHERE bitdb_r_barangayofficial.Brgy_Official_ID = '.$ID.'';
                        $UserInfoSQLQuery = mysqli_query($bitMysqli,$UserInfoSQL) or die (mysqli_error($bitMysqli));
                        if(mysqli_num_rows($UserInfoSQLQuery) > 0)
                        {
                            while($row = mysqli_fetch_assoc($UserInfoSQLQuery))
                            {
                                $WName = ''.$row['Salutation'].' '.$row['First_Name'].' '.$row['Middle_Name'].' '.$row['Last_Name'].' '.$row['Name_Ext'].'';
                                $Pos = $row['PosName'];
                                echo '<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$WName.'</div>
                                        <div class="email">'.$Pos.'</div>';
                            }
                        }
                    ?>                
                    
                    <!-- <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="SignOutSession.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?php if ($currentPage==='indexAdmin' ) {echo 'class="active"';} ?>>
                        <a href="indexAdmin.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">
                            <i class="material-icons">settings_applications</i>
                            <span>Site Configuration</span>
                        </a>
                    </li>
                    <li <?php if ($currentPage==='AdOfficePositions' ) {echo 'class="active"';} ?>>
                        <a href="AdOfficePositions.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">
                            <i class="material-icons">view_module</i>
                            <span>Positions</span>
                        </a>
                    </li>
                    <li <?php if ($currentPage==='AdOfficials' ) {echo 'class="active"';} ?>>
                        <a href="AdOfficials.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">
                            <i class="material-icons">people_outline</i>
                            <span>Officials</span>
                        </a>
                    </li>
                    <li <?php if ($currentPage==='AdCitizens' ) {echo 'class="active"';} ?>>
                        <a href="AdCitizens.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">
                            <i class="material-icons">people</i>
                            <span>Citizens</span>
                        </a>

                    </li>
                    <li <?php if ($currentPage==='AdUsers' ) {echo 'class="active"';} ?>>
                        <a href="AdUsers.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">
                            <i class="material-icons">account_circle</i>
                            <span>User Authorities</span>
                        </a>
                    </li>
                    <li <?php if ($currentPage==='AdCategoryOrdinance' ) {echo 'class="active"';} ?>>

                        <a href="AdCategoryOrdinance.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">
                            <i class="material-icons">assignment</i>
                            <span>Ordinance Category</span>
                        </a>
                    </li>
                    <li <?php if ($currentPage==='AdCategoryBusiness' ) {echo 'class="active"';} ?>>

                        <a href="AdCategoryBusiness.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">
                            <i class="material-icons">business</i>
                            <span>Business Category</span>
                        </a>
                    </li>

                    <li <?php if ($currentPage==='AdCategoryIssuance' ) {echo 'class="active"';} ?>>

                        <a href="AdCategoryIssuance.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">
                            <i class="material-icons">featured_play_list</i>
                            <span>Issuance Category</span>
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