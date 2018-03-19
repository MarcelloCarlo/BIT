<?php 
    session_start();
    $title = 'Welcome | BarangayIT MK.II'; 
    $currentPage = 'AdOfficialFromCitizens'; 
    include('head.php'); 
    include('AdminNavbar.php'); 
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
         
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Add Officials
                            <small>The list of all the citizens of the barangay. Click "Assign" to add them as an official of the barangay.</small>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive"> 
                                     <!--  table table-bordered table-striped table-hover dataTable js-exportable -->
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                      <!--   <table class="table table-bordered table-striped table-hover dataTable js-exportable">  -->
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
                                        <th class="hide">HouseNo</th>
                                        <th class="hide">Street</th>
                                        <th class="hide">Zone</th>
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
                                        <th class="hide">HouseNo</th>
                                        <th class="hide">Street</th>
                                        <th class="hide">Zone</th>
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
                                                            <td class="hide">'.$House_No.'</td>
                                                            <td class="hide">'.$Street.'</td>
                                                            <td class="hide">'.$Zone.'</td>
                                                            <td>'.$Address.'</td>
                                                            <td>'.$Person_Con.'</td>
                                                            <td>'.$Contact.'</td>
                                                            <td>'.$Date_Rec.'</td>
                                                            <td>  <button type="button" class="btn btn-success waves-effect editCiti" data-toggle="modal" data-target="#AddOfficialFromCitizModal">
                                                                <i class="material-icons">add_circle_outline</i>
                                                                <span>Assign</span>
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
    <!--Edit-->
     <form id="OfficalAddFromCitiz" action="AddOfficialFromCitizModal.php" method="POST">
             <div class="modal fade" id="AddOfficialFromCitizModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                Assign
                                <br/>
                                <small>Select position in the barangay for the citizen.</small>
                            </h2>
                        </div>
                        <div class="modal-body">
                             <div class="row clearfix margin-0">
                                <h4 class="card-inside-title">Position For: </h4>
                                <br/>
                                <div class="col-md-6">

                                  <h4>Position</h4>
                                    <select id="PositionOption" class="form-control browser-default" name="PositionName">
                                            <option value="None">None</option>
                                            <?php
                                                include_once('dbconn.php');

                                                $ViewPosSql = "SELECT * FROM bitdb_r_barangayposition WHERE bitdb_r_barangayposition.PosStat = 1";
                                                $ViewPosQuery = mysqli_query($bitMysqli,$ViewPosSql) or die (mysqli_error($bitMysqli));
                                                if(mysqli_num_rows($ViewPosQuery) > 0)
                                                {
                                                    while($row = mysqli_fetch_assoc($ViewPosQuery))
                                                    {
                                                        $PosID = $row['PosID'];
                                                        $PosName = $row['PosName'];
                                                        echo '<option value="'.$PosName.'">'.$PosName.'</option>';
                                                        
                                                    }
                                                }
                                            ?>
                                    </select>
                                    <input id="BarangayOffID" type="text" class="form-control hide" name="BOffID"/>
                                    <input id="CitizenID" type="text" class="form-control hide" name="CID"/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">ASSIGN</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
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