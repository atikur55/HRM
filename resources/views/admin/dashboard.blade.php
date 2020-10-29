@extends('layouts.default')

@section('meta')
<title>Dashboard | Workday Time Clock</title>
<meta name="description" content="Workday dashboard, view recent attendance, recent leaves of absence, and newest employees">
@endsection

@section('content')

<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-one">
        <div class="widget-heading">
            <h5 class="">Revenue</h5>
            <ul class="tabs tab-pills">
                <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Monthly</a></li>
            </ul>
        </div>

        <div class="widget-content">
            <div class="tabs tab-content">
                <div id="content_1" class="tabcontent"> 
                    <div id="revenueMonthly"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-two">
        <div class="widget-heading">
            <h5 class="">Sales by Category</h5>
        </div>
        <div class="widget-content">
            <div id="chart-2" class=""></div>
        </div>
    </div>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
    <div class="widget-three">
        <div class="widget-heading">

            <div class="w-icon row" style="margin-left:5px;">
                <svg style="background-image:linear-gradient(to right, #f09819 0%, #ff5858 100%);padding:10px; height:50px;width:50px;color:#fff; border-radius:5px" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="8.5" cy="7" r="4" />
                    <polyline points="17 11 19 13 23 9" /></svg>

                &nbsp; &nbsp;

                <h5 class="" style="text-align:center;margin-top:13px">Employees</h5>

            </div>
            <hr>
        </div>
        <div class="widget-content">

            <div class="order-summary">

                <div class="summary-list">
                    <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                            <line x1="1" y1="10" x2="23" y2="10"></line>
                        </svg>
                    </div>
                    <div class="w-summary-details">

                        <div class="w-summary-info">
                            <h6>{{ __('Regular') }}</h6>
                            <p class="summary-count">@isset($emp_typeR) {{ $emp_typeR }} @endisset</p>
                        </div>

                        <div class="w-summary-stats">
                            <div class="progress">
                                <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>

                </div>



                <div class="summary-list">
                    <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag">
                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                            <line x1="7" y1="7" x2="7" y2="7"></line>
                        </svg>
                    </div>
                    <div class="w-summary-details">

                        <div class="w-summary-info">
                            <h6>{{ __('Trainee') }}</h6>
                            <p class="summary-count">@isset($emp_typeT) {{ $emp_typeT }} @endisset</p>
                        </div>

                        <div class="w-summary-stats">
                            <div class="progress">
                                <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
    <div class="widget-three">
        <div class="widget-heading">

            <div class="w-icon row" style="margin-left:5px;">
                <svg style="
                background-color: #3bb78f;
                background-image: linear-gradient(315deg, #3bb78f 0%, #0bab64 74%);

                padding:10px; height:50px;width:50px;color:#fff; border-radius:5px" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="8.5" cy="7" r="4" />
                    <polyline points="17 11 19 13 23 9" /></svg>

                &nbsp; &nbsp;

                <h5 class="" style="text-align:center;margin-top:13px">Attendance</h5>

            </div>
            <hr>
        </div>
        <div class="widget-content">

            <div class="order-summary">

                <div class="summary-list">
                    <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                            <line x1="1" y1="10" x2="23" y2="10"></line>
                        </svg>
                    </div>
                    <div class="w-summary-details">

                        <div class="w-summary-info">
                            <h6>{{ __('Online') }}</h6>
                            <p class="summary-count">@isset($is_online_now) {{ $is_online_now }} @endisset</p>
                        </div>

                        <div class="w-summary-stats">
                            <div class="progress">
                                <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>

                </div>



                <div class="summary-list">
                    <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag">
                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                            <line x1="7" y1="7" x2="7" y2="7"></line>
                        </svg>
                    </div>
                    <div class="w-summary-details">

                        <div class="w-summary-info">
                            <h6>{{ __('Offline') }}</h6>
                            <p class="summary-count">@isset($is_offline_now) {{ $is_offline_now }} @endisset</p>
                        </div>

                        <div class="w-summary-stats">
                            <div class="progress">
                                <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
    <div class="widget-three">
        <div class="widget-heading">

            <div class="w-icon row" style="margin-left:5px;">
                <svg style="
                background-color: #6b0f1a;
                background-image: linear-gradient(315deg, #6b0f1a 0%, #b91372 74%);

                padding:10px; height:50px;width:50px;color:#fff; border-radius:5px" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="8.5" cy="7" r="4" />
                    <polyline points="17 11 19 13 23 9" /></svg>

                &nbsp; &nbsp;

                <h5 class="" style="text-align:center;margin-top:13px">LEAVES OF ABSENCE</h5>

            </div>
            <hr>
        </div>
        <div class="widget-content">

            <div class="order-summary">

                <div class="summary-list">
                    <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                            <line x1="1" y1="10" x2="23" y2="10"></line>
                        </svg>
                    </div>
                    <div class="w-summary-details">

                        <div class="w-summary-info">
                            <h6>{{ __('Approved') }}</h6>
                            <p class="summary-count">@isset($emp_leaves_approve) {{ $emp_leaves_approve }} @endisset</p>
                        </div>

                        <div class="w-summary-stats">
                            <div class="progress">
                                <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>

                </div>



                <div class="summary-list">
                    <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag">
                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                            <line x1="7" y1="7" x2="7" y2="7"></line>
                        </svg>
                    </div>
                    <div class="w-summary-details">

                        <div class="w-summary-info">
                            <h6>{{ __('Pending') }}</h6>
                            <p class="summary-count">@isset($emp_leaves_pending) {{ $emp_leaves_pending }} @endisset</p>
                        </div>

                        <div class="w-summary-stats">
                            <div class="progress">
                                <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>



<div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-table-two">

        <div class="widget-heading">
            <h5 class="">Recent Orders</h5>
        </div>

        <div class="widget-content">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <div class="th-content">Name</div>
                            </th>
                            <th>
                                <div class="th-content">Position</div>
                            </th>
                            <th>
                                <div class="th-content">Start Date</div>
                            </th>

                        </tr>
                    </thead>
                    <tbody>

                        @isset($emp_all_type)
                        @foreach ($emp_all_type as $data)
                        <tr>
                            <td>
                                <div class="td-content customer-name">{{ $data->lastname }}, {{ $data->firstname }}</div>
                            </td>
                            <td>
                                <div class="td-content product-brand">{{ $data->jobposition }}</div>
                            </td>
                            <td>
                                <div class="td-content">@php echo e(date('M d, Y', strtotime($data->startdate))) @endphp</div>
                            </td>

                        </tr>
                        @endforeach
                        @endisset


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-table-two">

        <div class="widget-heading">
            <h5 class="">Recent Attendance</h5>
        </div>

        <div class="widget-content">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <div class="th-content">Name</div>
                            </th>
                            <th>
                                <div class="th-content">Type  </div>
                            </th>
                            <th>
                                <div class="th-content">Time</div>
                            </th>

                        </tr>
                    </thead>
                        <tbody>


                        @isset($a)
                           @foreach($a as $v)


                                @if($v->timein != null && $v->timeout == null)
                                    <tr>
                                        <td>
                                            <div class="td-content customer-name">{{ $v->employee }}</div>
                                        </td>
                                        <td>
                                            <div class="td-content product-brand">Time-In</div>
                                        </td>
                                        <td>
                                            <div class="td-content">    
                                                @php
                                                        if($tf == 1) {
                                                            echo e(date('h:i:s A', strtotime($v->timein))); 
                                                        } else {
                                                            echo e(date('H:i:s', strtotime($v->timein))); 
                                                        }
                                                    @endphp
                                            </div>
                                        </td>

                                    </tr>
                                @endif

                                @if($v->timein != null && $v->timeout != null)
                                    <tr>
                                        <td>
                                            <div class="td-content customer-name">{{ $v->employee }}</div>
                                        </td>
                                        <td>
                                            <div class="td-content product-brand">Time-Out</div>
                                        </td>
                                        <td>
                                            <div class="td-content">    
                                            @php
                                            if($tf == 1) {
                                                echo e(date('h:i:s A', strtotime($v->timeout))); 
                                            } else {
                                                echo e(date('H:i:s', strtotime($v->timeout))); 
                                            }
                                        @endphp
                                            </div>
                                        </td>

                                    </tr>
                                @endif
                    @endforeach
                @endisset


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-table-two">

        <div class="widget-heading">
            <h5 class="">Recent Leaves of Absence</h5>
        </div>

        <div class="widget-content">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <div class="th-content">Name</div>
                            </th>
                        
                            <th>
                                <div class="th-content"> Date</div>
                            </th>

                        </tr>
                    </thead>
                    <tbody>

                    @isset($emp_approved_leave)
                                    @foreach ($emp_approved_leave as $leaves)
                        <tr>
                            <td>
                                <div class="td-content customer-name">{{ $leaves->employee }}</div>
                            </td>
                     
                            <td>
                                <div class="td-content">@php echo e(date('M d, Y', strtotime($leaves->leavefrom))) @endphp</div>
                            </td>

                        </tr>
                        @endforeach
                                @endisset


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection