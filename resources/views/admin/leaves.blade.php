@extends('layouts.default')

    @section('meta')
        <title>Leave of Absence | Workday Time Clock</title>
        <meta name="description" content="Workday leave of absence, view all employee leaves of absence, edit, comment, and approve or deny leave requests.">
    @endsection 

    @section('content')

    <div class="container-fluid">
        <div class="row">
            {{-- <h2 class="page-title">{{ __('Leaves of Absence') }}</h2> --}}
            <h2 class="page-title">{{ __('Leave') }}</h2>
        </div>

        <div class="row widget-content widget-content-area br-6">
            <div class="box box-success">
                <div class="box-body">
                    <table width="100%" class="table table-striped table-hover" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead>
                            <tr>
                                <th>{{ __('Employee') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Leave From') }}</th>
                                <th>{{ __('Leave To') }}</th>
                                <th>{{ __('Return Date') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($leaves)
                                @foreach ($leaves as $data)
                                <tr>
                                    <td>{{ $data->employee }}</td>
                                    <td>{{ $data->type }}</td>
                                    <td>@php echo e(date('D, M d, Y', strtotime($data->leavefrom))) @endphp</td>
                                    <td>@php echo e(date('D, M d, Y', strtotime($data->leaveto))) @endphp</td>
                                    <td>@php echo e(date('M d, Y', strtotime($data->returndate))) @endphp</td>
                                    <td><span class="">{{ $data->status }}</span></td>
                                    <td class="align-right">
                                        <a href="{{ url('leaves/edit/'.$data->id) }}" class="btn btn-success ui circular basic icon button tiny"><i class="fa fa-edit"></i></a>
                                        <a href="{{ url('leaves/delete/'.$data->id) }}" class="btn btn-danger ui circular basic icon button tiny"><i class="fa fa-trash 
                                            "></i></a>
                                    
                                        {{-- @isset($data->comment)
                                            @if($data->comment != null)
                                                <button class="btn btn-success ui circular basic icon button tiny uppercase" data-tooltip='{{ $data->comment }}' data-variation='wide' data-position='top right'><i class="fa fa-plus"></i>do</button>
                                            @endif
                                        @endisset --}}
                                    </td>
                                </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('scripts')
    <script type="text/javascript">
    $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: true,ordering: true});
    </script>
    @endsection