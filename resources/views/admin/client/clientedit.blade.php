@extends('layouts.default')

    @section('meta')
        <title>Employees | Workday Time Clock</title>
        <meta name="description" content="Workday clients, view all clients, add, edit, delete, and archive clients.">
    @endsection

    @section('content')

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <h2>Edit Client</h2>

            <hr>

            <div class="widget-content widget-content-area br-6">

                @include('partials.alert')

            <form action="{{url('clientupdate')}}/{{$data->id}}" method="post">
                        @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="client_name" value="{{$data->client_name}}" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="">company</label>
                                <input type="text" name="client_company" value="{{$data->client_company}}" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="client_email" value="{{$data->client_email}}" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="">Mobile</label>
                                <input type="text" name="client_mobile" value="{{$data->client_mobile}}" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="">Address</label>

                                <textarea name="client_address"  id="" cols="30" rows="10" class="form-control">{{$data->client_address}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Website</label>
                                <input type="text" name="client_website" value="{{$data->client_website}}" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="">Note</label>

                                <textarea name="client_note"  id="" cols="30" rows="10" class="form-control">{{$data->client_note}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Meeting Date</label>
                                @if($data->client_meeting_date!=null)
                                 <input type="text" name="client_meeting_date" value="{{$data->client_meeting_date}}" class="form-control" >
                                @else
                                 <input type="datetime-local" name="client_meeting_date" value="" class="form-control" >
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="">Priority</label>

                                <select name="client_priority" class="form-control" >

                                    <option value="high" @if($data->client_priority=='high') selected @endif>High</option>
                                    <option value="middle" @if($data->client_priority=='middle') selected @endif>Middle</option>
                                    <option value="low" @if($data->client_priority=='low') selected @endif>Low</option>

                                </select>
                            </div>
                            <div class="form-group">
                            <input type="hidden" value="{{Auth::user()->id}}" name="client_updated_by">
                            <button class="btn btn-success" value="Update" type="submit">Submit</button>
                            
                            </div>
                        </div>
                    </div> <!--row-->
                    </form>`

            </div>
        </div>


    @endsection
