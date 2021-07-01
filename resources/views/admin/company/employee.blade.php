@extends('layouts.default')
    
    @section('meta')
        <title>Companies | Workday Time Clock</title>
        <meta name="description" content="Workday companies, view companies, and export or download companies.">
    @endsection
    @section('css')
    <style type="text/css">
        .physical{
            color: blue;
        }
        #panel{
            display: none;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
          $("#button").click(function(){
             $("#div").show();
          });
        });
</script> 
    @endsection

    @section('content')
    {{-- @include('admin.modals.modal-import-company') --}}

    <div class="container-fluid">
        @if(session('success'))
        <div class="alert alert-success">
            <span>{{session('success')}}</span>
        </div>
        @endif

        <div class="row widget-content widget-content-area br-6">
            <div class="col-md-12">
                <!-- Update -->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">Employer Details</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">Employer Filling Details</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu2">Pay Frequency</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu3">Employee List</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu4">Add New Employee</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu5">Bulk Action</a>
                  </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane container active" id="home" style="margin-top: 30px;">
                      <form action="{{url('employer/add')}}" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Traging Name</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="trading_name" width="100%;" class="form-control">
                                    <input type="hidden" name="c_name" width="100%;" class="form-control"
                                    value="{{$company_name}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" class="physical" style="color: blue;">Physical Address</label>
                                </div>
                                <div class="form-group col-md-8"></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Unit Number</label>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" name="unit_number">
                                </div>
                                <div class="form-group col-md-2">
                                    
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Complex</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="complex">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Street Number</label>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" name="street_number">
                                </div>
                                <div class="form-group col-md-2">
                                    {{-- <input type="text" class="form-control" id="inputEmail4"> --}}
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Street</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="street">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Suburb or district</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" name="district">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">City or town</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" width="100%;" class="form-control" name="city">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Code</label>
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="text" class="form-control" name="code">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" class="physical" style="color: blue;">Statutory Information</label>
                                </div>
                                <div class="form-group col-md-8"></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="checkbox" name="sdl_exempt" value="SDL exempt">&nbsp;SDL exempt
                                </div>
                                <div class="form-group col-md-8"></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" class="physical" style="color: blue;">Option</label>
                                </div>
                                <div class="form-group col-md-8"></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">logo</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="file" name="logo"><br>
                                    in jpg or png format
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                      </form>
                  </div>
                  <div class="tab-pane container fade" id="menu1" style="margin-top:30px;">
                      <form action="{{url('employer_filling/add')}}" method="POST" enctype="multipart/form-data">
                          <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">PAY Number</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="pay_number" class="form-control" style="width:100%;"><br>
                                    <input type="hidden" name="c_name" class="form-control" style="width:100%;" value="{{$company_name}}"><br>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" class="physical" style="color: blue;">UIF Details</label>
                                </div>
                                <div class="form-group col-md-8"></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">UIF Number</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="uif_number" class="form-control" style="width:100%;"><br>
                                    Not the number that looks similar to the PAY Number
                                </div>
                            </div>
                            <div class="card" style="padding:5px;">
                                <div class="card-header">
                                    <p>Individual UI-19 Information</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Compmany Registration No.(CIPRO)</label>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="text" name="c_register" class="form-control" style="width:100%;">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4" class="physical" style="color: blue;">Portal Address
                                            </label>
                                        </div>
                                        <div class="form-group col-md-8"></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <input type="checkbox" name="same_as_residential" value="Same as residential">&nbsp;Same as residential
                                        </div>
                                        <div class="form-group col-md-8"></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Line 1</label>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="text" name="lin1" class="form-control" style="width:100%;">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Line 2</label>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="text" name="lin2" class="form-control" style="width:100%;">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Line 3</label>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="text" name="lin3" class="form-control" style="width:100%;">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Code</label>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="text" name="code" class="form-control" style="width:100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                      </form>
                  </div>
                  <div class="tab-pane container fade" id="menu2" style="margin-top:30px;">
                      <h3>New Pay Frequency</h3>
                      <form action="{{url('postinsert')}}" method="post">
                          <div class="form-group">
                              <span>Frequency</span>
                              <select id="colors" name="colors" onchange="changeColor()">
                                  <option value="">Choose</option>
                                  <option value="weekly">Weekly</option>
                                  <option value="every_two_week">Every 2 Weeks</option>
                                  <option value="monthly15th">Monthly 15th</option>
                                  <option value="month_end">Month End</option>
                                  <option value="twice_month">Twice a Month</option>
                                  <option value="every_four_week">Every 4 Weeks</option>
                              </select>
                          </div>
                          <!-- Weekly -->

                          <!-- Weekly day wise -->
                          <div class="form-group">
                              <div id="week" style="display:none;">
                                <span>Last Day Period</span>
                                <select name="wdays" id="days" onchange="changeDays()">
                                    <option value="---choose---" selected>---choose---</option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                </select>
                              </div>
                          </div>
                          <!-- First payroll day wise -->
                            <div id="first_payroll" style="display:none;">
                                <div class="form-group">
                                    <span>First Payroll end Date</span>
                                    <select name="weekDate" id="week_f_p_r">
                                        <option id="" value="">--Choose--</option>
                                        <option id="id_first" value=""></option>
                                        <option id="id_second" value=""></option>
                                        <option id="id_third" value=""></option>
                                        <option id="id_fourth" value=""></option>
                                        <option id="id_fifth" value=""></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                          </div>
                          <!-- End Weekly -->

                          <!-- Every two Weeks -->
                          <!-- Every 2 weeks -->
                          <div id="two_weeks" style="display:none;" onchange="changeTwoWeek()">
                                <div class="form-group">
                                    <span>Last Day at period</span>
                                    <input type="date" name="e_w_date" id="date">
                                </div>
                          </div>
                          <!-- First payroll day wise for every two weeks -->
                          
                                <div id="first_payroll_tw" style="display:none;">
                                    <div class="form-group">
                                    <span>First Payroll end Date</span>
                                    <select name="e_w_f_date" id="">
                                        <option >--Choose--</option>
                                        <option id="e_w_first" value=""></option>
                                        <option id="e_w_second" value=""></option>
                                        <option id="e_w_third" value=""></option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                          <!-- End Ever
                                </div>
                                y two Weeks -->

                          <!-- Monthly 15th -->

                          <div id="monthly15_ld" style="display:none;">
                                <div class="form-group">
                                    <span>Day Of Month</span>
                                    <select name="month_fifteen" id="">
                                        <option id="" value="">--Choose--</option>
                                        <option id="first15" value=""></option>
                                        <option id="second15" value=""></option>
                                        <option id="third15" value=""></option>
                                        <option id="fourth15" value=""></option>
                                        <option id="fifth15" value=""></option>
                                        <option id="sixth15" value=""></option>
                                        <option id="seventh15" value=""></option>
                                        <option id="eight15" value=""></option>
                                        <option id="ninth15" value=""></option>
                                        <option id="tenth15" value=""></option>
                                        <option id="eleven15" value=""></option>
                                        <option id="twelve15" value=""></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span>Interim Day of Month</span>
                                    <select name="month_f_interm_day" id="">
                                        <option value="">--Choose--</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        <option value="Month End">Month End</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span>First Payroll period end date</span>
                                    <input type="date" name="half_month_date">
                                </div>
                                <div class="form-group">
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>

                          </div>

                          <!-- End Monthly 15th -->
                           <!-- Month End -->

                          <div id="monthend_ld" style="display:none;">
                                <div class="form-group">
                                    <span>Day Of Month</span>
                                    <select name="month_end_v" id="">
                                        <option id="" value="">--Choose--</option>
                                        <option id="first_end" value=""></option>
                                        <option id="second_end" value=""></option>
                                        <option id="third_end" value=""></option>
                                        <option id="fourth_end" value=""></option>
                                        <option id="fifth_end" value=""></option>
                                        <option id="sixth_end" value=""></option>
                                        <option id="seventh_end" value=""></option>
                                        <option id="eight_end" value=""></option>
                                        <option id="ninth_end" value=""></option>
                                        <option id="tenth_end" value=""></option>
                                        <option id="eleven_end" value=""></option>
                                        <option id="twelve_end" value=""></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span>Interim Day of Month</span>
                                    <select name="month_end_day" id="">
                                        <option value="">--Choose--</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        <option value="Month End">Month End</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span>First Payroll period end date</span>
                                    <input type="date" name="month_end_date">
                                </div>
                                <div class="form-group">
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                          </div>

                          <!-- End Month End -->
                           <!-- Monthly 15th -->

                        <div id="twice_month_ld" style="display:none;">
                            <div class="form-group">
                                <span>Last Day of Period</span>
                                <select name="t_l_d" id="">
                                    <option value="Month End">Month End</option>
                                </select>
                            </div>
                            <div class="form-group">
                                    <span>Interim Day of Month</span>
                                    <select name="t_m_d" id="">
                                        <option value="">--Choose--</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        <option value="Month End">Month End</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span>First Payroll period end date</span>
                                    <input type="date" name="twice_month_date">
                                </div>
                                <div class="form-group">
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                        </div>

                          <!-- End Monthly 15th -->


                      </form>
                  </div>
                  <div class="tab-pane container fade" id="menu3" style="margin-top:30px;">
                         <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <a href="#" class="btn btn-success float-right" style="text-align: center; margin:0px 20px 20px 0px"><i class="fa fa-plus"></i>Add</a>
                <div class="table-responsive mb-4 mt-4">
                  
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('Employee Time') }}</th> 
                                <th>{{ __('Full Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Date of Birth') }}</th>
                                <th class="no-content">
                                   Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @isset($data) --}}
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->employe_time}}</td>
                                <td>{{$employee->first_name}}&nbsp;{{$employee->last_name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->date_birth}}</td>
                                <td>
                                    <a href="#editModal{{$employee->id}}" data-toggle="modal" class="btn btn-warning"  > View
                                    </a>
                                </td>
                <div class="modal fade " id="editModal{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header state modal-primary">
                                <h5 class="modal-title" id="exampleModalLongTitle">Your Employee Information</h5>
                                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i></button>
                            </div>
                            
                            <div class="modal-body">
                            
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" class="physical" style="color: blue;">Essentials</label>
                                </div>
                                <div class="form-group col-md-8"></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">PAY Frequency</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" value="{{$employee->pay_fre}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">First Name</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="first_name" style="width:100%" value="{{$employee->first_name}}">
                                    <input type="text" name="employe_time" id="get_time" style="width:100%" value="{{$employee->employe_time}}">
                                    <input type="text" name="c_name" style="width:100%" value="{{$employee->c_name}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Last Name</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="last_name" style="width:100%" value="{{$employee->last_name}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Date of Birth</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="date_birth" value="{{$employee->date_birth}}" style="width:100%">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Date of Appoinment</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="date_app" value="{{$employee->date_app}}" style="width:100%">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Identification Type</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="date_app" value="{{$employee->ident_type}}" style="width:100%">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Passport & Foreign ID No.</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="passport_no" value="{{$employee->passport_no}}" style="width:100%">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Passport Country Code</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="passport_c_code" value="{{$employee->passport_c_code}}" style="width:100%">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">ID Number</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="id_number" style="width:100%" value="{{$employee->id_number}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Email</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="email" name="email" value="{{$employee->email}}" style="width:100%">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Payment Method</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="pay_method" value="{{$employee->pay_method}}" style="width:100%">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" class="physical" style="color: blue;">Bank Account Details</label>
                                </div>
                                <div class="form-group col-md-8"></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Bank</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="bank_name" value="{{$employee->bank_name}}" style="width:100%">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Account Number</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="acc_number" value="{{$employee->acc_number}}" style="width:100%" placeholder="Account Number">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Branch Code</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="brance_code" class="form-control" style="width:100%" value="{{$employee->brance_code}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Account Type</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="acc_type" class="form-control" style="width:100%" value="{{$employee->acc_type}}">
                                    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Holder Relationship</label>
                                </div>
                                <div class="form-group col-md-8">
                                     <input type="text" name="holder_rel" class="form-control" style="width:100%" value="{{$employee->holder_rel}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" class="physical" style="color: blue;">Residential Address</label>
                                </div>
                                <div class="form-group col-md-8"></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Unit Number</label>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" name="unit_number" value="{{$employee->unit_number}}" class="form-control" id="inputEmail4">
                                </div>
                                <div class="form-group col-md-2">
                                    {{-- <input type="text" class="form-control" id="inputEmail4"> --}}
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Complex</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text"  value="{{$employee->complex}}"  name="complex" class="form-control" id="inputEmail4">
                                </div>
                            </div>
                             <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Street Number</label>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" value="{{$employee->street_number}}" name="street_number" class="form-control" id="inputEmail4">
                                </div>
                                <div class="form-group col-md-2">
                                    {{-- <input type="text" class="form-control" id="inputEmail4"> --}}
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Street</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" value="{{$employee->street}}" name="street" class="form-control" id="inputEmail4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Suburb or district</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" value="{{$employee->district}}" name="district" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">City or town</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" value="{{$employee->city}}" name="city" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Code</label>
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="text" value="{{$employee->code}}" name="code" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4" class="physical" style="color: blue;">Portal Address
                                            </label>
                                        </div>
                                        <div class="form-group col-md-8"></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <input type="checkbox" name="same_as_residential" value="Same as residential" {{$employee->same_as_residential == 'residential' ? 'checked':''}}>&nbsp;Same as residential
                                        </div>
                                        <div class="form-group col-md-8"></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Line 1</label>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="text" name="line1" value="{{$employee->line1}}" class="form-control" style="width:100%;">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Line 2</label>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="text" name="line2" value="{{$employee->line2}}" class="form-control" style="width:100%;">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Line 3</label>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="text" name="line3" value="{{$employee->line3}}" class="form-control" style="width:100%;">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Code</label>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="text" name="codetwo" value="{{$employee->line3}}" class="form-control" style="width:100%;">
                                        </div>
                                    </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4" class="physical" style="color: blue;">Other Statutory Info
                                        </label>
                                    </div>
                                    <div class="form-group col-md-8"></div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Job Title</label>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" name="jobtitle" value="{{$employee->jobtitle}}" style="width:100%;"><br>
                                        printed on payslip if improved
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Income Tax Number</label>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" name="tax_number" value="{{$employee->tax_number}}" style="width:100%;">
                                    </div>
                                </div>
                               

                        {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
                            </tr>
                            @endforeach
                            {{-- @endisset --}}
                    
                        </tbody>
                        <tfoot>
                            <tr> 
                                 <th>{{ __('Employee Time') }}</th> 
                                <th>{{ __('Full Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Date of Birth') }}</th>
                                <th class="no-content"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div> 
                  </div>
                    <div class="tab-pane container fade" id="menu4" style="margin-top:30px;">
                        <h6>This question will help simple pay perform the correct calculation for the employee</h6>
                   
                          <p style="margin-top:20px;">when does employee normally work?</p>
                          <div class="form-group">
                                <select name="employee_time" id="time" style="width:150px;" onchange="selectTime()">
                                    <option>--Choose--</option>
                                    <option value="fulltime">Full Time</option>
                                    <option value="contactor">Contractor</option>
                                    <option value="parttime">Part Time</option>
                                </select>
                          </div>
                          {{-- <div class="form-group">
                              <button type="reset" class="btn btn-secondary">Cancel</button>
                              <button onclick="myFunction()" class="btn btn-primary" id="button">Continue</button>
                          </div> --}}
                    </div>
                    <div id="div" style="display:none;">
                        <form action="{{url('employee/add')}}" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" class="physical" style="color: blue;">Essentials</label>
                                </div>
                                <div class="form-group col-md-8"></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">PAY Frequency</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <select name="pay_fre" id="">
                                        <option value="Monthly,ending on 31st">Monthly,ending on 31st</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">First Name</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="first_name" style="width:100%" placeholder="First Name">
                                    <input type="hidden" name="employe_time" id="get_time" style="width:100%" value="">
                                    <input type="hidden" name="c_name" style="width:100%" value="{{$company_name}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Last Name</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="last_name" style="width:100%" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Date of Birth</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="date" name="date_birth" style="width:100%">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Date of Appoinment</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="date" name="date_app" style="width:100%">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Identification Type</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <select name="ident_type" id="passPort" onchange="pPort()">
                                        <option value="rsa_id">RSA ID </option>
                                        <option value="passport">Passport </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Passport & Foreign ID No.</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="passport_no" style="width:100%">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Passport Country Code</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="passport_c_code" style="width:100%">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">ID Number</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="id_number" style="width:100%" placeholder="ID Number">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Email</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="email" name="email" style="width:100%">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Payment Method</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <select name="pay_method" id="">
                                        <option value="etf">ETF </option>
                                        <option value="cash">Cash </option>
                                        <option value="checque">Cheque </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" class="physical" style="color: blue;">Bank Account Details</label>
                                </div>
                                <div class="form-group col-md-8"></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Bank</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <select name="bank_name" id="">
                                        <option value="ABSA">ABSA </option>
                                        <option value="CAPITEC">CAPITEC </option>
                                        <option value="FIRST NATIONAL BANK">FIRST NATIONAL BANK </option>
                                        <option value="NEDBANK">NEDBANK </option>
                                        <option value="STANDARD BANK">STANDARD BANK </option>
                                        <option value="STANDARD BANK">ADD MORE BANKS </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Account Number</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="acc_number" style="width:100%" placeholder="Account Number">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Branch Code</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="brance_code" class="form-control" style="width:100%" placeholder="Branch Code">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Account Type</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <select name="acc_type" id="">
                                        <option value="current(cheque)">Current(cheque) </option>
                                        <option value="dummy1">Dummy One </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Holder Relationship</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <select name="holder_rel" id="">
                                        <option value="Own">Own </option>
                                        <option value="dummy1">Dummy One </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" class="physical" style="color: blue;">Residential Address</label>
                                </div>
                                <div class="form-group col-md-8"></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Unit Number</label>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" name="unit_number" class="form-control" id="inputEmail4">
                                </div>
                                <div class="form-group col-md-2">
                                    {{-- <input type="text" class="form-control" id="inputEmail4"> --}}
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Complex</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" name="complex" class="form-control" id="inputEmail4">
                                </div>
                            </div>
                             <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Street Number</label>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" name="street_number" class="form-control" id="inputEmail4">
                                </div>
                                <div class="form-group col-md-2">
                                    {{-- <input type="text" class="form-control" id="inputEmail4"> --}}
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Street</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" name="street" class="form-control" id="inputEmail4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Suburb or district</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="district" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">City or town</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" name="city" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Code</label>
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="text" name="code" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4" class="physical" style="color: blue;">Portal Address
                                            </label>
                                        </div>
                                        <div class="form-group col-md-8"></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <input type="checkbox" name="same_as_residential" value="Same as residential">&nbsp;Same as residential
                                        </div>
                                        <div class="form-group col-md-8"></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Line 1</label>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="text" name="line1" class="form-control" style="width:100%;">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Line 2</label>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="text" name="line2" class="form-control" style="width:100%;">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Line 3</label>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="text" name="line3" class="form-control" style="width:100%;">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Code</label>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="text" name="codetwo" class="form-control" style="width:100%;">
                                        </div>
                                    </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4" class="physical" style="color: blue;">Other Statutory Info
                                        </label>
                                    </div>
                                    <div class="form-group col-md-8"></div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Job Title</label>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" name="jobtitle" style="width:100%;"><br>
                                        printed on payslip if improved
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Income Tax Number</label>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" name="tax_number" style="width:100%;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <button class="btn btn-secondary" type="reset">Cancel</button>
                                </div>

                        </form>
                    </div>
                    <div class="tab-pane container fade" id="menu5" style="margin-top:30px;">
                      <h3>Export Your Employee List</h3>
                      <a href="{{ url('export/employee/list' )}}" class=" btn btn-primary` ui basic button mini offsettop5 btm-export float-right"><i class="ui icon download"></i>{{ __("Export") }}</a>
                      
                  </div>
                <!-- End Update -->

            </div>
        </div>
    </div>

</div>

    @endsection

    @section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        function myFunction() {
               document.getElementById("div").style.display = "block";
               document.getElementById("menu4").style.display = "none";
        }
        function monthly() {
               alert("Hello");
        }
        function getIndex() {
          document.getElementById("demo").innerHTML =
          document.getElementById("mySelect").selectedIndex;
        }
    </script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script>
        function selectTime()
        {
            var time = document.getElementById("time");
            var timeValue = time.options[time.selectedIndex].value;
            document.getElementById("div").style.display = "block";
            document.getElementById('get_time').value = timeValue
            console.log(timeValue)

        }
        function pPort()
        {
            var data = document.getElementById("passPort");
            var select_value = data.options[data.selectedIndex].value;
            console.log(select_value)
            if (select_value == 'passport') {
                document.getElementById("passport_div").style.display = "block";
            }
        }
        
    </script>
    <script>
        function changeTwoWeek()
        {
            document.getElementById('first_payroll_tw').style.display='block';
            var date = document.getElementById("date").value;
            console.log(date);
            let d = new Date(date);
            let day = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d);
            //Update
            let mo = new Intl.DateTimeFormat('en', { month: 'numeric' }).format(d);
            let ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d);
            var c = `${day}`;
            var monthDay =  `${mo}`;
            var monthYear =  `${ye}`;
            console.log(c);
            var dt = new Date();
            var month = dt.getMonth()+1;
            console.log(month);
            var year = dt.getFullYear();
            console.log(year);
            daysInMonth = new Date(year, month, 0).getDate();
            daysIneachMonth = new Date(monthYear, monthDay, 0).getDate();
            var type = typeof(daysInMonth);
            console.log(daysIneachMonth);
            console.log(type);

            var list =[];
            var i;
            var total = c+14;
            console.log(total);
            var e = parseInt(c);
            for(i=e; i <= daysIneachMonth; i=i+14)
            {
                console.log(i+"-"+monthDay+"-"+monthYear);
                var value = i+"-"+monthDay+"-"+monthYear;
                list.push(value)
                
            }
            document.getElementById("e_w_first").innerHTML = list[0]
            document.getElementById("e_w_second").innerHTML = list[1]
            document.getElementById("e_w_first").value = list[0]
            document.getElementById("e_w_second").value = list[1]

            if(list.length == 2){
                document.getElementById("e_w_third").style.display = "none";
                
            }
            else{
                document.getElementById("e_w_third").innerHTML = list[2]
                document.getElementById("e_w_third").value = list[2]
              
            }

            
        }
    </script>

    <script>
       function changeDays() {
        var eID = document.getElementById("days");
        var dayValue = eID.options[eID.selectedIndex].value;
        // document.write(dayValue);
        document.getElementById('first_payroll').style.display = "block";

         var d = new Date();
        var date = d.getDate();
        var month = d.getMonth() + 1;
        var year = d.getFullYear();
        var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        var day = days[d.getDay()];
        var output = year+"-"+month+"-"+date;
        var firstDay = new Date(d.getFullYear(), d.getMonth(), 1);
        let ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(firstDay);
        let mo = new Intl.DateTimeFormat('en', { month: 'numeric' }).format(firstDay);
        let da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(firstDay);
        var firstDay = `${ye}-${mo}-${da}`;
        var month_of_days = function(month,year) {
            return new Date(year, month, 0).getDate();
        };
        var count_day = month_of_days(month, year);
        // console.log(count_day);
     var d2 = moment(firstDay, "YYYY-MM-DD");

    var day1 = d2.day();
    
    var diffDays = 0;
    if(dayValue==="Sunday"){
        if (day1 > 0) {
          diffDays = 7 - (day1 - 0);
        } else {
          diffDays = 0 - day1
        }
        var a = d2.add(diffDays, 'day').format("YYYY-MM-DD");
        var b = d2.format("DD");


        var c = parseInt(b);
        var list = []
            // console.log(date)
            for(var i=c;i<=count_day;i=i+7){
                var value = (i)+"-"+month+"-"+year;
                list.push(value)
            }
        document.getElementById("id_first").innerHTML = list[0]
        document.getElementById("id_second").innerHTML = list[1]
        document.getElementById("id_third").innerHTML = list[2]
        document.getElementById("id_fourth").innerHTML = list[3]
        document.getElementById("id_first").value = list[0]
        document.getElementById("id_second").value = list[1]
        document.getElementById("id_third").value = list[2]
        document.getElementById("id_fourth").value = list[3]
        if(list.length == 4){
            document.getElementById("id_fifth").style.display = "none";
            
        }
        else{
            document.getElementById("id_fifth").innerHTML = list[4]          
            document.getElementById("id_fifth").value = list[4]          
        }
        
    }
    else if(dayValue==="Monday")
    {
        if (day1 > 1) {
          diffDays = 7 - (day1 - 1);
        } else {
          diffDays = 1 - day1
        }
        var a = d2.add(diffDays, 'day').format("YYYY-MM-DD");
        var b = d2.format("DD");


        var c = parseInt(b);
        var list = []
            // console.log(date)
            for(var i=c;i<=count_day;i=i+7){
                var value = (i)+"-"+month+"-"+year;
                list.push(value)
            }
        document.getElementById("id_first").innerHTML = list[0]
        document.getElementById("id_second").innerHTML = list[1]
        document.getElementById("id_third").innerHTML = list[2]
        document.getElementById("id_fourth").innerHTML = list[3]
        document.getElementById("id_first").value = list[0]
        document.getElementById("id_second").value = list[1]
        document.getElementById("id_third").value = list[2]
        document.getElementById("id_fourth").value = list[3]
        if(list.length == 4){
            document.getElementById("id_fifth").style.display = "none";
            
        }
        else{
            document.getElementById("id_fifth").innerHTML = list[4]
            document.getElementById("id_fifth").value = list[4]
          
        }

    }
    else if(dayValue==="Tuesday")
    {
        if (day1 > 2) {
          diffDays = 7 - (day1 - 2);
        } else {
          diffDays = 2 - day1
        }
        var a = d2.add(diffDays, 'day').format("YYYY-MM-DD");
        var b = d2.format("DD");


        var c = parseInt(b);
        var list = []
            // console.log(date)
            for(var i=c;i<=count_day;i=i+7){
                var value = (i)+"-"+month+"-"+year;
                list.push(value)
            }
        document.getElementById("id_first").innerHTML = list[0]
        document.getElementById("id_second").innerHTML = list[1]
        document.getElementById("id_third").innerHTML = list[2]
        document.getElementById("id_fourth").innerHTML = list[3]
        document.getElementById("id_first").value = list[0]
        document.getElementById("id_second").value = list[1]
        document.getElementById("id_third").value = list[2]
        document.getElementById("id_fourth").value = list[3]
        if(list.length == 4){
            document.getElementById("id_fifth").style.display = "none";
            
        }
        else{
            document.getElementById("id_fifth").innerHTML = list[4]
            document.getElementById("id_fifth").value = list[4]
          
        }

    }
    else if(dayValue==="Wednesday")
    {
        if (day1 > 3) {
          diffDays = 7 - (day1 - 3);
        } else {
          diffDays = 3 - day1
        }
        var a = d2.add(diffDays, 'day').format("YYYY-MM-DD");
        var b = d2.format("DD");


        var c = parseInt(b);
        var list = []
            // console.log(date)
            for(var i=c;i<=count_day;i=i+7){
                var value = (i)+"-"+month+"-"+year;
                list.push(value)
            }
        document.getElementById("id_first").innerHTML = list[0]
        document.getElementById("id_second").innerHTML = list[1]
        document.getElementById("id_third").innerHTML = list[2]
        document.getElementById("id_fourth").innerHTML = list[3]
        document.getElementById("id_first").value = list[0]
        document.getElementById("id_second").value = list[1]
        document.getElementById("id_third").value = list[2]
        document.getElementById("id_fourth").value = list[3]
        if(list.length == 4){
            document.getElementById("id_fifth").style.display = "none";
            
        }
        else{
            document.getElementById("id_fifth").innerHTML = list[4]
            document.getElementById("id_fifth").value = list[4]
          
        }

    }
    else if(dayValue==="Thursday")
    {
        if (day1 > 4) {
          diffDays = 7 - (day1 - 4);
        } else {
          diffDays = 4 - day1
        }
        var a = d2.add(diffDays, 'day').format("YYYY-MM-DD");
        var b = d2.format("DD");


        var c = parseInt(b);
        var list = []
            // console.log(date)
            for(var i=c;i<=count_day;i=i+7){
                var value = (i)+"-"+month+"-"+year;
                list.push(value)
            }
        document.getElementById("id_first").innerHTML = list[0]
        document.getElementById("id_second").innerHTML = list[1]
        document.getElementById("id_third").innerHTML = list[2]
        document.getElementById("id_fourth").innerHTML = list[3]
        document.getElementById("id_first").value = list[0]
        document.getElementById("id_second").value = list[1]
        document.getElementById("id_third").value = list[2]
        document.getElementById("id_fourth").value = list[3]
        if(list.length == 4){
            document.getElementById("id_fifth").style.display = "none";
            
        }
        else{
            document.getElementById("id_fifth").innerHTML = list[4]
            document.getElementById("id_fifth").value = list[4]
          
        }

    }
    else if(dayValue==="Friday")
    {
        if (day1 > 5) {
          diffDays = 7 - (day1 - 5);
        } else {
          diffDays = 5 - day1
        }
        var a = d2.add(diffDays, 'day').format("YYYY-MM-DD");
        var b = d2.format("DD");


        var c = parseInt(b);
        var list = []
            // console.log(date)
            for(var i=c;i<=count_day;i=i+7){
                var value = (i)+"-"+month+"-"+year;
                list.push(value)
            }
        document.getElementById("id_first").innerHTML = list[0]
        document.getElementById("id_second").innerHTML = list[1]
        document.getElementById("id_third").innerHTML = list[2]
        document.getElementById("id_fourth").innerHTML = list[3]
        document.getElementById("id_first").value = list[0]
        document.getElementById("id_second").value = list[1]
        document.getElementById("id_third").value = list[2]
        document.getElementById("id_fourth").value = list[3]
        if(list.length == 4){
            document.getElementById("id_fifth").style.display = "none";
            
        }
        else{
            document.getElementById("id_fifth").innerHTML = list[4]
            document.getElementById("id_fifth").value = list[4]
          
        }

    }
    else
    {
        if (day1 > 6) {
          diffDays = 7 - (day1 - 6);
        } else {
          diffDays = 6 - day1
        }
        var a = d2.add(diffDays, 'day').format("YYYY-MM-DD");
        var b = d2.format("DD");


        var c = parseInt(b);
        var list = []
            // console.log(date)
            for(var i=c;i<=count_day;i=i+7){
                var value = (i)+"-"+month+"-"+year;
                list.push(value)
            }
        document.getElementById("id_first").innerHTML = list[0]
        document.getElementById("id_second").innerHTML = list[1]
        document.getElementById("id_third").innerHTML = list[2]
        document.getElementById("id_fourth").innerHTML = list[3]
        document.getElementById("id_first").value = list[0]
        document.getElementById("id_second").value = list[1]
        document.getElementById("id_third").value = list[2]
        document.getElementById("id_fourth").value = list[3]
        console.log(list.length)
        if(list.length == 4){
            document.getElementById("id_fifth").style.display = "none";
            
        }
        else{
            document.getElementById("id_fifth").innerHTML = list[4]
            document.getElementById("id_fifth").value = list[4]
          
        }
    }
    
        // var d = new Date();
        // var date = d.getDate();
        // var month = d.getMonth() + 1;
        // var year = d.getFullYear();
        // var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        // var day = days[d.getDay()];
        // var output = date+"-"+month+"-"+year;
        // var firstDay = new Date(d.getFullYear(), d.getMonth(), 1);

  
        // var days = function(month,year) {
        //     return new Date(year, month, 0).getDate();
        // };

        // var count_day = days(month, year);

        // if(dayValue == 'Wednesday')
        // {
        //     parseInt(date);
        //     console.log(date)
        //     for(var i=date;i<count_day;i=i+7){
        //         console.log("today is "+ (i)+"-"+month+"-"+year )
        //     }
        // } 
        // else if(dayValue == 'Thursday')
        // {
        //     parseInt(date+1);
        //     console.log(date+1)
        //     for(var i=date+1;i<=count_day;i=i+7){
        //         console.log("Next is "+ (i)+"-"+month+"-"+year )
        //     }
        // }
        // else if(dayValue == 'Friday')
        // {
        //     parseInt(date+2);
        //     console.log(date+2)
        //     for(var i=date+2;i<=count_day;i=i+7){
        //         console.log("Next is "+ (i)+"-"+month+"-"+year )
        //     }
        // }
        // document.getElementById("first_payroll").innerHTML = days;
        // document.getElementById("first_payroll").innerHTML = dayValue;

        // if( dayValue == day)
        // {
        //     parseInt(date);
        //     console.log(date)
        //     for(var i=date;i<count_day;i=i+7){
        //         console.log("today is "+ (i)+"-"+month+"-"+year )
        //     }
        // }
        // else if(dayValue == day+1)
        // {
        //     parseInt(date);
        //     console.log(date)
        //     for(var i=date;i<count_day;i=i+7){
        //         console.log("today is "+ (i)+"-"+month+"-"+year )
        //     }
        // }
        // else
        // {

        // }


        // var colortxt = eID.options[eID.selectedIndex].text;
        // document.getElementById('colorDiv').style.background=colortxt;
        

        }
    </script>
    <script type="text/javascript">
        function changeColor() {
        var eID = document.getElementById("colors");
        var colorVal = eID.options[eID.selectedIndex].value;
        var colortxt = eID.options[eID.selectedIndex].text;
        // document.getElementById('colorDiv').style.background=colortxt;
        // document.getElementById('week').innerHTML=colorVal;
        if (colorVal == 'weekly') {
            document.getElementById("week").style.display = "block";
        } 
        else if (colorVal == 'every_two_week') {
             document.getElementById("two_weeks").style.display = "block";
        }
        else if (colorVal == 'monthly15th') {
            document.getElementById("monthly15_ld").style.display = "block";
            var d = new Date();
            var date = d.getDate();
            var month = d.getMonth() + 1;
            var year = d.getFullYear();
            var output =  year+"-"+1+"-"+15;
            var i ;
            var list = []
            for(i=1;i<13;i++)
            {
                console.log(year+"-"+i+"-"+15);
                var value = year+"-"+i+"-"+15;
                list.push(value);
            }
            document.getElementById("first15").innerHTML = list[0]
            document.getElementById("second15").innerHTML = list[1]
            document.getElementById("third15").innerHTML = list[2]
            document.getElementById("fourth15").innerHTML = list[3]
            document.getElementById("fifth15").innerHTML = list[4]
            document.getElementById("sixth15").innerHTML = list[5]
            document.getElementById("seventh15").innerHTML = list[6]
            document.getElementById("eight15").innerHTML = list[7]
            document.getElementById("ninth15").innerHTML = list[8]
            document.getElementById("tenth15").innerHTML = list[9]
            document.getElementById("eleven15").innerHTML = list[10]
            document.getElementById("twelve15").innerHTML = list[11]

            document.getElementById("first15").value = list[0]
            document.getElementById("second15").value = list[1]
            document.getElementById("third15").value = list[2]
            document.getElementById("fourth15").value = list[3]
            document.getElementById("fifth15").value = list[4]
            document.getElementById("sixth15").value = list[5]
            document.getElementById("seventh15").value = list[6]
            document.getElementById("eight15").value = list[7]
            document.getElementById("ninth15").value = list[8]
            document.getElementById("tenth15").value = list[9]
            document.getElementById("eleven15").value = list[10]
            document.getElementById("twelve15").value = list[11]
            // console.log(output);
        }
        else if (colorVal == 'month_end') {
            document.getElementById("monthend_ld").style.display = "block";
            var d = new Date();
            var date = d.getDate();
            var year = d.getFullYear();
            // var month = d.getMonth() + 1;
            var lastday = function(y,m){
            return  new Date(y, m, 0).getDate();
                }
            // console.log(lastday(,0));
            var list = []
            var output = lastday(year,month);
            for(var i = 1;i<=12;i++)
            {
                r = lastday(year,i);
                console.log(year+"-"+i+"-"+r); 
                var value = year+"-"+i+"-"+r;
                list.push(value);
            }
            document.getElementById("first_end").innerHTML = list[0]
            document.getElementById("second_end").innerHTML = list[1]
            document.getElementById("third_end").innerHTML = list[2]
            document.getElementById("fourth_end").innerHTML = list[3]
            document.getElementById("fifth_end").innerHTML = list[4]
            document.getElementById("sixth_end").innerHTML = list[5]
            document.getElementById("seventh_end").innerHTML = list[6]
            document.getElementById("eight_end").innerHTML = list[7]
            document.getElementById("ninth_end").innerHTML = list[8]
            document.getElementById("tenth_end").innerHTML = list[9]
            document.getElementById("eleven_end").innerHTML = list[10]
            document.getElementById("twelve_end").innerHTML = list[11]

            document.getElementById("first_end").value = list[0]
            document.getElementById("second_end").value = list[1]
            document.getElementById("third_end").value = list[2]
            document.getElementById("fourth_end").value = list[3]
            document.getElementById("fifth_end").value = list[4]
            document.getElementById("sixth_end").value = list[5]
            document.getElementById("seventh_end").value = list[6]
            document.getElementById("eight_end").value = list[7]
            document.getElementById("ninth_end").value = list[8]
            document.getElementById("tenth_end").value = list[9]
            document.getElementById("eleven_end").value = list[10]
            document.getElementById("twelve_end").value = list[11]
            
        }    
        else {
             document.getElementById("twice_month_ld").style.display = "block";
        }

        }
    </script>
    <script>
// var d = new Date();
// d.setDate(d.getDate());

    var d = new Date();
    var date = d.getDate();
    var month = d.getMonth() + 1;
    var year = d.getFullYear();
    var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    var day = days[d.getDay()];
    var output = date+"-"+month+"-"+year+"-"+day;
    var dayID = document.getElementById("days");
    var dayValue = dayID.options[dayID.selectedIndex].value;
    console.log(dayValue);
    if(dayValue == 'Sunday')
    {
        document.getElementById("demo").innerHTML = 'Sunday';
    }
    else if(dayValue == 'Monday')
    {
        document.getElementById("demo").innerHTML = 'Monday';
    }
    else
    {
        document.getElementById("demo").innerHTML = 'Otherday';
    }
    // document.getElementById("demo").innerHTML = output;
</script>
{{-- <script>
$(document).ready(function() {
   
    $('#butsave').on('click', function() {
      var color = $('#color').val();
      var days = $('#days').val();
      var week_f_p_r = $('#week_f_p_r').val();

      if(color!="" && days!="" && week_f_p_r!=""){
        /*  $("#butsave").attr("disabled", "disabled"); */
          $.ajax({
              url: "/weekly_pay",
              type: "POST",
              data: {
                  _token: $("#csrf").val(),
                  type: 1,
                  color: color,
                  days: days,
                  week_f_p_r: week_f_p_r,
              },
              cache: false,
              success: function(dataResult){
                  console.log(dataResult);
                  var dataResult = JSON.parse(dataResult);
                  if(dataResult.statusCode==200){
                    window.location = "/weekly_pay";              
                  }
                  else if(dataResult.statusCode==201){
                     alert("Error occured !");
                  }
                  
              }
          });
      }
      else{
          alert('Please fill all the field !');
      }
  });
});
</script> --}}
<script type="text/javascript">


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#butsave").click(function(e){

        e.preventDefault();

        var color = $("input[name=color]").val();
        var days = $("input[name=days]").val();
        var week_f_p_r = $("input[name=week_f_p_r]").val();
        var url = '{{ url('postinsert') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
                  color:color, 
                  days:days,
                  week_f_p_r:week_f_p_r,
                },
           success:function(response){
              if(response.success){
                  alert(response.message) //Message come from controller
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });

</script>

    @endsection


  