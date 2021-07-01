@extends('layouts.default')

    @section('meta')
        <title>Employees | Workday Time Clock</title>
        <meta name="description" content="Workday clients, view all clients, add, edit, delete, and archive clients.">
    @endsection

    @section('content')
             
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                {{-- <a href="{{url('client/new')}}" class="btn btn-success float-right" style="text-align: center; margin:0px 20px 20px 0px"><i class="fa fa-plus"></i>Add</a> --}}
                <div class="table-responsive mb-4 mt-4" style="overflow:auto">
                  @include('partials.alert')
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                  

                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Client Name') }}</th> 
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Created Time') }}</th>
                                <th class="no-content"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                            $user = App\User::where('id',Auth::id())->first();
                            @endphp
                            @if($user->acc_type == 2)
                             @isset($clientData)
                            @foreach ($clientData as $client)
                            <tr >
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->created_at}}</td>
                                <td>
                                    <a href="{{ url('/registered_client/delete/'.$client->id) }}" class="ui circular basic icon button tiny" onclick="return confirm('Are you sure?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash table-delete"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endisset
                            @else
                             @isset($clientData)
                            @foreach ($clientData as $client)
                            <tr >
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->client_name }}</td>
                                <td>{{ $client->client_email }}</td>
                                <td>{{ $client->created_time}}</td>
                                <td>
                                    <a href="{{ url('/registered_client/delete/'.$client->id) }}" class="ui circular basic icon button tiny" onclick="return confirm('Are you sure?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash table-delete"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endisset
                            @endif
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Client Name') }}</th> 
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Created Time') }}</th>
                                <th class="no-content"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>


    @endsection

