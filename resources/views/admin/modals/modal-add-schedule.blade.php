
   
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
{{--           
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Modal Heading</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              Modal body..
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div> --}}
  
    <div class="modal-header">
        

        <h3>{{ __("Add New Schedule") }}</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

    <div class="modal-body">
        <form id="add_schedule_form" action="{{ url('schedules/add') }}" class="ui form" method="post" accept-charset="utf-8">
            @csrf
            <div class="form-group">
                <label>{{ __('Employee') }}</label>
                <select class="form-control ui search dropdown getid uppercase" name="employee">
                    <option value="">Select Employee</option>
                    @isset($employee)
                        @foreach ($employee as $data)
                <option value="{{ $data->lastname }}, {{ $data->firstname }},{{ $data->id }}" data-id="{{ $data->id }}">{{ $data->lastname }}, {{ $data->firstname }}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <div class="two form-groups">
                <div class="form-group">
                    <label for="">{{ __('Start time') }}</label>
                    <input type="datetime" placeholder="00:00:00 AM" name="intime" class="form-control jtimepicker" id="timeFlatpickr" />
                </div>
                <div class="form-group">
                    <label for="">{{ __('Off time') }}</label>
                    <input type="datetime" placeholder="00:00:00 PM" name="outime" class="form-control jtimepicker" id="timeFlatpickr" />
                </div>
            </div>
            <div class="form-group">
                <label for="">{{ __('From') }}</label>
                <input type="date" placeholder="Date" name="datefrom" id="datefrom" class="form-control airdatepicker" />
            </div>
            <div class="form-group">
                <label for="">{{ __('To') }}</label>
                <input type="date" placeholder="Date" name="dateto" id="dateto" class="form-control airdatepicker" />
            </div>
            <div class="eight wide form-group">
                <label for="">{{ __('Total hours') }}</label>
                <input type="number" placeholder="0" name="hours" />
            </div>
           <div class="grouped form-groups form-group">
                <label>{{ __('Choose Rest days') }}</label>
                <div class="form-group">
                    <div class="ui checkbox sunday">
                        <input type="checkbox" name="restday[]" value="Sunday">
                        <label>{{ __('Sunday') }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="ui checkbox ">
                        <input type="checkbox" name="restday[]" value="Monday">
                        <label>{{ __('Monday') }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="ui checkbox ">
                        <input type="checkbox" name="restday[]" value="Tuesday">
                        <label>{{ __('Tuesday') }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="ui checkbox ">
                        <input type="checkbox" name="restday[]" value="Wednesday">
                        <label>{{ __('Wednesday') }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="ui checkbox ">
                        <input type="checkbox" name="restday[]" value="Thursday">
                        <label>{{ __('Thursday') }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="ui checkbox ">
                        <input type="checkbox" name="restday[]" value="Friday">
                        <label>{{ __('Friday') }}</label>
                    </div>
                </div>
                <div class="form-group" style="padding:0">
                    <div class="ui checkbox saturday">
                        <input type="checkbox" name="restday[]" value="Saturday">
                        <label>{{ __('Saturday') }}</label>
                    </div>
                </div>
                <div class="ui error message">
                    <i class="close icon"></i>
                    <div class="header"></div>
                    <ul class="list">
                        <li class=""></li>
                    </ul>
                </div>
            </div>
        </div>
            
        <div class="actions">
            <div class="modal-footer">
            <input type="hidden" name="id" value="">
            <button class="btn btn-success" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __('Save') }}</button>
          
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
        </div>
        </form>  


      
</div>
</div>
</div>

 <!-- ./The Modal -->





{{--  
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content"> --}}
{{--           
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Modal Heading</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              Modal body..
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div> --}}
{{--       

<div class="ui add medium">
    <div class="header">{{ __("Add New Schedule") }}</div>
    <div class="content">
        <form id="add_schedule_form" action="{{ url('schedules/add') }}" class="ui form" method="post" accept-charset="utf-8">
            @csrf
            <div class="field">
                <label>{{ __('Employee') }}</label>
                <select class="ui search dropdown getid uppercase" name="employee">
                    <option value="">Select Employee</option>
                    @isset($employee)
                        @foreach ($employee as $data)
                            <option value="{{ $data->lastname }}, {{ $data->firstname }}" data-id="{{ $data->id }}">{{ $data->lastname }}, {{ $data->firstname }}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <div class="two fields">
                <div class="field">
                    <label for="">{{ __('Start time') }}</label>
                    <input type="text" placeholder="00:00:00 AM" name="intime" class="jtimepicker" id="timeFlatpickr" />
                </div>
                <div class="field">
                    <label for="">{{ __('Off time') }}</label>
                    <input type="text" placeholder="00:00:00 PM" name="outime" class="jtimepicker" id="timeFlatpickr" />
                </div>
            </div>
            <div class="field">
                <label for="">{{ __('From') }}</label>
                <input type="text" placeholder="Date" name="datefrom" id="datefrom" class="airdatepicker" />
            </div>
            <div class="field">
                <label for="">{{ __('To') }}</label>
                <input type="text" placeholder="Date" name="dateto" id="dateto" class="airdatepicker" />
            </div>
            <div class="eight wide field">
                <label for="">{{ __('Total hours') }}</label>
                <input type="number" placeholder="0" name="hours" />
            </div>
           <div class="grouped fields field">
                <label>{{ __('Choose Rest days') }}</label>
                <div class="field">
                    <div class="ui checkbox sunday">
                        <input type="checkbox" name="restday[]" value="Sunday">
                        <label>{{ __('Sunday') }}</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox ">
                        <input type="checkbox" name="restday[]" value="Monday">
                        <label>{{ __('Monday') }}</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox ">
                        <input type="checkbox" name="restday[]" value="Tuesday">
                        <label>{{ __('Tuesday') }}</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox ">
                        <input type="checkbox" name="restday[]" value="Wednesday">
                        <label>{{ __('Wednesday') }}</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox ">
                        <input type="checkbox" name="restday[]" value="Thursday">
                        <label>{{ __('Thursday') }}</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox ">
                        <input type="checkbox" name="restday[]" value="Friday">
                        <label>{{ __('Friday') }}</label>
                    </div>
                </div>
                <div class="field" style="padding:0">
                    <div class="ui checkbox saturday">
                        <input type="checkbox" name="restday[]" value="Saturday">
                        <label>{{ __('Saturday') }}</label>
                    </div>
                </div>
                <div class="ui error message">
                    <i class="close icon"></i>
                    <div class="header"></div>
                    <ul class="list">
                        <li class=""></li>
                    </ul>
                </div>
            </div>
        </div>
            
        <div class="actions">
            <input type="hidden" name="id" value="">
            <button class="btn btn-success" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __('Save') }}</button>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
        </div>
        </form>  
</div>

      
</div>
</div>
</div>
 --}}
