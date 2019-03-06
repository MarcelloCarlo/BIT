<?php 
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $user = 1;
    include_once('LoginCheck.php');
    $currentPage = 'Level1IssuanceRequest';
    include('head.php'); 
    include('Level1_Navbar.php'); 
?>

 <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>ONLINE REQUESTS
                                <small>The list of all the citizens of the barangay applied for certificate online. Click "ISSUE" to isssue a certificate.</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th class="hide">RID</th>
                                        <th class="hide">ID</th>
                                        <th>Name</th>
                                        <th>Issuance Type</th>
                                        <th>Purpose</th>
                                        <th>Request Date</th>
                                        <th width="5%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            include_once('dbconn.php');

                                            $RequestSQL = "SELECT   IR.RequestID,
                                                                    C.Citizen_ID,
                                                                    C.First_Name,
                                                                    IFNULL(C.Middle_Name,'') AS Middle_Name,
                                                                    C.Last_Name,
                                                                    IFNULL(C.Name_Ext,'') AS Name_Ext,
                                                                    IT.IssuanceType,
                                                                    IR.Purpose,
                                                                    IR.RequestDate,
                                                                    IR.RequestStatus
                                                                FROM
                                                                    bitdb_r_issuancerequest AS IR
                                                                INNER JOIN bitdb_r_citizen AS C
                                                                    ON IR.CitizenID = C.Citizen_ID
                                                                INNER JOIN bitdb_r_issuancetype AS IT
                                                                    ON IR.IssuanceType = IT.IssuanceID
                                                                WHERE IR.RequestStatus = 1
                                                                ";
                                            $RequestQuery = mysqli_query($bitMysqli,$RequestSQL) or die(mysqli_error($bitMysqli));
                                                if (mysqli_num_rows($RequestQuery) > 0)
                                                {
                                                    while($row = mysqli_fetch_assoc($RequestQuery))
                                                    {   
                                                        $RID = $row['RequestID'];
                                                        $ID = $row['Citizen_ID'];
                                                        $FName = $row['First_Name'];
                                                        $MName = $row['Middle_Name'];
                                                        $LName = $row['Last_Name'];
                                                        $Name_Ext = $row['Name_Ext'];
                                                        $Type = $row['IssuanceType'];
                                                        $Purpose = $row['Purpose'];
                                                        $Date = $row['RequestDate'];

                                                        echo
                                                        '<tr>
                                                            <td class="hide">'.$RID.'</td>
                                                            <td class="hide">'.$ID.'</td>
                                                            <td>'.$FName.' '.$MName.' '.$LName.' '.$Name_Ext.'</td>
                                                            <td>'.$Type.'</td>
                                                            <td>'.$Purpose.'</td>
                                                            <td>'.$Date.'</td>';
                                                            
                                                        $ButtonShowSQL = 'SELECT DISTINCT BlotterID FROM bitdb_r_blotter WHERE Accused ='.$ID.' AND ComplaintStatus = 1';
                                                        $ButtonShowQuery = mysqli_query($bitMysqli,$ButtonShowSQL) or die (mysqli_error($bitMysqli));
                                                        if(mysqli_num_rows($ButtonShowQuery) > 0)
                                                        {
                                                            echo '<td>  <button type="button" class="btn btn-warning waves-effect  IssuePending">
                                                                <i class="material-icons">bookmark</i>
                                                                
                                                                <span>PENDING</span></a>
                                                            </button>
                                                            </td>
                                                        </tr>';
                                                        }
                                                        else
                                                        {
                                                            echo '<td>  
                                                                    <button type="button" class="btn btn-primary waves-effect  IssueModal" data-toggle="modal" data-target="#issuance1">
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
    <form id="IssuancePrint" action="#" method="POST">
        <div class="modal fade" id="issuance1" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Issue Information<br/></h2>
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
                                    <label class="form-label hide">RequestID</label>
                                    <div class="form-group form-float hide">
                                        <div class="form-line hide">
                                            <input id="RequestID" type="text" class="form-control hide" name="RequestID"/>
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
                                    <h4 class="card-inside-title">Purpose</h4>
                                    <div class="form-line">
                                        <input type="text" name="txtPurpose" class="form-control" id="txtPurpose" />
                                    </div>
                                </div>
                            </div>
                            <br/>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect" id="issuebutt"> <span>ISSUE</span>
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
        function checkthis(Clearance){
            var ClearID = Clearance;
            var catshere = $("#categorydropdown").val();

            if (catshere == "Indigency"){
                $('#issuebutt').on('click',PrintIndigency(ClearID));
            }
            else if (catshere == "Barangay Clearance"){ 
                $('#issuebutt').on('click',PrintBrgyClearance(ClearID));    
            }
            else if (catshere == "Business Permit"){
                $('#issuebutt').on('click',PrintBusPermit(ClearID));   
            }
            else  
            {
                alert("Certificate not found! Please contact your system administrator.");
            }
        }

        function PrintIndigency(ID) {
            printWindow = window.open(`IssuanceCerts/batch1/indigency.php?CitizenID=${$("#editCitizenID").val()}&Purpose=${$("#txtPurpose").val()}&Clearance=${ID}`);
            printWindow.print();
        }

        function PrintBusPermit(ID) {
            printWindow = window.open('IssuanceCerts/batch1/business-permit.php');
            printWindow.print();
        }

        function PrintBrgyClearance(ID) {
            printWindow = window.open(`IssuanceCerts/batch1/barangay-clearance.php?CitizenID=${$("#editCitizenID").val()}&Purpose=${$("#txtPurpose").val()}&Clearance=${ID}`);
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
                $('#RequestID').val($(this).closest('tbody tr').find('td:eq(0)').html());
                $("#editCitizenID").val($(this).closest("tbody tr").find("td:eq(1)").html());
                $("#txtPurpose").val($(this).closest("tbody tr").find("td:eq(4)").html());
                $("#categorydropdown").val($(this).closest("tbody tr").find("td:eq(3)").html()).trigger("change");
            });
            $('.IssuePending').on('click',function(){
                alert("The citizen cannot be given an issuance due to an unsolved issue.");
            });
        });

        $('#IssuancePrint').on('submit',function(){
            var CitizenID = $('#editCitizenID').val();
            var Category = $('#categorydropdown').val();
            var txtPurpose = $('#txtPurpose').val();
            var RID = $('#RequestID').val();

            $.ajax({
                url:'Level1_AddPersonalIssuance.php',
                type:'POST',
                data:{CitizenID:CitizenID,Category:Category,txtPurpose:txtPurpose,method:'request',RID:RID},
                success:function(data){
                    var ClearanceID = data;
                    checkthis(ClearanceID);
                    location.reload();
                },
                error:function(){
                    alert('error');
                }
            });
        });

</script>