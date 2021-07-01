@extends('layouts.default')

    @section('meta')
        <title>Users | HRM</title>
        <meta name="description" content="Workday users, view all users, add, edit, delete users">
    @endsection 

    @section('content')
    <!-- MODAL -->
    {{-- @include('admin.modals.modal-add-user') --}}

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">


        <div class="modal-header">{{ __("Add New User") }}</div>
        <div class="modal-body">
            <form id="add_user_form" action="{{ url('users/register') }}" class="ui form add-user" method="post" accept-charset="utf-8">
                @csrf
                <div class="form-group">
                    <label>{{ __("Employee") }}</label>
                    <select class=" form-control ui search dropdown getemail uppercase" name="name">
                        <option value="">Select Employee</option>
                        @isset($employees)
                            @foreach ($employees as $data)
                            <option value="{{ $data->lastname }}, {{ $data->firstname }}-{{ $data->emailaddress }}-{{ $data->id }}" data-e="{{ $data->emailaddress }}"
                                data-ref="{{ $data->id }}">{{ $data->lastname }}, {{ $data->firstname }}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
                <div class="form-group">
                    <label>{{ __("Email") }}</label>
                    <input type="email" name="email" class="form-control  readonly lowercase" value="" >
                </div>
                <div class="grouped fields opt-radio">
                    <label>{{ __("Choose Account type") }} </label>
                    <div class="form-group">
                        <div class="ui radio checkbox">
                            <input type="radio" name="acc_type" value="1" class="">
                            <label>{{ __("Employee") }}</label>
                        </div>
                    </div>
                    <div class="form-group" style="padding:0px!important">
                        <div class="ui radio checkbox">
                            <input type="radio" name="acc_type" value="2" class=" ">
                            <label>{{ __("Admin") }}</label>
                        </div>
                    </div>
                </div>
                <div class="fields">
                    <div class="sixteen wide form-group role">
                        <label for="">{{ __("Role") }}</label>
                        <select class="form-control  ui dropdown uppercase" name="role_id">
                            <option value="">Select Role</option>
                            @isset($roles)
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                </div>
                <div class="fields">
                    <div class="form-control  sixteen wide form-group">
                        <label>{{ __("Status") }}</label>
                        <select class="ui dropdown uppercase" name="status" class="form-control">
                            <option value="">Select Status</option>
                            <option value="1">Enabled</option>
                            <option value="0">Disabled</option>
                        </select>
                    </div>
                </div>
                <div class="two fields">
                    <div class="form-group">
                        <label for="">{{ __("Password") }}</label>
                        <input type="password" name="password" class="form-control ">
                    </div>
                    <div class="form-group">
                        <label for="">{{ __("Confirm Password") }}</label>
                        <input type="password" name="password_confirmation" class="form-control ">
                    </div>
                </div>
                <div class="form-group">
                    <div class="ui error message">
                        <i class="close icon"></i>
                        <div class="header"></div>
                        <ul class="list">
                            <li class=""></li>
                        </ul>
                    </div>
                </div>
        </div>
              
        <div class="actions">
            <div class="modal-footer">
            <input type="hidden" name="id" value="">
            <button class="btn btn-success" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __('Save') }}</button>
          
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
        </div>
        </div>
        </form>
  

          </div>
           </div>
        </div>
    <!-- ./MODAL -->




























    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            
                <h2 class="page-title">{{ __("Users") }}        &nbsp;&nbsp;       &nbsp;&nbsp;
                {{-- <button class=" btn btn-primary ui positive button mini offsettop5 btn-add pull-right"><i class="ui icon plus"></i>{{ __("Add") }}</button> --}}
                <button type="button" class="btn btn-primary float-right ml-3" data-toggle="modal" data-target="#myModal"></i>{{ __("Add") }}</button>
            
                <a href="{{ url('users/roles') }}" class="btn btn-info ui blue button mini offsettop5 float-right"><i class="ui icon user"></i>{{ __("Roles") }}</a>
                </h2>
                    
             </div>
        </div>

        <div class="row widget-content widget-content-area br-6">
            <div class="box box-success">
                <div class="box-body">
                    @if ($errors->any())
                    <div class="ui error message">
                        <i class="close icon"></i>
                        <div class="header">{{ __("There were some errors with your submission") }}</div>
                        <ul class="list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <table width="100%" class="table table-striped table-hover" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead>
                            <tr>
                                <th>{{ __("Name") }}</th>
                                <th>{{ __("Email") }}</th>
                                <th>{{ __("Role") }}</th>
                                <th>{{ __("Type") }}</th>
                                <th>{{ __("Status") }}</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @isset($users_roles)
                            @foreach ($users_roles as $val)
                            <tr>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->email }}</td>
                                <td>{{ $val->role_name }}</td>
                                <td> @if($val->acc_type == 2) Admin @else Employee @endif </td>
                                <td>
                                    <span>
                                    @if($val->status == '1') 
                                        Enabled
                                    @else
                                        Disabled
                                    @endif
                                    </span>
                                </td>
                                <td class="align-right">
                                    <a href="{{ url('/users/edit/'.$val->id) }}" class="btn btn-info ui circular basic icon button tiny"><i class="fa fa-edit"></i></a>
                                    <a href="{{ url('/users/delete/'.$val->id) }}" class="btn btn-danger ui circular basic icon button tiny"><i class="fa fa-trash"></i></a>

                                    @if($val->status == 0)
                                    <a href="{{ url('users/enable/'.$val->id) }}" class="btn btn-warning ui circular basic icon button tiny"><i class="fa fa-lock"></i></a>
                                    @elseif($val->status == 1)
                                    <a href="{{ url('users/disable/'.$val->id) }}" class="btn btn-success ui circular basic icon button tiny"><i class="fa fa-key"></i></a>
                                    @endif
                                </td>
                                <td>

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

    @section('scripts')
    <script type="text/javascript">
    $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: true,ordering: true});
    // $('.ui.dropdown.getemail').dropdown({ onChange: function(value, text, $selectedItem) {
    //     $('select[name="name"] option').each(function() {
    //         if($(this).val()==value) {var e = $(this).attr('data-e');var r = $(this).attr('data-ref');$('input[name="email"]').val(e);$('input[name="ref"]').val(r);};
    //     });
    // }});
    </script>
    @endsection