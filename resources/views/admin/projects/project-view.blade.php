@extends('layouts.default')

@section('widget-css')

    {{-- <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{asset('cork-white')}}/assets/css/apps/scrumboard.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('cork-white')}}/assets/css/forms/theme-checkbox-radio.css" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL STYLES --> --}}
      <!-- BEGIN THEME GLOBAL STYLES -->
      <link href="{{asset('cork-white')}}/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
      <link href="{{asset('cork-white')}}/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
      <script src="{{asset('cork-white')}}/plugins/sweetalerts/promise-polyfill.js"></script>
      <link href="{{asset('cork-white')}}/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
      <link href="{{asset('cork-white')}}/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
      <link href="{{asset('cork-white')}}/assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
      <!-- END THEME GLOBAL STYLES -->
@endsection

@section('content')
<input type="hidden" id="globalprojectid" name="globalprojectid" value="{{$projectdata->id}}">
       <!--  BEGIN CONTENT AREA  -->
       <div  style="overflow:auto">
        <div class="layout-px-spacing">
            <div class="action-btn layout-top-spacing mb-5">
                <div class="add-s-task">
                    <?php
                        // dd($projectdata);die();
                        ?>
                    <h6>Workspace: {{$projectdata->workspace_name}}</h6>
                    <h6>Project: {{$projectdata->project_name}}</h6>
                    <h4>Assigned to</h4>
                    @foreach ($data as $pud)
                        <table>
                            <tr>
                                <td>{{$pud->user_id}}</td>
                                <td>{{$pud->name}}</td>
                            </tr>
                        </table>
                    @endforeach
                    <hr>
                    @if(Auth::user()->id == $projectdata->project_created_by )
                    <a class="addTask btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Add Task</a>
                    @endif
                </div>
                {{-- <button id="add-list" class="btn btn-primary">Add List</button> --}}
            </div>
            <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="compose-box">
                                <div class="compose-content" id="addTaskModalTitle">
                                    <h5 class="add-task-title">Add Task</h5>
                                    <h5 class="edit-task-title">Edit Task</h5>

                                    <div class="addTaskAccordion" id="add_task_accordion">
                                        
                                        <div class="card ">
                                            {{-- <div class="card-header" id="headingTwo">
                                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Create task </div>
                                            </div> --}}
                                           
                                                <div class="card-body ">
                                          
                                          
                                                    <form action="javascript:void(0);">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-4">
                                                                   <label>Task Name</label>
                                                                    <input id="s-task" type="text" placeholder="Task" class="form-control" name="task_name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-4">
                                                                    <label for="">Details</label>
                                                                    <textarea id="s-text" placeholder="Task Text" class="form-control" name="task_description"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-4">
                                                                   <label>Assign to</label><br>
                                                                   <?php 
                                                                    // dd($data);die
                                                                   ?>
                                                                   @foreach ($data as $pud)
                                                                    <input id="s-assignto" type="checkbox" placeholder="Task"  name="task_assign_to[]" value="{{$pud->idno}}">{{$pud->name}}
                                                                    &nbsp;  &nbsp;  &nbsp;
                                                                   @endforeach
                                                                

                                                                 


                                                                </div>
                                                            </div>
                                                        </div>
                                                
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-4">
                                                                   <label>Start date</label>
                                                                    <input id="s-startdate" type="date" placeholder="date" class="form-control" name="task_start_date">
                                                                </div>
                                                            </div>
                                                        </div>
                                                
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-4">
                                                                   <label>End date</label>
                                                                    <input id="s-enddate" type="date" placeholder="date" class="form-control" name="task_end_date">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-4">
                                                                   <label>Priority</label>
                                                          
                                                
                                                                    <select id="s-priority"  name="task_priority"  class="form-control"  id="">
                                                                        <option value="Top" selected>Top</option>
                                                                        <option value="Middle" >Middle</option>
                                                                        <option value="Low" >Low</option>
                                                                    </select>
                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                           <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-4">
                                                                   <label>Status</label>
                                                                 
                                                                    <select id="s-status"  name="task_status"  class="form-control"  id="">
                                                                        <option value="todo" selected>To do</option>
                                                                        <option value="inprogress" >In Progress</option>
                                                                        <option value="complete" >completed</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                
                                                      <input type="hidden" id="s-projectid" name="projectid" value="{{$projectdata->id}}">

                                                      {{-- <input type="text" value="11"> --}}
                                                    
                                                
                                                    </form>
                                                
                                                
                                                </div>
                                       
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> Discard</button>
                            <button data-btnfn="addTask" class="btn add-tsk">Add Task</button>
                            <button data-btnfn="editTask" class="btn edit-tsk" style="display: none;">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addListModal" tabindex="-1" role="dialog" aria-labelledby="addListModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="compose-box">
                                <div class="compose-content" id="addListModalTitle">
                                    <h5 class="add-list-title">Add List</h5>
                                    <h5 class="edit-list-title">Edit List</h5>
                                    <form action="javascript:void(0);">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="list-title">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
                                                    <input id="s-list-name" type="text" placeholder="List Name" class="form-control" name="task">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> Discard</button>
                            <button class="btn add-list">Add List</button>
                            <button class="btn edit-list" style="display: none;">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="deleteConformation" tabindex="-1" role="dialog" aria-labelledby="deleteConformationLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" id="deleteConformationLabel">
                        <div class="modal-header">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </div>
                            <h5 class="modal-title" id="exampleModalLabel">Delete the task?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="">If you delete the task it will be gone forever. Are you sure you want to proceed?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" data-remove="task">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row scrumboard" id="cancel-row">
                <div class="col-lg-12 layout-spacing">

                    <div class="task-list-section">

                        <div data-section="s-inprogress" class="task-list-container" data-connect="sorting">
                             <div class="connect-sorting">
                                <div class="task-container-header">
                                    <h6 class="s-heading" data-listTitle="In Progress">In Progress</h6>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-1">
                                            <a class="dropdown-item list-edit" href="javascript:void(0);">Edit</a>
                                            <a class="dropdown-item list-delete" href="javascript:void(0);">Delete</a>
                                            <a class="dropdown-item list-clear-all" href="javascript:void(0);">Clear All</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="connect-sorting-content" data-sortable="true" data-section-s="s-inprogress">

                                      <!-- Draggable start -->
                                     <!-- <div data-draggable="true" class="card task-text-progress" style="">
                                        <div class="card-body">

                                            <div class="task-header">
                                                
                                                <div class="">
                                                    <h4 class="" data-taskTitle="Launch New SEO Wordpress Theme ">Launch New SEO Wordpress Theme </h4>
                                                </div>
                                                
                                                <div class="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 s-task-edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                </div>

                                            </div>

                                            <div class="task-body">

                                                <div class="task-content">
                                                    <p class="desc" data-taskText="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                    
                                                    <p  class="passignto" data-assignto="Arif,Sumon">
                                                        <i class="fa fa-user"></i>
                                                    
                                                        <span  class="sassignto badge badge-pills badge-primary">Arif</span>
                                                        <span  class="sassignto badge badge-pills badge-primary">Sumon</span>


                                                        {{-- <span class="sassignto badge badge-pills badge-primary">Sumon</span> --}}
                                                    
                                                    </p>

                                                    <p class="pdate" data-startdate="10-2-2020" data-enddate="12-2-2020" >                                                        
                                                    <span class="sstartdate badge badge-classic badge-info" >10-2-2020</span> 
                                                    to
                                                   
                                                    <span class="senddate badge badge-classic badge-danger" >12-2-2020</span>
                                                    </p>

                                                    <p class="ppriority" data-priority="Top">Priority: <span class="spriority badge badge-primary">Top</span></p>

                                                 
                                                </div>

                                                <div class="task-bottom">
                                                    <div class="tb-section-1">
                                                        <span class="screateddate" data-taskDate="08 Aug 2019"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 08 Aug, 2019</span>
                                                    </div>
                                                    <div class="tb-section-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 s-task-delete"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                        </div>
                                    </div> -->
                                    <!-- Draggable end -->


                                </div>

                                <div class="add-s-task">
                                    <a class="addTask"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Add Task</a>
                                </div>

                            </div>
                        
                                     
                        </div>

                        <div data-section="s-complete" class="task-list-container" data-connect="sorting">
                            <div class="connect-sorting">
                                <div class="task-container-header">
                                    <h6 class="s-heading" data-listTitle="Complete">Complete</h6>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-2">
                                       
                                            <a class="dropdown-item list-clear-all" href="javascript:void(0);">Clear All</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="connect-sorting-content" data-sortable="true" data-section-s="s-complete">
                                 
                                    <!-- Draggable start -->
                                    <!-- <div data-draggable="true" class="card task-text-progress" style="">
                                        <div class="card-body">

                                            <div class="task-header">
                                                
                                                <div class="">
                                                    <h4 class="" data-taskTitle="Launch New SEO Wordpress Theme ">Launch New SEO Wordpress Theme </h4>
                                                </div>
                                                
                                                <div class="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 s-task-edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                </div>

                                            </div>

                                            <div class="task-body">

                                                <div class="task-content">
                                                    <p class="" data-taskText="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                                                  
                                                </div>

                                                <div class="task-bottom">
                                                    <div class="tb-section-1">
                                                        <span data-taskDate="08 Aug 2019"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 08 Aug, 2019</span>
                                                    </div>
                                                    <div class="tb-section-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 s-task-delete"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                        </div>
                                    </div>
                                --> 
                                    <!-- Draggable end -->

                                </div>

                                <div class="add-s-task">
                                    <a class="addTask"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Add Task</a>
                                </div>

                            </div>
                        </div>

                        <div data-section="s-todo" class="task-list-container" data-connect="sorting">

                            <div class="connect-sorting">
                                <div class="task-container-header">
                                    <h6 class="s-heading" data-listTitle="New">To do</h6>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-3">
                                       
                                            <a class="dropdown-item list-clear-all" href="javascript:void(0);">Clear All</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="connect-sorting-content" data-sortable="true" data-section-s="s-todo">
                                        <!-- Draggable start -->
                                        <!--
                                        <div data-draggable="true" class="card task-text-progress" style="">
                                            <div class="card-body">
    
                                                <div class="task-header">
                                                    
                                                    <div class="">
                                                        <h4 class="" data-taskTitle="Launch New SEO Wordpress Theme ">Launch New SEO Wordpress Theme </h4>
                                                    </div>
                                                    
                                                    <div class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 s-task-edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                    </div>
    
                                                </div>
    
                                                <div class="task-body">
    
                                                    <div class="task-content">
                                                        <p class="" data-taskText="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    
                                                      
                                                    </div>
    
                                                    <div class="task-bottom">
                                                        <div class="tb-section-1">
                                                            <span data-taskDate="08 Aug 2019"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 08 Aug, 2019</span>
                                                        </div>
                                                        <div class="tb-section-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 s-task-delete"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
    
                                            </div>
                                        </div> 
                                    -->
                                        <!-- Draggable end -->
                                </div>

                                <div class="add-s-task">
                                    <a class="addTask"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Add Task</a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    
    <!--  END CONTENT AREA  -->


@endsection

@section('widget-js')
    {{-- <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('cork-white')}}/assets/js/ie11fix/fn.fix-padStart.js"></script>
    <script src="{{asset('cork-white')}}/assets/js/apps/scrumboard.js"></script>
    <!-- END PAGE LEVEL SCRIPTS --> --}}

    <script src="{{asset('cork')}}/assets/js/apps/task.js"></script>

@endsection

@section('script')
        
    <!-- BEGIN THEME GLOBAL STYLE -->
    <script src="{{asset('cork-white')}}/assets/js/scrollspyNav.js"></script>
    <script src="{{asset('cork-white')}}/plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="{{asset('cork-white')}}/plugins/sweetalerts/custom-sweetalert.js"></script>
    <!-- END THEME GLOBAL STYLE -->    
<script>
    $('.widget-content .mixin').on('click', function () {
const toast = swal.mixin({
toast: true,
position: 'top-end',
showConfirmButton: false,
timer: 3000,
padding: '2em'
});

toast({
type: 'success',
title: 'Signed in successfully',
padding: '2em',
})

})
</script>
@endsection

