@extends('layouts.clientmaster')

    @section('meta')
        <title>Employees | Workday Time Clock</title>
        <meta name="description" content="Workday clients, view all clients, add, edit, delete, and archive clients.">
    @endsection

    @section('content')

    <div class="row">
 


        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                {{-- <a href="{{url('client/new')}}" class="btn btn-success float-right" style="text-align: center; margin:0px 20px 20px 0px"><i class="fa fa-plus"></i>Add</a> --}}


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
                            </tr>
                        </thead>
                        <tbody>
                            @isset($data)
                            @foreach ($data as $client)
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
                                 
                                
                                </td>
                                <td>{{ $client->created_at}}</td>
                               

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
                                </tr>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
    @endsection

