@extends('layouts.personal')

    @section('meta')
        <title>My Attendances | HRM</title>
        <meta name="description" content="Workday my attendance, view all my attendances, and clock-in/out">
    @endsection

    @section('styles')
        <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
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
                                <th>{{ __("Salary") }}</th>
                                <th>{{ __("Deduction") }}</th>
                                <th>{{ __("Allowance") }}</th>
                                <th>{{ __("Bonous") }}</th>
                                <th>{{ __("Total") }}</th>
                                <th>{{ __("Action") }}</th>
                            </tr>
                        </thead>
                     
                        <tbody>
                         
                   
                    
                         @foreach($get_employee_payroll as $payroll)
                             <tr>
                                 <td>{{$payroll->id??''}}</td>
                                 <td>
                                     @php
                                     $emp_name = App\User::where('reference',$payroll->reference)->first();
                                     @endphp
                                     {{$emp_name->name}}
                                 </td>
                                 <td>{{$payroll->salary??'0'}}</td>
                                 <td>{{$payroll->deduction??'0'}}</td>
                                 <td>{{$payroll->allowance??'0'}}</td>
                                 <td>{{$payroll->bonus??'0'}}</td>
                                 <td>{{$payroll->salary+$payroll->bonus+$payroll->allowance-$payroll->deduction}}</td>
                                 <td>
                                     <a href="{{url('emp_payroll_download')}}/{{$payroll->id}}"><i class="fas fa-download"></i></a>
                                 </td>
                             </tr>
                            @endforeach
                
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __("ID") }}</th>
                                <th>{{ __("Name") }}</th>
                                <th>{{ __("Salary") }}</th>
                                <th>{{ __("Deduction") }}</th>
                                <th>{{ __("Allowance") }}</th>
                                <th>{{ __("Bonous") }}</th>
                                <th>{{ __("Total") }}</th>
                                <th>{{ __("Action") }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    @endsection
    
    @section('scripts')
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/i18n/datepicker.en.js') }}"></script>
    <script src="{{ asset('/assets/vendor/momentjs/moment.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/momentjs/moment-timezone-with-data.js') }}"></script>

   
    @endsection
    @section('js_script')
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    @endsection 