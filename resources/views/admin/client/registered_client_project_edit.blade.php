@extends('layouts.default')

    @section('meta')
        <title>Employees | Workday Time Clock</title>
        <meta name="description" content="Workday clients, view all clients, add, edit, delete, and archive clients.">
    @endsection

    @section('content')

    <div class="row">
       



        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" >
            <div class="widget-content widget-content-area br-6"  style="width:1200px">
                {{-- <a href="{{url('client/new')}}" class="btn btn-success float-right" style="text-align: center; margin:0px 20px 20px 0px"><i class="fa fa-plus"></i>Add</a> --}}

                <div>
                    @include('partials.alert')
                    <form    action="{{url('registered_client_project_update')}}" method="post" class="form">
                    @csrf 
                    <div class="form-group">
                        <label for="">Client</label>
                        <select name="client_id" id="" class="form-control" readonly>
                                <option value="{{$clientData->id}}" selected>{{$clientData->id}}_{{$clientData->name}}</option>
                         
                        </select>
                   
                    </div>
                    <div class="form-group">
                        <label for="">Project Name</label>
                        <input style="width:100%" type="text" name="project_name" id="" class="form-control" value="{{$clientProjectData->project_name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Project deadline</label>
                        <input type="date" name="project_deadline" id="" placeholder="project_deadline" class="form-control" value="{{$clientProjectData->project_deadline}}">
                    </div>
                 
                    <div class="form-group">
                        <label for="">Project Details</label>
                        <textarea name="project_details"  class="form-control">{{$clientProjectData->project_name}}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$clientProjectData->id}}">
                        <button type="submit"  id=""  class="btn btn-success ">Add</button>
                       </div>
                    </form>
                </div>
              
            </div>
        </div>

    </div>
    @endsection

