@extends('layouts.personal')

    @section('meta')
        <title>My Dashboard | HRM Personal Dashboard</title>
        <meta name="description" content="Workday my dashboard, view recent attendance, view recent leave of absence, and view previous schedules">
    @endsection

    @section('content')
    
        <div class="container-fluid ">
             <div class="row">
            <div class="col-md-6">
                <h2 class="page-title">{{ __('Tasks') }}      </h2>
                &nbsp;&nbsp;&nbsp;
            </div>
         
        </div>
        <br>

          <div class="row">
           
             <div class="col-md-4">
                  <h4 class="alert alert-warning"> To do  <span class="badge badge-warning float-right">{{$todo_taskdata_count}}</span></h4>

                    @foreach($todo_taskdata as $d)
                  <div class="card component-card_8 mb-2">
                    <div class="card-body ">

                    <div class="progress-order">
                    <div class="progress-order-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <h6>{{$d->task_name}}</h6>
                                <p>{{$d->task_description}}</p>
                            </div>
                            <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                            Priority: 
                            @if($d->task_priority == 'Top')
                                <span class="badge badge-danger">{{$d->task_priority}}</span>
                            @elseif($d->task_priority == 'Middle')
                             <span class="badge badge-warning">{{$d->task_priority}}</span>
                            @elseif($d->task_priority == 'Low')
                             <span class="badge badge-info">{{$d->task_priority}}</span>
                             @endif
                            </div>
                        </div>
                    </div>

                    <div class="progress-order-body">
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <ul class="list-inline badge-collapsed-img mb-0 mb-3">
                                     @php
                                         $e = explode('+',$d->task_assign_to)
                                         @endphp
                                         @foreach($e as $v)
                                    <li class="list-inline-item chat-online-usr">
                                        {{-- <img alt="avatar" src="assets/img/profile-2.jpeg" class="ml-0"> --}}
                                    
                                         <span class="badge badge-info badge-pill mt-1"> {{$v}}</span>
                                     
                                    </li>
                                        @endforeach
                                    {{-- <li class="list-inline-item chat-online-usr">
                                        <img alt="avatar" src="assets/img/profile-3.jpeg">
                                    </li>
                                    <li class="list-inline-item chat-online-usr">
                                        <img alt="avatar" src="assets/img/profile-4.jpeg">
                                    </li>
                                    <li class="list-inline-item chat-online-usr">
                                        <img alt="avatar" src="assets/img/profile-5.jpeg">
                                    </li> --}}
                                    <li class="list-inline-item badge-notify mr-0 ">
                                        <div class="notification">
                                            <span class="badge badge-dark mt-1">Project: {{$d->project_name}}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12 ">
                                <span class=" mt-2 badge badge-info">{{$d->task_created_at}}</span>
                                <div class="text-leftmt-2">
                                     <span class=" mt-2 badge badge-warning"> Start date: {{$d->task_start_date}} </span>
                                    <br>
                                      <span class=" mt-2 badge badge-danger"> End date: {{$d->task_end_date}}
                                       </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
                 @endforeach
            </div>
                <div class="col-md-4">
                  <h4 class="alert alert-danger" >In progress <span class="badge badge-danger float-right">{{$inprogress_taskdata_count}}</span></h4>
 @foreach($inprogress_taskdata as $d)
                  <div class="card component-card_8 mb-2">
                    <div class="card-body ">

                    <div class="progress-order">
                    <div class="progress-order-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <h6>{{$d->task_name}}</h6>
                                <p>{{$d->task_description}}</p>
                            </div>
                            <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                            Priority: 
                            @if($d->task_priority == 'Top')
                                <span class="badge badge-danger">{{$d->task_priority}}</span>
                            @elseif($d->task_priority == 'Middle')
                             <span class="badge badge-warning">{{$d->task_priority}}</span>
                            @elseif($d->task_priority == 'Low')
                             <span class="badge badge-info">{{$d->task_priority}}</span>
                             @endif
                            </div>
                        </div>
                    </div>

                    <div class="progress-order-body">
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <ul class="list-inline badge-collapsed-img mb-0 mb-3">
                                     @php
                                         $e = explode('+',$d->task_assign_to)
                                         @endphp
                                         @foreach($e as $v)
                                    <li class="list-inline-item chat-online-usr">
                                        {{-- <img alt="avatar" src="assets/img/profile-2.jpeg" class="ml-0"> --}}
                                    
                                         <span class="badge badge-info badge-pill mt-1"> {{$v}}</span>
                                     
                                    </li>
                                        @endforeach
                                    {{-- <li class="list-inline-item chat-online-usr">
                                        <img alt="avatar" src="assets/img/profile-3.jpeg">
                                    </li>
                                    <li class="list-inline-item chat-online-usr">
                                        <img alt="avatar" src="assets/img/profile-4.jpeg">
                                    </li>
                                    <li class="list-inline-item chat-online-usr">
                                        <img alt="avatar" src="assets/img/profile-5.jpeg">
                                    </li> --}}
                                    <li class="list-inline-item badge-notify mr-0 ">
                                        <div class="notification">
                                            <span class="badge badge-dark mt-1">Project: {{$d->project_name}}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12 ">
                                <span class=" mt-2 badge badge-info">{{$d->task_created_at}}</span>
                                <div class="text-leftmt-2">
                                     <span class=" mt-2 badge badge-warning"> Start date: {{$d->task_start_date}} </span>
                                    <br>
                                      <span class=" mt-2 badge badge-danger"> End date: {{$d->task_end_date}}
                                       </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
                 @endforeach
                </div>
                <div class="col-md-4">
                  <h4 class="alert alert-success">Completed <span class="badge badge-success float-right">{{$complete_taskdata_count}}</span></h4 >
                   @foreach($complete_taskdata as $d)
                  <div class="card component-card_8 mb-2">
                    <div class="card-body ">

                    <div class="progress-order">
                    <div class="progress-order-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <h6>{{$d->task_name}}</h6>
                                <p>{{$d->task_description}}</p>
                            </div>
                            <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                            Priority: 
                            @if($d->task_priority == 'Top')
                                <span class="badge badge-danger">{{$d->task_priority}}</span>
                            @elseif($d->task_priority == 'Middle')
                             <span class="badge badge-warning">{{$d->task_priority}}</span>
                            @elseif($d->task_priority == 'Low')
                             <span class="badge badge-info">{{$d->task_priority}}</span>
                             @endif
                            </div>
                        </div>
                    </div>

                    <div class="progress-order-body">
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <ul class="list-inline badge-collapsed-img mb-0 mb-3">
                                     @php
                                         $e = explode('+',$d->task_assign_to)
                                         @endphp
                                         @foreach($e as $v)
                                    <li class="list-inline-item chat-online-usr">
                                        {{-- <img alt="avatar" src="assets/img/profile-2.jpeg" class="ml-0"> --}}
                                    
                                         <span class="badge badge-info badge-pill mt-1"> {{$v}}</span>
                                     
                                    </li>
                                        @endforeach
                                    {{-- <li class="list-inline-item chat-online-usr">
                                        <img alt="avatar" src="assets/img/profile-3.jpeg">
                                    </li>
                                    <li class="list-inline-item chat-online-usr">
                                        <img alt="avatar" src="assets/img/profile-4.jpeg">
                                    </li>
                                    <li class="list-inline-item chat-online-usr">
                                        <img alt="avatar" src="assets/img/profile-5.jpeg">
                                    </li> --}}
                                    <li class="list-inline-item badge-notify mr-0 ">
                                        <div class="notification">
                                            <span class="badge badge-dark mt-1">Project: {{$d->project_name}}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12 ">
                                <span class=" mt-2 badge badge-info">{{$d->task_created_at}}</span>
                                <div class="text-leftmt-2">
                                     <span class=" mt-2 badge badge-warning"> Start date: {{$d->task_start_date}} </span>
                                    <br>
                                      <span class=" mt-2 badge badge-danger"> End date: {{$d->task_end_date}}
                                       </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
                 @endforeach

                </div>
         
       </div>
  


    </div>

    @endsection
    