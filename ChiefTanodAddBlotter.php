<?php 
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $currentPage = 'ChiefTanodAddBlotter';
    include('head.php');
    include('ChiefTanodNavigation.php'); 
?>
<script type="text/javascript">
$(document).ready(function(){
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
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Blotter List</h2>
            </div>
 <!--CUSTOM BLOCK INSERT HERE-->
            <!--CUSTOM BLOCK INSERT HERE-->
        
            <!-- Basic Examples -->
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BLOTTER LIST
                                <small>The current list of barangay blotter. Click "Add New" to add a position or "Edit" to modify on the existing position</small>
                            </h2>
                            <br/>
                            <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addPosModal">
                            <i class="material-icons">add_circle_outline</i>
                            <span>ADD NEW</span>
                        </button>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <!-- <th class="hide">BlotterID</th> -->
                                            <th>Date Of Incident</th>
                                            <th>Complainant</th>
                                            <th>Accused</th>
                                            <th>Subject</th>
                                            <th>Status</th>
                                            <th>Resolution</th>
                                            <th>Date Recorded</th>     
                                            <th>Actions</th>                
                                            <th class="hide"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

 <?php
                                        include_once('dbconn.php');

                                        $CTanodSelectBlotterSQL = ' SELECT  bitdb_r_blotter.BlotterID,
                                                                            bitdb_r_blotter.IncidentDate,
                                                                            bitdb_r_blotter.Complainant,
                                                                            bitdb_r_citizen.First_Name,
                                                                            IFNULL(bitdb_r_citizen.Middle_Name,"") AS Middle_Name,
                                                                            bitdb_r_citizen.Last_Name,
                                                                            IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Ext,
                                                                            bitdb_r_blotter.ComplaintStatement,
                                                                            bitdb_r_blotter.ComplaintStatus,
                                                                            bitdb_r_blotter.Resolution,
                                                                            bitdb_r_blotter.BlotterType,
                                                                            bitdb_r_blotter.ComplaintDate
                                                                    FROM    bitdb_r_blotter
                                                                    INNER JOIN bitdb_r_citizen
                                                                    ON bitdb_r_citizen.Citizen_ID = bitdb_r_blotter.Accused';
                                        $CTanodSelectBlotterQuery = mysqli_query($bitMysqli,$CTanodSelectBlotterSQL) or die (mysqli_error($bitMysqli));
                                        if(mysqli_num_rows($CTanodSelectBlotterQuery) > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($CTanodSelectBlotterQuery))
                                            {
                                                $BlotterID = $row['BlotterID'];
                                                $IDate = $row['IncidentDate'];
                                                $Complainant = $row['Complainant'];
                                                $CStatement = $row['ComplaintStatement'];
                                                $CStatus = $row['ComplaintStatus'];
                                                $Resolution = $row['Resolution'];
                                                $BlotterType = $row['BlotterType'];
                                                $CDate = $row['ComplaintDate'];
                                                $Accused = "".$row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name']." ".$row['Name_Ext']."";
                                                echo'
                                                    <tr>
                                                        <td class="hide">'.$BlotterID.'</td>
                                                        <td>'.$IDate.'</td>
                                                        <td>'.$Complainant.'</td>
                                                        <td>'.$Accused.'</td>
                                                        <td>'.$BlotterType.'</td>
                                                        <td>'.$CStatus.'</td>
                                                        <td>'.$Resolution.'</td>
                                                        <td>'.$CDate.'</td>
                                                    </tr>
                                                    ';
                                            }
                                        }
                                   ?>



<!-- 
1.  Blotter No
2.  Date of Incident
3.  Complainant
4.  Accused
5.  Subject
6.  Status
7.  Resolution
8.  Date Recorded
9.  ACTIONS
a.  Edit
b.  Disable (Case Solved)
c.  Report Print -->


                                   <!--  unang column nang table -->
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

             <div class="modal fade" id="addPosModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                ADD                                    
                                <br/>
                                <small>Add Blotter</small>
                            </h2>
                        </div>
                        <div class="body js-sweetalert">
                        <form id="CTanodBlotterForm" action="ChiefTanodAddBlotterForm.php" method="POST">
                        <div class="modal-body">
                           <div class="row clearfix margin-0">

                                <h4 class="card-inside-title">Date of incident</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="IncidentDate" required/>
                                        <label class="form-label">Date of incident</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Complaint Date</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="ComplaintDate" required/>
                                        <label class="form-label">Complaint Date</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Complainant's Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="Complainant" required/>
                                        <label class="form-label">Complainant's Name</label>
                                    </div>
                                </div>
<!--Add Search-->
                               
                                <h4 class="card-inside-title">Accused' Name</h4>
                                <div class="form-group form-float">
                                    <div class="form-line search-box">
                                        <input type="text" class="form-control" name="name" required/>
                                        <label class="form-label">Accused' Name</label>
                                        <div class="result"/>
                                    </div>
                                </div>
<!--end search-->
                                <h4 class="card-inside-title">Subject</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="" required/>
                                        <label class="form-label">Subject</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Complain Statement</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" required/>
                                        <label class="form-label">Complain Statement</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Decision</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" required/>
                                        <label class="form-label">Decision</label>
                                    </div>
                                </div>

                                <h4 class="card-inside-title">Complaint Status</h4>
                                <div class="form-group">
                                    <input type="radio" name="Res_Status" id="editCheckA" value="Active" class="with-gap">
                                    <label for="editCheckA">Active</label>

                                    <input type="radio" name="Res_Status" id="editCheckI" value="Inactive" class="with-gap">
                                    <label for="editCheckI" class="m-l-20">Inactive</label>
                                </div>
                            <br/>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success waves-effect" data-type="confirm" type="submit">ADD</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </form>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        
<?php include('footer.php'); ?>