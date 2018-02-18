<?php 
    session_start();
    $title = 'Welcome | BarangayIT MK.II'; 
    $currentPage = 'Level1AddEditCitizen'; 
    include('head.php'); 
    include('Level1navbar.php'); 
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
                        EDIT CITIZENS
                        <small>The list of all the citizens of the barangay. Click "VIEW" to view all  or "Edit" to modify on the existing record </small>
                    </h2>
                    <br/>
                    <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addCitModal">
                            <i class="material-icons">add_circle_outline</i>
                            <span>ADD NEW</span>
                        </button>
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
                                            <th>Email</th>
                                            <th>Height</th>
                                            <th>Weight</th>
                                            <th>Birthdate</th>
                                            <th>Birth Place</th>
                                            <th>Nationality</th>
                                            <th>Status</th>
                                            <th>Civil Status</th>
                                            <th>Occupation</th>
                                            <th>Gender</th>
                                            <th>Blood Type</th>
                                            <th>Address</th>
                                            <th>Person in Contact</th>
                                            <th>Contact</th>
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
                                            <th>Email</th>
                                            <th>Height</th>
                                            <th>Weight</th>
                                            <th>Birthdate</th>
                                            <th>Birth Place</th>
                                            <th>Nationality</th>
                                            <th>Status</th>
                                            <th>Civil Status</th>
                                            <th>Occupation</th>
                                            <th>Gender</th>
                                            <th>Blood Type</th>
                                            <th>Address</th>
                                            <th>Person in Contact</th>
                                            <th>Contact</th>
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
                                                                    IFNULL(bitdb_r_citizen.Middle_Name,'N/A') AS Middle_Name,
                                                                    bitdb_r_citizen.Last_Name,
                                                                    IFNULL(bitdb_r_citizen.Name_Ext,'N/A') AS Name_Ext,
                                                                    IFNULL(bitdb_r_citizen.Citizen_Email,'N/A') AS Citizen_Email,
                                                                    bitdb_r_citizen.Height,
                                                                    bitdb_r_citizen.Weight,
                                                                    IFNULL(bitdb_r_citizen.Birth_Place,'N/A') AS Birth_Place,
                                                                    bitdb_r_citizen.Birthdate,
                                                                    bitdb_r_citizen.Nationality,
                                                                    bitdb_r_citizen.Res_Status,
                                                                    bitdb_r_citizen.Civil_Status,
                                                                    IFNULL(bitdb_r_citizen.Occupation,'N/A') AS Occupation,
                                                                    bitdb_r_citizen.Gender,
                                                                    bitdb_r_citizen.Blood_Type,
                                                                    bitdb_r_citizen.Zone,
                                                                    bitdb_r_citizen.Street,
                                                                    bitdb_r_citizen.House_No,
                                                                    IFNULL(bitdb_r_citizen.Person_Con,'N/A') AS Person_Con,
                                                                    IFNULL(bitdb_r_citizen.Contact,'N/A') AS Contact,
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
                                                            <td>'.$Email.'</td>
                                                            <td>'.$Height.'</td>
                                                            <td>'.$Weight.'</td>
                                                            <td>'.$Birthdate.'</td>
                                                            <td>'.$Birth_Place.'</td>
                                                            <td>'.$Nationality.'</td>
                                                            <td>'.$Res_Status.'</td>
                                                            <td>'.$Civil_Status.'</td>
                                                            <td>'.$Occupation.'</td>
                                                            <td>'.$Gender.'</td>
                                                            <td>'.$BloodType.'</td>
                                                            <td>'.$Address.'</td>
                                                            <td>'.$Person_Con.'</td>
                                                            <td>'.$Contact.'</td>
                                                            <td>'.$Date_Rec.'</td>
                                                            <td>
                                                            <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#editCitizModal">
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
                    </div>
                </div>
            </div>
           
        </div>
        <form id="Level1CitizenAdd" action="Level1AddCitizen.php" method="POST">
            <div class="modal fade" id="addCitModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                Add Citizen
                                <br/>
                                <button type="button" class="btn btn-success waves-effect"> Import from Excel</button>
                            </h2>
                        </div>
                        <div class="modal-body">
                           <div class="modal-body">
                            <div class="row clearfix margin-0">
                                <h4 class="card-inside-title">Salutation</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Salutation" class="form-control" />
                                        <label class="form-label">Mr./Ms./Mrs.</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">First Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="First_Name" class="form-control" />
                                        <label class="form-label">First Name</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Middle Name (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Middle_Name" class="form-control" />
                                        <label class="form-label">Middle Name</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Last Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Last_Name" class="form-control" />
                                        <label class="form-label">Last Name</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Extension Name (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Name_Ext" class="form-control" />
                                        <label class="form-label">Jr./Sr./III</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Email Address (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Email" class="form-control" />
                                        <label class="form-label">example@example.com</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Height (ft)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Height" class="form-control" />
                                        <label class="form-label">ft</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Weight (kg)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Weight" class="form-control" />
                                        <label class="form-label">kg</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Place of Birth</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Birth_Place" class="form-control" />
                                        <label class="form-label">Place of Birth</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Birthdate</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Birthdate" class="form-control date" />
                                        <label class="form-label">YYYY-MM-DD</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Nationality</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Nationality" class="form-control" />
                                        <label class="form-label">Nationality</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Occupation (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Occupation" class="form-control" />
                                        <label class="form-label">Occupation</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Gender</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Gender" class="form-control" />
                                        <label class="form-label">Gender</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Civil Status</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Civil_Status" class="form-control" />
                                        <label class="form-label">Civil Status</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Blood Type</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Blood_Type" class="form-control" />
                                        <label class="form-label">O/A/B</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">House Number</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="House_No" class="form-control" />
                                        <label class="form-label">House Number</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Street/Block</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Street" class="form-control" />
                                        <label class="form-label">Street/Block</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Zone(Block)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Zone" class="form-control" />
                                        <label class="form-label">Zone(Block)</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Person to contact in case of emergencies (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Person_Con" class="form-control" />
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Contact (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Contact" class="form-control" />
                                        <label class="form-label">Contact</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Status</h4>
                                <div class="demo-switch">
                                    <div class="switch">
                                        <label>Inactive<input type="checkbox" checked><span class="lever switch-col-orange"></span>Active</label>
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
        <!--ModalEdit-->
        <form>
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
                                <h4 class="card-inside-title">Salutation</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Salutation" class="form-control" />
                                        <label class="form-label">Mr./Ms./Mrs.</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">First Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="First_Name" class="form-control" />
                                        <label class="form-label">First Name</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Middle Name (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Middle_Name" class="form-control" />
                                        <label class="form-label">Middle Name</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Last Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Last_Name" class="form-control" />
                                        <label class="form-label">Last Name</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Extension Name (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Name_Ext" class="form-control" />
                                        <label class="form-label">Jr./Sr./III</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Email Address (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Email" class="form-control" />
                                        <label class="form-label">example@example.com</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Height (ft)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Height" class="form-control" />
                                        <label class="form-label">ft</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Weight (kg)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Weight" class="form-control" />
                                        <label class="form-label">kg</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Place of Birth</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Birth_Place" class="form-control" />
                                        <label class="form-label">Place of Birth</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Birthdate</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Birthdate" class="form-control date" />
                                        <label class="form-label">YYYY-MM-DD</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Nationality</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Nationality" class="form-control" />
                                        <label class="form-label">Nationality</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Occupation (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Occupation" class="form-control" />
                                        <label class="form-label">Occupation</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Gender</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Gender" class="form-control" />
                                        <label class="form-label">Gender</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Civil Status</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Civil_Status" class="form-control" />
                                        <label class="form-label">Civil Status</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Blood Type</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Blood_Type" class="form-control" />
                                        <label class="form-label">O/A/B</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">House Number</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="House_No" class="form-control" />
                                        <label class="form-label">House Number</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Street/Block</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Street" class="form-control" />
                                        <label class="form-label">Street/Block</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Zone(Block)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Zone" class="form-control" />
                                        <label class="form-label">Zone(Block)</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Person to contact in case of emergencies (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Person_Con" class="form-control" />
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Contact (Optional)</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Contact" class="form-control" />
                                        <label class="form-label">Contact</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Status</h4>
                                <div class="demo-switch">
                                    <div class="switch">
                                        <label>Inactive<input type="checkbox" checked><span class="lever switch-col-orange"></span>Active</label>
                                    </div>
                                </div>

                            </div><br/>
                        </div><br/>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">EDIT</button>
                         <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!--EndModal-->
    </section>

<?php include('footer.php'); ?>