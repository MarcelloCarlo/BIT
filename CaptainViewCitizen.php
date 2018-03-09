<?php 
session_start();
$title = 'Welcome | BarangayIT MK.II';
$currentPage = 'CaptainViewCitizen';
include('head.php');
include('NavbarCaptain.php');
?>

<?php
include('dbconn.php');

$query = "SELECT *
FROM
bitdb_r_citizen
";

$result = mysqli_query($bitMysqli,$query)
?>
<section class="content">
	<div class="container-fluid">

		<!-- Basic Examples -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							CITIZENS
							<small>The list of all the citizens of the barangay. </small>
						</h2>

                        <!--   <button type="button" class="btn bg-indigo waves-effect">
                            <i class="material-icons">add_circle_outline</i>
                            <a  href="Level1AddCirtizen.php" style= "text-decoration: none;"> 
                            <span>View</span></a>
                        </button> -->
                    </div>
                    <div class="body">
                    	<div class="table-responsive"> 
                    		<!--  table table-bordered table-striped table-hover dataTable js-exportable -->
                    		<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    			<thead>
                    				<tr>
                    					<th>Salutation</th>
                    					<th>First Name</th>
                    					<th>Middle Name</th>
                    					<th>Last Name</th>
                    					<th>Name Extension</th>
                    					<th>Email</th>
                    					<th>Height</th>
                    					<th>Weight</th>
                    					<th>Birth Place</th>
                    					<th>Nationality</th>
                    					<th>Status</th>
                    					<th>Civil Status</th>
                    					<th>Occupation</th>
                    					<th>Gender</th>
                    					<th>Blood Type</th>
                    					<th>HouseNo</th>
                    					<th>Street</th>
                    					<th>Zone</th>
                    					<th>Person in Contact</th>
                    					<th>Contact</th>
                    					<th>Date Recorded</th>

                    				</tr>
                    			</thead>
                    			<tfoot>
                    				<tr>
                    					<th>Salutation</th>
                    					<th>First Name</th>
                    					<th>Middle Name</th>
                    					<th>Last Name</th>
                    					<th>Name Extension</th>
                    					<th>Email</th>
                    					<th>Height</th>
                    					<th>Weight</th>
                    					<th>Birth Place</th>
                    					<th>Nationality</th>
                    					<th>Status</th>
                    					<th>Civil Status</th>
                    					<th>Occupation</th>
                    					<th>Gender</th>
                    					<th>Blood Type</th>
                    					<th>HouseNo</th>
                    					<th>Street</th>
                    					<th>Zone</th>
                    					<th>Person in Contact</th>
                    					<th>Contact</th>
                    					<th>Date Recorded</th>

                    				</tr>
                    			</tfoot>
                    			<tbody>
                    				<?php 
                    				while ($row = mysqli_fetch_assoc($result)) {
                    					?>
                    					<tr>
                    						<td><?php echo $row['Salutation'];?></td>
                    						<td><?php echo $row['First_Name'];?></td>
                    						<td><?php echo $row['Middle_Name'];?></td>
                    						<td><?php echo $row['Last_Name'];?></td>
                    						<td><?php echo $row['Name_Ext'];?></td>
                    						<td><?php echo $row['Citizen_Email'];?></td>
                    						<td><?php echo $row['Height'];?></td>
                    						<td><?php echo $row['Weight'];?></td>
                    						<td><?php echo $row['Birth_Place'];?></td>
                    						<td><?php echo $row['Nationality'];?></td>
                    						<td>
                    							<?php 
                    							if($row['Res_Status'] == 1)
                    							{
                    								echo $row['Res_Status'] = "Active";
                    							}
                    							else
                    							{
                    								echo $row['Res_Status'] = "Inactive";
                    							}
                    							?>
                    						</td>


                    						<td><?php echo $row['Civil_Status'];?></td>
                    						<td><?php echo $row['Occupation'];?></td> 
                    						<td>
                    							<?php 
                    							if($row['Gender'] == 1)
                    							{
                    								echo $row['Gender'] = "Male";
                    							}
                    							else
                    							{
                    								echo $row['Gender'] = "Female";
                    							}
                    							?>
                    						</td>
                    						<td><?php echo $row['Blood_Type'];?></td>
                    						<td><?php echo $row['House_No'];?></td>
                    						<td><?php echo $row['Street'];?></td>
                    						<td><?php echo $row['Zone'];?></td>
                    						<td><?php echo $row['Person_Con'];?></td>
                    						<td><?php echo $row['Contact'];?></td>
                    						<td><?php echo $row['Date_Rec'];?></td>
                    					</tr>
                    					<?php
                    				}
                    				mysqli_close($bitMysqli);
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

    <!--Add-->
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