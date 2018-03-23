<?php 
session_start();
$title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'Level1IssuanceBusiness';?>
<?php include('head.php'); ?>
<?php include('Level1Navbar.php'); ?>

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
                        BUSINESS CERTIFICATES
                        <small>The list of all the businesses of the barangay. Click "ISSUE" to isssue a certificate.</small>
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
                                            <th class="hide">BusinessID</th>
                                            <th>Business Name</th>
                                            <th>Category</th>
                                            <th>Location</th>
                                            <th>Manager</th>
                                            <th>Man. Address</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="hide">BusinessID</th>
                                            <th>Business Name</th>
                                            <th>Category</th>
                                            <th>Location</th>
                                            <th>Manager</th>
                                            <th>Man. Address</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                            <?php
                                                include('dbconn.php');

                                                $Level1BusinessSQL = 'SELECT    bitdb_r_business.BusinessID,
                                                                                bitdb_r_business.Business_Name,
                                                                                bitdb_r_businesscategory.categoryName,
                                                                                bitdb_r_business.BusinessLoc,
                                                                                bitdb_r_business.Manager,
                                                                                bitdb_r_business.Mgr_Address,
                                                                                bitdb_r_business.Date_Issued,
                                                                                bitdb_r_business.BusinessStatus
                                                                        FROM    bitdb_r_business
                                                                        INNER JOIN bitdb_r_businesscategory
                                                                        ON bitdb_r_business.BusinessCategory = bitdb_r_businesscategory.categoryID';
                                                $Level1BusinessQuery = mysqli_query($bitMysqli,$Level1BusinessSQL) or die (mysqli_error($bitMysqli));
                                                if(mysqli_num_rows($Level1BusinessQuery) > 0)
                                                {
                                                    while($row = mysqli_fetch_assoc($Level1BusinessQuery))
                                                    {
                                                        $BusinessID = $row['BusinessID'];
                                                        $Business_Name = $row['Business_Name'];
                                                        $BusinessCat = $row['categoryName'];
                                                        $BusinessLoc = $row['BusinessLoc'];
                                                        $Manager = $row['Manager'];
                                                        $ManagerAdd = $row['Mgr_Address'];
                                                        $Date_Issued = $row['Date_Issued'];

                                                        if($row['BusinessStatus'] == 1)
                                                        {
                                                            $BusinessStatus = "Active";
                                                        }
                                                        else
                                                        {
                                                            $BusinessStatus = "Inactive";
                                                        }

                                                        echo '  
                                                        <tr>    
                                                                <td class="hide">'.$BusinessID.'</td>
                                                                <td>'.$Business_Name.'</td>
                                                                <td>'.$BusinessCat.'</td>
                                                                <td>'.$BusinessLoc.'</td>
                                                                <td>'.$Manager.'</td>
                                                                <td>'.$ManagerAdd.'</td>
                                                                <td>'.$BusinessStatus.'</td>
                                                                <td> 
                                                                    <button type="button" class="btn btn-success waves-effect editBusiness" data-toggle="modal" data-target="#issuance1" onclick="disablebutt()">
                                                                        <i class="material-icons">mode_edit</i> 
                                                                        <span>ISSUE</span>
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
            <!-- #END# Basic Examples -->
     
      <!--Add-->
    <form id="IssuancePrint" action="Level1AddCitizen.php" method="POST">
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
                                     <h4 class="card-inside-title">Category</h4>
                                <select class="form-control show-tick" name="btn dropdown-toggle btn-default" id="categorydropdown" onchange="disablebutt()">
                                    <?php
                                    include_once('dbconn.php');
                                    $CategorySQL = 'SELECT * FROM bitdb_r_issuancetype WHERE IssuanceOption = "Business" ';
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
                            <button type="button" class="btn btn-link waves-effect" onclick="checkthis()" id="issuebutt"> <span>ISSUE</span>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
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

                 if (catshere == "Barangay Clearance"){
                   // alert("Clearance");
                    $("#issuebutt").onclick==PrintBrgyClearance();     
                 }

                  if (catshere == "Business Permit"){
                    //alert("Business Permit");
                    $("#issuebutt").onclick==PrintBusPermit();     
                 }

                else  
                 {
                    alert("Certificate not found! Please contact your system administrator.");
                 }

        }

        //     {
        //     window.open("http://philmontscoutranch.org/Camping/75.aspx", "_blank");
        //     }

        //     $("button[class='btn dropdown-toggle btn-default']").on("click",function(){
        //         alert($("span[class='filter-option pull-left']").text());
        //             if($("span[class='filter-option pull-left']").text()=="Indigency"){
        //                 $("button[data-toggle='modal']").trigger("click");
        //                     }
        //     else
        //     {

        //     }
        // }
        // };


        function PrintIndigency() {
                 printWindow = window.open("IssuanceCerts/batch1/indigency.php" );
                 printWindow.print();
        }

        function PrintBusPermit() {
                 printWindow = window.open("IssuanceCerts/batch1/business-permit.php" );
                 printWindow.print();
        }

        function PrintBrgyClearance() {
                 printWindow = window.open("IssuanceCerts/batch1/barangay-clearance.php" );
                 printWindow.print();
        }



            
</script>    
        
        </script>
    </section>


<?php include('footer.php'); ?>