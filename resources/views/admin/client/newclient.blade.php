@extends('layouts.default')

    @section('meta')
        <title>Employees | Workday Time Clock</title>
        <meta name="description" content="Workday clients, view all clients, add, edit, delete, and archive clients.">
    @endsection

    @section('content')
             
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <h2>Add Client</h2>
           
            <hr>

            <div class="widget-content widget-content-area br-6">
               
                @include('partials.alert')
                    
                     <form action="{{url('clientstore')}}" method="post">
                        @csrf 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input style="width:100%" type="text" name="client_name" value="{{old('client_name')}}" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="">company</label>
                                <input style="width:100%" type="text" name="client_company" value="{{old('client_company')}}" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input style="width:100%" type="text" name="client_email" value="{{old('client_email')}}" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="">Mobile</label>
                                <input style="width:100%" type="text" name="client_mobile" value="{{old('client_mobile')}}" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="">Address</label>
                                
                                <textarea name="client_address"  id="" cols="30" rows="10" class="form-control">{{old('client_address')}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Website</label>
                                <input style="width:100%" type="text" name="client_website" value="{{old('client_website')}}" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="">Note</label>
                            
                                <textarea name="client_note"  id="" cols="30" rows="10" class="form-control">{{old('client_note')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Meeting Date</label>
                                <input type="datetime-local" name="client_meeting_date" value="{{old('client_meeting_date')}}" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="">Priority</label>
                            
                                <select name="client_priority" class="form-control" >
                                    
                                    <option value="high">High</option>
                                    <option value="middle">Middle</option>
                                    <option value="low">Low</option>
                                
                                </select>
                            </div>
                            <div class="form-group">
                            <input type="hidden" value="{{Auth::user()->id}}" name="client_created_by">
                                <button type="submit" class="btn btn-success" >Create</button>
                            </div>
                        </div> 
                    </div> <!--row-->
                    </form>
          
            </div>
        </div>


    @endsection

