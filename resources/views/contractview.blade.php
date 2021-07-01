@extends('layouts.personal')

    @section('meta')
        <title>My Attendances | HRM</title>
        <meta name="description" content="Workday my attendance, view all my attendances, and clock-in/out">
    @endsection

    @section('styles')
        <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')


    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing mt-2">
     <div class="widget-content widget-content-area br-6">
         {{-- <a href="{{url('employees/new')}}" class="btn btn-success float-right" style="text-align: center; margin:0px 20px 20px 0px"><i class="fa fa-plus"></i>Add</a> --}}
         <div class="table-responsive mb-4 mt-4" style="overflow:auto">

             <table id="zero-config" class="table table-hover" style="width:100%;">
                 <thead>
                     <tr>
                         <th>{{ __("SL NO") }}</th>
                         <th>{{ __("Name") }}</th>
                         <th>{{ __("File Title") }}</th>
                         <th>{{ __("Description") }}</th>
                         <th>{{ __("File") }}</th>
                         <th>{{ __("Download") }}</th>
                     </tr>
                 </thead>

                 <tbody>
                   @php $i=1; @endphp
                  @foreach($emp as $file)
                     <tr>
                <td>{{$i}}</td>
                   <td>
                        @php
                        $emp_name = App\User::where('id',$file->emp_name)->first();
                        @endphp
                        {{$emp_name->name}}
                    </td>

                    <td>
                      {{$file->file_title}}
                    </td>
                    <td>
                      {{$file->description}}
                    </td>

                    <td>
                      {{$file->file}}
                    </td>
                    <td>
                      <a href="{{url('download')}}/{{$file->file}}"><i class="fas fa-download"></i></a>
                     </td


                     </tr>
@php $i++; @endphp
                 @endforeach
                 </tbody>
                 <tfoot>
                     <tr>
                         <th>{{ __("SL NO") }}</th>
                         <th>{{ __("Name") }}</th>
                         <th>{{ __("File Title") }}</th>
                         <th>{{ __("Description") }}</th>
                         <th>{{ __("File") }}</th>
                         <th>{{ __("Download") }}</th>
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
