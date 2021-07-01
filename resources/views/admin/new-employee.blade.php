@extends('layouts.default')

    @section('meta')
        <title>New Employee | Workday Time Clock</title>
        <meta name="description" content="Workday add new employee, delete employee, edit employee">
    @endsection

    @section('styles')
        <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">{{ __('Employee Profile') }}</h2>
            </div>    
        </div>

        <div class="row widget-content widget-content-area br-6">
            <div class="col-md-12">
                @if ($errors->any())
                <div class="ui error message">
                    <i class="close icon"></i>
                    <div class="header">{{ __('There were some errors with your submission') }}</div>
                    <ul class="list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            @include('partials.alert')

            <form id="add_employee_form" action="{{ url('employee/add') }}" class="ui form custom" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
                <div class="col-md-6 float-left">
                    <div class="box box-success">
                        <div class="box-header with-border">{{ __('Personal Information') }}</div>
          
                    
                                <div class="form-group">
                                    <label>{{ __('First Name') }}</label>
                                <input style="width:100%" style="width:100%" type="text" class="ui form-control" name="firstname" value="{{old('firstname')}}">
                                
                        
                            </div>
                                <div class="form-group">
                                    <label>{{ __('Middle Name') }}</label>
                                    <input style="width:100%" type="text" class="ui form-control" name="mi" value="{{old('mi')}}">
                                </div>
                        
                            <div class="form-group">
                                <label>{{ __('Last Name') }}</label>
                                <input style="width:100%" type="text" class="ui form-control" name="lastname" value="{{old('lastname')}}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('Gender') }}</label>
                                <select name="gender" class="ui dropdown form-control" >
                                    <option value="">Select Gender</option>
                                    <option value="MALE">MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                                </select>
                            </div>
                            <div class="form-group">
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
                                    <label>{{ __('Height') }} <span class="help">(cm)</span></label>
                                    <input type="number" class="form-control" name="height" value="{{old('height')}}" placeholder="000">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Weight') }} <span class="help">(pounds)</span></label>
                                    <input type="number" class="form-control" name="weight" value="{{old('weight')}}" placeholder="000">
                                </div>
                      
                                <div class="form-group">
                                    <label>{{ __('Email Address (Personal)') }}</label>
                                    <input type="email" name="emailaddress" value="{{old('emailaddress')}}" class="lowercase form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Mobile Number') }}</label>
                                    <input style="width:100%" type="text" class="form-control" name="mobileno" value="{{old('mobileno')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Emergency Contact') }}</label>
                                    <input style="width:100%" type="text" name="emergency_contact_name" value="{{old('emergency_contact_name')}}" placeholder="Contact Person Name" class="form-control">
                                    <br>
                                    <input style="width:100%" type="text" name="emergency_contact_relation" value="{{old('emergency_contact_relation')}}" placeholder="Contact Person Relation" class="form-control">
                                    <br>
                                    <input style="width:100%" type="text" class="form-control" name="emergency_number" value="{{old('emergency_number')}}" placeholder="Emergency Contact Number">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Parents Details') }}</label>
                                
                                    <input style="width:100%" type="text" name="father" value="{{old('father')}}" placeholder="Father Name" class="form-control" required>
                                    <br>
                                    <input style="width:100%" type="text" class="form-control" name="mother" value="{{old('mother')}}" placeholder="Mother Name" required>
                                </div>
                            
          
                         
                            <br>
                       
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="box box-success">
                      
                        <div class="box-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>{{ __('Age') }}</label>
                                    <input type="number" class="form-control" name="age" value="{{old('age')}}" placeholder="00">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Date of Birth') }}</label>
                                    <input type="date" name="birthday" value="{{old('birthday')}}" class="form-control airdatepicker" data-position="top right" placeholder="Date"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('National ID') }}</label>
                                <input style="width:100%" type="text" class="form-control" name="nationalid" value="{{old('nationalid')}}" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>{{ __('Place of Birth') }}</label>
                                <input style="width:100%" type="text" class="form-control" name="birthplace" value="{{old('birthplace')}}" placeholder="City, Province, Country">
                            </div>
                            <div class="form-group">
                                <label>{{ __('Home Address') }}</label>
                                <input style="width:100%" type="text" class="form-control" name="homeaddress" value="{{old('homeaddress')}}" placeholder="House/Unit Number, Building, Street, City, Province, Country">
                            </div>
                            <div class="form-group">
                                <label>{{ __('Upload Profile photo') }}</label>
                                <input class="ui file upload form-control" value="{{old('image')}}" id="imagefile" name="image" type="file" accept="image/png, image/jpeg, image/jpg" onchange="validateFile()">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="box box-success">
                        <div class="box-header with-border"> <h1>{{ __('Employee Details') }}</h1> </div>
                        <div class="box-body">
                            <h4 class="ui dividing header">{{ __('Designation') }}</h4>
                            <div class="form-group">
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
                            <div class="form-group">
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
                            {{-- <div class="form-group">
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
                            </div> --}}
                            <div class="form-group">
                                <label>{{ __('Job Title / Position') }}</label>
                               
                                    @isset($jobtitle)
                                         
                                                        <select name="jobposition" id="" class="form-control">
                                                            <option>Select</option>
                                                            @foreach ($jobtitle as $data)
                                                            <option value="{{ $data->jobtitle }}">{{ $data->jobtitle }}</option>
                                                            @endforeach
                                                        </select>
                                             
                                               
                                          
                                  
                                    @endisset
                              
                            </div>
                            <div class="form-group">
                                <label>{{ __('ID Number') }}</label>
                                <input style="width:100%" type="text" class="form-control" name="idno" value="{{old('idno')}}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('Email Address (Company)') }}</label>
                                <input type="email" name="companyemail" value="{{old('companyemail')}}" class="lowercase form-control">
                            </div>
                            <div class="form-group">
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
                            <div class="form-group">
                                <label>{{ __('Employment Type') }}</label>
                                <select name="employmenttype" class="ui dropdown form-control">
                                    <option value="">Select Type</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Trainee">Trainee</option>
                                    <option value="Regular">Probation</option>
                                    <option value="Trainee">Management</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Employment Status') }}</label>
                                <select name="employmentstatus" class="ui dropdown form-control">
                                    <option value="">Select Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Archived">Archived</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Official Start Date') }}</label>
                            <input type="date" name="startdate" value="{{old('startdate')}}" class="airdatepicker form-control" data-position="top right" placeholder="Date">
                            </div>
                            <div class="form-group">
                                <label>{{ __('Date Regularized') }}</label>
                                <input type="date" name="dateregularized" value="{{old('dateregularized')}}" class="airdatepicker form-control" data-position="top right" placeholder="Date">
                            </div>
                            <br>
                            <div class="form-group">
                                <label>{{ __('Basic Salary') }}</label>
                                <input type="number" name="salary" value="{{old('salary')}}" class=" form-control"  placeholder="0.00">
                            </div>
                        </div>
                    </div>
                </div>
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
    $('.airdatepicker').datepicker({ language: 'en', dateFormat: 'yyyy-mm-dd', autoClose: true });
    
    $('.ui.dropdown.department').dropdown({ onChange: function(value, text, $selectedItem) {
        $('.jobposition .menu .item').addClass('hide disabled');
        $('.jobposition .text').text('');
        $('input[name="jobposition"]').val('');
        $('.jobposition .menu .item').each(function() {
            var dept = $(this).attr('data-dept');
            if(dept == value) {$(this).removeClass('hide disabled');};
        });
    }});

    function validateFile() {
        var f = document.getElementById("imagefile").value;
        var d = f.lastIndexOf(".") + 1;
        var ext = f.substr(d, f.length).toLowerCase();
        if (ext == "jpg" || ext == "jpeg" || ext == "png") { } else {
            document.getElementById("imagefile").value="";
            $.notify({
            icon: 'ui icon times',
            message: "Please upload only jpg/jpeg and png image formats."},
            {type: 'danger',timer: 400});
        }
    }
    </script>
    @endsection