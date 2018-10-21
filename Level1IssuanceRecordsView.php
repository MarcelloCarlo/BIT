<?php
      session_start();
      $title = 'Welcome | BarangayIT MK.II';
      $currentPage = 'Level1IssuanceRecordsView';
      include('head.php');
      include('Level1_Navbar.php');
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>PROJECT MONITORING</h2>
        </div>
<!-- Example Tab -->
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                                ISSUANCE REPORTS
                                <small>List of all issued documents.</small>
                          </h2>
                      </div>
                      <div class="body">
                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs tab-nav-right" role="tablist">
                              <li role="presentation" class="active"><a href="#personal" data-toggle="tab">PERSONAL</a></li>
                              <li role="presentation"><a href="#business" data-toggle="tab">BUSINESS</a></li>
                          </ul>

                          <!-- Tab panes -->
                          <div class="tab-content">
                              <div role="tabpanel" class="tab-pane fade in active" id="personal">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th class="hide">Issuance ID</th>
                                                <th class="hide">Citizen ID</th>
                                                <th>Name</th>
                                                <th class="hide">Issuance ID</th>
                                                <th>Category</th>
                                                <th>Purpose</th>
                                                <th>Date Recorded</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                          <?php
                                            include_once('dbconn.php');
                                            $CitizenSQL = "SELECT 
                                                                    bitdb_r_citizen.First_Name,
                                                                    IFNULL(bitdb_r_citizen.Middle_Name,'') AS Middle_Name,
                                                                    bitdb_r_citizen.Last_Name,
                                                                    IFNULL(bitdb_r_citizen.Name_Ext,'') AS Name_Ext,
                                                                    bitdb_r_issuance.IssuanceID,
                                                                    bitdb_r_issuance.CitizenID,
                                                                    bitdb_r_issuance.IssuanceID AS IssuanceTypeID,
                                                                    bitdb_r_issuancetype.IssuanceType,
                                                                    bitdb_r_issuance.Purpose,
                                                                    bitdb_r_issuance.IssuanceDate
                                                                FROM bitdb_r_issuance
                                                                INNER JOIN bitdb_r_citizen
                                                                ON bitdb_r_citizen.Citizen_ID = bitdb_r_issuance.CitizenID
                                                                INNER JOIN bitdb_r_issuancetype
                                                                ON bitdb_r_issuancetype.IssuanceID = bitdb_r_issuance.IssuanceType
                                                                ";
                                            $CitizenQuery = mysqli_query($bitMysqli,$CitizenSQL) or die(mysqli_error($bitMysqli));
                                                if (mysqli_num_rows($CitizenQuery) > 0)
                                                {
                                                    while($row = mysqli_fetch_assoc($CitizenQuery))
                                                    {   
                                                        $IssuanceID = $row['IssuanceID'];
                                                        $CitizenID = $row['CitizenID'];
                                                        $FullName = ''.$row['First_Name'].' '.$row['Middle_Name'].' '.$row['Last_Name'].' '.$row['Name_Ext'].' ';
                                                        $IssuanceTypeID = $row['IssuanceTypeID'];
                                                        $IssuanceType = $row['IssuanceType'];
                                                        $Purpose = $row['Purpose'];
                                                        $IssuanceDate = $row['IssuanceDate'];

                                                        echo
                                                        '<tr>
                                                            <td class="hide">'.$IssuanceID.'</td>
                                                            <td class="hide">'.$CitizenID.'</td>
                                                            <td>'.$FullName.'</td>
                                                            <td class="hide">'.$IssuanceTypeID.'</td>
                                                            <td>'.$IssuanceType.'</td>
                                                            <td>'.$Purpose.'</td>
                                                            <td>'.$IssuanceDate.'</td>';
                                                            
                                                        $ButtonShowSQL = 'SELECT DISTINCT BlotterID FROM bitdb_r_blotter WHERE Accused ='.$CitizenID.' AND ComplaintStatus = 1';
                                                        $ButtonShowQuery = mysqli_query($bitMysqli,$ButtonShowSQL) or die (mysqli_error($bitMysqli));
                                                        if(mysqli_num_rows($ButtonShowQuery) > 0)
                                                        {
                                                            echo '
                                                        <td>  
                                                            <button type="button" class="btn btn-warning waves-effect">
                                                                <i class="material-icons">bookmark</i>
                                                                <span>PENDING</span></a>
                                                            </button>

                                                            <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#editIssuance">
                                                                <i class="material-icons">mode_edit</i>
                                                                <span>EDIT</span></a>
                                                            </button>
                                                            </td>
                                                        </tr>';
                                                        }
                                                        else
                                                        {
                                                            echo '
                                                        <td>  
                                                            <button type="button" class="btn btn-primary waves-effect IssueModal" data-toggle="modal" data-target="#issuance1">
                                                                <i class="material-icons">mode_edit</i>
                                                                <span>ISSUE</span></a>
                                                            </button>

                                                            <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#editIssuance">
                                                                <i class="material-icons">mode_edit</i>
                                                                <span>EDIT</span></a>
                                                            </button>
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
                              <div role="tabpanel" class="tab-pane fade" id="business">
                                <div class="table-responsive">
                                  <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                      <thead>
                                          <tr>
                                              <th class="hide">Issuance ID</th>
                                              <th class="hide">Business ID</th>
                                              <th>Name</th>
                                              <th class="hide">Issuance TypeID</th>
                                              <th>Category</th>
                                              <th>Date Recorded</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      
                                      <tbody>
                                        <?php
                                          include_once('dbconn.php');
                                            $BusinessSQL = "SELECT 
                                                                    bitdb_r_business.BusinessID,
                                                                    bitdb_r_business.Business_Name,
                                                                    bitdb_r_business.BusinessLoc,
                                                                    bitdb_r_business.Manager,
                                                                    bitdb_r_business.BusinessCategory,
                                                                    bitdb_r_issuance.IssuanceID,
                                                                    bitdb_r_issuance.IssuanceID AS IssuanceTypeID,
                                                                    bitdb_r_issuancetype.IssuanceType,
                                                                    bitdb_r_issuance.IssuanceDate
                                                                FROM bitdb_r_issuance
                                                                INNER JOIN bitdb_r_business
                                                                ON bitdb_r_business.BusinessID = bitdb_r_issuance.BusinessID
                                                                INNER JOIN bitdb_r_issuancetype
                                                                ON bitdb_r_issuancetype.IssuanceID = bitdb_r_issuance.IssuanceType";
                                          $BusinessQuery = mysqli_query($bitMysqli,$BusinessSQL) or die(mysqli_error($bitMysqli));
                                              if (mysqli_num_rows($BusinessQuery) > 0)
                                              {
                                                while($row2 = mysqli_fetch_assoc($BusinessQuery))
                                                {   
                                                  $BIssuanceID = $row2['IssuanceID'];
                                                  $BusinessID = $row2['BusinessID'];
                                                  $BusinessName = $row2['Business_Name'];
                                                  $BIssuanceTypeID = $row2['IssuanceTypeID'];
                                                  $BIssuanceType = $row2['IssuanceType'];
                                                  $BIssuanceDate = $row2['IssuanceDate'];

                                                  echo
                                                  '<tr>
                                                      <td class="hide">'.$BIssuanceID.'</td>
                                                      <td class="hide">'.$BusinessID.'</td>
                                                      <td>'.$BusinessName.'</td>
                                                      <td class="hide">'.$BIssuanceTypeID.'</td>
                                                      <td>'.$BIssuanceType.'</td>
                                                      <td>'.$BIssuanceDate.'</td>';
                                                      
                                                  $ButtonShowSQL = 'SELECT * FROM bitdb_r_issuance INNER JOIN bitdb_r_business ON bitdb_r_issuance.BusinessID = bitdb_r_business.BusinessID WHERE bitdb_r_business.BusinessID ='.$BusinessID.' AND bitdb_r_issuance.IssuanceDate < CURRENT_DATE';
                                                  $ButtonShowQuery = mysqli_query($bitMysqli,$ButtonShowSQL) or die (mysqli_error($bitMysqli));
                                                  if(mysqli_num_rows($ButtonShowQuery) > 0)
                                                  {
                                                      echo '
                                                  <td>  
                                                      <button type="button" class="btn btn-success waves-effect">
                                                          <i class="material-icons">bookmark</i>
                                                          <span>ACTIVE</span></a>
                                                      </button>

                                                      <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#editIssuance">
                                                          <i class="material-icons">mode_edit</i>
                                                          <span>EDIT</span></a>
                                                      </button>
                                                      </td>
                                                  </tr>';
                                                  }
                                                  else
                                                  {
                                                      echo '
                                                  <td>  
                                                      <button type="button" class="btn btn-primary waves-effect BusinessModal" data-toggle="modal" data-target="#issuance1">
                                                          <i class="material-icons">mode_edit</i>
                                                          <span>ISSUE</span></a>
                                                      </button>

                                                      <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#editIssuance">
                                                          <i class="material-icons">mode_edit</i>
                                                          <span>EDIT</span></a>
                                                      </button>
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
</section>
  <?php include('footerblock.php');?>
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

  <!-- Custom Js -->
  <script src="js/admin.js"></script>

  <!-- Demo Js -->
  <script src="js/demo.js"></script>

<script type="text/javascript">
  $(document).ready(function()
        {
            $(".IssueModal").click(function()
            {
                var Clicked = $(this).closest("tbody tr").find("td:eq(4)").html();
                if(Clicked == "Barangay Clearance")
                {
                    printWindow = window.open(`IssuanceCerts/batch1/barangay-clearance.php?CitizenID=${$(this).closest("tbody tr").find("td:eq(1)").html()}&Purpose=${$(this).closest("tbody tr").find("td:eq(5)").html()}&Clearance=${$(this).closest("tbody tr").find("td:eq(0)").html()}`);
                    printWindow.print();
                }
                else if(Clicked == "Indigency"){
                    printWindow = window.open(`IssuanceCerts/batch1/indigency.php?CitizenID=${$(this).closest("tbody tr").find("td:eq(1)").html()}&Purpose=${$(this).closest("tbody tr").find("td:eq(5)").html()}&Clearance=${$(this).closest("tbody tr").find("td:eq(0)").html()}`);
                    printWindow.print();
                 }
                else  
                 {
                    alert("Certificate not found! Please contact your system administrator.");
                 }
            });
            $(".BusinessModal").click(function()
            {
                var Clicked = $(this).closest("tbody tr").find("td:eq(4)").html();
                if(Clicked == "Barangay Clearance")
                {
                    printWindow = window.open(`IssuanceCerts/batch1/barangay-clearance.php?CitizenID=${$(this).closest("tbody tr").find("td:eq(1)").html()}&Purpose=${$(this).closest("tbody tr").find("td:eq(5)").html()}&Clearance=${$(this).closest("tbody tr").find("td:eq(0)").html()}`);
                    printWindow.print();
                }
                else if(Clicked == "Indigency"){
                    printWindow = window.open(`IssuanceCerts/batch1/indigency.php?CitizenID=${$(this).closest("tbody tr").find("td:eq(1)").html()}&Purpose=${$(this).closest("tbody tr").find("td:eq(5)").html()}&Clearance=${$(this).closest("tbody tr").find("td:eq(0)").html()}`);
                    printWindow.print();
                 }
                else  
                 {
                    alert("Certificate not found! Please contact your system administrator.");
                 }
            });

        });
        function disablebutt(){
            var catshere = $("#categorydropdown").val();
                if (catshere == "Business Permit")
                {
                     document.getElementById('txtPurpose').disabled = true;
                }
                else
                {
                     document.getElementById('txtPurpose').disabled = false;
                }
            }
</script>
</body>
</html>

