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
            <div class="col-md-12">
                <!-- Update -->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">Employee List</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">Add New Employee</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu2">Self Service</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu3">Leave Overview</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu4">Bulk Action</a>
                  </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane container active" id="home">Employee List</div>
                  <div class="tab-pane container fade" id="menu1">
                      <p style="margin-top:20px;">when does employee normally work?</p>
                      <div class="form-group">
                            <select name="employee_time" id="" style="width:150px;">
                                <option value="fulltime">Full Time</option>
                                <option value="contactor">Contractor</option>
                                <option value="parttime">Part Time</option>
                            </select>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-secondary">Cancel</button>
                          <button type="submit" class="btn btn-primary">Continue</button>
                      </div>
                  </div>
                  <div class="tab-pane container fade" id="menu2">Self Service</div>
                  <div class="tab-pane container fade" id="menu3">Leave Overview</div>
                  <div class="tab-pane container fade" id="menu4">Bulk Action</div>
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


  