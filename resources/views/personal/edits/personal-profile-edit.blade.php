@extends('layouts.personal')

    @section('meta')
        <title>Edit My Profile |HRM</title>
        <meta name="description" content="Workday edit my information.">
    @endsection

    @section('styles')
        <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">{{ __("Edit My Profile") }}
                    <a href="{{ url('personal/profile/view') }}" class="btn btn-danger ui basic blue button mini offsettop5 float-right"><i class="ui icon chevron left"></i>{{ __("Return") }}</a>
                </h2>
            </div>    
        </div>
        <div class="col-md-12">
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
        </div>
        <div class="row">
            @include('partials.alert')
            <form id="edit_personal_info_form" action="{{ url('personal/profile/update') }}" class="ui form custom" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
                <div class="col-md-12 float-left">
                    <div class="box box-success">
                        <div class="box-header with-border">{{ __("Personal Information") }}</div>
                        <div class="box-body">
                            <div class="two form-group">
                                <div class="form-group">
                                    <label>{{ __("First Name") }}</label>
                                    <input type="text" class="form-control uppercase" name="firstname" value="@isset($person_details->firstname){{ $person_details->firstname }}@endisset">
                                </div>
                                <div class="form-group">
                                    <label>{{ __("Middle Name") }}</label>
                                    <input type="text" class="form-control uppercase" name="mi" value="@isset($person_details->mi){{ $person_details->mi }}@endisset">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __("Last Name") }}</label>
                                <input type="text" class="form-control uppercase" name="lastname" value="@isset($person_details->lastname){{ $person_details->lastname }}@endisset">
                            </div>
                            <div class="form-group">
                                <label>{{ __("Gender") }}</label>
                                <select name="gender" class="form-control ui dropdown uppercase">
                                    <option value="">Select Gender</option>
                                    <option value="MALE" @isset($person_details->gender) @if($person_details->gender == 'MALE') selected @endif @endisset>MALE</option>
                                    <option value="FEMALE" @isset($person_details->gender) @if($person_details->gender == 'FEMALE') selected @endif @endisset>FEMALE</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ __("Civil Status") }}</label>
                                <select name="civilstatus" class="form-control ui dropdown uppercase">
                                    <option value="">Select Civil Status</option>
                                    <option value="SINGLE" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'SINGLE') selected @endif @endisset>SINGLE</option>
                                    <option value="MARRIED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'MARRIED') selected @endif @endisset>MARRIED</option>
                                    <option value="ANULLED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'ANULLED') selected @endif @endisset>ANULLED</option>
                                    <option value="WIDOWED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'WIDOWED') selected @endif @endisset>WIDOWED</option>
                                    <option value="LEGALLY SEPARATED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'LEGALLY SEPARATED') selected @endif @endisset>LEGALLY SEPARATED</option>
                                </select>
                            </div>
                            <div class="two form-groups">
                                <div class="form-group">
                                    <label>{{ __("Height") }} <span class="help">(cm)</span></label>
                                    <input type="text" name="height" value="@isset($person_details->height){{ $person_details->height }}@endisset" placeholder="000" class="form-control ">
                                </div>
                                <div class="form-group">
                                    <label>{{ __("Weight") }} <span class="help">(pounds)</span></label>
                                    <input type="text" name="weight" value="@isset($person_details->weight){{ $person_details->weight }}@endisset" placeholder="000" class="form-control ">
                                </div>
                            </div>
                            <div class="two form-groups">
                            <div class="form-group">
                                <label>{{ __("Email Address (Personal)") }}</label>
                                <input type="email" name="emailaddress" value="@isset($person_details->emailaddress){{ $person_details->emailaddress }}@endisset"  class="form-control lowercase">
                            </div>
                            <div class="form-group">
                                <label>{{ __("Mobile Number") }}</label>
                                <input type="text" class="form-control uppercase" name="mobileno" value="@isset($person_details->mobileno){{ $person_details->mobileno }}@endisset">
                            </div>
                            <div class="field">
                                @isset($person_details->emergency_contact)
                                @php
                                  $exploded = array();
                       
                                 $exploded = explode('_',$person_details->emergency_contact);
                                
                                
                                @endphp
                                @endisset

                                <label>{{ __('Emergency Contact') }}</label>
                                <input type="text" name="emergency_contact_name" value="@isset($exploded[0]) {{$exploded[0]}} @endisset" placeholder="Contact Person Name" class="form-control">
                                <br>
                                <input type="text" name="emergency_contact_relation" value="@isset($exploded[1]) {{$exploded[1]}} @endisset" placeholder="Contact Person Relation" class="form-control">
                                <br>
                                <input type="text" class="form-control" name="emergency_number" value="@isset($exploded[2]) {{$exploded[2]}} @endisset" placeholder="Emergency Contact Number">
                            </div>
                            <div class="field">
                                <label>{{ __('Parents Details') }}</label>
                             
                                <input type="text" name="father" value="{{$person_details->father??''}}" placeholder="Father Name" class="form-control" required>
                                <br>
                                <input type="text" class="form-control" name="mother" value="{{$person_details->mother??''}}" placeholder="Mother Name" required>
                            </div>
                            
                            </div>
                            <div class="two form-groups">
                            <div class="form-group">
                                <label>{{ __("Age") }}</label>
                                <input type="text" name="age" value="@isset($person_details->age){{ $person_details->age }}@endisset" placeholder="00" class="form-control ">
                            </div>
                            <div class="form-group">
                                <label>{{ __("Date of Birth") }}</label>
                                <input type="date" name="birthday" value="@isset($person_details->birthday){{ $person_details->birthday }}@endisset" class="form-control airdatepicker" placeholder="Date">
                            </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __("Place of Birth") }}</label>
                                <input type="text" class="form-control uppercase" name="birthplace" value="@isset($person_details->birthplace){{ $person_details->birthplace }}@endisset" placeholder="City, Province, Country">
                            </div>
                            <div class="form-group">
                                <label>{{ __("Home Address") }}</label>
                                <input type="text" class="form-control uppercase" name="homeaddress" value="@isset($person_details->homeaddress){{ $person_details->homeaddress }}@endisset" placeholder="House/Unit Number, Building, Street, City, Province, Country">
                            </div>
                            <div class="custom-file mb-4">
                             
                                <input class="custom-file-input" value="" id="customFile" name="image" type="file" accept="image/png, image/jpeg, image/jpg" onchange="validateFile()">
                                <label class="custom-file-label" for="customFile">{{ __('Upload Profile photo') }}</label>
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
                            <br>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 float-left">
                    <div class="action align-right">
                        <button type="submit" name="submit" class="btn btn-success ui green button small"><i class="ui checkmark icon"></i> {{ __("Update") }}</button>
                        <a href="{{ url('personal/dashboard') }}" class="btn btn-danger ui grey small button cancel"><i class="ui times icon"></i> {{ __("Cancel") }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endsection

    @section('scripts')
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/i18n/datepicker.en.js') }}"></script>
    <script type="text/javascript">
        $('.airdatepicker').datepicker({ language: 'en', dateFormat: 'yyyy-mm-dd' });
    </script>
    @endsection