@extends('layouts.default')

    @section('meta')
        <title>Leave of Absence | Workday Time Clock</title>
        <meta name="description" content="Workday leave of absence, view all employee leaves of absence, edit, comment, and approve or deny leave requests.">
    @endsection

    @section('content')

    <div class="container-fluid" >

<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing mt-2">
        <div class="widget-content widget-content-area br-6">

            <div class="box box-success">
                <div class="box-body">


                    <table width="100%" class="table table-striped table-hover" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead>

                        </thead>
                        <tbody>
                          <!DOCTYPE html>
                          <html>
                          <head>
                              <title>Upload Your FIle</title>
                              <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">
                          </head>

                          <body>

                          <div class="container">

                              <div class="panel panel-primary">
                                <div class="panel-heading"><h4>Upload Your FIle</h4></div>
                                <div class="panel-body">

                                  @if ($message = Session::get('success'))
                                  <div class="alert alert-success alert-block">
                                      <button type="button" class="close" data-dismiss="alert">×</button>
                                          <strong>{{ $message }}</strong>
                                  </div>
                                  <a src="uploads/{{ Session::get('file') }}"></a>
                                  @endif

                                  @if (count($errors) > 0)
                                      <div class="alert alert-danger">
                                          <strong>Whoops!</strong> There were some problems with your input.
                                          <ul>
                                              @foreach ($errors->all() as $error)
                                                  <li>{{ $error }}</li>
                                              @endforeach
                                          </ul>
                                      </div>
                                  @endif

                                  <form action="{{ route('file.upload.post') }}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      <div class="row">
                                        <div class="col-md-3" class="three wide field form-group">
                                            <select class="form-control" name="employee" class="ui search dropdown getid" required>
                                              <h2>sdfg</h2>


                                                         <option>-- Select Employee--</option>
                                                         @foreach($agents as $agent)
                                                         <option value="{{$agent->id}}" >{{$agent->name}}</option>
                                                         @endforeach
                                                          @error('agent_name')
                                                         <div class="alert alert-danger">
                                                           <strong>{{$message}}</strong>
                                                         </div>
                                                         @enderror

                                                <option value="">{{ __("Employee") }}</option>

                                                <!-- @isset($employee)
                                                    @foreach($employee as $e)
                                            <option value="{{ $e->lastname }}, {{ $e->firstname }}-{{$e->idno}}" data-id="{{ $e->idno }}">{{ $e->lastname }}, {{ $e->firstname }}</option>
                                                    @endforeach
                                                @endisset -->
                                            </select>
                                        </div>
                                        <div class="col-md-3" style="width: 0px;">
                                            <input style="height: 50px;width: 200px;" type="text" name="file_title" class="form-control" placeholder="File Title">
                                        </div>
                                        <div class="col-md-3">
                                          <textarea name="description" rows="2" cols="3" class="form-control" placeholder="File Description"></textarea>
                                        </div>


                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                            <input type="file" name="file" class="form-control">
                                        </div>

                                      </div> <br>
                                      <div class="row">
                                        <div class="col-md-3">
                                              <button type="submit" class="btn btn-success">Upload</button>
                                        </div>
                                      </div>

                                  </form>

                                </div>
                              </div>
                          </div>
                          </body>

                          </html>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
        </div>

    </div>
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing mt-2">
        <div class="widget-content widget-content-area br-6">
            {{-- <a href="{{url('employees/new')}}" class="btn btn-success float-right" style="text-align: center; margin:0px 20px 20px 0px"><i class="fa fa-plus"></i>Add</a> --}}
            <div class="table-responsive mb-4 mt-4" style="overflow:auto">

                <table id="zero-config" class="table table-hover" style="width:100%;">
                    <thead>
                        <tr>
                            <th>{{ __("SL NO") }}</th>
                            <th>{{ __("Name") }}</th>
                            <th>{{ __("File Title") }}</th>
                            <th>{{ __("Description") }}</th>
                            <th>{{ __("File") }}</th>
                            <th>{{ __("Download") }}</th>
                        </tr>
                    </thead>

                    <tbody>
                     @php $i = 1; @endphp
                     @foreach($files as $file)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$file->connect_users->name??''}}</td>
                            <td>{{$file->file_title}}</td>
                            <td>{{$file->description}}</td>
                            <td>{{$file->file}}</td>
                            <td>
                              <a href="{{url('download')}}/{{$file->file}}">Download</a>
                            </td>
                        </tr>
                        @php $i++; @endphp
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>{{ __("SL NO") }}</th>
                            <th>{{ __("Name") }}</th>
                            <th>{{ __("File Title") }}</th>
                            <th>{{ __("Description") }}</th>
                            <th>{{ __("File") }}</th>
                            <th>{{ __("Download") }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    @endsection

    @section('scripts')
    <script type="text/javascript">
    $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: true,ordering: true});
    </script>
    @endsection
