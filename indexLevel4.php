<?php 
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $user = 4;
    include_once('LoginCheck.php'); 
    $currentPage = 'indexLevel4'; 
    include('head.php'); 
    include('Level4_Navbar.php'); 
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>CITIZENS</h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ADD CITIZENS
                            <small>The list of all the citizens of the barangay. </small>
                        </h2>
                        <br/>
                        <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addCitizModal">
                            <i class="material-icons">add_circle_outline</i>
                            <span>ADD NEW</span>
                        </button>
                        
                    </div>
                    <div class="body">
                        <div class="table-responsive"> 
                                     <!--  table table-bordered table-striped table-hover dataTable js-exportable -->
                            <!-- <table class="table table-bordered table-striped table-hover js-basic-example dataTable"> -->
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="width: 100%;"> 
                                <thead>
                                    <tr>
                                        <th class="hide">ID</th>
                                        <th>Salutation</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Name Extension</th>
                                        <th class="hide">Email</th>
                                        <th class="hide">Height</th>
                                        <th class="hide">Weight</th>
                                        <th class="hide">Birthdate</th>
                                        <th class="hide">Birth Place</th>
                                        <th class="hide">Nationality</th>
                                        <th>Status</th>
                                        <th>Civil Status</th>
                                        <th class="hide">Occupation</th>
                                        <th>Gender</th>
                                        <th class="hide">Blood Type</th>
                                        <th class="hide">HouseNo</th>
                                        <th class="hide">Street</th>
                                        <th class="hide">ZoneID</th>
                                        <th class="hide">Zone</th>
                                        <th>Address</th>
                                        <th class="hide">Person in Contact</th>
                                        <th class="hide">Contact</th>
                                        <th>Date Recorded</th>
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
                                        <th class="hide">Email</th>
                                        <th class="hide">Height</th>
                                        <th class="hide">Weight</th>
                                        <th class="hide">Birthdate</th>
                                        <th class="hide">Birth Place</th>
                                        <th class="hide">Nationality</th>
                                        <th>Status</th>
                                        <th>Civil Status</th>
                                        <th class="hide">Occupation</th>
                                        <th>Gender</th>
                                        <th class="hide">Blood Type</th>
                                        <th class="hide">HouseNo</th>
                                        <th class="hide">Street</th>
                                        <th class="hide">ZoneID</th>
                                        <th class="hide">Zone</th>
                                        <th>Address</th>
                                        <th class="hide">Person in Contact</th>
                                        <th class="hide">Contact</th>
                                        <th>Date Recorded</th>
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
                                                                    bitdb_r_citizen.Zone AS ZoneID,
                                                                    bitdb_r_barangayzone.Zone,
                                                                    bitdb_r_citizen.Street,
                                                                    bitdb_r_citizen.House_No,
                                                                    IFNULL(bitdb_r_citizen.Person_Con,'') AS Person_Con,
                                                                    IFNULL(bitdb_r_citizen.Contact,'') AS Contact,
                                                                    bitdb_r_citizen.Date_Rec
                                                                FROM
                                                                    bitdb_r_citizen
                                                                INNER JOIN bitdb_r_barangayzone
                                                                ON bitdb_r_citizen.Zone = bitdb_r_barangayzone.ZoneID
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
                                                        $ZoneID = $row['ZoneID'];
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
                                                            <td class="hide">'.$Email.'</td>
                                                            <td class="hide">'.$Height.'</td>
                                                            <td class="hide">'.$Weight.'</td>
                                                            <td class="hide">'.$Birthdate.'</td>
                                                            <td class="hide">'.$Birth_Place.'</td>
                                                            <td class="hide">'.$Nationality.'</td>
                                                            <td>'.$Res_Status.'</td>
                                                            <td>'.$Civil_Status.'</td>
                                                            <td class="hide">'.$Occupation.'</td>
                                                            <td>'.$Gender.'</td>
                                                            <td class="hide">'.$BloodType.'</td>
                                                            <td class="hide">'.$House_No.'</td>
                                                            <td class="hide">'.$Street.'</td>
                                                            <td class="hide">'.$ZoneID.'</td>
                                                            <td class="hide">'.$Zone.'</td>
                                                            <td>'.$Address.'</td>
                                                            <td class="hide">'.$Person_Con.'</td>
                                                            <td class="hide">'.$Contact.'</td>
                                                            <td>'.$Date_Rec.'</td>
                                                        </tr>';
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
    <!--Edit-->
    <form id="CensusOfficerCitizenEdit" action="Level4_EditCitizen.php" method="POST">
        <div class="modal fade" id="editCitizModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Edit
                            <br/>
                            <small>Modify Position Fields</small>
                        </h2>
                    </div>
                    <div class="modal-body">
                           <div class="modal-body">
                            <div class="row clearfix margin-0">
                                <h4 class="card-inside-title hide">ID</h4>
                                <div class="form-group form-float hide">
                                    <div class="form-line hide">
                                        <input id="CID" type="text" name="CitizenID" class="form-control hide" />
                                        <!-- <label class="form-label">Mr./Ms./Mrs.</label> -->
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Salutation</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiSalutation" type="text" name="Salutation" class="form-control" />
                                    </div>
                                </div>
                                <h4 class="card-inside-title">First Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiFName" type="text" name="First_Name" class="form-control" />
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Middle Name (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiMName" type="text" name="Middle_Name" class="form-control" />
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Last Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiLName" type="text" name="Last_Name" class="form-control" />
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Extension Name (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiNExt" type="text" name="Name_Ext" class="form-control" />
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Email Address (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiEmail" type="text" name="Email" class="form-control" />
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Height (ft)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiHeight" type="text" name="Height" class="form-control" />
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Weight (kg)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiWeight" type="text" name="Weight" class="form-control" />
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Place of Birth</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiPOB" type="text" name="Birth_Place" class="form-control" />
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Birthdate</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiBDate" type="date" name="Birthdate" class="form-control date" />
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Nationality</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiNationality" type="text" name="Nationality" class="form-control" />
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Occupation (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiOccupation" type="text" name="Occupation" class="form-control"/>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Gender</h4>
                                <div class="form-group">
                                    <input type="radio" name="Gender" id="EditGendM" value="Male" class="with-gap">
                                    <label for="EditGendM">Male</label>

                                    <input type="radio" name="Gender" id="EditGendF" value="Female" class="with-gap">
                                    <label for="EditGendF" class="m-l-20">Female</label>
                                </div>   
                                <h4 class="card-inside-title">Civil Status</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiCivilStatus" type="text" name="Civil_Status" class="form-control" />
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Blood Type</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiBloodType" type="text" name="Blood_Type" class="form-control" />
                                    </div>
                                </div>
                                <h4 class="card-inside-title">House Number</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiHouseNo" type="text" name="House_No" class="form-control" />
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Street/Block</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiStreet" type="text" name="Street" class="form-control" />
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Zone(Block)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiZone" type="text" name="Zone" class="form-control" />
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Person to contact in case of emergencies (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiPerCon" type="text" name="Person_Con" class="form-control" />
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Contact (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="CitiContact" type="text" name="Contact" class="form-control" />
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Resident Status</h4>
                                <div class="form-group">
                                    <input type="radio" name="Res_Status" id="editCheckA" value="Active" class="with-gap">
                                    <label for="editCheckA">Active</label>

                                    <input type="radio" name="Res_Status" id="editCheckI" value="Inactive" class="with-gap">
                                    <label for="editCheckI" class="m-l-20">Inactive</label>
                                </div>
                                <!-- <h4 class="card-inside-title">Status</h4>
                                <div class="demo-switch">
                                    <div class="switch">
                                        <label>Inactive
                                            <input id="CitiResStat" type="checkbox" checked>
                                            <span class="lever switch-col-orange"></span>Active
                                        </label>
                                    </div>
                                </div> -->
                        </div>
                        <br/>
                    </div> <br/>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link waves-effect">EDIT</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!--Add-->
    <form id="CensusOfficerCitizenAdd" action="Level4_AddCitizen.php" method="POST">
        <div class="modal fade" id="addCitizModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" style="width: 90% !important" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Add Citizens
                            <br/>
                            <div style="height: 0px; overflow: hidden;">
                                <input type="file" accept=".xls, .xlsx" name="fileInput" id="fileInput"/>
                            </div>
                            <script>
                                function chooseFile(){
                                    document.getElementById("fileInput").click();
                                }
                            </script>
                            <button type="button" class="btn btn-success waves-effect" onclick="chooseFile()"> Migrate from Excel</button>
                            <h6 class="pull-right">* = Optional Fields</h6>
                        </h2>
                    </div>
                    <div class="modal-body">
                           <div class="modal-body">
                            <div class="row clearfix margin-0">
                            <div class="panel col-lg-12">
                                <div class="col-md-1">
                                    <h4 class="card-inside-title">Salutation</h4>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="Salutation" class="form-control" />
                                            <label class="form-label">Mr./Ms./Mrs.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h4 class="card-inside-title">First Name</h4>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="First_Name" class="form-control" />
                                            <label class="form-label">First Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                <h4 class="card-inside-title">Middle Name*</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Middle_Name" class="form-control" />
                                        <label class="form-label">Middle Name</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <h4 class="card-inside-title">Last Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Last_Name" class="form-control" />
                                        <label class="form-label">Last Name</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-2">
                                <h4 class="card-inside-title">Extension Name*</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Name_Ext" class="form-control" />
                                        <label class="form-label">Jr./Sr./III</label>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="panel col-lg-12">
                                <div class="col-md-6">
                                <h4 class="card-inside-title">Email Address*</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Email" class="form-control" />
                                        <label class="form-label">example@example.com</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <h4 class="card-inside-title">Height (ft)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Height" class="form-control" />
                                        <label class="form-label">ft</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <h4 class="card-inside-title">Weight (kg)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Weight" class="form-control" />
                                        <label class="form-label">kg</label>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="panel col-lg-12">
                                <div class="col-md-6">
                                <h4 class="card-inside-title">Place of Birth</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Birth_Place" class="form-control" />
                                        <label class="form-label">Place of Birth</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <h4 class="card-inside-title">Birthdate</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" name="Birthdate" class="form-control date" />
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="panel col-lg-12">
                                <div class="col-lg-4">
                                <h4 class="card-inside-title">Nationality</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Nationality" class="form-control" />
                                        <label class="form-label">Nationality</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-4">
                                <h4 class="card-inside-title">Occupation*</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Occupation" class="form-control" />
                                        <label class="form-label">Occupation</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-4">
                                <h4 class="card-inside-title">Gender</h4>
                                <div class="form-group">
                                    <input type="radio" name="Gender" id="optGendM" value="M" class="with-gap">
                                    <label for="optGendM">Male</label>

                                    <input type="radio" name="Gender" id="optGendF" value="F" class="with-gap">
                                    <label for="optGendF" class="m-l-20">Female</label>       
                                </div>
                                </div>
                            </div>
                            <div class="panel col-lg-12">
                                <div class="col-md-6">
                                <h4 class="card-inside-title">Civil Status</h4>
                                <select class="form-control show-tick" name="Civil_Status" required>
                                    <option value="">Select Civil Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Separated">Separated</option>
                                </select>
                                </div>
                                <div class="col-md-6">
                                <h4 class="card-inside-title">Blood Type</h4>
                                <select class="form-control show-tick" name="Blood_Type" required>
                                    <option value="">Select Blood Type</option>
                                    <option value="O+">O+</option>
                                    <option value="A+">A+</option>
                                    <option value="B+">B+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="O-">O-</option>
                                    <option value="A-">A-</option>
                                    <option value="B-">B-</option>
                                    <option value="AB-">AB-</option>
                                </select>
                                </div>
                            </div>
                            <div class="panel col-lg-12">
                                <div class="col-lg-4">
                                <h4 class="card-inside-title">House Number</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="House_No" class="form-control" />
                                        <label class="form-label">House Number</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-4">
                                <h4 class="card-inside-title">Street/Block</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Street" class="form-control" />
                                        <label class="form-label">Street/Block</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-4">
                                <h4 class="card-inside-title">Zone(Block)</h4>
                                <select class="form-control show-tick" name="Zone">
                                    <?php
                                    include_once('dbconn.php');
                                    $ZoneSQL = "SELECT * FROM bitdb_r_barangayzone";
                                    $ZoneQuery = mysqli_query($bitMysqli,$ZoneSQL) or die(mysqli_error($bitMysqli));
                                    if(mysqli_num_rows($ZoneQuery) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($ZoneQuery))
                                        {
                                            echo '<option value="'.$row['ZoneID'].'">'.$row['Zone'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                </div>
                            </div>
                            <div class="panel col-lg-12">
                                <div class="col-md-6">
                                <h4 class="card-inside-title">Person to contact in case of emergencies*</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Person_Con" class="form-control" />
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <h4 class="card-inside-title">Contact*</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Contact" class="form-control" />
                                        <label class="form-label">Contact</label>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <br/>
                    </div> <br/>
                    <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">ADD</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                </div>
            </div>
        </div>
        </div>
    </form>
</section>

<?php include('footer.php'); ?>

<script type="text/javascript">
        $(document).ready(function()
        {
            $(".editCiti").click(function()
            {
                $("#CID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#CitiSalutation").val($(this).closest("tbody tr").find("td:eq(1)").html());
                $("#CitiFName").val($(this).closest("tbody tr").find("td:eq(2)").html());
                $("#CitiMName").val($(this).closest("tbody tr").find("td:eq(3)").html());
                $("#CitiLName").val($(this).closest("tbody tr").find("td:eq(4)").html());
                $("#CitiNExt").val($(this).closest("tbody tr").find("td:eq(5)").html());
                $("#CitiEmail").val($(this).closest("tbody tr").find("td:eq(6)").html());
                $("#CitiHeight").val($(this).closest("tbody tr").find("td:eq(7)").html());
                $("#CitiWeight").val($(this).closest("tbody tr").find("td:eq(8)").html());
                $("#CitiBDate").val($(this).closest("tbody tr").find("td:eq(9)").html());
                $("#CitiPOB").val($(this).closest("tbody tr").find("td:eq(10)").html());
                $("#CitiNationality").val($(this).closest("tbody tr").find("td:eq(11)").html());
                $("#CitiCivilStatus").val($(this).closest("tbody tr").find("td:eq(13)").html());
                $("#CitiOccupation").val($(this).closest("tbody tr").find("td:eq(14)").html());
                $("#CitiGender").val($(this).closest("tbody tr").find("td:eq(15)").html());
                $("#CitiBloodType").val($(this).closest("tbody tr").find("td:eq(16)").html());
                $("#CitiHouseNo").val($(this).closest("tbody tr").find("td:eq(17)").html());
                $("#CitiStreet").val($(this).closest("tbody tr").find("td:eq(18)").html());
                $("#CitiZone").val($(this).closest("tbody tr").find("td:eq(19)").html());
                $("#CitiPerCon").val($(this).closest("tbody tr").find("td:eq(21)").html());
                $("#CitiContact").val($(this).closest("tbody tr").find("td:eq(22)").html());
                if ($(this).closest("tbody tr").find("td:eq(12)").text() === "Active") {
                        $("#editCheckA").prop("checked", true).trigger('click');
                    } else {
                        $("#editCheckI").prop("checked", true).trigger('click');
                    }
                // ActOption = "option[value="+val($(this).closest("tbody tr").find("td:eq(4)").html())+"]";
                // $("#PositionOption").find(ActOption).prop("selected",true);
            });
        });

    </script> 