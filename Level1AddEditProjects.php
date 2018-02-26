<?php 
  session_start();
$title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'Level1AddEditProjects';?>
<?php include('head.php'); ?>
<?php include('Level1Navbar.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>
        <?php echo ($title);?>
    </title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

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

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <link href='plugins/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
    <link href='plugins/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <style>
        body {
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
            font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
        }

        #wrap {
            width: 1100px;
            margin: 0 auto;
        }

        #external-events {
            float: left;
            width: 150px;
            padding: 0 10px;
            border: 1px solid #ccc;
            background: #eee;
            text-align: left;
        }

        #external-events h4 {
            font-size: 16px;
            margin-top: 0;
            padding-top: 1em;
        }

        #external-events .fc-event {
            margin: 10px 0;
            cursor: pointer;
        }

        #external-events p {
            margin: 1.5em 0;
            font-size: 11px;
            color: #666;
        }

        #external-events p input {
            margin: 0;
            vertical-align: middle;
        }

        #calendar {
            float: right;
            width: 900px;
        }

    </style>

    <script src='plugins/fullcalendar/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {


            /* initialize the external events
            -----------------------------------------------------------------*/

            $('#external-events .fc-event').each(function() {

                // store data so the calendar knows to render an event upon drop
                $(this).data('event', {
                    title: $.trim($(this).text()), // use the element's text as the event title
                    stick: true // maintain when user navigates (see docs on the renderEvent method)
                });

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                });

            });


            /* initialize the calendar
            -----------------------------------------------------------------*/

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar
                drop: function() {
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                }
            });


        });

    </script>

</head>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">

            <div id='wrap'>

                <div id='external-events'>
                    <h4>Draggable Events</h4>
                    <div class='fc-event'>My Event 1</div>
                    <div class='fc-event'>My Event 2</div>
                    <div class='fc-event'>My Event 3</div>
                    <div class='fc-event'>My Event 4</div>
                    <div class='fc-event'>My Event 5</div>
                    <p>
                        <input type='checkbox' id='drop-remove' />
                        <label for='drop-remove'>remove after drop</label>
                    </p>
                </div>

                <div id='calendar'></div>

                <div style='clear:both'></div>

            </div>
            <h2>PROJECT MONITORING</h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            EDIT PROJECTS
                            <small>The list of all projects of the barangay. Click "VIEW" to view all  or "Edit" to modify on the existing record </small>
                            <br/>
                        </h2>
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
                                        <th>Project Name</th>
                                        <th>Location</th>
                                        <th>Description</th>
                                        <th>Phases</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Sponsors</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Location</th>
                                        <th>Description</th>
                                        <th>Phases</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Sponsors</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>02</td>
                                        <td>Oplan No Tambay</td>
                                        <td>N/A</td>
                                        <td>Remmel Ocay</td>
                                        <td>Insert your description Here</td>
                                        <td>February 10,2018</td>
                                        <td>Not Set</td>
                                        <td>Remmel Ocay</td>
                                        <td>
                                            <button type="button" class="btn btn-success waves-effect">
                                                        <i class="material-icons">mode_edit</i>
                                                        <span>EDIT</span>
                                                    </button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <form>
        <div class="modal fade" id="addCitModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Add Project
                            <br/>
                            <button type="button" class="btn btn-success waves-effect"> Import from Excel</button>
                        </h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix margin-0">
                            <h4 class="card-inside-title">Project Name</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">Name of the project</label>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Location</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">Place of Event</label>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Description</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">Project Details</label>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Phases</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">Project stages</label>
                                </div>
                                <h4 class="card-inside-title">Start Date</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="data-target" class="form-control" />
                                        <label class="form-label">Date started</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">End Date</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="data-target" class="form-control" />
                                        <label class="form-label">Expiry date of a project</label>
                                    </div>
                                </div>
                                <h4 class="card-inside-title">Sponsors</h4>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="data-target" class="form-control" />
                                        <label class="form-label">People involve</label>
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
                            <button type="button" class="btn btn-link waves-effect">ADD</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>

</section>


<?php include('footer.php'); ?>


</body>

</html>
