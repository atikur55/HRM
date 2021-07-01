@extends('layouts.clientmaster')
@section('content')



    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h2 class="page-title">{{ __('Contact') }}      </h2>
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

                        <form action="{{url('client/store_contact')}}" method="post" class="ui small form form-filter">
                            {{ csrf_field() }}

{{--                         
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input id="" type="text" name="client_name" value="" class="form-control" required>
                                        </div>
                            
                                    

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input id="" type="email" name="client_email" value="" class="form-control">
                                        </div> --}}

                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input id="" type="text" name="client_message_subject" value="" class="form-control" required>
                                        </div>
                            
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea name="client_message" class="form-control" required> </textarea>
                                        </div>
                                <input type="hidden" name="client_id" value="{{Auth::user()->id}}">

                                <input id="" type="hidden" name="client_name" value="{{Auth::user()->name}}" class="form-control" required>

                                <input id="" type="hidden" name="client_email" value="{{Auth::user()->email}}" class="form-control">

                                <button id="btnfilter" class=" btn btn-primary ui icon button positive small inline-button"><i class="  ui icon filter alternate"></i> {{ __("Send") }}</button>
                     
                     
                        </form>
                    
                </div>
                <div class="col-md-6">
                    
                    <table  class="table " >
                        <thead>
                            <tr>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Subject') }}</th>
                                <th>{{ __('Message') }}</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @isset($data)
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $d->created_at }}</td>
                                <td>{{ $d->client_message_subject }}</td>
                                <td>{{ $d->client_message }}</td>
                            
                            </tr>
                            @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>

        </div>
        
    </div>

@endsection



@section('scripts')

@endsection


