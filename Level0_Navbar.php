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
                            <li class="header">Settings</li>
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
                        
                        if($_SESSION['Logged_In'] != 0)
                        {
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
                                            WHERE bitdb_r_barangayofficial.Brgy_Official_ID = '.$_SESSION['Logged_In'].'';
                            $UserInfoQuery = mysqli_query($bitMysqli,$UserInfoSQL) or die (mysqli_error($bitMysqli));
                            if(mysqli_num_rows($UserInfoQuery) > 0)
                            {
                                while($row = mysqli_fetch_assoc($UserInfoQuery))
                                {
                                    $WName = ''.$row['Salutation'].' '.$row['First_Name'].' '.$row['Middle_Name'].' '.$row['Last_Name'].' '.$row['Name_Ext'].'';
                                    $Pos = $row['PosName'];
                                    echo '<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$WName.'</div>
                                            <div class="email">'.$Pos.'</div>';
                                }
                            } 
                        }
                        else 
                        {
                            $WName = "Admin";
                            $Pos = "System Admin";
                            echo '<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$WName.'</div>
                            <div class="email">'.$Pos.'</div>';

                        // $_SESSION['Logged_In'] = "0";
                        // if(!isset($_SESSION['AccountUserType'])){
                        //     $_SESSION['AccountUserType'] = "0";
                        // }
                        }
                    ?>                
                    
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <!-- SITE CONFIG -->
                    <li <?php if ($currentPage == 'indexLevel0') {echo 'class="active"';} ?>>
                        <a href="indexLevel0.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">
                            <i class="material-icons">settings_applications</i>
                            <span>Site Configuration</span>
                        </a>
                    </li>
                    <!-- POSITION -->
                    <li <?php if ($currentPage == 'Level0Positions') {echo 'class="active"';} ?>>
                        <a href="Level0Positions.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">
                            <i class="material-icons">view_module</i>
                            <span>Positions</span>
                        </a>
                    </li>
                      <!-- CATEGORY SETUP -->
                      <li <?php if ($currentPage == 'Level0CategoryOrdinance' | 
                                $currentPage == 'Level0CategoryBusiness' | 
                                $currentPage == 'Level0CategoryIssuance' | 
                                $currentPage == 'Level0BlotterSubjects' | 
                                $currentPage == 'Level0BarangayZones' | 
                                $currentPage == 'Level0CategoryProjectMonitoring') {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">playlist_add</i>
                            <span>Category Setup</span>
                        </a>
                        <ul class="ml-menu">
                            <!-- ORDINANCE CATEGORY SETUP -->
                            <li <?php if($currentPage == 'Level0CategoryOrdinance') {echo 'class="active"';}?>>
                                <a href="Level0CategoryOrdinance.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>"><i class="material-icons">assignment</i>
                            <span>Ordinance Category</span></a>
                            </li>
                            <!-- BUSINESS CATEGORY SETUP -->
                            <li <?php if($currentPage == 'Level0CategoryBusiness') {echo 'class="active"';}?>>
                                <a href="Level0CategoryBusiness.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>"><i class="material-icons">business</i>
                            <span>Business Category</span></a>
                            </li>
                            <!-- ISSUANCE CATEGORY SETUP -->
                            <li <?php if($currentPage == 'Level0CategoryIssuance') {echo 'class="active"';}?>>
                                <a href="Level0CategoryIssuance.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>"><i class="material-icons">featured_play_list</i>
                            <span>Issuance Category</span></a>
                            </li>
                            <!-- PROJECT CATEGORY SETUP -->
                            <!-- <li <?php if($currentPage == 'Level0CategoryProjectMonitoring') {echo 'class="active"';}?>>
                                <a href="Level0CategoryProjectMonitoring.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>"><i class="material-icons">assessment</i>
                            <span>Project Category</span></a>
                            </li> -->
                            <!-- BLOTTER SUBJECTS SETUP -->
                            <li <?php if($currentPage == 'Level0BlotterSubjects') {echo 'class="active"';}?>>
                                <a href="Level0BlotterSubjects.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>"><i class="material-icons">gavel</i>
                            <span>Blotter Subjects </span></a>
                            </li>
                            <!-- ZONE SETUP -->
                            <li <?php if($currentPage == 'Level0BarangayZones') {echo 'class="active"';}?>>
                                <a href="Level0BarangayZones.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>"><i class="material-icons">nature_people</i>
                            <span>Barangay Zones</span></a>
                            </li>

                            
                        </ul>
                    </li>
                    <!-- ADD OFFICIALS -->
                    <li <?php if ($currentPage == 'Level0Citizens' | 
                                $currentPage == 'Level0OfficialFromCitizens') 
                                    {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Add Officials</span>
                        </a>
                        <ul class="ml-menu">
                            <!-- NEW CITIZEN RECORD -->
                            <li <?php if($currentPage == 'Level0Citizens') {echo 'class="active"';}?>>
                                <a href="Level0Citizens.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>"><i class="material-icons">person_add</i>
                            <span>New Citizen Record</span></a>
                            </li>
                            <!-- FROM CITIZEN RECORD -->
                            <li <?php if($currentPage == 'Level0OfficialFromCitizens') {echo 'class="active"';}?>>
                                <a href="Level0OfficialFromCitizens.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>"><i class="material-icons">person</i>
                            <span>From Existing Record</span></a>
                            </li>
                            
                        </ul>
                    </li>
                    <!-- OFFICIAL -->
                    <li <?php if ($currentPage == 'Level0Officials' ) {echo 'class="active"';} ?>>
                        <a href="Level0Officials.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">
                            <i class="material-icons">people_outline</i>
                            <span>Officials</span>
                        </a>
                    </li>
                    <!-- USER AUTHORITIES -->
                    <li <?php if ($currentPage == 'Level0Users' ) {echo 'class="active"';} ?>>
                        <a href="Level0Users.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">
                            <i class="material-icons">account_circle</i>
                            <span>User Authorities</span>
                        </a>
                    </li>
                 </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <!-- <div class="legal">
                <div class="copyright">
                    &copy; 2018 <a href="#">Barangay IT</a>
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div> -->
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
    </section>