@extends('layouts.default')

    @section('meta')
        <title>Employees | Workday Time Clock</title>
        <meta name="description" content="Workday employees, view all employees, add, edit, delete, and archive employees.">
    @endsection

    @section('content')


        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <a href="{{url('payroll')}}" class="btn btn-danger float-right" style="text-align: center; margin:0px 20px 20px 0px"><i class="fa fa-close">&nbsp;</i>Return</a>
                        <div class="col-md-6 table-responsive mb-4 mt-4">
                            <h3>Employee Information</h3>
                            <table class="table" style="width:100%">
                                <thead>


                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Employee') }}</th>
                                        <th>{{ __('Department') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>Gross Salary</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($datas)
                                    @foreach ($datas as $employee)
                                    <tr>
                                        <td>{{ $employee->idno }}</td>
                                        <td>{{ $employee->lastname }}, {{ $employee->firstname }}</td>
                                        <td>{{ $employee->department }}</td>

                                        <td>@if($employee->employmentstatus == 'Active') Active @else Archived @endif</td>


                                        <td>{{ $employee->salary }}</td>


                                    </tr>
                                    @endforeach
                                    @endisset

                                </tbody>

                            </table>
                        </div>

                        <div class="col-md-12 widget">
                            <h3>Payroll Information</h3>
                            @include('partials.alert')

                            <table width="100%" class="table table-striped table-hover" id="dataTables-example" data-order='[[ 0, "desc" ]]'>
                                <thead>
                                    <tr>
                                        <th>{{ __("Created Date") }}</th>
                                        <th>{{ __("Monthly Salary") }}</th>
                                        <th>{{ __("Deduction") }}</th>
                                        <th>{{ __("Bonus") }}</th>
                                        <th>{{ __("Total Salary") }}</th>
                                        <th>{{ __("From Date") }}</th>
                                        <th>{{ __("To Date") }}</th>
                                        <th>{{ __("approve_key") }}</th>
                                        <th>{{ __("Comment") }}</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                 @isset($payroll)

                                 @foreach ($payroll as $v)

                                    <tr>
                                        @isset($v->payment_updated_at)
                                        <td>{{ $v->payment_updated_at }}</td>
                                        @else
                                        <td>{{ $v->payment_created_at }}</td>
                                        @endisset
                                        <td>{{ $v->salary }}</td>
                                        <td>{{ $v->deduction }}</td>
                                        <td>{{ $v->bonus }}</td>
                                        <td>{{ $v->salary-$v->deduction+$v->bonus }}</td>
                                        <td>{{ $v->fromdate }}</td>
                                        <td>{{ $v->todate }}</td>
                                        <td>
                                            @if($v->approve_key == 1)
                                                <span style="color:green">Done</span>
                                            @elseif($v->approve_key == 2)
                                                <span style="color:red">Pending</span>
                                            @endif
                                        </td>
                                    <td>{{$v->comment}}</td>
                                        <td>
                                        <a href="{{url('paymentedit')}}/{{$v->id}}/{{$v->reference}}" class="btn btn-info"><i class="fa fa-edit"></i></a>

                                        <a href="{{url('paymentdelete')}}/{{$v->id}}" class="btn btn-danger" onclick="alert('Are you sure?')"><i class="fa fa-trash"></i></a>
                                        </td>


                                    </tr>
                                    @endforeach
                                    @endisset
                                </tbody>
                            </table>

                        </div>




            </div>
        </div>




        <div class="col-md-6 layout-spacing br-6 mb-2">
            <div class="widget">
                <h3>Filter Date</h3>
                <form action="{{-- {{ url('export/report/attendance') }} --}}" method="{{-- post --}}" accept-charset="utf-8" class="ui small form form-filter" id="filterform">
                    @csrf
                    <div class="inline three fields">
                        {{-- <div class="three wide field form-group">
                            <select class="form-control" name="employee" class="ui search dropdown getid" required>
                                <option value="">{{ __("Employee") }}</option>
                                @isset($employee)
                                    @foreach($employee as $e)
                            <option value="{{ $e->lastname }}, {{ $e->firstname }}-{{$e->idno}}" data-id="{{ $e->idno }}">{{ $e->lastname }}, {{ $e->firstname }}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div> --}}

                        <div class="form-group">
                            <input class="form-control"id="datefrom" type="date" name="datefrom" value="" placeholder="Start Date" class="airdatepicker">
                            <i class="ui icon calendar alternate outline calendar-icon"></i>
                        </div>

                        <div class="form-group">
                            <input class="form-control"id="dateto" type="date" name="dateto" value="" placeholder="End Date" class="airdatepicker">
                            <i class="ui icon calendar alternate outline calendar-icon"></i>
                        </div>

                    <input class="form-control" type="hidden" name="emp_id" value="">
                        <button id="btnfilter" class=" btn btn-primary ui icon button positive small inline-button"><i class="ui icon filter alternate"></i> {{ __("Filter") }}</button>
                        <!-- <button type="submit" name="submit" class=" btn btn-primary ui icon button blue small inline-button"><i class="ui icon download"></i> {{ __("Download") }}</button> -->
                    </div>
                </form>
            </div>
            <div class="widget">
                <h3>Date wise Information</h3>

                <table width="100%" class="table table-striped table-hover" id="dataTables-example" data-order='[[ 0, "desc" ]]'>
                    <thead>
                        <tr>
                            <th>{{ __("Date") }}</th>
                            <th>{{ __("Employee Name") }}</th>
                            <th>{{ __("Time In") }}</th>
                            <th>{{ __("Time Out") }}</th>
                            <th>{{ __("Total Hours") }}</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @isset($empAtten)
                        @foreach ($empAtten as $v)
                        <tr>
                            <td>{{ $v->date }}</td>
                            <td>{{ $v->employee }}</td>
                            <td>
                                @php
                                    if($v->timein != null) {
                                        if($tf == 1) {
                                            echo e(date('h:i:s A', strtotime($v->timein)));
                                        } else {
                                            echo e(date('H:i:s', strtotime($v->timein)));
                                        }
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                    if($v->timeout != null) {
                                        if($tf == 1) {
                                            echo e(date('h:i:s A', strtotime($v->timeout)));
                                        } else {
                                            echo e(date('H:i:s', strtotime($v->timeout)));
                                        }
                                    }
                                @endphp
                            </td>
                            <td>{{ $v->totalhours }}</td>
                        </tr>
                        @endforeach
                        @endisset
                    </tbody> --}}
                    <tbody>
                        @php  $total_hr = 0;     if(isset($data) ) $c = count($data) @endphp
                        @isset($data)

                        @foreach ($data as $v)

                        @php  if(is_numeric( $v->totalhours)) $total_hr =  $total_hr +  $v->totalhours ; @endphp
                        <tr>
                            <td>{{ $v->date }}</td>
                            <td>{{ $v->employee }}</td>
                            <td>
                                @php
                                    if($v->timein != null) {
                                        if($tf == 1) {
                                            echo e(date('h:i:s A', strtotime($v->timein)));
                                        } else {
                                            echo e(date('H:i:s', strtotime($v->timein)));
                                        }
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                    if($v->timeout != null) {
                                        if($tf == 1) {
                                            echo e(date('h:i:s A', strtotime($v->timeout)));
                                        } else {
                                            echo e(date('H:i:s', strtotime($v->timeout)));
                                        }
                                    }
                                @endphp
                            </td>
                            <td> @if(is_numeric( $v->totalhours)) {{ $v->totalhours }} @endif</td>
                        </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
                {{-- <h1>
                    @php if(isset($_GET['employee'])){
                        $emp = explode('-',$_GET['employee']);
                        $emp_name = $emp[0];
                    }

                    // Total Hour = {{$total_hr}} and Total days = {{$c}} days

                    @endphp
                    @isset($eid->firstname)
                    {{$eid->firstname}} attended <span style="color:orange">{{$c}} days </span>
                    @endisset

                </h1> --}}
            </div>

        </div>

        <div class="col-md-6 layout-spacing br-6 mb-2">
            <div class="widget">

                <div class="row">
                    <div class="col-md-12">
                        <h3>Attended Days Information</h3>
                        <?php
                                // if(isset($data)){
                                //     echo '<br>---data--<br>';
                                //     echo '<pre>';
                                //     	print_r($data);
                                //     echo '</pre>';
                                //     echo '<br>-----<br>';

                                //     // die();
                                // }
                            ?>
                            @php  $total_hr = 0;     if(isset($data) ) $c = count($data) @endphp
                            @isset($data)

                            @foreach ($data as $v)

                            @php  if(is_numeric( $v->totalhours)) $total_hr =  $total_hr +  $v->totalhours ; @endphp

                            @endforeach
                            @endisset

                                @php if(isset($_GET['employee'])){
                                    $emp = explode('-',$_GET['employee']);
                                    $emp_name = $emp[0];
                                }

                                // Total Hour = {{$total_hr}} and Total days = {{$c}} days

                                @endphp
                                @isset($eid->firstname)
                                {{-- <h1> {{$eid->firstname}} attended <span style="color:orange">{{$c}} days </span>
                                </h1> --}}
                                <table width="100%" class="table table-striped table-hover" id="dataTables-example" data-order='[[ 0, "desc" ]]'>
                                    <thead>
                                    <tr>
                                        <th>From date</th>
                                        <th>Till date</th>
                                        <th>Total attended days</th>
                                        <th>Monthly Salary</th>

                                    </tr>
                                    </thead>
                                    <tr>
                                        <td>
                                            @isset($_GET['datefrom'])
                                            From date {{$_GET['datefrom']}}
                                            @else
                                            N/A
                                            @endisset
                                        </td>
                                        <td>
                                            @isset($_GET['dateto'])
                                                Till Date {{$_GET['dateto']}}
                                            @else
                                            N/A
                                            @endisset
                                        </td>
                                        <td>
                                            @isset($c)
                                            {{$c}}
                                            @else
                                            N/A
                                            @endisset
                                        </td>
                                        <td>
                                            @isset($eid->salary)
                                                {{$eid->salary}}
                                            @else
                                            N/A
                                            @endisset
                                        </td>
                                    </tr>
                                </table>

                                <h2>Add Salary</h2>
                            <form action="{{url('paymentstore')}}/{{$eid->id}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                      <label for="">Salary</label>
                                    <input class="form-control" type="number" name="salary" value="{{$eid->salary}}" placeholder="salary" readonly>

                                    </div>
                                    <div class="form-group">
                                        <label for="">From Date</label>
                                        <input class="form-control" type="text" name="fromdate" value=" @isset($_GET['datefrom']) {{$_GET['datefrom']}}

                                        @endisset" placeholder="Date" readonly>

                                      </div>
                                      <div class="form-group">
                                        <label for="">Till Date</label>
                                        <input class="form-control" type="text" name="todate" value=" @isset($_GET['dateto']){{$_GET['dateto']}}

                                        @endisset" placeholder="" readonly>

                                      </div>
                                      <div class="form-group">
                                        <label for="">Deduction</label>
                                        <input class="form-control" type="number" name="deduction" value="0.00" placeholder="0.00" >

                                      </div>
                                      <div class="form-group">
                                        <label for="">Bonus</label>
                                        <input class="form-control" type="number" name="bonus" value="0.00" placeholder="0.00" >

                                      </div>
                                      <div class="form-group">
                                        <label for="">Comment</label>
                                        <textarea class="form-control" name="comment"  ></textarea>

                                      </div>
                                      <div class="form-group">

                                        <input type="checkbox" name="approve_key" value="2" placeholder="" checked>
                                        <label for="">Pending</label>
                                      </div>

                                      <input type="hidden" name="attendance_count" value="{{$c}}">
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <div class="form-group">
                                      <button class="btn btn-success" value="Add" type="submit">Submit</button>
                                      

                                      </div>


                                </form>
                                @endisset


                    </div>
                </div>
            </div>
        </div>



    @endsection
