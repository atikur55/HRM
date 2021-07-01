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
            <form id="add_employee_form" action="{{ url('personal/profile/add/') }}" class="ui form custom" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                    <div class="col-md-12 float-left">
                        <div class="box box-success">
                            <div class="box-header with-border">{{ __('Personal Information') }}</div>
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="field">
                                        <label>{{ __('First Name') }}</label>
                                    <input type="text" class="form-control" name="firstname" value="{{old('firstname')}}">
                                    </div>
                                    <div class="field">
                                        <label>{{ __('Middle Name') }}</label>
                                        <input type="text" class="form-control" name="mi" value="{{old('mi')}}">
                                    </div>
                                </div>
                                <div class="field">
                                    <label>{{ __('Last Name') }}</label>
                                    <input type="text" class="form-control" name="lastname" value="{{old('lastname')}}">
                                </div>
                                <div class="field">
                                    <label>{{ __('Gender') }}</label>
                                    <select name="gender" class="ui dropdown form-control" >
                                        <option value="">Select Gender</option>
                                        <option value="MALE">MALE</option>
                                        <option value="FEMALE">FEMALE</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>{{ __('Civil Status') }}</label>
                                    <select name="civilstatus" class="ui dropdown form-control" >
                                        <option value="">Select Civil Status</option>
                                        <option value="SINGLE">SINGLE</option>
                                        <option value="MARRIED">MARRIED</option>
                                        <option value="ANULLED">ANULLED</option>
                                        <option value="WIDOWED">WIDOWED</option>
                                        <option value="LEGALLY SEPARATED">LEGALLY SEPARATED</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="field">
                                        <label>{{ __('Height') }} <span class="help">(cm)</span></label>
                                        <input type="number" class="form-control" name="height" value="{{old('height')}}" placeholder="000">
                                    </div>
                                    <div class="field">
                                        <label>{{ __('Weight') }} <span class="help">(pounds)</span></label>
                                        <input type="number" class="form-control" name="weight" value="{{old('weight')}}" placeholder="000">
                                    </div>
                                </div>
                                <div class="form-group">
                                <div class="field">
                                    <label>{{ __('Email Address (Personal)') }}</label>
                                    <input type="email" name="emailaddress" value="{{old('emailaddress')}}" class="lowercase form-control">
                                </div>
                                <div class="field">
                                    <label>{{ __('Mobile Number') }}</label>
                                    <input type="text" class="form-control" name="mobileno" value="{{old('mobileno')}}">
                                </div>
                                <div class="field">
                                    <label>{{ __('Emergency Contact') }}</label>
                                    <input type="text" name="emergency_contact_name" value="{{old('emergency_contact_name')}}" placeholder="Contact Person Name" class="form-control">
                                    <br>
                                    <input type="text" name="emergency_contact_relation" value="{{old('emergency_contact_relation')}}" placeholder="Contact Person Relation" class="form-control">
                                    <br>
                                    <input type="text" class="form-control" name="emergency_number" value="{{old('emergency_number')}}" placeholder="Emergency Contact Number">
                                </div>
                                <div class="field">
                                    <label>{{ __('Parents Details') }}</label>
                                 
                                    <input type="text" name="father" value="{{old('father')}}" placeholder="Father Name" class="form-control" required>
                                    <br>
                                    <input type="text" class="form-control" name="mother" value="{{old('mother')}}" placeholder="Mother Name" required>
                                </div>
                                
                                </div>
                                <div class="form-group">
                                    <div class="field">
                                        <label>{{ __('Age') }}</label>
                                        <input type="number" class="form-control" name="age" value="{{old('age')}}" placeholder="00">
                                    </div>
                                    <div class="field">
                                        <label>{{ __('Date of Birth') }}</label>
                                        <input type="date" name="birthday" value="{{old('birthday')}}" class="form-control airdatepicker" data-position="top right" placeholder="Date"> 
                                    </div>
                                </div>
                                <div class="field">
                                    <label>{{ __('National ID') }}</label>
                                    <input type="text" class="form-control" name="nationalid" value="{{old('nationalid')}}" placeholder="">
                                </div>
                                <div class="field">
                                    <label>{{ __('Place of Birth') }}</label>
                                    <input type="text" class="form-control" name="birthplace" value="{{old('birthplace')}}" placeholder="City, Province, Country">
                                </div>
                                <div class="field">
                                    <label>{{ __('Home Address') }}</label>
                                    <input type="text" class="form-control" name="homeaddress" value="{{old('homeaddress')}}" placeholder="House/Unit Number, Building, Street, City, Province, Country">
                                </div>
                                <div class="field">
                                    <label>{{ __('Upload Profile photo') }}</label>
                                    <input class="ui file upload form-control" value="{{old('image')}}" id="imagefile" name="image" type="file" accept="image/png, image/jpeg, image/jpg" onchange="validateFile()">
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 float-left">
                        <div class="box box-success">
                            <div class="box-header with-border">{{ __('Employee Details') }}</div>
                            <div class="box-body">
                                <h4 class="ui dividing header">{{ __('Designation') }}</h4>
                                <div class="field">
                                    <label>{{ __('Company') }}</label>
                                    <select name="company" class="ui search dropdown form-control">
                                        <option value="">Select Company</option>
                                        @isset($company)
                                            @foreach ($company as $data)
                                                <option value="{{ $data->company }}"> {{ $data->company }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="field">
                                    <label>{{ __('Department') }}</label>
                                    <select name="department" class="ui search dropdown form-control department">
                                        <option value="">Select Department</option>
                                        @isset($department)
                                            @foreach ($department as $data)
                                                <option value="{{ $data->department }}"> {{ $data->department }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                 <div class="field">
                                    <label>{{ __('Job Title / Position') }}</label>
                                    <div class="ui search dropdown selection form-control jobposition">
                                        <input type="hidden" name="jobposition">
                                        <i class="dropdown icon" tabindex="1"></i>
                                        <div class="default text">Select Job Title</div>
                                        <div class="menu">
                                        @isset($jobtitle)
                                            @isset($department)
                                                @foreach ($jobtitle as $data)
                                                    @foreach ($department as $dept)
                                                        @if($dept->id == $data->dept_code)
                                                            <div class="item" data-value="{{ $data->jobtitle }}" data-dept="{{ $dept->department }}">{{ $data->jobtitle }}</div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endisset
                                        @endisset
                                        </div>
                                    </div>
                                </div> 
                                <div class="field">
                                    <label>{{ __('ID Number') }}</label>

                                    @php $idno = Auth::user()->id+10000+rand(10,1000); @endphp 
                                    <input type="hidden" class="form-control" name="idno" value="{{$idno}}">
                                </div>
                                <div class="field">
                                    <label>{{ __('Email Address (Company)') }}</label>
                                    <input type="email" name="companyemail" value="{{old('companyemail')}}" class="lowercase form-control">
                                </div>
                                <div class="field">
                                    <label>{{ __('Leave Group') }}</label>
                                    <select name="leaveprivilege" class="ui dropdown form-control">
                                        <option value="">Select Leave Privilege</option>
                                        @isset($leavegroup) 
                                            @foreach($leavegroup as $lg)
                                                <option value="{{ $lg->id }}">{{ $lg->leavegroup }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <h4 class="ui dividing header">{{ __('Employment Information') }}</h4>
                                <div class="field">
                                    <label>{{ __('Employment Type') }}</label>
                                    <select name="employmenttype" class="ui dropdown form-control">
                                        <option value="">Select Type</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Trainee">Trainee</option>
                                    </select>
                                </div>
                                <div class="field">
                                <label>{{ __('Employment Status') }}</label>
                                    <select name="employmentstatus" class="ui dropdown form-control">
                                        <option value="">Select Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Archived">Archived</option>
                                    </select> 
                          
                                </div>
                                <div class="field">
                                    <label>{{ __('Official Start Date') }}</label>
                                <input type="date" name="startdate" value="{{old('startdate')}}" class="airdatepicker form-control" data-position="top right" placeholder="Date">
                                </div>
                                <div class="field">
                                    <label>{{ __('Date Regularized') }}</label>
                                    <input type="date" name="dateregularized" value="{{old('dateregularized')}}" class="airdatepicker form-control" data-position="top right" placeholder="Date">
                                </div>
                                <br>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-12 float-left">
                        <div class="ui error message">
                            <i class="close icon"></i>
                            <div class="header"></div>
                            <ul class="list">
                                <li class=""></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 float-left">
                        <div class="action align-right">
                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="employmentstatus" value="Active">
                        
                        @php $idno = Auth::user()->id+10000+rand(10,1000); @endphp 
                        <input type="hidden" class="form-control" name="idno" value="{{$idno}}">

                            <button type="submit" name="submit" class="btn btn-success"><i class="ui checkmark icon"></i>{{ __('Save') }}</button>
                            <a href="{{ url('employees') }}" class="btn btn-danger ui grey button small"><i class="ui times icon"></i>{{ __('Cancel') }}</a>
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