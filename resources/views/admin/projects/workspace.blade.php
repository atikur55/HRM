@extends('layouts.default')

    @section('meta')
        <title>Workspace | EIT HRM</title>
        <meta name="description" content="Workday exps, view all exps, add, edit, delete, and archive exps.">
    @endsection

    @section('content')
        @include('admin.modals.project.addworkspace')
        @include('admin.modals.project.editworkspace')
        
             
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6" style="margin-top:-500px!important">
                {{-- <a href="{{url('exps/new')}}" class="btn btn-success float-right" style="text-align: center; margin:0px 20px 20px 0px"><i class="fa fa-plus"></i>Add</a> --}}
                
                {{-- <a href="{{url('expense_category')}}" class="btn btn-warning btn-sm">Add Workspace</a> --}}
                  <button type="button" class="btn btn-primary float-right ml-3" data-toggle="modal" data-target="#myModal"></i>{{ __("Add Workspace") }}</button>
                <br>
                <div class="mb-4 mt-4">
                @include('partials.alert')
                <table id="zero-config" class="table table-hover" style="width:100%">
                <thead>
                  <tr>
                        <th>Sl</th>
                        <th>Workspace Name</th>
                        <th>Created at</th>
                        <th>Created by</th>
                        <th>Action</th>

                    </tr>
                </thead>
                  
               
                    <tbody>
                        @isset($data)
                        @foreach($data as $d)
    
                        <tr>
                        <td>{{$d->id}}</td>
                        <td>{{$d->workspace_name}}</td>
                        <td>{{$d->created_at}}</td>
                        <td>{{$d->name}}</td>
                        <td>
                         <a class="btn btn-default" href="{{url('workspace/view')}}/{{$d->id}}">View</a>
                            {{-- <a class="btn btn-info" href="#">Edit</a> --}}
                           
                            @if(Auth::user()->id == $d->created_by)
                                <button data-id="{{$d->id}}" type="button" class="btn btn-primary " data-toggle="modal" data-target="#myworkspaceModal" id="editworkspace"></i>{{ __("Edit") }}</button>
                                
                                <a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="{{url('workspace/delete')}}/{{$d->id}}">Delete</a>
                            @endif
                        </td>
                    </tr>
                       
                    @endforeach
                    @endisset
                    </tbody>
          

                        <tfoot>
                  <tr>
                        <th>Sl</th>
                        <th>Workspace Name</th>
                        <th>Created at</th>
                        <th>Created by</th>
                        <th>Action</th>

                    </tr>
                </tfoot>
                    </table>
                </div>
            </div>
        </div>

    

    @endsection
@section('script')


<script>


    /* Edit project */
    $(document).ready(function () {


// $('body').on('click', '#edit-customer', function () {
// var customer_id = $(this).data('id');
// $.get('customers/'+customer_id+'/edit', function (data) {
// $('#customerCrudModal').html("Edit customer");
// $('#btn-update').val("Update");
// $('#btn-save').prop('disabled',false);
// $('#crud-modal').modal('show');
// $('#cust_id').val(data.id);
// $('#name').val(data.name);
// $('#email').val(data.email);
// $('#address').val(data.address);
// })
// });

       
        /* Edit */
        $('body').on('click', '#editworkspace', function () {
        var workspace_id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        // confirm(workspace_id);

        $.ajax({
        type: "GET",
        url: "/workspace/ajaxupdate",
        data: {
        "id": workspace_id,
        "_token": token,
        },
        success: function (data) {
            console.log(data);
            $('#workspace_id').val(data.id);
            $('#workspace_name').val(data.workspace_name);
          




        },
        error: function (data) {
        console.log('Error:', data);
        }
        });
        });

}); 



</script>


@endsection