@extends('layouts.default')
    
    @section('meta')
        <title>Companies | Workday Time Clock</title>
        <meta name="description" content="Workday companies, view companies, and export or download companies.">
    @endsection

    @section('content')
    @include('admin.modals.modal-import-company')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h2 class="page-title form-control">{{ __("Add Company") }}      </h2>
            </div>
            <div class="col-md-6">
                    <button class="btn btn-success ui basic button mini offsettop5 btn-import float-right ml-3" ><i class="ui icon upload"></i> {{ __("Import") }}</button> 

                    <a href="{{ url('export/fields/company' )}}" class="btn btn-info ui basic button mini offsettop5 btn-export float-right"><i class="ui icon download"></i> {{ __("Export") }}</a>
           
            </div>
        </div>

        <div class="row widget-content widget-content-area br-6">
            <!-- Old -->
            {{-- <div class="col-md-4">
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
                        <form id="add_company_form" action="{{ url('fields/company/add') }}" class="ui form" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="form-group">
                                <label>{{ __("Company Name") }} <span class="help">e.g. "Apple Corporation"</span></label>
                                <input class="form-control" name="company" value="" type="text">
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
                                <button type="submit" class=" btn btn-success ui positive button small"><i class="ui icon check"></i> {{ __("Save") }}</button>
                            </div>          
                        </form>
                    </div>
                </div>
            </div> --}}
            <!-- Update -->

            {{-- <div class="col-md-8"> --}}
                <!-- Update -->
            <div class="col-md-12">
                <!-- End Update -->
            {{-- <div class="box box-success">
                <div class="box-body">
                    <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>{{ __("Company") }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($data)
                                @foreach ($data as $company)
                                <tr>
                                    <td>{{ $company->company }}</td>
                                    <td class="align-right"> 
                                        <a href="{{ url('fields/company/delete/'.$company->id) }}" class="btn btn-danger ui circular basic icon button tiny"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div> --}}
            <!-- Update -->
            <div class="box box-success">
                <div class="box-body">
                    <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>{{ __("Company") }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($data)
                                @foreach ($data as $company)
                                <tr>
                                    <td><a href="{{url('field/company/')}}/{{$company->company}}">{{ $company->company }}</a></td>
                                    <td class="align-right" style="text-align: end;"> 
                                        {{-- <a href="{{ url('fields/company/delete/'.$company->id) }}" class="btn btn-danger ui circular basic icon button tiny"><i class="fa fa-trash"></i></a> --}}
                                        <div class="dropdown">
                                          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Beraca Salaries
                                          </a>

                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">Set as Default</a>
                                            <a class="dropdown-item" href="#">Delete Company</a>
                                            <a class="dropdown-item" href="#">External Transfer</a>
                                          </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                    {{-- <button type="button" class="btn btn-outline-success">Add Company</button> --}}
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
                      Add Company
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                                <form id="add_company_form" action="{{ url('fields/company/add') }}" method="post" accept-charset="utf-8">
                                    @csrf
                                    <div class="form-group">
                                        <label>{{ __("Company Name") }} <span class="help">e.g. "Apple Corporation"</span></label>
                                        <input style="width:100%;" class="form-control" name="company" value="" type="text" placeholder="Company Name">
                                    </div>
                                   {{--  <div class="form-group">
                                        <div class="ui error message">
                                            <i class="close icon"></i>
                                            <div class="header"></div>
                                            <ul class="list">
                                                <li class=""></li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="actions">
                                        <button type="submit" class=" btn btn-success ui positive button small"><i class="ui icon check"></i> {{ __("Save") }}</button>
                                    </div>  --}}         
                                </form>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class=" btn btn-success ui positive button small"><i class="ui icon check"></i> {{ __("Save") }}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <!-- End Update -->
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


  