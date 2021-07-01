@extends('layouts.default')

    @section('meta')
        <title>Employees | Workday Time Clock</title>
        <meta name="description" content="Workday employees, view all employees, add, edit, delete, and archive employees.">
    @endsection

    @section('content')
             
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <a href="{{url('employees/new')}}" class="btn btn-success float-right" style="text-align: center; margin:0px 20px 20px 0px"><i class="fa fa-plus"></i>Add</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  New Register Employee
                </button>

<!-- Ne Register -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('new_register_post')}}" method="POST">
            <div class="form-group">
                <input type="text" name="name" placeholder="Name" class="form-control" style="width:100%;">
            </div>
            <div class="form-group">
                <input type="text" name="email" placeholder="Email" class="form-control" style="width:100%;">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
         </form>
      </div>
    </div>
  </div>
</div>
@if(session('success'))
<div class="alert alert-success">
    <strong>{{session('success')}}</strong>
</div>
@endif
                <div class="table-responsive mb-4 mt-4">               
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th> 
                                <th>{{ __('Employee') }}</th> 
                                <th>{{ __('Company') }}</th>
                                <th>{{ __('Department') }}</th>
                                <th>{{ __('Position') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th class="no-content">
                                   Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($data)
                            @foreach ($data as $employee)
                            {{-- @foreach ($employees as $employee) --}}
                            <tr>
                                <td>{{ $employee->idno }}</td>
                                <td>{{ $employee->lastname }}, {{ $employee->firstname }}</td>
                                <td>{{ $employee->company }}</td>
                                <td>{{ $employee->department }}</td>
                                <td>{{ $employee->jobposition }}</td>
                                <td>@if($employee->employmentstatus == 'Active') Active @else Archived @endif</td>

                            

                                <td>
                                    <a href="{{ url('/profile/view/'.$employee->reference) }}" class="ui circular basic icon button tiny">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle table-view"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                                    </a>

                                    <a href="{{ url('/profile/edit/'.$employee->reference) }}" class="ui circular basic icon button tiny">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit table-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                    </a>

                                    <a href="{{ url('/profile/delete/'.$employee->reference) }}" class="ui circular basic icon button tiny">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash table-delete"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                    </a>

                                        
                                
                                    <a href="{{ url('/profile/archive/'.$employee->reference) }}" class="ui circular basic icon button tiny">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-circle table-archieve"><circle cx="12" cy="12" r="10"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                             </a>
{{-- 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10" class="tc"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg> --}}

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

