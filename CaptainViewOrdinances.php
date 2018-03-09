<?php
session_start(); 
$title = 'Welcome | BarangayIT MK.II'; 
$currentPage = 'CaptainViewOrdinances';
include('head.php');
include('NavbarCaptain.php'); 
?>
<?php
include('dbconn.php');

$query = "SELECT * FROM bitdb_r_ordinance";

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
                            ORDINANCE LIST
                            <small>The list of all the ordinances of the barangay.</small>
                        </h2>
                        <br/>

                         <!--   <button type="button" class="btn bg-indigo waves-effect" href="Level1ViewEditCitizen.php"> 
                            <a href="Level1ViewEditCitizen.php" style= "text-decoration: none;"> 
                            <i class="material-icons">add_circle_outline</i>
                            <span>Add/Edit</span></a>
                        </button> -->
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>

                                       
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Description</th>
                                        <th>Date Implemented</th>
                                        <th>Status</th>
                                        <th>Sanction</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>

                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Description</th>
                                        <th>Date Implemented</th>
                                        <th>Status</th>
                                        <th>Sanction</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php 
                                  while ($row = mysqli_fetch_assoc($result)) {
                                        # code...
                                    ?>
                                    <tr>

                                        <td><?php echo $row['OrdinanceTitle'];?></td>
                                        <td><?php echo $row['Author'];?></td>
                                        <td><?php echo $row['OrdDesc'];?></td>
                                        <td><?php echo $row['DateImplemented'];?></td>
                                         <td><?php 
                                            if($row['OrdStatus'] == 1)
                                            {
                                             echo $row['OrdStatus'] = "Active";
                                         }
                                         else
                                         {
                                            echo $row['OrdStatus'] = "Inactive";
                                        }
                                        ?>
                                        <td><?php echo $row['Sanction'];?></td>
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
    <!-- #END# Basic Examples -->
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        EXPORT TABLE
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Authors</th>
                                    <th>Description</th>
                                    <th>Date of Implementation</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Authors</th>
                                    <th>Description</th>
                                    <th>Date of Implementation</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                            <tbody>                                        
                                <tr>
                                    <td>Insert Title Here</td>
                                    <td>Insert Category Here</td>
                                    <td>Insert Authors Here</td>
                                    <td>Insert Description Here</td>
                                    <td>Insert Date here</td>
                                    <td>Status Not Set</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
</div>
</section>


<?php include('footer.php'); ?>