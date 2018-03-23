<?php
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $currentPage = 'Level1AddEditProjects';
    include('headblock.php');
 ?>
 <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Offline Google Fonts -->
    <link href="css/materialIcons.css" rel="stylesheet" type="text/css" />
    <link href="css/robotoFont.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

</head>
<?php include('Level1Navbar.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>PROJECTS</h2>
        </div

        <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PROJECTS
                                <small>List of Projects of the Barangay</small>
                            </h2>
                        </div>
                        <div class="body">

                                          <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                                        <li role="presentation" class="active"><a href="#projects" data-toggle="tab">PROJECTS</a></li>
                                                        <li role="presentation"><a href="#activities" data-toggle="tab">ACTIVITY</a></li>
                                                        <li role="presentation"><a href="#donations" data-toggle="tab">DONATIONS</a></li>
                                        </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="projects">
                                  <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addProjectModal">
                                      <i class="material-icons">add_circle_outline</i>
                                      <span>ADD NEW</span>
                                  </button>

                                  <div class="table-responsive">
                                      <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                          <thead>
                                              <tr>
                                                  <th class="hide">Project ID</th>
                                                  <th>Project Name</th>
                                                  <th class="hide">Project CategoryID</th>
                                                  <th>Category</th>
                                                  <th class="hide">Project Location ID</th>
                                                  <th>Project Location</th>
                                                  <th>Description</th>
                                                  <th>Initial Budget</th>
                                                  <th>Status</th>
                                                  <th>Actions</th>
                                              </tr>
                                          </thead>
                                          <tfoot>
                                              <tr>
                                                  <th class="hide">Project ID</th>
                                                  <th>Project Name</th>
                                                  <th class="hide">Project CategoryID</th>
                                                  <th>Category</th>
                                                  <th class="hide">Project Location ID</th>
                                                  <th>Project Location</th>
                                                  <th>Description</th>
                                                  <th>Initial Budget</th>
                                                  <th>Status</th>
                                                  <th>Actions</th>
                                              </tr>
                                          </tfoot>
                                          <tbody>
                                              <?php
                                                  include('dbconn.php');

                                                  $Level1ProjectAddSQL = 'SELECT
                                                                              bitdb_r_project.ProjectID,
                                                                              bitdb_r_project.ProjectName,
                                                                              bitdb_r_barangayzone.ZoneID,
                                                                              bitdb_r_barangayzone.Zone,
                                                                              bitdb_r_projectcategory.ProjectCategoryID,
                                                                              bitdb_r_projectcategory.ProjectCategory,
                                                                              bitdb_r_project.ProjectDesc,
                                                                              bitdb_r_project.ProjectStatus,
                                                                              bitdb_r_project.ProjectBudget
                                                                      FROM    bitdb_r_project
                                                                      INNER JOIN bitdb_r_projectcategory
                                                                      ON bitdb_r_projectcategory.ProjectCategoryID = bitdb_r_project.ProjectCategory
                                                                      INNER JOIN bitdb_r_barangayzone
                                                                      ON bitdb_r_barangayzone.ZoneID = bitdb_r_project.ProjectLocation';
                                                  $Level1ProjectAddQuery = mysqli_query($bitMysqli,$Level1ProjectAddSQL) or die (mysqli_error($bitMysqli));
                                                  if (mysqli_num_rows($Level1ProjectAddQuery) > 0)
                                                  {
                                                      while($row = mysqli_fetch_assoc($Level1ProjectAddQuery))
                                                      {
                                                          $ProjectID = $row['ProjectID'];
                                                          $ProjectName = $row['ProjectName'];
                                                          $ProjectZoneID = $row['ZoneID'];
                                                          $ProjectZone = $row['Zone'];
                                                          $ProjectCategoryID = $row['ProjectCategoryID'];
                                                          $ProjectCategory = $row['ProjectCategory'];
                                                          $ProjectDesc = $row['ProjectDesc'];
                                                          $ProjectBudget = $row['ProjectBudget'];
                                                          if($row['ProjectStatus'] == 1)
                                                          {
                                                              $ProjectStatus = "Active";
                                                          }
                                                          else
                                                          {
                                                              $ProjectStatus = "Inactive";
                                                          }
                                                          echo'
                                                          <tr>
                                                              <td class="hide">'.$ProjectID.'</td>
                                                              <td>'.$ProjectName.'</td>
                                                              <td class="hide">'.$ProjectCategoryID.'</td>
                                                              <td>'.$ProjectCategory.'</td>
                                                              <td class="hide">'.$ProjectZoneID.'</td>
                                                              <td>'.$ProjectZone.'</td>
                                                              <td>'.$ProjectDesc.'</td>
                                                              <td>'.$ProjectBudget.'</td>
                                                              <td>'.$ProjectStatus.'</td>
                                                              <td>
                                                                  <button type="button" class="btn btn-success waves-effect editProject" data-toggle="modal" data-target="#editProjectModal">
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
                                <div role="tabpanel" class="tab-pane fade" id="activities">
                                  <br/>
                                      <label class="form-label">Project</label>
                                      <div class="form-group form-float">
                                              <select id="ProjectItem" class="form-control show-tick">
                                                  <?php
                                                      include_once('dbconn.php');

                                                      if(isset($_GET['Project']))
                                                      {
                                                          $ViewSql = "SELECT * FROM bitdb_r_project";
                                                          $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                                          if(mysqli_num_rows($ViewQuery) > 0)
                                                          {
                                                              while($row = mysqli_fetch_assoc($ViewQuery))
                                                              {
                                                                  if($row['ProjectID'] == $_GET['Project'])
                                                                  {
                                                                      $ID = $row['ProjectID'];
                                                                      $Name = $row['ProjectName'];
                                                                      echo '<option value="'.$ID.'" selected>'.$Name.'</option>';
                                                                  }
                                                                  else
                                                                  {
                                                                      $ID = $row['ProjectID'];
                                                                      $Name = $row['ProjectName'];
                                                                      echo '<option value="'.$ID.'">'.$Name.'</option>';
                                                                  }
                                                              }
                                                          }

                                                      }
                                                      else
                                                      {
                                                          $ViewSql = "SELECT * FROM bitdb_r_project";
                                                          $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                                          if(mysqli_num_rows($ViewQuery) > 0)
                                                          {
                                                              while($row = mysqli_fetch_assoc($ViewQuery))
                                                              {
                                                                  $ID = $row['ProjectID'];
                                                                  $Name = $row['ProjectName'];
                                                                  echo '<option value="'.$ID.'">'.$Name.'</option>';
                                                              }
                                                          }
                                                      }
                                                  ?>
                                              </select>
                                              <?php
                                                  include_once('dbconn.php');
                                                  if(isset($_GET['Project']))
                                                  {
                                                      $TotalBudgetSQL ='SELECT bitdb_r_project.ProjectID,
                                                                         bitdb_r_project.ProjectName,
                                                                         COALESCE(SUM(bitdb_r_projectdonation.MoneyDonated),0)+COALESCE(SUM(bitdb_r_project.ProjectBudget),0) AS TotalBudget,
                                                                         bitdb_r_project.ProjectBudget
                                                                  FROM   bitdb_r_project
                                                                  INNER JOIN bitdb_r_projectdonation
                                                                  ON     bitdb_r_project.ProjectID =bitdb_r_projectdonation.ProjectID
                                                                  WHERE bitdb_r_project.ProjectID='.$_GET['Project'].'';
                                                      $TotalBudgetQuery = mysqli_query($bitMysqli,$TotalBudgetSQL) or die (mysqli_error($bitMysqli));
                                                      if(mysqli_num_rows($TotalBudgetQuery) > 0)
                                                      {
                                                          while($row = mysqli_fetch_assoc($TotalBudgetQuery))
                                                          {
                                                              $ID = $row['ProjectID'];
                                                              $Name = $row['ProjectName'];
                                                              $TotalBudget = $row['TotalBudget'];
                                                              echo '<h4 class="header">Project: '.$Name.' Total Budget: PHP. '.$TotalBudget.'</h4>';
                                                          }

                                                      }
                                                  }
                                                  else
                                                  {
                                                      echo '<h4 class="header"> ---- Total Budget: PHP. ----  </h4>';
                                                  }

                                              ?>
                                      </div>
                                  <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addProjectActModal">
                                      <i class="material-icons">add_circle_outline</i>
                                      <span>ADD NEW</span>
                                      </button>
                                      <div class="table-responsive">
                                          <table class="table table-borderethd table-striped table-hover js-basic-example dataTable">
                                              <thead>
                                                  <tr>
                                                      <th class="hide">Project ID</th>
                                                      <th class="hide">Activity ID</th>
                                                      <th>Activity Name</th>
                                                      <th>Description</th>
                                                      <th>Budget (PHP)</th>
                                                      <th class="hide">PeopleInvolved ID</th>
                                                      <th>People Involved</th>
                                                      <th>Start Date</th>
                                                      <th>End Date</th>
                                                      <th>Status</th>
                                                      <th>Actions</th>
                                                  </tr>
                                              </thead>
                                              <tfoot>
                                                  <tr>
                                                     <th class="hide">Project ID</th>
                                                      <th class="hide">Activity ID</th>
                                                      <th>Activity Name</th>
                                                      <th>Description</th>
                                                      <th>Budget (PHP)</th>
                                                      <th class="hide">PeopleInvolved ID</th>
                                                      <th>People Involved</th>
                                                      <th>Start Date</th>
                                                      <th>End Date</th>
                                                      <th>Status</th>
                                                      <th>Actions</th>
                                                  </tr>
                                              </tfoot>
                                              <tbody>
                                                  <?php
                                                      include('dbconn.php');

                                                      if(isset($_GET['Project']))
                                                      {

                                                          $Level1ActivityViewSQL = 'SELECT
                                                                                  bitdb_r_projectactivity.ActivityID,
                                                                                  bitdb_r_projectactivity.ProjectID,
                                                                                  bitdb_r_projectactivity.ActivityName,
                                                                                  bitdb_r_projectactivity.ActivityDesc,
                                                                                  bitdb_r_projectactivity.ActivityBudget,
                                                                                  bitdb_r_projectactivity.PeopleInvolve,
                                                                                  bitdb_r_citizen.First_Name,
                                                                                  IFNULL(bitdb_r_citizen.Middle_Name,"") AS Middle_Name,
                                                                                  bitdb_r_citizen.Last_Name,
                                                                                  IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Ext,
                                                                                  bitdb_r_projectactivity.StartDate,
                                                                                  bitdb_r_projectactivity.FinishDate,
                                                                                  bitdb_r_projectactivity.ActivityStatus
                                                                              FROM    bitdb_r_projectactivity
                                                                              INNER JOIN bitdb_r_citizen
                                                                              ON bitdb_r_citizen.Citizen_ID = bitdb_r_projectactivity.PeopleInvolve
                                                                              WHERE bitdb_r_projectactivity.ProjectID='.$_GET['Project'].' ';
                                                          $Level1ActivityViewQuery = mysqli_query($bitMysqli,$Level1ActivityViewSQL) or die (mysqli_error($bitMysqli));
                                                      if (mysqli_num_rows($Level1ActivityViewQuery) > 0)
                                                      {
                                                          while($row = mysqli_fetch_assoc($Level1ActivityViewQuery))
                                                          {
                                                              $ActivityID = $row['ActivityID'];
                                                              $ProjectID = $row['ProjectID'];
                                                              $ActivityName = $row['ActivityName'];
                                                              $ActivityDesc = $row['ActivityDesc'];
                                                              $ActivityBudget = $row['ActivityBudget'];
                                                              $PeopleInvolve = $row['PeopleInvolve'];
                                                              $StartDate = $row['StartDate'];
                                                              $FinishDate = $row['FinishDate'];
                                                              if($row['ActivityStatus'] == 1)
                                                              {
                                                                  $ActivityStatus = "Active";
                                                              }
                                                              else
                                                              {
                                                                  $ActivityStatus = "Inactive";
                                                              }
                                                              $FullName = "".$row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name']." ".$row['Name_Ext']."";

                                                              echo'
                                                              <tr>
                                                                  <td class="hide">'.$ActivityID.'</td>
                                                                  <td class="hide">'.$ProjectID.'</td>
                                                                  <td>'.$ActivityName.'</td>
                                                                  <td>'.$ActivityDesc.'</td>
                                                                  <td>'.$ActivityBudget.'</td>
                                                                  <td class="hide">'.$PeopleInvolve.'</td>
                                                                  <td>'.$FullName.'</td>
                                                                  <td>'.$StartDate.'</td>
                                                                  <td>'.$FinishDate.'</td>
                                                                  <td>'.$ActivityStatus.'</td>
                                                                  <td>
                                                                      <button type="button" class="btn btn-success waves-effect editActivity" data-toggle="modal" data-target="#editActivityModal">
                                                                      <i class="material-icons">mode_edit</i>
                                                                      <span>EDIT</span></button>
                                                                  </td>
                                                              </tr>';
                                                          }
                                                      }
                                                      }
                                                      else
                                                      {
                                                          $Level1ActivityViewSQL = 'SELECT
                                                                                  bitdb_r_projectactivity.ActivityID,
                                                                                  bitdb_r_projectactivity.ProjectID,
                                                                                  bitdb_r_projectactivity.ActivityName,
                                                                                  bitdb_r_projectactivity.ActivityDesc,
                                                                                  bitdb_r_projectactivity.ActivityBudget,
                                                                                  bitdb_r_projectactivity.PeopleInvolve,
                                                                                  bitdb_r_citizen.First_Name,
                                                                                  IFNULL(bitdb_r_citizen.Middle_Name,"") AS Middle_Name,
                                                                                  bitdb_r_citizen.Last_Name,
                                                                                  IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Ext,
                                                                                  bitdb_r_projectactivity.StartDate,
                                                                                  bitdb_r_projectactivity.FinishDate,
                                                                                  bitdb_r_projectactivity.ActivityStatus
                                                                              FROM    bitdb_r_projectactivity
                                                                              INNER JOIN bitdb_r_citizen
                                                                              ON bitdb_r_citizen.Citizen_ID = bitdb_r_projectactivity.PeopleInvolve';
                                                          $Level1ActivityViewQuery = mysqli_query($bitMysqli,$Level1ActivityViewSQL) or die (mysqli_error($bitMysqli));
                                                      if (mysqli_num_rows($Level1ActivityViewQuery) > 0)
                                                      {
                                                          while($row = mysqli_fetch_assoc($Level1ActivityViewQuery))
                                                          {
                                                              $ActivityID = $row['ActivityID'];
                                                              $ProjectID = $row['ProjectID'];
                                                              $ActivityName = $row['ActivityName'];
                                                              $ActivityDesc = $row['ActivityDesc'];
                                                              $ActivityBudget = $row['ActivityBudget'];
                                                              $PeopleInvolve = $row['PeopleInvolve'];
                                                              $StartDate = $row['StartDate'];
                                                              $FinishDate = $row['FinishDate'];
                                                              if($row['ActivityStatus'] == 1)
                                                              {
                                                                  $ActivityStatus = "Active";
                                                              }
                                                              else
                                                              {
                                                                  $ActivityStatus = "Inactive";
                                                              }
                                                              $FullName = "".$row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name']." ".$row['Name_Ext']."";

                                                              echo'
                                                              <tr>
                                                                  <td class="hide">'.$ActivityID.'</td>
                                                                  <td class="hide">'.$ProjectID.'</td>
                                                                  <td>'.$ActivityName.'</td>
                                                                  <td>'.$ActivityDesc.'</td>
                                                                  <td>'.$ActivityBudget.'</td>
                                                                  <td class="hide">'.$PeopleInvolve.'</td>
                                                                  <td>'.$FullName.'</td>
                                                                  <td>'.$StartDate.'</td>
                                                                  <td>'.$FinishDate.'</td>
                                                                  <td>'.$ActivityStatus.'</td>
                                                                  <td>
                                                                      <button type="button" class="btn btn-success waves-effect editProject" data-toggle="modal" data-target="#editActivityModal">
                                                                      <i class="material-icons">mode_edit</i>
                                                                      <span>EDIT</span></button>
                                                                  </td>
                                                              </tr>';
                                                          }
                                                      }
                                                      }


                                                  ?><!--
                                                  <td class="hide">1</td>
                                                  <td class="hide">1</td>
                                                  <td>Pagpupukpok</td>
                                                  <td>Pagpukpok ng semento (if they can)</td>
                                                  <td>500000</td>
                                                  <td class="hide">1</td>
                                                  <td>My Lowell</td>
                                                  <td>03/23/2018</td>
                                                  <td>03/24/2018</td>
                                                  <td>1 day/s</td>
                                                  <td><button type="button" class="btn btn-success waves-effect editBlotter" data-toggle="modal" data-target="#editActivityModal">
                                                  <i class="material-icons">mode_edit</i>
                                                  <span>EDIT</span></button>
                                                  </td> -->
                                              </tbody>
                                          </table>
                                      </div>

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="donations">
                                  <label class="form-label">Project</label>
                                  <div class="form-group form-float">
                                          <select id="ProjectDonationItem" class="form-control show-tick">
                                              <option value="">-- Select Project --</option>
                                              <?php
                                                  include_once('dbconn.php');
                                                  if(isset($_GET['Project']))
                                                  {
                                                      $ViewSql = "SELECT * FROM bitdb_r_project";
                                                      $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                                      if(mysqli_num_rows($ViewQuery) > 0)
                                                      {
                                                          while($row = mysqli_fetch_assoc($ViewQuery))
                                                          {
                                                              if($row['ProjectID'] == $_GET['Project'])
                                                              {
                                                                  $ID = $row['ProjectID'];
                                                                  $Name = $row['ProjectName'];
                                                                  echo '<option value="'.$ID.'" selected>'.$Name.'</option>';
                                                              }
                                                              else
                                                              {
                                                                  $ID = $row['ProjectID'];
                                                                  $Name = $row['ProjectName'];
                                                                  echo '<option value="'.$ID.'">'.$Name.'</option>';
                                                              }
                                                          }
                                                      }

                                                  }
                                                  else
                                                  {
                                                      $ViewSql = "SELECT * FROM bitdb_r_project";
                                                      $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                                      if(mysqli_num_rows($ViewQuery) > 0)
                                                      {
                                                          while($row = mysqli_fetch_assoc($ViewQuery))
                                                          {
                                                              $ID = $row['ProjectID'];
                                                              $Name = $row['ProjectName'];
                                                              echo '<option value="'.$ID.'">'.$Name.'</option>';
                                                          }
                                                      }
                                                  }
                                              ?>
                                          </select>

                                  </div>
                              <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addProjectDonModal">
                                  <i class="material-icons">add_circle_outline</i>
                                  <span>ADD NEW</span>
                              </button>
                              <div id="ProjectDonTable" class="table-responsive">
                                  <table class="table table-borderethd table-striped table-hover js-basic-example dataTable">
                                      <thead>
                                          <tr>
                                              <th class="hide">Project ID</th>
                                              <th class="hide">Donation ID</th>
                                              <th>Donor Name</th>
                                              <th>Amount Donated (PHP)</th>
                                              <th>Date Given</th>
                                              <th>Date Recorded</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tfoot>
                                          <tr>
                                              <th class="hide">Project ID</th>
                                              <th class="hide">Donation ID</th>
                                              <th>Donor Name</th>
                                              <th>Amount Donated (PHP)</th>
                                              <th>Date Given</th>
                                              <th>Date Recorded</th>
                                              <th>Actions</th>
                                          </tr>
                                      </tfoot>
                                      <tbody>
                                          <?php
                                              include('dbconn.php');

                                              if(isset($_GET['Project']))
                                              {
                                                  $Level1ActivityViewSQL = 'SELECT
                                                                          bitdb_r_projectdonation.DonationID,
                                                                          bitdb_r_projectdonation.ProjectID,
                                                                          bitdb_r_projectdonation.DonorName,
                                                                          bitdb_r_projectdonation.MoneyDonated,
                                                                          bitdb_r_projectdonation.DateGiven,
                                                                          bitdb_r_projectdonation.DateRecorded
                                                                      FROM    bitdb_r_projectdonation
                                                                      WHERE bitdb_r_projectdonation.ProjectID='.$_GET['Project'].' ';
                                              $Level1ActivityViewQuery = mysqli_query($bitMysqli,$Level1ActivityViewSQL) or die (mysqli_error($bitMysqli));
                                              if (mysqli_num_rows($Level1ActivityViewQuery) > 0)
                                              {
                                                  while($row = mysqli_fetch_assoc($Level1ActivityViewQuery))
                                                  {
                                                      $DonationID = $row['DonationID'];
                                                      $ProjectID = $row['ProjectID'];
                                                      $DonorName = $row['DonorName'];
                                                      $MoneyDonated = $row['MoneyDonated'];
                                                      $DateGiven = $row['DateGiven'];
                                                      $DateRecorded = $row['DateRecorded'];

                                                      echo'
                                                      <tr>
                                                          <td class="hide">'.$ProjectID.'</td>
                                                          <td class="hide">'.$DonationID.'</td>
                                                          <td>'.$DonorName.'</td>
                                                          <td>'.$MoneyDonated.'</td>
                                                          <td>'.$DateGiven.'</td>
                                                          <td>'.$DateRecorded.'</td>
                                                          <td>
                                                              <button type="button" class="btn btn-success waves-effect editProject" data-toggle="modal" data-target="#editProjDonationModal">
                                                              <i class="material-icons">mode_edit</i>
                                                              <span>EDIT</span></button>
                                                          </td>
                                                      </tr>';
                                                  }
                                              }
                                              }
                                              else
                                              {
                                                  $Level1ActivityViewSQL = 'SELECT
                                                                          bitdb_r_projectdonation.DonationID,
                                                                          bitdb_r_projectdonation.ProjectID,
                                                                          bitdb_r_projectdonation.DonorName,
                                                                          bitdb_r_projectdonation.MoneyDonated,
                                                                          bitdb_r_projectdonation.DateGiven,
                                                                          bitdb_r_projectdonation.DateRecorded
                                                                      FROM    bitdb_r_projectdonation
                                                                      WHERE bitdb_r_projectdonation.ProjectID';
                                              $Level1ActivityViewQuery = mysqli_query($bitMysqli,$Level1ActivityViewSQL) or die (mysqli_error($bitMysqli));
                                              if (mysqli_num_rows($Level1ActivityViewQuery) > 0)
                                              {
                                                  while($row = mysqli_fetch_assoc($Level1ActivityViewQuery))
                                                  {
                                                      $DonationID = $row['DonationID'];
                                                      $ProjectID = $row['ProjectID'];
                                                      $DonorName = $row['DonorName'];
                                                      $MoneyDonated = $row['MoneyDonated'];
                                                      $DateGiven = $row['DateGiven'];
                                                      $DateRecorded = $row['DateRecorded'];

                                                      echo'
                                                      <tr>
                                                          <td class="hide">'.$ProjectID.'</td>
                                                          <td class="hide">'.$DonationID.'</td>
                                                          <td>'.$DonorName.'</td>
                                                          <td>'.$MoneyDonated.'</td>
                                                          <td>'.$DateGiven.'</td>
                                                          <td>'.$DateRecorded.'</td>
                                                          <td>
                                                              <button type="button" class="btn btn-success waves-effect editProject" data-toggle="modal" data-target="#editProjDonationModal">
                                                              <i class="material-icons">mode_edit</i>
                                                              <span>EDIT</span></button>
                                                          </td>
                                                      </tr>';
                                                  }
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
                </div>
            </div>
</div>
    </div>

     <form id="Level1AddProjectAct" action="Level1AddProjectDonation.php" method="POST">
        <div class="modal fade" id="addProjectDonModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Add Activity
                            <br/>
                        </h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix margin-0">
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="addProjectID" type="text" class="form-control hide" name="ProjectID"/>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="DonorName"/>
                                    <label class="form-label">Donor Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="DonationAmount"/>
                                    <label class="form-label">Amount</label>
                                </div>
                            </div>
                            <label class="form-label">Date Given</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="DateGiven"/>
                                </div>
                            </div>
                            <label class="form-label">Date Recorded</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="DateRecorded"/>
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

    <form id="Level1EditProjectAct" action="Level1EditProjectDonation.php" method="POST">
        <div class="modal fade" id="editProjDonationModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Edit Donation Details
                            <br/>
                        </h2>
                    </div>
                   <div class="modal-body">
                        <div class="row clearfix margin-0">
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="editProjectID" type="text" class="form-control hide" name="ProjectID"/>
                                </div>
                            </div>
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="editDonationID" type="text" class="form-control hide" name="DonationID"/>
                                </div>
                            </div>
                            <label class="form-label">Donor Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editDonorName" type="text" class="form-control" name="DonorName"/>
                                </div>
                            </div>
                            <label class="form-label">Donated Amount</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editAmount" type="text" class="form-control" name="DonationAmount"/>
                                </div>
                            </div>
                            <label class="form-label">Date Given</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editGiven" type="date" class="form-control" name="DateGiven"/>
                                </div>
                            </div>
                            <label class="form-label">Date Recorded</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editRecorded" type="date" class="form-control" name="DateRecorded"/>
                                </div>
                            </div>
                        </div>
                        <br/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link waves-effect">EDIT</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

      <form id="Level1AddProjectAct" action="Level1AddProjectActivity.php" method="POST">
        <div class="modal fade" id="addProjectActModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Add Activity
                            <br/>
                        </h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix margin-0">
                            <label class="form-label hide">Project ID</label>
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="addProjectID" type="text" class="form-control hide" name="ProjectID"/>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="ActivityName"/>
                                    <label class="form-label">Activity Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="ActivityDesc"/>
                                    <label class="form-label">Description</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="ActivityBudget">
                                    <label class="form-label">Budget</label>
                                </div>
                            </div>
<!--Add Search-->
                            <label class="form-label hide">InvolveID</label>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="addCitizenID" type="text" class="form-control hide" name="CitizenID" required/>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line search-box">
                                        <input id="CitizenName" type="text" class="form-control" name="Citizen" required/>
                                        <label class="form-label">People Involve</label>
                                        <div class="result"></div>
                                    </div>
                                </div>
<!--end search-->
                            <label class="form-label">Start Date</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="StartDate"/>
                                </div>
                            </div>
                            <label class="form-label">End Date</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="FinishDate"/>
                                </div>
                            </div>
                                <div class="form-group hide">
                                    <input type="radio" name="ActStat" id="ActA" value="Active" class="with-gap" checked>
                                    <label for="ActA">Yes</label>
                                    <input type="radio" name="ActStat" id="ActI" value="Inactive" class="with-gap">
                                    <label for="ActI" class="m-l-20">No</label>
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

    <form id="Level1EditProjectAct" action="Level1EditProjectActivity.php" method="POST">
        <div class="modal fade" id="editActivityModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Edit Project
                            <br/>
                        </h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix margin-0">
                            <label class="form-label hide">Project ID</label>
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="editProjectID" type="text" class="form-control hide" name="ProjectID"/>
                                </div>
                            </div>
                            <label class="form-label hide">Activity ID</label>
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="editActivityID" type="text" class="form-control hide" name="ActivityID"/>
                                </div>
                            </div>
                            <label class="form-label">Activity Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editActivityName" type="text" class="form-control" name="ActivityName"/>
                                </div>
                            </div>
                            <label class="form-label">Description</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editActivityDesc" type="text" class="form-control" name="ActivityDesc"/>
                                </div>
                            </div>
                            <label class="form-label">Budget</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editActivityBudget" type="text" class="form-control" name="ActivityBudget">
                                </div>
                            </div>
                            <label class="form-label hide">InvolveID</label>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="editCitizenID" type="text" class="form-control hide" name="CitizenID" required/>
                                    </div>
                                </div>
<!--Add Search-->
                                <label class="form-label">People Involve</label>
                                <div class="form-group form-float">
                                    <div class="form-line search-box-edit">
                                        <input id="editCitizenName" type="text" class="form-control" name="Citizen" required/>
                                        <div class="result"></div>
                                    </div>
                                </div>
<!--end search-->
                            <label class="form-label">Start Date</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editStart" type="date" class="form-control" name="ProjectStart"/>
                                </div>
                            </div>
                            <label class="form-label">End Date</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editFinish" type="date" class="form-control" name="ProjectFinish"/>
                                </div>
                            </div>
                            <label class="form-label">Status</label>
                                <div class="form-group">
                                    <input type="radio" name="ActStat" id="editActA" value="Active" class="with-gap">
                                    <label for="editActA">Yes</label>
                                    <input type="radio" name="ActStat" id="editActI" value="Inactive" class="with-gap">
                                    <label for="editActI" class="m-l-20">No</label>
                                </div>
                        </div>
                        <br/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link waves-effect">EDIT</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="Level1AddProject" action="Level1AddProject.php" method="POST">
        <div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Add Project
                            <br/>
                            <!-- <button type="button" class="btn btn-success waves-effect"> Import from Excel</button> -->
                        </h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix margin-0">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="ProjectName"/>
                                    <label class="form-label">Project Name</label>
                                </div>
                            </div>
                            <label class="form-label">Category</label>
                            <div class="form-group form-float">
                                    <select class="form-control show-tick" name="ProjectCategory" required>
                                        <option value="">-- Please select --</option>
                                        <?php
                                            include_once('dbconn.php');

                                            $ViewSql = "SELECT * FROM bitdb_r_projectcategory";
                                            $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                            if(mysqli_num_rows($ViewQuery) > 0)
                                            {
                                                while($row = mysqli_fetch_assoc($ViewQuery))
                                                {
                                                    $ID = $row['ProjectCategoryID'];
                                                    $Name = $row['ProjectCategory'];
                                                    echo '<option value="'.$ID.'">'.$Name.'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                            </div>
                            <label class="form-label">Zone</label>
                            <div class="form-group form-float">
                                    <select class="form-control show-tick" name="ProjectZone" required>
                                        <option value="">-- Please select --</option>
                                        <?php
                                            include_once('dbconn.php');

                                            $ViewSql = "SELECT * FROM bitdb_r_barangayzone";
                                            $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                            if(mysqli_num_rows($ViewQuery) > 0)
                                            {
                                                while($row = mysqli_fetch_assoc($ViewQuery))
                                                {
                                                    $ID = $row['ZoneID'];
                                                    $Name = $row['Zone'];
                                                    echo '<option value="'.$ID.'">'.$Name.'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="ProjectDesc"/>
                                    <label class="form-label">Description</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line search-box">
                                    <input type="text" class="form-control" name="ProjectBudget"/>
                                    <label class="form-label">Budget</label>
                                </div>
                            </div>
                                <div class="form-group hide">
                                    <input type="radio" name="ProjectStatus" id="StatusA" value="Active" class="with-gap" checked>
                                    <label for="StatusA">Active</label>
                                    <input type="radio" name="ProjectStatus" id="StatusI" value="Inactive" class="with-gap">
                                    <label for="StatusI" class="m-l-20">Inactive</label>
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

    <form id="Level1EditProject" action="Level1EditProject.php" method="POST">
        <div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Edit Project
                            <br/>
                        </h2>
                    </div>
                   <div class="modal-body">
                        <div class="row clearfix margin-0">
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="editProjectID" type="text" class="form-control hide" name="ProjectID"/>
                                </div>
                            </div>
                            <label class="form-label">Project Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editProjectName" type="text" class="form-control" name="ProjectName"/>
                                </div>
                            </div>
                            <label class="form-label">Category</label>
                            <div class="form-group form-float">
                                    <select id="editProjectCategory" class="form-control show-tick" name="ProjectCategory" required>
                                        <option value="">-- Please select --</option>
                                        <?php
                                            include_once('dbconn.php');

                                            $ViewSql = "SELECT * FROM bitdb_r_projectcategory";
                                            $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                            if(mysqli_num_rows($ViewQuery) > 0)
                                            {
                                                while($row = mysqli_fetch_assoc($ViewQuery))
                                                {
                                                    $ID = $row['ProjectCategoryID'];
                                                    $Name = $row['ProjectCategory'];
                                                    echo '<option value="'.$ID.'">'.$Name.'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                            </div>
                            <label class="form-label">Zone</label>
                            <div class="form-group form-float">
                                    <select id="editProjectZone" class="form-control show-tick" name="ProjectZone" required>
                                        <option value="">-- Please select --</option>
                                        <?php
                                            include_once('dbconn.php');

                                            $ViewSql = "SELECT * FROM bitdb_r_barangayzone";
                                            $ViewQuery = mysqli_query($bitMysqli,$ViewSql) or die (mysqli_error($bitMysqli));
                                            if(mysqli_num_rows($ViewQuery) > 0)
                                            {
                                                while($row = mysqli_fetch_assoc($ViewQuery))
                                                {
                                                    $ID = $row['ZoneID'];
                                                    $Name = $row['Zone'];
                                                    echo '<option value="'.$ID.'">'.$Name.'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                            </div>
                            <label class="form-label">Project Description</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editProjectDesc" type="text" class="form-control" name="ProjectDesc"/>
                                </div>
                            </div>
                            <label class="form-label">Project Budget</label>
                            <div class="form-group form-float">
                                <div class="form-line search-box">
                                    <input id="editProjectBudget" type="text" class="form-control" name="ProjectBudget"/>
                                </div>
                            </div>
                              <label class="form-label">Status</label>
                                <div class="form-group">
                                    <input type="radio" name="ProjectStatus" id="editStatusA" value="Active" class="with-gap">
                                    <label for="editStatusA">Active</label>
                                    <input type="radio" name="ProjectStatus" id="editStatusI" value="Inactive" class="with-gap">
                                    <label for="editStatusI" class="m-l-20">Inactive</label>
                                </div>
                        </div>
                        <br/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link waves-effect">EDIT</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</section>

<?php include('footerblock.php'); ?>

<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- SweetAlert Plugin Js -->
<script src="plugins/sweetalert/sweetalert.min.js"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>

<!-- Bootstrap Colorpicker Js -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

<!-- Dropzone Plugin Js -->
<script src="plugins/dropzone/dropzone.js"></script>

<!-- Input Mask Plugin Js -->
<script src="plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

<!-- Multi Select Plugin Js -->
<script src="plugins/multi-select/js/jquery.multi-select.js"></script>

<!-- Jquery Spinner Plugin Js -->
<script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>

<!-- Bootstrap Tags Input Plugin Js -->
<script src="plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- JQuery Steps Plugin Js -->
<script src="plugins/jquery-steps/jquery.steps.js"></script>

<script src="ProjectMonitoring/lib/moment.min.js"></script>
<script src="ProjectMonitoring/fullcalendar.min.js"></script>
<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/widgets/infobox/infobox-4.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>

<script type="text/javascript">
        $(document).ready(function()
        {
            $(".editProject").click(function()
            {
                $("#editProjectID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#editProjectName").val($(this).closest("tbody tr").find("td:eq(1)").html());
                $("#editProjectCategory").val($(this).closest("tbody tr").find("td:eq(2)").html()).trigger("change");
                $("#editProjectZone").val($(this).closest("tbody tr").find("td:eq(4)").html()).trigger("change");
                $("#editProjectDesc").val($(this).closest("tbody tr").find("td:eq(6)").html());
                $("#editProjectBudget").val($(this).closest("tbody tr").find("td:eq(7)").html());
                if ($(this).closest("tbody tr").find("td:eq(8)").text() === "Active") {
                        $("#editStatusA").prop("checked", true).trigger('click');
                    } else {
                        $("#editStatusI").prop("checked", true).trigger('click');
                    }
            });
        });
</script>

</script>

<script type="text/javascript">
$(document).ready(function(){

  $('#addProjectID').val($('#ProjectItem').val());
  $('#ProjectItem').change(function() {
      $('#addProjectID').val($('#ProjectItem').val());
      history.pushState(null, null, '?Project='+$('#ProjectItem').val());
      $('#ProjectTable').load(location.href + ' #ProjectTable');
      location.reload();
  });
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("citizenSearchBackend.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $("#CitizenName").val($(this).find('#NameResult').text());
        $("#addCitizenID").val($(this).find('small').text());
        $(this).parent(".result").empty();
    });

    $(".editActivity").click(function()
            {
                $("#editProjectID").val($(this).closest("tbody tr").find("td:eq(1)").html());
                $("#editActivityID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#editActivityName").val($(this).closest("tbody tr").find("td:eq(2)").html());
                $("#editActivityDesc").val($(this).closest("tbody tr").find("td:eq(3)").html());
                $("#editActivityBudget").val($(this).closest("tbody tr").find("td:eq(4)").html());
                $("#editCitizenID").val($(this).closest("tbody tr").find("td:eq(5)").html());
                $("#editCitizenName").val($(this).closest("tbody tr").find("td:eq(6)").html());
                $("#editStart").val($(this).closest("tbody tr").find("td:eq(7)").html());
                $("#editFinish").val($(this).closest("tbody tr").find("td:eq(8)").html());
                if ($(this).closest("tbody tr").find("td:eq(9)").text() === "Active"){
                    $("#editActA").prop("checked", true).trigger('click');
                    } else {
                    $("#editActI").prop("checked", true).trigger('click');
                    }
            });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box-edit input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("citizenSearchBackend.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $("#editCitizenName").val($(this).find('#NameResult').text());
        $("#editCitizenID").val($(this).find('small').text());
        $(this).parent(".result").empty();
    });
});
</script>


<script type="text/javascript">
$(document).ready(function(){
    $('#addProjectID').val($('#ProjectDonationItem').val());
    $('#ProjectDonationItem').change(function() {
        $('#addProjectID').val($('#ProjectDonationItem').val());
        history.pushState(null, null, '?Project='+$('#ProjectDonationItem').val());
        $('#ProjectDonTable').load(location.href + ' #ProjectDonTable');
        /*location.reload();*/
    });
    $(".editProject").click(function()
            {
                console.log($(this).closest("tbody tr").find("td:eq(3)").html());

                $("#editProjectID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#editDonationID").val($(this).closest("tbody tr").find("td:eq(1)").html());
                $("#editDonorName").val($(this).closest("tbody tr").find("td:eq(2)").html());
                $("#editAmount").val($(this).closest("tbody tr").find("td:eq(3)").html());
                $("#editGiven").val($(this).closest("tbody tr").find("td:eq(4)").html());
                $("#editRecorded").val($(this).closest("tbody tr").find("td:eq(5)").html());
            });
});
</script>

</body>
</html>
