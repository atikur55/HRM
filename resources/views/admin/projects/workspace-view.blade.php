@extends('layouts.default')

@section('widget-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
    @section('meta')
        <title>Workspace | EIT HRM</title>
        <meta name="description" content="Workday exps, view all exps, add, edit, delete, and archive exps.">
    @endsection

    @section('content')
        @include('admin.modals.project.addproject')
        @include('admin.modals.project.editproject')
        
             
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" >
            <div class="widget-content widget-content-area br-6" style="margin-top:-500px!important">
                {{-- <a href="{{url('exps/new')}}" class="btn btn-success float-right" style="text-align: center; margin:0px 20px 20px 0px"><i class="fa fa-plus"></i>Add</a> --}}
                
                {{-- <a href="{{url('expense_category')}}" class="btn btn-warning btn-sm">Add Workspace</a> --}}
                <h4 class="float-left">Workspace name : {{$data->workspace_name}} </h4>

                 <a href="{{url('workspace')}}"   class="btn btn-danger float-right ml-3">Return</a>
                 @if(Auth::user()->id == $data->created_by)
                  <button type="button" class="btn btn-primary float-right ml-3" data-toggle="modal" data-target="#myModal"></i>{{ __("Add new Project") }}</button>
                  @endif
                <br>
                <div class="table-responsive mb-4 mt-4">
                @include('partials.alert')
                    <table id="zero-config" class="table table-hover" style="width:100%">
                    <thead>
                      <tr>
                        <th>Sl</th>
                        <th>Project Name</th>
                        <th>Created at</th>
                        <th>Status<br> <small>Click to change</small> </th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
              
            <tbody>
               <tr>
                @isset($projectdata)
                @foreach($projectdata as $d)
                        <td>{{$d->id}}</td>
                        <td>{{$d->project_name}}</td>
                        <td>{{$d->project_created_at}}</td>
                        
                            @if($d->project_status == 'Ongoing')
                                <td><button onclick="changeValue(this)" data-id="{{ $d->id }}" class="badge outline-badge-warning" id="workspace_status" value="{{$d->project_status}}">{{$d->project_status}}</button></td>
                            @elseif($d->project_status == 'Finished')
                                <td><button onclick="changeValue(this)" data-id="{{ $d->id }}" class="badge outline-badge-success" id="workspace_status" value="{{$d->project_status}}">{{$d->project_status}}</button></td> 
                            @elseif($d->project_status == 'OnHold')
                                <td><button onclick="changeValue(this)" data-id="{{ $d->id }}" class="badge outline-badge-danger" id="workspace_status" value="{{$d->project_status}}">{{$d->project_status}}</button></td> 
                            @endif
                            <td>{{$d->project_start_date}}</td>
                        <td>{{$d->project_end_date}}</td>
                        <td>
                        <a class="btn btn-default" href="{{$data->id}}/project/view/{{$d->id}}">View</a>
                            {{-- <a class="btn btn-info" href="#">Edit</a> --}}
                        
                          @if(Auth::user()->id == $data->created_by)
                            <button data-id="{{ $d->id }}" type="button" class="btn btn-info" data-toggle="modal" data-target="#myeditModal" id="editproject"></i>{{ __("Edit") }}</button>
                
                        
                        <a onclick="return confirm_delete()" class="btn btn-danger" href="{{url('project/delete')}}/{{$d->id}}">Delete</a>
                        @endif
                        
                        </td>
                  
                    </tr>
                    @endforeach
                 
                    @endisset
            </tbody>
 

                      <tfoot>
                      <tr>
                        <th>Sl</th>
                        <th>Project Name</th>
                        <th>Created at</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    </table>
                </div>
            </div>
        </div>

    


    @endsection

    
@section('script')
          
    <!-- BEGIN THEME GLOBAL STYLE -->
    <script src="{{asset('cork-white')}}/assets/js/scrollspyNav.js"></script>
    <script src="{{asset('cork-white')}}/plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="{{asset('cork-white')}}/plugins/sweetalerts/custom-sweetalert.js"></script>
    <!-- END THEME GLOBAL STYLE -->    
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script type="text/javascript">
function confirm_delete(){
    return confirm('are you sure?');
//    swal({
//       title: 'Are you sure?',
//       text: "You won't be able to revert this!",
//       type: 'warning',
//       showCancelButton: true,
//       confirmButtonText: 'Delete',
//       padding: '2em'
//     }).then(function(result) {
//       if (result.value) {
//         swal(
//           'Deleted!',
//           'Your file has been deleted.',
//           'success'
//         )
//       }
//     })

}



    $('.livesearch').select2({
        placeholder: 'Select User',
        ajax: {
            url: '{{url("search-project-user")}}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                console.log('data = '+data);
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });

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
            $('body').on('click', '#editproject', function () {

                $('#myeditModal').modal({
                    backdrop: 'static',
                    keyboard: false
                    })

            var project_id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            // confirm(project_id);

            $.ajax({
            type: "GET",
            url: "/project/ajaxupdate",
            data: {
            "id": project_id,
            "_token": token,
            },
            success: function (data) {
                console.log(data);
                $('#project_id').val(data.data.id);
                $('#project_name').val(data.data.project_name);
                $('#project_description').val(data.data.project_description);
                $('#project_start_date').val(data.data.project_start_date);
                $('#project_end_date').val(data.data.project_end_date);
                $('#project_budget').val(data.data.project_budget);


 var k = [];
 var v = [];
                      
            $.map(data.users, function (item) {
            console.log('data = ');
            console.log(data);
            console.log(' item = ');
            console.log(item.id+' name ='+item.name);
            k.push(item.id);
            v.push(item.name);
                //  return {
                //             text: item.name,
                //             id: item.id
                //         }
                    // $('#tag_list').select2('data', {id: item.id, text: item.name});
                    })/*/*/




                /* select2 */
var PRESELECTED_FRUITS = [
    { id: 'f1', text: 'Apple' },
    { id: 'f2', text: 'Mango' },
    { id: 'f3', text: 'Orange' }
];
var $select = $('.update_livesearch');

$select.select2(/* ... */); // initialize Select2 and any events
var $option = [];
for(var i =0;i<v.length;i++){
     $option[i] = $('<option selected>'+v[i]+'</option>').val(k[i]);

$select.append($option[i]).trigger('change'); // append the option and update Select2
}


                $('.update_livesearch').select2({
        placeholder: 'Select User',
        ajax: {
            url: '{{url("search-project-user")}}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                console.log('data = '+data);
                // notify JavaScript components of possible changes
                return {
                    results: $.map(data, function (item) {
                        

                //         for(var i =0;i<v.length;i++){
                // $option[i].text(data.text).val(data.id); // update the text that is displayed (and maybe even the value)
                // $option[i].removeData(); // remove any caching data that might be associated
               
                // }
                // $select.trigger('change');

                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });

    /* select2 END */

        



// var PRESELECTED_FRUITS = [
//     { id: 'f1', text: 'Apple' },
//     { id: 'f2', text: 'Mango' },
//     { id: 'f3', text: 'Orange' }
// ];

// var ALL_FRUITS = [
//     { id: 'f1', text: 'Apple' },
//     { id: 'f2', text: 'Mango' },
//     { id: 'f3', text: 'Orange' },
//     { id: 'f4', text: 'Banana' },
//     { id: 'f5', text: 'Pineapple' },
//     { id: 'f6', text: 'Lime' }
// ];

// $('.updatelivesearch').select2({
//     multiple: true,
//     placeholder: "Search for fruits",
//     minimumInputLength: 2,
//     ajax: {
//         dataType: 'json',
//         data: function () {
//             return { json: JSON.stringify(ALL_FRUITS), delay: 0.3 };
//         },
//         results: function (data) {
//             return { results: data };
//         }
//     }
// }).select2('data', PRESELECTED_FRUITS);


                
 

            // $('#msg').html('project entry deleted successfully');
            // $("#project_id_" + project_id).remove();
            },
            error: function (data) {
            console.log('Error:', data);
            }
            });
            });

}); 
 


$('.project_delete').on('click', function () {
  swal({
    title: '<i>HTML</i> <u>example</u>',
    type: 'info',
    html:
      'You can use <b>bold text</b>, ' +
      '<a href="//github.com">links</a> ' +
      'and other HTML tags',
    showCloseButton: true,
    showCancelButton: true,
    focusConfirm: false,
    confirmButtonText:
      '<i class="flaticon-checked-1"></i> Great!',
    confirmButtonAriaLabel: 'Thumbs up, great!',
    cancelButtonText:
    '<i class="flaticon-cancel-circle"></i> Cancel',
    cancelButtonAriaLabel: 'Thumbs down',
    padding: '2em'
  })

})



function changeValue(obj){
        
        // var project_id = $(this).data("id");
        var project_id = obj.getAttribute("data-id");
        var project_status = obj.value; 
        // var project_status = document.querySelector('#workspace_status').innerHTML
 
            var token = $("meta[name='csrf-token']").attr("content");
            // confirm("Are you sure?");
            /*sweet*/
         
                    swal({
                        title: 'Do you want to change the status?',
                        text: "",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Change',
                        padding: '2em'
                        }).then(function(result) {
                   
                     if (result.value) {
                        $.ajax({
            type: "GET",
            url: "/project/ajaxstatusupdate",
            data: {
            "id": project_id,
            "_token": token,
            "project_status":project_status
            },
            success: function (data) {
                console.log(data);
                // var elem = document.getElementById("workspace_status");
                obj.innerHTML = data;
                obj.value = data;
                $s = data;
                if($s == 'false'){
                    swal(
                            'Failed!',
                            'You are not permitted',
                            'error'
                            );
                    location.reload()
                }
                if($s == 'Ongoing'){
                    $s = 'badge outline-badge-warning';
                }else if($s == 'Finished'){
                    $s = 'badge outline-badge-success';
                }else if($s == 'OnHold'){
                    $s = 'badge outline-badge-danger';
                }
                
                // obj.getAttribute("class") = $s;
                obj.className = $s;
                // elem.value = data;
              
                // $('#project_id').val(data.data.id);
                // $('#project_name').val(data.data.project_name);
                // $('#project_description').val(data.data.project_description);
                // $('#project_start_date').val(data.data.project_start_date);
                // $('#project_end_date').val(data.data.project_end_date);
                // $('#project_budget').val(data.data.project_budget);
            }
            });
                            swal(
                            'Changed!',
                            'status has been changed',
                            'success'
                            )
                        }
                        })
               
            /*sweet end*/
    
    }


</script>

    @endsection