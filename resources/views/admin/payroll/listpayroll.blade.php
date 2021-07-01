@extends('layouts.default')

    @section('meta')
        <title>Employees | Workday Time Clock</title>
        <meta name="description" content="Workday employees, view all employees, add, edit, delete, and archive employees.">
    @endsection

    @section('content')
             
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                {{-- <a href="{{url('employees/new')}}" class="btn btn-success float-right" style="text-align: center; margin:0px 20px 20px 0px"><i class="fa fa-plus"></i>Add</a> --}}
                <div class="table-responsive mb-4 mt-4" style="overflow:auto">
                  
                    <table id="zero-config" class="table table-hover" style="width:100%;">
                        <thead>
                            <tr>
                                <th>{{ __("ID") }}</th>
                                <th>{{ __("Name") }}</th>
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
                                <th>Report</th>
                            </tr>
                        </thead>
                     
                        <tbody>
                         
                         @isset($payroll)
                    
                         @foreach ($payroll as $v)
    
                            <tr>

                                <td>{{ $v->idno }}</td>
                                <td>{{ $v->name }}</td>
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
                                <a href="{{url('paymentedit')}}/{{$v->id}}/{{$v->reference}}" class="btn btn-info">Edit</a>
                                <a href="{{url('paymentdelete')}}/{{$v->id}}" class="btn btn-danger" onclick="alert('Are you sure?')"><i class="fa fa-trash"></i></a>
                            
                            </td>
                             <td>
                                 <a href="{{url('payroll_download')}}/{{$v->id}}"><i class="fas fa-download"></i></a>
                             </td>  
                               
                            </tr>
                            @endforeach
                            @endisset
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __("ID") }}</th>
                                <th>{{ __("Name") }}</th>
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
                                <th>Report</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>


    @endsection
    @section('js_script')
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    @endsection

