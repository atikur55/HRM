@extends('layouts.default')

@section('meta')
<title>Dashboard | Admin panel</title>
<meta name="description" content="Workday dashboard, view recent attendance, recent leaves of absence, and newest employees">
@endsection

@section('content')

@php
$account = App\User::where('id',Auth::id())->first();
@endphp
<!-- Admin -->
@if($account->acc_type==2)
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 widget widget-chart-one">

 <div class="">
        <div class="">
            @include('admin.clock.clock')
        </div>
  </div>
</div>

<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing mt-5">
    <div class="widget widget-chart-one">
        <div class="widget-heading">
            <h5 class="">Expense</h5>
            <ul class="tabs tab-pills">
                <li>
                    <select style="
                    color: rgb(16 78 202);
                    height: 35px;
                    font-size: 16px;
                    padding: 0px;
                " name="select_graph_year" id="select_graph_year" class="form-control tabmenu" id="tb_1"  onchange="yearAjax(this);" >
                       @foreach($year_data as $y)

                            <option value="{{$y}}" )>{{$y}}</option>
                        @endforeach
                    </select>
                </li>
                <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Monthly</a></li>
            </ul>
        </div>

        <div class="widget-content">
            <div class="tabs tab-content">
                <div id="content_1" class="tabcontent"> 
                    <div id="expenseMonthly"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing mt-5">
    <div class="widget widget-chart-two">
        <div class="widget-heading">
            <h5 class="">Employee Activity</h5>
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
                            <h6>{{ __('Clocked in') }}</h6>
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
                            <h6>{{ __('Not Clocked In') }}</h6>
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
            <h5 class="">Employee List</h5>
        </div>

        <div class="widget-content">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>
                                <div class="th-content">Name</div>
                            </th>
                            <th>
                                <div class="th-content">Position</div>
                            </th>
                            <th>
                                <div class="th-content">Start Date</div>
                            </th>
                            <th>
                                <div class="th-content">Working Mode</div>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @isset($emp_all_type)
                        @foreach ($emp_all_type as $data)
                        <tr>
                            <td>
                                {{$i++}}
                            </td>
                            <td>
                                <div class="td-content customer-name">{{ $data->lastname }}, {{ $data->firstname }}</div>
                            </td>
                            <td>
                                <div class="td-content product-brand">{{ $data->department }}</div>
                            </td>
                            <td>
                                <div class="td-content">@php echo e(date('M d, Y', strtotime($data->startdate))) @endphp</div>
                            </td>
                             <td>
                             
                            @if($data->timein != null && $data->timeout == null)
                            <span style="color:green">Working</span >
                            @elseif($data->timeout != null) 
                                 <span style="color:red">Not Online</span >
                            @endif

                                
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

<!-- 
<div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-table-two">

        <div class="widget-heading">
            <h5 class="">Absent Employee List</h5>
        </div>

        <div class="widget-content">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>
                                <div class="th-content">Name</div>
                            </th>
                            <th>
                                <div class="th-content">Position</div>
                            </th>
                            <th>
                                <div class="th-content">Start Date</div>
                            </th>
                            <th>
                                <div class="th-content">Working Mode</div>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @isset($emp_all)
                        @foreach ($emp_all as $data)
                        <tr>
                            <td>
                                {{$i++}}
                            </td>
                            <td>
                                <div class="td-content customer-name">{{ $data->lastname }}, {{ $data->firstname }}</div>
                            </td>
                            <td>
                                <div class="td-content product-brand">{{ $data->department }}</div>
                            </td>
                            <td>
                                <div class="td-content">@php echo e(date('M d, Y', strtotime($data->startdate))) @endphp</div>
                            </td>
                             <td>
                             
                            {{-- @if($data->timein != null && $data->timeout == null)
                            <span style="color:green">Working</span >
                            @elseif($data->timeout != null) 
                                 <span style="color:red">Not Online</span >
                            @endif --}}
                            <span style="color:red">Absent</span >
                                
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
-->
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
                                Serial
                            </th>
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

                            @php $i=1;$j=1 @endphp
                        @isset($a)
                           @foreach($a as $v)


                                @if($v->timein != null && $v->timeout == null)
                                    <tr>
                                        <td>
                                            {{$i++}}
                                        </td>
                                        <td>
                                            <div class="td-content customer-name">{{ $v->employee }}</div>
                                        </td>
                                        <td>
                                            <div class="td-content product-brand"> <span style="color:green">Time-In</span> </div>
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
                                            {{$j++}}
                                        </td>
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
@elseif($account->acc_type==3)
<h2>Welcome {{ Auth::user()->name }}</h2>

@else

@endif


<script>


    /* circle graph */
var is_online_now = {{$is_online_now}}
var is_offline_now = {{$is_offline_now}}
/* end circle graph */


// console.log('monthly ============================================================================================= ');
// console.log(monthly_expense);

var exptotalarr =[];
var expyeararr =[];
@foreach($exparr as $k=>$v)
var n = Number({{$v}})

exptotalarr.push(n
);
expyeararr.push("{{$k}}"
);
@endforeach
var x = exptotalarr.toString();
// console.log(exptotalarr)
// console.log(expyeararr)
// console.log(x)
// console.log(getArray.getJSONObject(exparr))
// console.log('showed-----'+is_online_now);

/* end revenue graph*/
</script>


@endsection

@section('script')
 <script type="text/javascript">
    // elements day, time, date
    var elTime = document.getElementById('show_time');
    var elDate = document.getElementById('show_date');
    var elDay = document.getElementById('show_day');

    // time function to prevent the 1s delay
    var setTime = function() {
        // initialize clock with timezone
        var time = moment().tz('Africa/Johannesburg');
       

        // set time in html
        @if($tf == 1) 
            elTime.innerHTML= time.format("hh:mm:ss A");
        @else
            elTime.innerHTML= time.format("kk:mm:ss");
        @endif

        // set date in html
        elDate.innerHTML = time.format('MMMM D, YYYY');

        // set day in html
        elDay.innerHTML = time.format('dddd');
    }

    setTime();
    setInterval(setTime, 1000);

    $('.btnclock').click(function(event) {
        var is_comment = $(this).data("type");
        if (is_comment == "timein") {
            $('.comment').slideDown('200').show();
        } else {
            $('.comment').slideUp('200');
        }
        $('input[name="idno"]').focus();
        $('.btnclock').removeClass('active animated fadeIn')
        $(this).toggleClass('active animated fadeIn');
    });

    $("#rfid").on("input", function(){
        var url, type, idno, comment;
        url = $("#_url").val();
        type = $('.btnclock.active').data("type");
        idno = $('input[name="idno"]').val();
        idno.toUpperCase();
        comment = $('textarea[name="comment"]').val();

        setTimeout(() => {
            $(this).val("");
        }, 600);

        $.ajax({ url: url + '/attendance/add', type: 'post', dataType: 'json', data: {idno: idno, type: type, clockin_comment: comment}, headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },

            success: function(response) {
                if(response['error'] != null) 
                {
                    $('.message-after').addClass('notok').hide();
                    $('#type, #fullname').text("").hide();
                    $('#time').html("").hide();
                    $('.message-after').removeClass("ok");
                    $('#message').text(response['error']);
                    $('#fullname').text(response['employee']);
                    $('.message-after').slideToggle().slideDown('400');
                } else {
                    function type(clocktype) {
                        if (clocktype == "timein") {
                            return "{{ __('Time In at') }}";
                        } else {
                            return "{{ __('Time Out at') }}";
                        }
                    }
                    $('.message-after').addClass('ok').hide();
                    $('.message-after').removeClass("notok");
                    $('#type, #fullname, #message').text("").show();
                    $('#time').html("").show();
                    $('#type').text(type(response['type']));
                    $('#fullname').text(response['firstname'] + ' ' + response['lastname']);
                    $('#time').html('<span id=clocktime>' + response['time'] + '</span>' + '.' + '<span id=clockstatus> {{ __("Success!") }}</span>');
                    $('.message-after').slideToggle().slideDown('400');
                }
            }
        })
    });

    $('#btnclockin').click(function(event) {
        var url, type, idno, comment;
        url = $("#_url").val();
        type = $('.btnclock.active').data("type");
        idno = $('input[name="idno"]').val();
        idno.toUpperCase();
        comment = $('textarea[name="comment"]').val();

        $.ajax({
            url: url + '/attendance/add',type: 'post',dataType: 'json',data: {idno: idno, type: type, clockin_comment: comment},headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },

            success: function(response) {
                if(response['error'] != null) 
                {
                    $('.message-after').addClass('notok').hide();
                    $('#type, #fullname').text("").hide();
                    $('#time').html("").hide();
                    $('.message-after').removeClass("ok");
                    $('#message').text(response['error']);
                    $('#fullname').text(response['employee']);
                    $('.message-after').slideToggle().slideDown('400');
                } else {
                    function type(clocktype) {
                        if (clocktype == "timein") {
                            return "{{ __('Time In at') }}";
                        } else {
                            return "{{ __('Time Out at') }}";
                        }
                    }
                    $('.message-after').addClass('ok').hide();
                    $('.message-after').removeClass("notok");
                    $('#type, #fullname, #message').text("").show();
                    $('#time').html("").show();
                    $('#type').text(type(response['type']));
                    $('#fullname').text(response['firstname'] + ' ' + response['lastname']);
                    $('#time').html('<span id=clocktime>' + response['time'] + '</span>' + '.' + '<span id=clockstatus> {{ __("Success!") }}</span>');
                    $('.message-after').slideToggle().slideDown('400');
                }
            }
        })
    });
    </script> 
    
 
<script>
var year = [];
var i =0;
@foreach($year_data as $y)
    year[i++] = {{$y}}
@endforeach

</script>
<script src="{{ asset('assets/js/dashboard/revenue_graph.js') }}"></script>
@endsection