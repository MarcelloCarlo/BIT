<?php
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $currentPage = 'indexLevel1';
    include('AdminConfig.php');
    include('head.php');
    include('Level1Navbar.php');
 ?>

 <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Offline Google Fonts -->
    <link href="css/materialIcons.css" rel="stylesheet" type="text/css" />
    <link href="css/robotoFont.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Morris Css -->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <!-- CALENDAR THEME -->
    <link href='ProjectMonitoring/fullcalendar.min.css' rel='stylesheet' />
    <link href='ProjectMonitoring/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <link href='ProjectMonitoring/calendarstyle.css' rel='stylesheet' />
</head>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <!--CUSTOM BLOCK INSERT HERE-->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-red">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">

                             <?php
                                include_once('dbconn.php');

                                $CountBusinessSQL = 'SELECT COUNT(BusinessID) AS BusinessCount FROM bitdb_r_business';
                                $CountBusinessQuery = mysqli_query($bitMysqli,$CountBusinessSQL) or die (mysqli_error($bitMysqli));
                                if(mysqli_num_rows($CountBusinessQuery) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($CountBusinessQuery))
                                    {
                                        $BusinessCount = $row['BusinessCount'];
                                        echo '<div class="text">CURRENT BUSINESSES</div>
                                            <div class="number count-to" data-from="0" data-to="'.$BusinessCount.'"data-speed="1000" data-fresh-interval="20"></div>';
                                    }
                                }
                            ?>


                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-indigo">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <?php
                                include_once('dbconn.php');

                                $CountCitizenSQL = 'SELECT COUNT(Citizen_ID) AS CitizenCount FROM bitdb_r_citizen';
                                $CountCitizenQuery = mysqli_query($bitMysqli,$CountCitizenSQL) or die (mysqli_error($bitMysqli));
                                if(mysqli_num_rows($CountCitizenQuery) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($CountCitizenQuery))
                                    {
                                        $CitizenCount = $row['CitizenCount'];
                                        echo '<div class="text">CURRENT POPULATION</div>
                                                <div class="number count-to" data-from="0" data-to="'.$CitizenCount.'" data-speed="1000" data-fresh-interval="20"></div>';
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-purple">
                        <div class="icon">
                            <i class="material-icons">report_problem</i>
                        </div>
                        <div class="content">

                         <?php
                                include_once('dbconn.php');$BlotterCount="";

                                $CountBlotterSQL = 'SELECT COUNT(BlotterID) AS BlotterCount FROM bitdb_r_blotter';
                                $CountBlotterQuery = mysqli_query($bitMysqli,$CountBlotterSQL) or die (mysqli_error($bitMysqli));
                                if(mysqli_num_rows($CountBlotterQuery) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($CountBlotterQuery))
                                    {
                                        $BlotterCount = $row['BlotterCount'];
                                        echo '<div class="text">BLOTTERS REPORTED</div>
                            <div class="number count-to" data-from="0" data-to="'.$BlotterCount.'"data-speed="1000" data-fresh-interval="20"></div>';
                                    }

                                   
                                } echo "<i class='BlotterCount hidden'>".$BlotterCount."</i>";
                            ?>
                             <?php
                                include_once('dbconn.php');
                                $BlotterPatawagCount ="";

                                $CountBlotterPatawagSQL = 'SELECT COUNT(SummonBlotter.BlotterPatawagCount) AS BlotterPatawagCount FROM (SELECT DISTINCT bitdb_r_summons.BlotterID AS BlotterPatawagCount FROM bitdb_r_summons) AS SummonBlotter';
                                $CountBlotterPatawagQuery = mysqli_query($bitMysqli,$CountBlotterPatawagSQL) or die (mysqli_error($bitMysqli));
                                if(mysqli_num_rows($CountBlotterPatawagQuery) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($CountBlotterPatawagQuery))
                                    {
                                        $BlotterPatawagCount = $row['BlotterPatawagCount'];
                                        // echo "$BlotterPatawagCount";
                                        
                                    }
                                }
                                    echo "<i class='BlotterPatawagCount hidden'>".$BlotterPatawagCount."</i>";
                            ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-deep-purple">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">

                            <?php
                                include_once('dbconn.php');

                                $CountOrdinanceSQL = 'SELECT COUNT(OrdinanceID) AS OrdinanceCount FROM bitdb_r_ordinance';
                                $CountOrdinanceQuery = mysqli_query($bitMysqli,$CountOrdinanceSQL) or die (mysqli_error($bitMysqli));
                                if(mysqli_num_rows($CountOrdinanceQuery) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($CountOrdinanceQuery))
                                    {
                                        $OrdinanceCount = $row['OrdinanceCount'];
                                        echo '<div class="text">ORDINANCES IMPOSED</div>
                            <div class="number count-to" data-from="0" data-to="'.$OrdinanceCount.'"data-speed="1500" data-fresh-interval="20"></div>';
                                    }
                                }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <!-- Line Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 hide">
                    <div class="card">
                        <div class="header">
                            <h2>BLOTTER RECORDS PER YEAR</h2>
                        </div>
                        <div class="body">
                            <canvas id="line_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Line Chart -->
                <!-- Bar Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 hide">
                    <div class="card">
                        <div class="header">
                            <h2>BLOTTER RECORDS PER MONTH</h2>
                        </div>
                        <div class="body">
                            <canvas id="bar_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Bar Chart -->
            </div>
            <!-- Highcharts Js-->
            <div class="row clearfix">
                <!-- Pie Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <!-- Highcharts Js-->

                    <script src="plugins/code/highcharts.js"></script>
                    <script src="plugins/code/modules/exporting.js"></script>

                    <div id="BlotZone" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                    <script type="text/javascript">

                    Highcharts.chart('BlotZone', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'bar'
                        },
                        title: {
                            text: 'Blotter Recorded per Zone/Areas'
                        },
                        subtitle: {
                            text: 'BLOTTERS PER AREA'
                        },
                        xAxis: {
                            categories: [
                            <?php
                            include_once('dbconn.php');

                                $ZoneBCountSQL = 'SELECT DISTINCT Blot.IncidentArea AS B, Zone.Zone,(SELECT COUNT(BlotterID) FROM bitdb_r_blotter WHERE IncidentArea = B) AS BCount FROM bitdb_r_blotter AS Blot INNER JOIN bitdb_r_barangayzone AS Zone ON Blot.IncidentArea = Zone.ZoneID';
                                $ZoneBCountQuery = mysqli_query($bitMysqli,$ZoneBCountSQL) or die (mysqli_error($bitMysqli));
                                if(mysqli_num_rows($ZoneBCountQuery) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($ZoneBCountQuery))
                                    {
                                        $B = $row['B'];
                                        $Zone = $row['Zone'];
                                        $BCount = $row['BCount'];
                                        echo    "'".$Zone."',";
                                    }
                                }
                            ?>
                            ],
                            crosshair: true
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Blotter Records'
                            }
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.y:.0f}</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.y:.0f}',
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                    }
                                }
                            }
                        },
                        series: [{
                            name: 'Records',
                            colorByPoint: true,
                            data: 
                            [
                            <?php
                            include_once('dbconn.php');

                                $ZoneBCountSQL = 'SELECT DISTINCT Blot.IncidentArea AS B, Zone.Zone,(SELECT COUNT(BlotterID) FROM bitdb_r_blotter WHERE IncidentArea = B) AS BCount FROM bitdb_r_blotter AS Blot INNER JOIN bitdb_r_barangayzone AS Zone ON Blot.IncidentArea = Zone.ZoneID';
                                $ZoneBCountQuery = mysqli_query($bitMysqli,$ZoneBCountSQL) or die (mysqli_error($bitMysqli));
                                if(mysqli_num_rows($ZoneBCountQuery) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($ZoneBCountQuery))
                                    {
                                        $B = $row['B'];
                                        $Zone = $row['Zone'];
                                        $BCount = $row['BCount'];
                                        echo    "{
                                                    name: '".$Zone."',
                                                    y: ".$BCount."
                                                },";
                                    }
                                }
                            ?>
                            ]
                        }]
                    });
                    </script>    
                </div>
                <!-- #END# Pie Chart -->
                <!-- Bar Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div id="BlotMonth" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                    <script type="text/javascript">

                    Highcharts.chart('BlotMonth', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'column'
                        },
                        title: {
                            text: 'Blotter Recorded per Month'
                        },
                        subtitle: {
                            text: 'Monthly Blotters'
                        },
                        xAxis: {
                            categories: [
                                'Jan',
                                'Feb',
                                'Mar',
                                'Apr',
                                'May',
                                'Jun',
                                'Jul',
                                'Aug',
                                'Sep',
                                'Oct',
                                'Nov',
                                'Dec'
                            ],
                            crosshair: true
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Number of Records'
                            }
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.y:.0f}</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.y:.0f}',
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                    }
                                }
                            }
                        },
                        series: [{
                            name: 'Records',
                            colorByPoint: true,
                            data: 
                            [
                            <?php
                            include_once('dbconn.php');
                                for($ctr=1;$ctr<=12;$ctr++)
                                {
                                    $MBCountSQL = 'SELECT COUNT(BlotterID) AS BCount FROM bitdb_r_blotter WHERE MONTH(ComplaintDate) = '.$ctr.' AND YEAR(ComplaintDate) = YEAR(CURDATE())';
                                    $MBCountQuery = mysqli_query($bitMysqli,$MBCountSQL) or die (mysqli_error($bitMysqli));
                                    if(mysqli_num_rows($MBCountQuery) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($MBCountQuery))
                                        {
                                            switch ($ctr)
                                            {
                                                case 1:
                                                {
                                                    $Month='January';
                                                    break;
                                                }
                                                case 2:
                                                {
                                                    $Month='February';
                                                    break;
                                                }
                                                case 3:
                                                {
                                                    $Month='March';
                                                    break;
                                                }
                                                case 4:
                                                {
                                                    $Month='April';
                                                    break;
                                                }
                                                case 5:
                                                {
                                                    $Month='May';
                                                    break;
                                                }
                                                case 6:
                                                {
                                                    $Month='June';
                                                    break;
                                                }
                                                case 7:
                                                {
                                                    $Month='July';
                                                    break;
                                                }
                                                case 8:
                                                {
                                                    $Month='August';
                                                    break;
                                                }
                                                case 9:
                                                {
                                                    $Month='September';
                                                    break;
                                                }
                                                case 10:
                                                {
                                                    $Month='October';
                                                    break;
                                                }
                                                case 11:
                                                {
                                                    $Month='November';
                                                    break;
                                                }
                                                case 12:
                                                {
                                                    $Month='December';
                                                    break;
                                                }
                                                default:
                                                {
                                                    $Month ="WEW";
                                                    break;
                                                }
                                            }

                                            $BCount = $row['BCount'];
                                            echo    "{
                                                        name: '".$Month."',
                                                        y: ".$BCount."
                                                    },";
                                        }
                                    }

                                }
                                
                            ?>
                            ]
                        }]
                    });
                    </script>    
                </div>
            </div>
            <div class="row clearfix" style="margin-top: 20px;">
                <!-- Pie Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <script src="plugins/code/highcharts.js"></script>
                    <script src="plugins/code/modules/exporting.js"></script>
                    <script src="plugins/code/modules/data.js"></script>
                    <script src="plugins/code/modules/drilldown.js"></script>

                    <div id="BusinessZone" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                    <script type="text/javascript">

                        // Create the chart
                        Highcharts.chart('BusinessZone', {
                            chart: {
                                type: 'pie'
                            },
                            title: {
                                text: 'Businesses in Every Zone / Area'
                            },
                            subtitle: {
                                text: 'Zone / Area'
                            },
                            plotOptions: {
                                series: {
                                    dataLabels: {
                                        enabled: false,
                                        format: '{point.name}: {point.y:.0f}%'
                                    }
                                }
                            },

                            tooltip: {
                                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> of total<br/>'
                            },
                            series: [{
                                name: 'Zone / Area',
                                colorByPoint: true,
                                data: [
                                <?php
                                    include_once('dbconn.php');
                                    $ZBCountSQL = 'SELECT DISTINCT BARZONE.ZoneID AS ZID,
                                                                    BARZONE.Zone AS ZNAME,
                                                                (SELECT 
                                                                    COUNT(BusinessID) AS BUSICTR
                                                                FROM bitdb_r_business
                                                                WHERE bitdb_r_business.BusinessLoc = ZID) AS BUSICOUNT
                                                FROM bitdb_r_business 
                                                    AS BUSI
                                                INNER JOIN bitdb_r_barangayzone
                                                    AS BARZONE
                                                    ON BUSI.BusinessLoc = BARZONE.ZoneID';
                                    $ZBCountQuery = mysqli_query($bitMysqli,$ZBCountSQL) or die (mysqli_error($bitMysqli));
                                    if(mysqli_num_rows($ZBCountQuery) > 0)
                                    {
                                        while($row2 = mysqli_fetch_assoc($ZBCountQuery))
                                        {
                                            $BusiCount = $row2['BUSICOUNT'];
                                            $BusiZone = $row2['ZNAME'];
                                            echo
                                            "{
                                                name: '".$BusiZone."',
                                                y: ".$BusiCount.",
                                                drilldown: '".$BusiZone."'
                                            },";
                                        }
                                    }
                                ?>
                                ]
                            }],
                            drilldown: {
                                series: 
                                [
                                <?php
                                    include_once('dbconn.php');
                                    $BusiZoneSQL = 'SELECT DISTINCT BARZONE.ZoneID AS ZID,
                                                                    BARZONE.Zone AS ZNAME
                                                FROM bitdb_r_business 
                                                    AS BUSI
                                                INNER JOIN bitdb_r_barangayzone
                                                    AS BARZONE
                                                    ON BUSI.BusinessLoc = BARZONE.ZoneID';
                                    $BusiZoneQuery = mysqli_query($bitMysqli,$BusiZoneSQL) or die (mysqli_error($bitMysqli));
                                    if(mysqli_num_rows($BusiZoneQuery) > 0)
                                    {
                                        while($row2 = mysqli_fetch_assoc($BusiZoneQuery))
                                        {
                                            $BusiID = $row2['ZID'];
                                            $BusiZone = $row2['ZNAME'];

                                        echo "{
                                                name: '".$BusiZone."',
                                                id: '".$BusiZone."',
                                                data: 
                                                [";

                                            $BusiCatSQL = 'SELECT COUNT(BUSI.BusinessCategory) AS CATCTR,
                                                                BCAT.categoryName
                                                        FROM bitdb_r_business 
                                                            AS BUSI
                                                        INNER JOIN bitdb_r_barangayzone
                                                            AS BARZONE
                                                            ON BUSI.BusinessLoc = BARZONE.ZoneID
                                                        INNER JOIN bitdb_r_businesscategory
                                                            AS BCAT
                                                            ON BUSI.BusinessCategory = BCAT.categoryID
                                                        WHERE BARZONE.ZoneID ='.$BusiID.'';
                                            $BusiCatQuery = mysqli_query($bitMysqli,$BusiCatSQL) or die (mysqli_error($bitMysqli));
                                            if(mysqli_num_rows($BusiCatQuery) > 0)
                                            {
                                                while($row3 = mysqli_fetch_assoc($BusiCatQuery))
                                                {
                                                    $Category = $row3['categoryName'];
                                                    $CategoryCtr = $row3['CATCTR'];
                                                    echo "['".$Category."', ".$CategoryCtr."],";
                                                }
                                            }
                                            echo
                                            "
                                                ]
                                            },";
                                        }
                                    }
                                ?>
                                
                                ]
                            }
                        });
                    </script>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <script src="plugins/code/highcharts.js"></script>
                    <script src="plugins/code/modules/exporting.js"></script>
                    <script src="plugins/code/modules/data.js"></script>
                    <script src="plugins/code/modules/drilldown.js"></script>

                    <div id="PopulationZone" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                    <script type="text/javascript">

                        // Create the chart
                        Highcharts.chart('PopulationZone', {
                            chart: {
                                type: 'pie'
                            },
                            title: {
                                text: 'Population in Every Zone / Area'
                            },
                            subtitle: {
                                text: 'Zone / Area'
                            },
                            plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.y:.0f}',
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                        }
                                    }
                                }
                            },

                            tooltip: {
                                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> of total<br/>'
                            },
                            series: [{
                                name: 'Zone / Area',
                                colorByPoint: true,
                                data: [
                                <?php
                                    include_once('dbconn.php');
                                    $CitiCountSQL = 'SELECT DISTINCT BARZONE.ZoneID AS ZID,
                                                                    BARZONE.Zone AS ZNAME,
                                                                (SELECT 
                                                                    COUNT(Citizen_ID) AS CITICTR
                                                                FROM bitdb_r_citizen
                                                                WHERE bitdb_r_citizen.Zone = ZID) AS CITICOUNT
                                                FROM bitdb_r_citizen
                                                    AS CITI
                                                INNER JOIN bitdb_r_barangayzone
                                                    AS BARZONE
                                                    ON CITI.Zone = BARZONE.ZoneID';
                                    $CitiCountQuery = mysqli_query($bitMysqli,$CitiCountSQL) or die (mysqli_error($bitMysqli));
                                    if(mysqli_num_rows($CitiCountQuery) > 0)
                                    {
                                        while($row2 = mysqli_fetch_assoc($CitiCountQuery))
                                        {
                                            $CitiCount = $row2['CITICOUNT'];
                                            $CitiZone = $row2['ZNAME'];
                                            echo
                                            "{
                                                name: '".$CitiZone."',
                                                y: ".$CitiCount.",
                                                drilldown: '".$CitiZone."'
                                            },";
                                        }
                                    }
                                ?>
                                ]
                            }]
                        });
                    </script>
                </div>
                <!-- #END# Pie Chart -->
                <!-- Bar Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 hide">
                    <div class="card">
                        <div class="header">
                            <h2>TOTAL RECORDED BLOTTER</h2>
                        </div>
                        <div id="donut_chart" class="graph" style="height: 260px"></div>
                    </div>
                </div>
            </div>
            <!-- #END# Bar Chart -->
            <div class="row clearfix" style="margin-top: 20px;">
                <!-- Pie Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 hide">
                    <div class="card">
                        <div class="header">
                            <h2>RECORDED BLOTTER PER ZONE</h2>
                        </div>
                        <div class="body">
                            <canvas id="pie_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Pie Chart -->
                 <!-- Donut Chart -->
                
                <div class="col-sm-12 col-xs-12">
                    <div id="IssuanceMonth" style="height: 400px;  min-width: 100%;"></div>
                    <script type="text/javascript">

                    Highcharts.chart('IssuanceMonth', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'line'
                        },
                        title: {
                            text: 'Permit Issued per Month'
                        },
                        xAxis: {
                            categories: [
                                'Jan',
                                'Feb',
                                'Mar',
                                'Apr',
                                'May',
                                'Jun',
                                'Jul',
                                'Aug',
                                'Sep',
                                'Oct',
                                'Nov',
                                'Dec'
                            ],
                            crosshair: true
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Permits Issued'
                            }
                        },
                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
                            footerFormat: '</table>',
                            shared: true,
                            useHTML: true
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: [
                        <?php
                            include_once('dbconn.php');
                                
                                    $IssuanceTypeSQL = 'SELECT IssuanceID, IssuanceType FROM bitdb_r_issuancetype';
                                    $IssuanceTypeQuery = mysqli_query($bitMysqli,$IssuanceTypeSQL) or die (mysqli_error($bitMysqli));
                                    if(mysqli_num_rows($IssuanceTypeQuery) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($IssuanceTypeQuery))
                                        {
                                            $IssuanceID = $row['IssuanceID'];
                                            $Type = $row['IssuanceType'];

                                            echo "{name: '".$Type."',
                                                    data:[";

                                            for($ctr=1;$ctr<=12;$ctr++)
                                            {
                                                $IssuanceSQL = 'SELECT COUNT(IssuanceID) AS IssuanceCount, IssuanceType FROM `bitdb_r_issuance` WHERE MONTH(IssuanceDate) ='.$ctr.' AND IssuanceType = '.$IssuanceID.' ';
                                                $IssuanceQuery = mysqli_query($bitMysqli,$IssuanceSQL) or die (mysqli_error($bitMysqli));
                                                if(mysqli_num_rows($IssuanceQuery) > 0)
                                                {
                                                    while($row2 = mysqli_fetch_assoc($IssuanceQuery))
                                                    {
                                                        if($ctr == 12)
                                                        {
                                                            $IssuanceCount = $row2['IssuanceCount'];
                                                            echo ''.$IssuanceCount.'';
                                                        }
                                                        else
                                                        {
                                                            $IssuanceCount = $row2['IssuanceCount'];
                                                            echo ''.$IssuanceCount.',';

                                                        }
                                                    }
                                                }
                                            }

                                            echo "]},";
                                        }
                                    }

                            ?>
                            
                            ]
                    });
                    </script>    
                </div>
            </div>
                <!-- #END# Donut Chart -->
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
            <div class="card">
                <div class="header">
                    <h2>
                        BARANGAY INFORMATION
                        <small>Current Barangay information. Contact your System Administrator to modify this information.</small>
                    </h2>
                </div>
                <div class="body">
                    <div class="list-group">
                        <a href="javascript:void(0);" class="list-group-item">
                            <h4 class="list-group-item-heading">City/Municipality</h4>
                            <p class="list-group-item-text">
                                <?php echo $c_Type?>
                            </p>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item">
                            <h4 class="list-group-item-heading">Independent/Component</h4>
                            <p class="list-group-item-text">
                                <?php echo $b_Type?>
                            </p>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item">
                            <h4 class="list-group-item-heading">Province Name</h4>
                            <p class="list-group-item-text">
                                <?php echo $ProvinceName?>
                            </p>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item">
                            <h4 class="list-group-item-heading">City/Municipality Name</h4>
                            <p class="list-group-item-text">
                                <?php echo $Municipality?>
                            </p>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item">
                            <h4 class="list-group-item-heading">Barangay Name</h4>
                            <p class="list-group-item-text">
                                <?php echo $BarangayName?>
                            </p>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item">
                            <h4 class="list-group-item-heading">Signatory (Barangay Chairman)</h4>
                            <p class="list-group-item-text">
                                <?php echo $WName?>
                            </p>
                        </a>
                        <?php 
                            echo '
                            <a href="javascript:void(0);" class="list-group-item">
                                <h4 class="list-group-item-heading">City/Municipal Seal</h4>
                                <img src="images/'.$MunicipalSeal.'" alt="profile image" class="circle z-depth-2 responsive-img activator" style="width:100px; height:auto;">
                            </a>
                            <a href="javascript:void(0);" class="list-group-item">
                                <h4 class="list-group-item-heading">Barangay Seal</h4>
                                <img src="images/'.$BarangaySeal.'" alt="profile image" class="circle z-depth-2 responsive-img activator" style="width:100px; height:auto;">
                                
                            </a>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="area_chart" class="graph hide"></div>
</section>


<?php include('footerblock.php'); ?>

<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- SweetAlert Plugin Js -->
<script src="plugins/sweetalert/sweetalert.min.js"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>

<!-- Bootstrap Colorpicker Js -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

<!-- Dropzone Plugin Js -->
<script src="plugins/dropzone/dropzone.js"></script>

<!-- Input Mask Plugin Js -->
<script src="plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

<!-- Multi Select Plugin Js -->
<script src="plugins/multi-select/js/jquery.multi-select.js"></script>

<!-- Jquery Spinner Plugin Js -->
<script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>

<!-- Bootstrap Tags Input Plugin Js -->
<script src="plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- JQuery Steps Plugin Js -->
<script src="plugins/jquery-steps/jquery.steps.js"></script>

<!-- Morris Plugin Js -->
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/morrisjs/morris.js"></script>

<!-- Chart Plugins Js -->
<script src="plugins/chartjs/Chart.bundle.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/charts/chartjs.js"></script>
<script src="js/pages/charts/morris.js"></script>
<script src="js/pages/widgets/infobox/infobox-4.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>

</body>
</html>
