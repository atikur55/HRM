@extends('layouts.default')

    @section('meta')
        <title>Employees | Workday Time Clock</title>
        <meta name="description" content="Workday clients, view all clients, add, edit, delete, and archive clients.">
    @endsection

    @section('content')

    <div class="row">
       



        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                {{-- <a href="{{url('client/new')}}" class="btn btn-success float-right" style="text-align: center; margin:0px 20px 20px 0px"><i class="fa fa-plus"></i>Add</a> --}}

                <div  >
                    @include('partials.alert')
                    <form action="{{url('registered_client_project_store')}}" method="post" class="form">
                    @csrf 
                    <div class="form-group">
                        <label for="">Select Client</label>
                        <select name="client_id" id="" class="form-control">
                            <option>Select One</option>
                            @foreach ($clientData as $item)
                                <option value="{{$item->id}}">{{$item->id}}_{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Project Name</label>
                        <input style="width:100%" type="text" name="project_name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Project deadline</label>
                        <input type="date" name="project_deadline" id="" placeholder="project_deadline" class="form-control">
                    </div>
                 
                    <div class="form-group">
                        <label for="">Project Details</label>
                        <textarea name="project_details" placeholder="Project Details" class="form-control"></textarea>
                    </div>
                    
                    <div class="form-group">
                        
                        <button type="submit"  id=""  class="btn btn-success ">Add</button>
                       </div>
                    </form>
                </div>
                <div class="table-responsive mb-4 mt-4" style="overflow:auto">
           
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                  

                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Project Name') }}</th> 
                                <th>{{ __('Project Deadline') }}</th> 
                                <th>{{ __('Project Details') }}</th> 
                                <th>{{ __('Project Status') }}</th> 
                                <th>{{ __('Created Time') }}</th>
                                <th class="no-content"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($clientProjectData)
                            @foreach ($clientProjectData as $client)
                            <tr >
                                <td>{{ $client->id }}</td>
                               
                                <td>{{ $client->project_name }}</td>
                                <td>{{ $client->project_deadline }}</td>
                                <td>{{ $client->project_details }}</td>
                                <td>
                                    @php $b=''; @endphp
                                @if($client->project_status=='Pending')  @php $b='danger'; @endphp
                                @elseif($client->project_status=='Running') @php $b='warning'; @endphp
                                @elseif($client->project_status=='Complete')  @php $b='success'; @endphp
                                @endif
                           
                                <span class="alert alert-{{$b}}">   {{ $client->project_status }}</span>
                                 
                                <a href="{{url('registered_client_project_status')}}/{{$client->id}} "  class="btn btn-info">Change</a>
                                
                                </td>
                                <td>{{ $client->created_at}}</td>
                               

                                <td>
                                    {{-- <a href="{{ url('/client/view/'.$client->id) }}" class="ui circular basic icon button tiny">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle table-view"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                                    </a> --}}

                                    <a href="{{ url('/registered_client_project/edit/'.$client->id) }}" class="ui circular basic icon button tiny">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit table-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                    </a>

                                    <a href="{{ url('/registered_client_project/delete/'.$client->id) }}" class="ui circular basic icon button tiny" onclick="return confirm('Are you sure?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash table-delete"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                    </a>

                                        
                                
                              
{{-- 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10" class="tc"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg> --}}

                                </td>
                            </tr>
                            @endforeach
                            @endisset
                    
                        </tbody>
                        <tfoot>
                            <tr>
                      
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Project Name') }}</th> 
                                    <th>{{ __('Project Deadline') }}</th> 
                                    <th>{{ __('Project Details') }}</th> 
                                    <th>{{ __('Project Status') }}</th> 
                                    <th>{{ __('Created Time') }}</th>
                                    <th class="no-content"></th>
                                </tr>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
    @endsection

