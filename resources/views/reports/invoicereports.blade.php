@extends('layouts.master') @section('content') {{-- message --}} {!! Toastr::message() !!}
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="menu-title">
          <span>Main</span>
        </li>
        <li class="submenu">
          <a href="#">
            <i class="la la-dashboard"></i>
            <span> Dashboard</span>
            <span class="menu-arrow"></span>
          </a>
          <ul style="display: none;">
            <li>
              <a href="{{ route('home') }}">Admin Dashboard</a>
            </li>
            <li>
              <a href="{{ route('em/dashboard') }}">Employee Dashboard</a>
            </li>
          </ul>
        </li> @if (Auth::user()->role_name=='Admin') <li class="menu-title">
          <span>Authentication</span>
        </li>
        <li class="submenu">
          <a href="#">
            <i class="la la-user-secret"></i>
            <span> User Controller</span>
            <span class="menu-arrow"></span>
          </a>
          <ul style="display: none;">
            <li>
              <a href="{{ route('userManagement') }}">All User</a>
            </li>
            <li>
              <a href="{{ route('activity/log') }}">Activity Log</a>
            </li>
            <li>
              <a href="{{ route('activity/login/logout') }}">Activity User</a>
            </li>
          </ul>
        </li> @endif <li class="menu-title">
          <span>Employees</span>
        </li>
        <li class="submenu">
          <a href="#">
            <i class="la la-user"></i>
            <span> Employees</span>
            <span class="menu-arrow"></span>
          </a>
          <ul style="display: none;">
            <li>
              <a href="{{ route('all/employee/card') }}">All Employees</a>
            </li>
            <li>
              <a href="{{ route('form/holidays/new') }}">Holidays</a>
            </li>
            <li>
              <a href="{{ route('form/leaves/new') }}">Leaves (Admin) <span class="badge badge-pill bg-primary float-right">1</span>
              </a>
            </li>
            <li>
              <a href="{{route('form/leavesemployee/new')}}">Leaves (Employee)</a>
            </li>
            <li>
              <a href="{{ route('form/leavesettings/page') }}">Leave Settings</a>
            </li>
            <li>
              <a href="{{ route('attendance/page') }}">Attendance (Admin)</a>
            </li>
            <li>
              <a href="{{ route('attendance/employee/page') }}">Attendance (Employee)</a>
            </li>
            <li>
              <a href="{{ route('form/departments/page') }}">Departments</a>
            </li>
            <li>
              <a href="designations.html">Designations</a>
            </li>
            <li>
              <a href="timesheet.html">Timesheet</a>
            </li>
            <li>
              <a href="shift-scheduling.html">Shift & Schedule</a>
            </li>
            <li>
              <a href="overtime.html">Overtime</a>
            </li>
          </ul>
        </li>
        <li class="menu-title">
          <span>HR</span>
        </li>
        <li class="submenu">
          <a href="#">
            <i class="la la-files-o"></i>
            <span> Sales </span>
            <span class="menu-arrow"></span>
          </a>
          <ul style="display: none;">
            <li>
              <a href="estimates.html">Estimates</a>
            </li>
            <li>
              <a class="active" href="{{ route('form/invoice/view/page') }}">Invoices</a>
            </li>
            <li>
              <a href="payments.html">Payments</a>
            </li>
            <li>
              <a href="expenses.html">Expenses</a>
            </li>
            <li>
              <a href="provident-fund.html">Provident Fund</a>
            </li>
            <li>
              <a href="taxes.html">Taxes</a>
            </li>
          </ul>
        </li>
        <li class="submenu">
          <a href="#">
            <i class="la la-user"></i>
            <span> Payroll</span>
            <span class="menu-arrow"></span>
          </a>
          <ul style="display: none;">
            <li>
              <a href="{{ route('form/salary/page') }}"> Employee Salary </a>
            </li>
            <li>
              <a href="{{ url('form/salary/view') }}"> Payslip </a>
            </li>
            <li>
              <a href="{{ route('form/payroll/items') }}"> Payroll Items </a>
            </li>
          </ul>
        </li>
        <li class="submenu">
          <a href="#" class="noti-dot">
            <i class="la la-pie-chart"></i>
            <span> Reports </span>
            <span class="menu-arrow"></span>
          </a>
          <ul style="display: none;">
            <li>
              <a href="{{ route('form/expense/reports/page') }}"> Expense Report </a>
            </li>
            <li>
              <a class="active" href="{{ route('form/invoice/reports/page') }}"> Invoice Report </a>
            </li>
            <li>
              <a href="payments-reports.html"> Payments Report </a>
            </li>
            <li>
              <a href="employee-reports.html"> Employee Report </a>
            </li>
            <li>
              <a href="payslip-reports.html"> Payslip Report </a>
            </li>
            <li>
              <a href="attendance-reports.html"> Attendance Report </a>
            </li>
            <li>
              <a href="{{ route('form/leave/reports/page') }}"> Leave Report </a>
            </li>
            <li>
              <a href="{{ route('form/daily/reports/page') }}"> Daily Report </a>
            </li>
          </ul>
        </li>
        <li class="menu-title">
          <span>Performance</span>
        </li>
        <li class="submenu">
          <a href="#">
            <i class="la la-graduation-cap"></i>
            <span> Performance </span>
            <span class="menu-arrow"></span>
          </a>
          <ul style="display: none;">
            <li>
              <a href="{{ route('form/performance/indicator/page') }}"> Performance Indicator </a>
            </li>
            <li>
              <a href="performance.html"> Performance Review </a>
            </li>
            <li>
              <a href="performance-appraisal.html"> Performance Appraisal </a>
            </li>
          </ul>
        </li>
        <li class="submenu">
          <a href="#">
            <i class="la la-edit"></i>
            <span> Training </span>
            <span class="menu-arrow"></span>
          </a>
          <ul style="display: none;">
            <li>
              <a href="{{ route('form/training/list/page') }}"> Training List </a>
            </li>
            <li>
              <a href="{{ route('form/trainers/list/page') }}"> Trainers</a>
            </li>
            <li>
              <a href="{{ route('form/training/type/list/page') }}"> Training Type </a>
            </li>
          </ul>
        </li>
        <li class="menu-title">
          <span>Administration</span>
        </li>
        <li>
          <a href="assets.html">
            <i class="la la-object-ungroup"></i>
            <span>Assets</span>
          </a>
        </li>
        <li class="submenu">
          <a href="#">
            <i class="la la-briefcase"></i>
            <span> Jobs </span>
            <span class="menu-arrow"></span>
          </a>
          <ul style="display: none;">
            <li>
              <a href="user-dashboard.html"> User Dasboard </a>
            </li>
            <li>
              <a href="jobs-dashboard.html"> Jobs Dasboard </a>
            </li>
            <li>
              <a href="jobs.html"> Manage Jobs </a>
            </li>
            <li>
              <a href="manage-resumes.html"> Manage Resumes </a>
            </li>
            <li>
              <a href="shortlist-candidates.html"> Shortlist Candidates </a>
            </li>
            <li>
              <a href="interview-questions.html"> Interview Questions </a>
            </li>
            <li>
              <a href="offer_approvals.html"> Offer Approvals </a>
            </li>
            <li>
              <a href="experiance-level.html"> Experience Level </a>
            </li>
            <li>
              <a href="candidates.html"> Candidates List </a>
            </li>
            <li>
              <a href="schedule-timing.html"> Schedule timing </a>
            </li>
            <li>
              <a href="apptitude-result.html"> Aptitude Results </a>
            </li>
          </ul>
        </li>
        <li class="menu-title">
          <span>Pages</span>
        </li>
        <li class="submenu">
          <a href="#">
            <i class="la la-user"></i>
            <span> Profile </span>
            <span class="menu-arrow"></span>
          </a>
          <ul style="display: none;">
            <li>
              <a href="profile.html"> Employee Profile </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- /Sidebar -->
<!-- Page Wrapper -->
<div class="page-wrapper">
  <!-- Page Content -->
  <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="page-title">Invoice Report</h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Invoice Report</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /Page Header -->
    <!-- Search Filter -->
    <div class="row filter-row">
      <div class="col-sm-6 col-md-3">
        <div class="form-group form-focus select-focus">
          <select class="select floating">
            <option>Success</option>
            <option>Failed</option>
          </select>
          <label class="focus-label">Status</label>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="form-group form-focus select-focus">
          <select class="select floating">
            <option>Yesterday</option>
            <option>Today</option>
            <option>Current Month</option>
            <option>Last Week</option>
            <option>Last Month</option>
          </select>
          <label class="focus-label">Filter By</label>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <a href="#"  class="btn btn-success btn-block"> Search </a>
      </div>
      <div style="height: fit-content;    margin-left: 144px;" class="btn-group" role="group" aria-label="Basic example">
        <button type="button" id="tshow" class="btn btn-warning">Table</button>
        <button type="button" id="gshow" class="btn btn-info">Graph</button>
      </div>
    </div>
    <!-- /Search Filter -->
    
      <div class="row">
        <div class="col-md-12">



 
        
    <div id="graph_view" class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Total Revenue</h3>
                                    <div id="bar-charts"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Sales Overview</h3>
                                    <div id="line-charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    

        <div id="table_view">
          <div class="table-responsive">
            <table id="example" class="table table-striped custom-table mb-0 datatable" style="width:100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Bank/MFS</th>
                  <th>No of TX</th>
                  <th>TX Amount</th>
                  <th>Deducted Commission</th>
                  <th>Receivable (tk.)</th>
                  <th>Sum of Commission</th>
                  <th class="text-right">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <a href="{{ route('form/invoice/view/page') }}">BRAC</a>
                  </td>
                  <td>10</td>
                  <td>100000</td>
                  <td>2%</td>
                  <td>88200</td>
                  <td>
                    <span class="badge bg-inverse-success">2000</span>
                  </td>
                  <td class="text-right">
                    <div class="dropdown dropdown-action">
                      <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="edit-invoice.html">
                          <i class="fa fa-pencil m-r-5"></i> Edit </a>
                        <a class="dropdown-item" href="invoice-view.html">
                          <i class="fa fa-eye m-r-5"></i> View </a>
                        <a class="dropdown-item" href="#">
                          <i class="fa fa-file-pdf-o m-r-5"></i> Download </a>
                        <a class="dropdown-item" href="#">
                          <i class="fa fa-trash-o m-r-5"></i> Delete </a>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <a href="{{ route('form/invoice/view/page') }}">bKash</a>
                  </td>
                  <td>5</td>
                  <td>5000</td>
                  <td>3%</td>
                  <td>48500</td>
                  <td>150</td>
                  <td class="text-right">
                    <div class="dropdown dropdown-action">
                      <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="edit-invoice.html">
                          <i class="fa fa-pencil m-r-5"></i> Edit </a>
                        <a class="dropdown-item" href="invoice-view.html">
                          <i class="fa fa-eye m-r-5"></i> View </a>
                        <a class="dropdown-item" href="#">
                          <i class="fa fa-file-pdf-o m-r-5"></i> Download </a>
                        <a class="dropdown-item" href="#">
                          <i class="fa fa-trash-o m-r-5"></i> Delete </a>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>


      </div>
    </div>

<!-- graph view -->






  </div>
  <!-- /Page Content -->
</div>
<script>
$(document).ready(function(){
    $("#table_view").hide();
  $("#tshow").click(function(){
    $("#graph_view").hide();
    $("#table_view").show();
  });
  $("#gshow").click(function(){
    $("#table_view").hide();
    $("#graph_view").show();
  });





      // Setup - add a text input to each footer cell
      $('#example thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#example thead');
 
    var table = $('#example').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();
 
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();
 
                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
    });
});
</script>

<!-- /Page Wrapper --> @endsection