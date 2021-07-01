@extends('layouts.personal')

    @section('meta')
        <title>My Leave | HRM</title>
        <meta name="description" content="Workday my leave of absence, view my leave of absence records, edit pending leave request, and request leave of absence">
    @endsection

    @section('styles')
    <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    <style>
        .ui.active.modal {position: relative !important;}
        .datepicker {z-index: 999 !important; }
        .datepickers-container {z-index: 9999 !important;}
    </style>
    @endsection

    @section('content')


            <div class="col-md-12 content">

                <div >
                <a  onclick="goBack()" class="btn btn-danger" ><i class="ui times icon"></i> {{ __("Close") }}</a>
               
                </div>


                <h3>{{ __("My Leave") }}</h3>

  


        <form action="" class="ui form" method="post" accept-charset="utf-8">
        <div class="form-group">
            <label>{{ __("Employee") }}</label>
        <input type="text" class="form-control employee uppercase readonly" value="{{$d->employee}}" readonly="">
        </div>
        <div class="form-group">
            <label>{{ __("Leave Type") }}</label>
        <input type="text" class="form-control leavetype uppercase readonly" value="{{$d->type}}" readonly="">
        </div>
        <div class="two form-groups">
            <div class="form-group">
                <label for="">{{ __("Leave From") }}</label>
            <input type="text" class="form-control leavefrom readonly" value="{{$d->leavefrom}}" readonly="" />
            </div>
            <div class="form-group">
                <label for="">{{ __("Leave To") }}</label>
                <input type="text" class="form-control leaveto readonly" value="{{$d->leaveto}}" readonly=""/>
            </div>
        </div>
        <div class="form-group">
            <label for="">{{ __("Return Date") }}</label>
            <input type="text" class="form-control returndate readonly" value="{{$d->returndate}}" readonly=""/>
        </div>
        <div class="form-group">
            <label>{{ __("Reason") }}</label>
            <textarea rows="5" class="form-control reason uppercase readonly" value="" readonly="">{{$d->reason}}</textarea>
        </div>
        <div class="form-group">
            <label for="">{{ __("Status") }}</label>
            <input type="text" class="form-control status readonly" value="{{$d->status}}" readonly=""/>
        </div>
    </div>
  
    </form>  



@endsection
    