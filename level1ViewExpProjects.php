<?php 
  session_start();
$title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'Level1ViewExpProjects';?>
<?php include('head.php'); ?>
<?php include('Level1Navbar.php'); ?>
<link href='../fullcalendar.min.css' rel='stylesheet' />
<link href='../fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='../lib/moment.min.js'></script>
<script src='../lib/jquery.min.js'></script>
<script src='../lib/jquery-ui.min.js'></script>
<script src='../fullcalendar.min.js'></script>
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
        revert: true,      // will cause the event to go back to its
        revertDuration: 0  //  original position after the drag
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
<style>

  body {
    margin-top: 40px;
    text-align: center;
    font-size: 14px;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
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
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>PROJECT MONITORING</h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            PROJECT MONITORING
                            <small>The list of all the projects in the barangay. Click "VIEW" to view all  or "Edit" to modify on the existing record</small>
                        </h2>
                        <br/>
                        <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addCitModal">
                            <i class="material-icons">add_circle_outline</i>
                            <span>ADD NEW</span>
                        </button>

                        <!--    <button type="button" class="btn bg-indigo waves-effect" href="Level1AddBusinesses.php"> 
                            <a href="Level1AddBusinesses.php" style= "text-decoration: none;"> 
                            <i class="material-icons">add_circle_outline</i>
                            <span>Add/Edit</span></a>
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
                                        <td>Kasalang Barangay</td>
                                        <td>Barangay Hall</td>
                                        <td>Insert Description Here</td>
                                        <td>Not Set</td>
                                        <td>Feb 14, 2018</td>
                                        <td>Feb 20, 2018</td>
                                        <td>Not Set</td>
                                        <td>Remmel Ocay</td>
                                        <td>
                                            <button type="button" class="btn btn-success waves-effect">
                                                        <i class="material-icons">mode_edit</i>
                                                        <span>EDIT</span>
                                                    </button>
                                        </td>

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
                            <h4 class="card-inside-title">Business Name</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">Business Name</label>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Location</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">Location</label>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Manager</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">Manager</label>
                                </div>
                            </div>
                            <h4 class="card-inside-title">Manager Address</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">Manager Address</label>
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
