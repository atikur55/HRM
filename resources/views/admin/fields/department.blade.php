@extends('layouts.default')

    @section('meta')
        <title>Departments | Workday Time Clock</title>
        <meta name="description" content="Workday departments, view departments, and export or download departments.">
    @endsection

    @section('content')
    @include('admin.modals.modal-import-department')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title uppercase">{{ __("Add Department") }}
                <!-- <button class="btn btn-primary ui basic button mini offsettop5 btn-import float-right ml-3"><i class="ui icon upload"></i> {{ __("Import") }}</button> -->
                <a href="{{ url('export/fields/department' )}}" class="btn btn-success ui basic button mini offsettop5 btm-export float-right"><i class="ui icon download"></i> {{ __("Export") }}</a>
                </h2>
            </div>
        </div>

        <div class="row widget-content widget-content-area br-6">
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-body">
                        @if ($errors->any())
                        <div class="ui error message">
                            <i class="close icon"></i>
                            <div class="header">{{ __("There were some errors with your submission") }}</div>
                            <ul class="list">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form id="add_department_form" action="{{ url('fields/department/add') }}" class="ui form" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="form-group">
                                <label>{{ __("Department Name") }} <span class="help">e.g. "Accounting"</span></label>
                                <input class="uppercase form-control" name="department" value="" type="text">
                            </div>
                            <div class="form-group">
                                <div class="ui error message">
                                    <i class="close icon"></i>
                                    <div class="header"></div>
                                    <ul class="list">
                                        <li class=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="actions">
                                <button type="submit" class="btn btn-success ui positive button small"><i class="ui icon check"></i> {{ __("Save") }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
            <div class="box box-success">
                <div class="box-body">
                <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>{{ __("Department") }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($data)
                            @foreach ($data as $department)
                            <tr>
                                <td>{{ $department->department }}</td>
                                <td class="align-right"><a href="{{ url('fields/department/delete/'.$department->id) }}" class="btn btn-danger ui circular basic icon button tiny"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>

    @endsection

    @section('scripts')
    <script type="text/javascript">
    $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: true,ordering: true});
    function validateFile() {
        var f = document.getElementById("csvfile").value;
        var d = f.lastIndexOf(".") + 1;
        var ext = f.substr(d, f.length).toLowerCase();
        if (ext == "csv") { } else {
            document.getElementById("csvfile").value="";
            $.notify({
            icon: 'ui icon times',
            message: "Please upload only CSV file format."},
            {type: 'danger',timer: 400});
        }
    }
    </script>

    @endsection
