@extends('layouts.default')

    @section('meta')
        <title>Employees | Workday Time Clock</title>
        <meta name="description" content="Workday employees, view all employees, add, edit, delete, and archive employees.">
    @endsection

    @section('content')
             
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                {{-- <a href="{{url('employees/new')}}" class="btn btn-success float-right" style="text-align: center; margin:0px 20px 20px 0px"><i class="fa fa-plus"></i>Add</a> --}}
                <div class="table-responsive mb-4 mt-4">
                  
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                  

                            <tr>
                                <th>{{ __('ID') }}</th> 
                                <th>{{ __('Employee') }}</th> 
                                <th>{{ __('Department') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Monthly Salary') }}</th>
                                <th class="no-content">
                                   Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($data)
                            @foreach ($data as $employee)
                            <tr>
                                <td>{{ $employee->idno }}</td>
                                <td>{{ $employee->lastname }}, {{ $employee->firstname }}</td>
                                <td>{{ $employee->department }}</td>
                               
                                <td>@if($employee->employmentstatus == 'Active') Active @else Archived @endif</td>

                            
                                <td>{{ $employee->salary }}</td>

                                <td>
                                    

                                    <a href="{{ url('payment/'.$employee->reference) }}" class="ui circular basic icon button tiny">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit table-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                    </a>

                               

                                </td>
                            </tr>
                            @endforeach
                            @endisset
                    
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('ID') }}</th> 
                                <th>{{ __('Employee') }}</th> 
                                <th>{{ __('Company') }}</th>
                                <th>{{ __('Department') }}</th>
                                <th>{{ __('Position') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th class="no-content"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>


    @endsection

