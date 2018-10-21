<?php 
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $currentPage = 'Level1IssuancePersonal';
    include('head.php'); 
    include('Level1_Navbar.php'); 
?>

 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Issuance</h2>
</div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h2>
                        PERSONAL CERTIFICATES
                        <small>The list of all the citizens of the barangay. Click "ISSUE" to isssue a certificate.</small>
                    </h2>
                   
                          <!--   <button type="button" class="btn bg-indigo waves-effect">
                            <i class="material-icons">add_circle_outline</i>
                            <a  href="Level1AddCirtizen.php" style= "text-decoration: none;"> 
                            <span>View</span></a>
                        </button> -->
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th class="hide">ID</th>
                                        <th>Salutation</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Name Extension</th>
                                        <th>Birthdate</th>
                                        <th>Nationality</th>
                                        <th>Status</th>
                                        <th>Civil Status</th>
                                        <th>Occupation</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Date Recorded</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="hide">ID</th>
                                        <th>Salutation</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Name Extension</th>
                                        <th>Birthdate</th>
                                        <th>Nationality</th>
                                        <th>Status</th>
                                        <th>Civil Status</th>
                                        <th>Occupation</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Date Recorded</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                            include_once('dbconn.php');

                                            $CitizenSQL = "SELECT 
                                                                    bitdb_r_citizen.Citizen_ID,
                                                                    bitdb_r_citizen.Salutation,
                                                                    bitdb_r_citizen.First_Name,
                                                                    IFNULL(bitdb_r_citizen.Middle_Name,'') AS Middle_Name,
                                                                    bitdb_r_citizen.Last_Name,
                                                                    IFNULL(bitdb_r_citizen.Name_Ext,'') AS Name_Ext,
                                                                    IFNULL(bitdb_r_citizen.Citizen_Email,'') AS Citizen_Email,
                                                                    bitdb_r_citizen.Height,
                                                                    bitdb_r_citizen.Weight,
                                                                    IFNULL(bitdb_r_citizen.Birth_Place,'') AS Birth_Place,
                                                                    bitdb_r_citizen.Birthdate,
                                                                    bitdb_r_citizen.Nationality,
                                                                    bitdb_r_citizen.Res_Status,
                                                                    bitdb_r_citizen.Civil_Status,
                                                                    IFNULL(bitdb_r_citizen.Occupation,'') AS Occupation,
                                                                    bitdb_r_citizen.Gender,
                                                                    bitdb_r_citizen.Blood_Type,
                                                                    bitdb_r_citizen.Zone,
                                                                    bitdb_r_citizen.Street,
                                                                    bitdb_r_citizen.House_No,
                                                                    IFNULL(bitdb_r_citizen.Person_Con,'') AS Person_Con,
                                                                    IFNULL(bitdb_r_citizen.Contact,'') AS Contact,
                                                                    bitdb_r_citizen.Date_Rec
                                                                FROM
                                                                    bitdb_r_citizen
                                                                ";
                                            $CitizenQuery = mysqli_query($bitMysqli,$CitizenSQL) or die(mysqli_error($bitMysqli));
                                                if (mysqli_num_rows($CitizenQuery) > 0)
                                                {
                                                    while($row = mysqli_fetch_assoc($CitizenQuery))
                                                    {   
                                                        $ID = $row['Citizen_ID'];
                                                        $Salutation = $row['Salutation'];
                                                        $FName = $row['First_Name'];
                                                        $MName = $row['Middle_Name'];
                                                        $LName = $row['Last_Name'];
                                                        $Name_Ext = $row['Name_Ext'];
                                                        $Email = $row['Citizen_Email'];
                                                        $Height = $row['Height'];
                                                        $Weight = $row['Weight'];
                                                        $Birthdate = $row['Birthdate'];
                                                        $Birth_Place = $row['Birth_Place'];
                                                        $Nationality = $row['Nationality'];
                                                        $Civil_Status = $row['Civil_Status'];
                                                        $Occupation = $row['Occupation'];
                                                        $Gender = $row['Gender'];
                                                        $BloodType = $row['Blood_Type'];
                                                        $Zone = $row['Zone'];
                                                        $Street = $row['Street'];
                                                        $House_No = $row['House_No'];
                                                        $Person_Con = $row['Person_Con'];
                                                        $Contact = $row['Contact'];
                                                        $Date_Rec = $row['Date_Rec'];

                                                        if($row['Res_Status'] == 1)
                                                        {
                                                            $Res_Status = "Active";
                                                        }
                                                        else
                                                        {
                                                            $Res_Status = "Inactive";
                                                        }
                                                        $Address = ''.$House_No.' '.$Street.' '.$Zone.' ';

                                                        echo
                                                        '<tr>
                                                            <td class="hide">'.$ID.'</td>
                                                            <td>'.$Salutation.'</td>
                                                            <td>'.$FName.'</td>
                                                            <td>'.$MName.'</td>
                                                            <td>'.$LName.'</td>
                                                            <td>'.$Name_Ext.'</td>
                                                            <td>'.$Birthdate.'</td>
                                                            <td>'.$Nationality.'</td>
                                                            <td>'.$Res_Status.'</td>
                                                            <td>'.$Civil_Status.'</td>
                                                            <td>'.$Occupation.'</td>
                                                            <td>'.$Gender.'</td>
                                                            <td>'.$Address.'</td>
                                                            <td>'.$Date_Rec.'</td>';
                                                            
                                                        $ButtonShowSQL = 'SELECT DISTINCT BlotterID FROM bitdb_r_blotter WHERE Accused ='.$ID.' AND ComplaintStatus = 1';
                                                        $ButtonShowQuery = mysqli_query($bitMysqli,$ButtonShowSQL) or die (mysqli_error($bitMysqli));
                                                        if(mysqli_num_rows($ButtonShowQuery) > 0)
                                                        {
                                                            echo '<td>  <button type="button" class="btn btn-warning waves-effect IssueModal">
                                                                <i class="material-icons">bookmark</i>
                                                                
                                                                <span>PENDING</span></a>
                                                            </button>
                                                            </td>
                                                        </tr>';
                                                        }
                                                        else
                                                        {
                                                            echo '<td>  <button type="button" class="btn btn-primary waves-effect IssueModal" data-toggle="modal" data-target="#issuance1">
                                                                <i class="material-icons">mode_edit</i>
                                                                
                                                                <span>ISSUE</span></a>
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
            <!-- #END# Basic Examples -->
     
      <!--Add-->
    <form id="IssuancePrint" action="Level1_AddPersonalIssuance.php" method="POST">
        <div class="modal fade" id="issuance1" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Purpose
                            <br/>
                        </h2>
                    </div>
                    <div class="modal-body">
                           <div class="modal-body">
                            <div class="row clearfix margin-0">
                                <div class="form-group form-float">
                                    <label class="form-label hide">CitizenID</label>
                                    <div class="form-group form-float hide">
                                        <div class="form-line hide">
                                            <input id="editCitizenID" type="text" class="form-control hide" name="CitizenID"/>
                                        </div>
                                    </div>
                                     <h4 class="card-inside-title">Category</h4>
                                    <select class="form-control show-tick" name="Category" id="categorydropdown" onchange="disablebutt()">
                                        <?php
                                        include_once('dbconn.php');
                                        $CategorySQL = 'SELECT * FROM bitdb_r_issuancetype WHERE IssuanceOption = "Personal" ';
                                        $CategoryQuery = mysqli_query($bitMysqli,$CategorySQL) or die(mysqli_error($bitMysqli));
                                        if(mysqli_num_rows($CategoryQuery) > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($CategoryQuery))
                                            {
                                                echo '<option>'.$row['IssuanceType'].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <br>
                                    <br>

                                    <div class="form-line">
                                        <input type="text" name="txtPurpose" class="form-control" id="txtPurpose" />
                                        <label class="form-label">Purpose</label>
                                    </div>
                                </div>

                                <!-- <h4 class="card-inside-title">Status</h4>
                                <div class="demo-switch">
                                    <div class="switch">
                                        <label>Inactive<input type="checkbox" checked><span class="lever switch-col-orange"></span>Active</label>
                                    </div>
                                </div> -->

                            </div>
                            <br/>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect" onclick="checkthis()" id="issuebutt"> <span>ISSUE</span>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
        </div>
    </form>
<script type="text/javascript">
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
        function checkthis(){
                
            var catshere = $("#categorydropdown").val();

                 if (catshere == "Indigency"){
                 //   alert("Indigency");
                    $("#issuebutt").onclick==PrintIndigency();
                    // $('#issuance1').modal('show');
                 }
                 else if (catshere == "Barangay Clearance"){
                   // alert("Clearance");
                    $("#issuebutt").onclick==PrintBrgyClearance();     
                 }
                else if (catshere == "Business Permit"){
                    //alert("Business Permit");
                    $("#issuebutt").onclick==PrintBusPermit();     
                 }

                else  
                 {
                    alert("Certificate not found! Please contact your system administrator.");
                 }

        }


        function PrintIndigency() {
                 printWindow = window.open(`IssuanceCerts/batch1/indigency.php?CitizenID=${$("#editCitizenID").val()}&Purpose=${$("#txtPurpose").val()}`);
                 printWindow.print();
        }

        function PrintBusPermit() {
                 printWindow = window.open('IssuanceCerts/batch1/business-permit.php');
                 printWindow.print();
        }

        function PrintBrgyClearance() {
                 printWindow = window.open(`IssuanceCerts/batch1/barangay-clearance.php?CitizenID=${$("#editCitizenID").val()}&Purpose=${$("#txtPurpose").val()}`);
                 printWindow.print();
        }     

</script>
</section>
<?php include('footer.php'); ?>
<script type="text/javascript">
        $(document).ready(function()
        {
            $(".IssueModal").click(function()
            {
                $("#editCitizenID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                // $("#editProjectName").val($(this).closest("tbody tr").find("td:eq(1)").html());
                // $("#editProjectCategory").val($(this).closest("tbody tr").find("td:eq(2)").html()).trigger("change");
                
            });
        });
</script>