<?php
    session_start(); 
    $title = 'Welcome | BarangayIT MK.II'; 
    $user = 2;
    include_once('LoginCheck.php');
    $currentPage = 'Level2Ordinances';
    include('head.php');
    include('Level2_Navbar.php'); 
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
                            <table id="OrdTBL" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th class="hide">ID</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Description</th>
                                        <th>Date Implemented</th>
                                        <th>Status</th>
                                        <th class="hide">Sanction</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="hide">ID</th>
                                        <th >Title</th>
                                        <th>Author</th>
                                        <th>Description</th>
                                        <th>Date Implemented</th>
                                        <th>Status</th>
                                        <th class="hide">Sanction</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php 
                                $Level2OrdinanceSQL = 'SELECT   bitdb_r_ordinance.OrdinanceID,
                                                                            bitdb_r_ordinance.OrdinanceTitle,
                                                                            bitdb_r_ordinancecategory.OrdinanceTitle AS Category,
                                                                            bitdb_r_ordinance.Persons_Involved,
                                                                            bitdb_r_ordinance.OrdDesc,
                                                                            bitdb_r_ordinance.DateImplemented,
                                                                            bitdb_r_ordinance.OrdStatus,
                                                                            bitdb_r_ordinance.Sanction,
                                                                            bitdb_r_ordinance.Persons_Involved,
                                                                            IFNULL(bitdb_r_citizen.First_Name,"") AS First_Name,
                                                                            IFNULL(bitdb_r_citizen.Middle_Name,"") AS Middle_Name,
                                                                            IFNULL(bitdb_r_citizen.Last_Name,"") AS Last_Name,
                                                                            IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Ext
                                                                    FROM bitdb_r_ordinance
                                                                    INNER JOIN bitdb_r_ordinancecategory
                                                                        ON bitdb_r_ordinance.CategoryID = bitdb_r_ordinancecategory.OrdCategoryID
                                                                    LEFT JOIN bitdb_r_citizen
                                                                        ON bitdb_r_citizen.Citizen_ID = bitdb_r_ordinance.Persons_Involved';
                                $Level2OrdinanceQuery = mysqli_query($bitMysqli,$Level2OrdinanceSQL) or die (mysqli_error($bitMysqli));
                                if(mysqli_num_rows($Level2OrdinanceQuery) > 0)
                                {
                                    while ($row = mysqli_fetch_assoc($Level2OrdinanceQuery)) 
                                    {
                                        $OrdID = $row['OrdinanceID'];
                                        $OrdTitle = $row['OrdinanceTitle'];
                                        $Category = $row['Category'];
                                        $PerInv = $row['Persons_Involved'];
                                        $PersonInvolve = ''.$row['First_Name'].' '.$row['Middle_Name'].' '.$row['Last_Name'].' '.$row['Name_Ext'].'';
                                        $OrdDesc = $row['OrdDesc'];
                                        $Date = $row['DateImplemented'];
                                        $Sanction = $row['Sanction'];

                                        if($row['OrdStatus'] == 1)
                                        {
                                            $OrdStatus = "Active";
                                            $DisButton = '<button class="btn btn-danger btn-Ord">Disable</button>';
                                        }
                                        else
                                        {
                                            $OrdStatus = "Inactive";
                                            $DisButton = '<button class="btn btn-info btn-Ord">Enable</button>';
                                        }

                                        echo '
                                        <tr>
                                            <td class="hide">'.$OrdID.'</td>
                                            <td>'.$OrdTitle.'</td>
                                            <td>';

                                        $SelectAuthorSQL = 'SELECT * FROM bitdb_r_ordinanceauthor WHERE OrdinanceID ='.$OrdID.' AND Status=1 ';
                                        $SelectAuthorQuery = mysqli_query($bitMysqli,$SelectAuthorSQL) or die (mysqli_error($bitMysqli));
                                        if(mysqli_num_rows($SelectAuthorQuery) > 0)
                                        {
                                            while($row2 = mysqli_fetch_assoc($SelectAuthorQuery))
                                            {
                                                echo'
                                                        <span class="tag label label-info">'.$row2['Author'].'
                                                        </span></br>
                                                    ';
                                            }
                                        }

                                        echo'
                                            </td>  
                                            <td>'.$OrdDesc.'</td>
                                            <td>'.$Date.'</td>
                                            <td>'.$OrdStatus.'</td>
                                            <td class="hide">'.$Sanction.'</td>
                                            <td>'.$DisButton.'</td>
                                        </tr>
                                            ';
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
    <!-- Exportable Table -->
    <!-- <div class="row clearfix">
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
    </div> -->
    <!-- #END# Exportable Table -->
</div>
</section>
<?php include('footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function(){

        function ReloadTable()
        {
            $.ajax({
                url:"Level2_ReloadOrdinance.php",
                method: 'get',
                datatype: 'json',
                success:function(data)
                { 
                    $('#OrdTBL').html(data);
                },
                error:function()
                {
                    alert("error");
                }
            });
        }

        $(document).on('click','.btn-Ord',function(){
        var OrdID = $(this).closest('tbody tr').find('td:eq(0)').text();
        var OrdStat = $(this).closest('tbody tr').find('td:eq(5)').text();
        $.ajax({
            url:"Level2_EditOrdinance.php",
            type:"POST",
            data: {ID:OrdID,Status:OrdStat},
            success:function(data)
            {
                ReloadTable();
            } 
            });
        });

    
    });

    

</script>