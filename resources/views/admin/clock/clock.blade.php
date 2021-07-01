
@php 
 $data = array();

// $data =  var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR'])));

$data = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));

// echo $data['geoplugin_request'].' '.$data['geoplugin_city'];
$ip = $data['geoplugin_request'];
$city = $data['geoplugin_city'];
$countryCode = $data['geoplugin_countryCode'];
$regionName = $data['geoplugin_regionName'];
// die();
@endphp
<div class="row">



<div class="col-md-12 fixedcenter">
            <div class="clockwrapper">
                <div class="clockinout" style="background-color:#dee2e6">
                    {{-- <button class="btnclock timein active" data-type="timein">{{ __("Time In") }}</button> --}}
                    <button class="btnclock timein active" data-type="timein">{{ __("Clock In") }}</button>
                    {{-- <button class="btnclock timeout" data-type="timeout">{{ __("Time Out") }}</button> --}}
                    <button class="btnclock timeout" data-type="timeout">{{ __("Clock Out") }}</button>
                </div>
            </div>
            <div class="clockwrapper">
                <div class="timeclock">
                    <span class="location">
                        IP:{{$ip}}<br>
                         city: {{$city}}<br>
                           country: {{$countryCode}}

                    </span>
                    <span id="show_day" class="clock-text"></span>
                    <span id="show_time" class="clock-time"></span>
                    <span id="show_date" class="clock-day"></span>
                </div>
            </div>

            <div class="clockwrapper">
                <div class="userinput">
                    <form action="" method="get" accept-charset="utf-8" class="ui form">
                        @isset($cc)
                            @if($cc == "on") 
                                <div class="inline field comment">
                                    <textarea name="comment" class="uppercase lightblue" rows="1" placeholder="Enter comment" value=""></textarea>
                                </div> 
                            @endif
                        @endisset
                       
                     
                            <input @if($rfid == 'on') id="rfid" @endif class=" @if($rfid == 'on') mr-0 @endif " name="idno" value="" type="text" placeholder="{{ __("ENTER YOUR ID") }}" required autofocus>
                     
                            @if($rfid !== "on")
                                {{-- <button id="btnclockin" type="button" class="btn btn-primary">{{ __("Confirm") }}</button> --}}
                                <button id="btnclockin" type="button" class="btn btn-primary">{{ __("Clock In/Out") }}</button>
                            @endif
                
                            <input type="hidden" id="_url" value="{{url('/')}}">
                     
                    </form>
                </div>
            </div>

            <div class="message-after" style="color:black">
                <p> 
                    <span id="greetings">{{ __("Welcome!") }}</span> 
                    <span id="fullname"></span>
                </p>
                <p id="messagewrap">
                    <span id="type"></span>
                    <span id="message"></span> 
                    <span id="time"></span>
                </p>
            </div>
        </div>
    </div> <!-- row -->

    <div class="row menu-row">
<div class="col-md-3 clock-menu">
        <div class="mt-3 clock-menu-border clock-text-align-right clock-border-right">
           
                <a href="{{url('payroll')}}" class="clock-menu-border-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign clock-menu-border-icon color-3"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                            <br>
                        <span class="clock-menu-border-text">    PAYROLL </span>
          
                        </a>
        </div>
</div><div class="col-md-3 clock-menu">
        <div class="mt-3 clock-menu-border clock-text-align-left">
           
                <a  href="{{url('client_message')}}" class="clock-menu-border-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile clock-menu-border-icon color-4"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>
                            <br>
                        <span class="clock-menu-border-text">    CONTACT </span>
          
                        </a>
        </div>
</div>
<div class="col-md-3 clock-menu">
    <div class="mt-3 clock-menu-border clock-text-align-right clock-border-right">
       
            <a href="{{url('employees')}}" class="clock-menu-border-link">
                        <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users clock-menu-border-icon color-1">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" /></svg>
                        <br>
                    <span class="clock-menu-border-text">    EMPLOYEES </span>
      
                    </a>
    </div>
</div>
<div class="col-md-3 clock-menu">
    <div class="mt-3 clock-menu-border clock-text-align-left">
       
            <a href="{{url('leaves')}}" class="clock-menu-border-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive clock-menu-border-icon color-2">
                    <polyline points="21 8 21 21 3 21 3 8" />
                    <rect x="1" y="3" width="22" height="5" />
                    <line x1="10" y1="12" x2="14" y2="12" /></svg>
                        <br>
                    <span class="clock-menu-border-text">LEAVE APPLICATION </span>
      
                    </a>
    </div>
</div>
    
   </div> <!-- row -->