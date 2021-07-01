@extends('layouts.default')


    @section('meta')
        <title>Schedules | Workday Time Clock</title>
        <meta name="description" content="Workday schedules, view all employee schedules, add schedule or shift, edit, and delete schedules">
    @endsection

    @section('styles')
    <link href="{{ asset('/assets/vendor/mdtimepicker/mdtimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    <style>
        /* .ui.active.modal {position: relative !important;} */
        .datepicker {z-index: 999 !important;}
        .datepickers-container {z-index: 9999 !important;}
    </style>
    @endsection

    @section('content')

    


  


    @include('admin.modals.modal-add-schedule')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <h2 class="page-title">{{ __('Schedules') }}
                {{-- <button class="btn btn-primary ui positive button mini offsettop5 btn-add pull  -right "><i class="ui icon plus"></i>{{ __('Add') }}</button> --}}

                 <button  type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">{{ __('Add') }}</button>
            </h2>
        </div>
        </div>

        <div class="row widget-content widget-content-area br-6">
            <div class="box box-success">
                <div class="box-body">
                    <table width="100%" class="table table-striped table-hover" id="dataTables-example" data-order='[[ 6, "asc" ]]' style="font-weight: bold">
                        <thead>
                            <tr>
                                <th>{{ __('Employee') }}</th>
                                <th>{{ __('Time (Start-Off)') }}</th>
                                <th>{{ __('Hours') }}</th>
                                <th>{{ __('Rest Days') }}</th>
                                <th>{{ __('From (Date)') }}</th>
                                <th>{{ __('To (Date)') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($schedules)
                            @foreach ($schedules as $sched)
                            <tr>
                                <td>{{ $sched->employee }}</td>
                                <td>
                                    @php
                                        if($tf == 1) {
                                            echo e(date("h:i A", strtotime($sched->intime)));
                                            echo " - ";
                                            echo e(date("h:i A", strtotime($sched->outime)));
                                        } else {
                                            echo e(date("H:i", strtotime($sched->intime)));
                                            echo " - ";
                                            echo e(date("H:i", strtotime($sched->outime)));
                                        }
                                    @endphp
                                </td>
                                <td>{{ $sched->hours }} hr</td>
                                <td>{{ $sched->restday }}</td>
                                <td>@php echo e(date('D, M d, Y', strtotime($sched->datefrom))) @endphp</td>
                                <td>@php echo e(date('D, M d, Y', strtotime($sched->dateto))) @endphp</td>
                                <td>
                                    @if($sched->archive == '0') 
                                        <span class="green">{{ __('Present') }}</span>
                                    @else
                                        <span class="teal">{{ __('Previous') }}</span>
                                    @endif
                                </td>
                                <td class="align-right">
                                    @if($sched->archive == '0') 
                                        <a href="{{ url('/schedules/edit/'.$sched->id) }}" class=" bnt bnt-info ui circular basic icon button tiny"><i class="fa fa-edit"></i></a>
                                        <a href="{{ url('/schedules/delete/'.$sched->id) }}" class=" bnt bnt-success ui circular basic icon button tiny"><i class="fa fa-trash trash alternate outline"></i></a>
                                        <a href="{{ url('/schedules/archive/'.$sched->id) }}" class="fa fa-minus  bnt bnt-warning ui circular basic icon button tiny"><i class="icon archive"></i></a>
                                    @else
                                        <a href="{{ url('/schedules/delete/'.$sched->id) }}" class=" bnt bnt-danger ui circular basic icon button tiny"><i class=" fa fa-trasg icon trash alternate outline"></i></a>
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

 


    @endsection
    
    @section('scripts')

    <script>
        // console.log('got...')

   $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
      })
    </script>
 



    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/i18n/datepicker.en.js') }}"></script>
    <script src="{{ asset('/assets/vendor/mdtimepicker/mdtimepicker.min.js') }}"></script>

    <script type="text/javascript">

        var f4 = flatpickr(document.getElementById('timeFlatpickr'), {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            defaultDate: "13:45"
        });



    // $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: true,ordering: true});
    // $('.airdatepicker').datepicker({ language: 'en', dateFormat: 'yyyy-mm-dd' });

    @isset($tf)
        @if($tf == 1)
            $('.jtimepicker').mdtimepicker({format:'h:mm tt', theme: 'blue', hourPadding: true});
        @else
            $('.jtimepicker').mdtimepicker({format:'hh:mm', theme: 'blue', hourPadding: true});
        @endif
    @endisset



    // $('.ui.dropdown.getid').dropdown({ onChange: function(value, text, $selectedItem) {
    //     $('select[name="employee"] option').each(function() {
          
    //         if($(this).val()==value) {
    //             var id = $(this).attr('data-id');
    //             console.log(id);
    //             $('input[name="id"]').val(id);};
    //     });
    // }});
    </script>
    @endsection 