@extends('layouts.default')

    @section('meta')
        <title>Change Password | Workday Time Clock</title>
        <meta name="description" content="Workday change your password.">
    @endsection 

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">{{ __("Change Password") }}</h2>
            </div>    
        </div>

        <div class="row widget-content widget-content-area br-6">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-content">
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
                    <form action="{{ url('user/update-password') }}" class="ui form" method="post" accept-charset="utf-8">
                        @csrf
                        <div class="form-group">
                            <label>{{ __("Current Password") }}</label>
                            <input type="password" name="currentpassword" value="" placeholder="Enter Current Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">{{ __("New Password") }}</label>
                            <input type="password" name="newpassword" value="" placeholder="Enter Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">{{ __("Confirm Password") }}</label>
                            <input type="password" name="confirmpassword" value="" placeholder="Enter Password Confirmation" class="form-control">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-success ui positive button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __("Update") }}</button>
                        <a class="btn btn-danger ui grey button" href="{{ url('dashboard') }}"><i class="ui times icon"></i> {{ __("Cancel") }}</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
    