@extends('layouts.clientmaster')
@section('content')



    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h2 class="page-title">{{ __('Client Profile Update') }}      </h2>
                &nbsp;&nbsp;&nbsp;
            </div>
            {{-- <div class="col-md-6">
                <a href="{{ url('clock') }}" target="_blank" class=" btn btn-primary ui positive button mini offsettop5 float-right" style="margin-right: 20px"><i class="ui icon clock"></i>{{ __('View web clock') }}</a>  --}}
                {{-- &nbsp;&nbsp;&nbsp;
                <button class="btn btn-info ui primary button mini offsettop5 btn-add float-right" style="margin-right: 20px"><i class="ui icon plus circle"></i>{{ __("Manual entry") }}</button> --}}
            {{-- </div> --}}
        </div>
        <br>
      
        @include('partials.alert')
       
        <div class="row widget-content widget-content-area br-6">
 
                <div class="col-md-6 ">

                        <form action="{{url('client/profile/update')}}" method="post" class="ui small form form-filter">
                            {{ csrf_field() }}

                        
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input id="" type="text" name="client_name" value="{{Auth::user()->name}}" class="form-control" required>
                                        </div>
                            
                                    

                                        {{-- <div class="form-group">
                                            <label>Email</label>
                                            <input id="" type="email" name="client_email" value="{{Auth::user()->email}}"class="form-control">
                                        </div> --}}

                                             <div class="two form-groups">
                                                <div class="form-group">
                                                    <label for="">{{ __("New Password") }}</label>
                                                    <input type="password" name="password" class="form-control " placeholder="********">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">{{ __("Confirm New Password") }}</label>
                                                    <input type="password" name="password_confirmation" class="form-control " placeholder="********">
                                                </div>
                                            </div>
                            
                                     
                                <input type="hidden" name="client_id" value="{{Auth::user()->id}}">
                             <input id="" type="hidden" name="client_email" value="{{Auth::user()->email}}"class="form-control">
                           
                                <button type="submit" id="btnfilter" class=" btn btn-primary ui icon button positive small inline-button"><i class="  ui icon filter alternate"></i> {{ __("update") }}</button>
                     
                     
                        </form>
                    
                </div>
       
        </div>
        
    </div>

@endsection



@section('scripts')

@endsection


