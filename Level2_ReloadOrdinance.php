<?php
	include('dbconn.php');
	$OrdTable = ''; 
	$OrdTable .='
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
	';
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
                                            ON bitdb_r_citizen.Citizen_ID = bitdb_r_ordinance.Persons_Involved
                                        ORDER BY bitdb_r_ordinance.OrdinanceID';
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

            $OrdTable .='
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
                    $OrdTable .='
                            <span class="tag label label-info">'.$row2['Author'].'
                            </span></br>
                        ';
                }
            }

            $OrdTable .='
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
    $OrdTable .='</tbody>';

    // $TableArray = array('OrdTableContent' => $OrdTable);

    echo $OrdTable;
?>