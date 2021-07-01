@extends('layouts.default')

    @section('meta')
        <title>Expense Category | EIT HRM</title>
        <meta name="description" content="Workday exps, view all exps, add, edit, delete, and archive exps.">
    @endsection

    @section('content')
   
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                {{-- <a href="{{url('exps/new')}}" class="btn btn-success float-right" style="text-align: center; margin:0px 20px 20px 0px"><i class="fa fa-plus"></i>Add</a> --}}
                <div class="table-responsive mb-4 mt-4">

                    @include('partials.alert')
                    <a href="{{url('expense')}}" class="btn btn-danger float-right">Return</a>
                    <form action="expense_category_store" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-3">
                   

                                
                                <input type="text" class="form-control" name="expense_category_name" placeholder="Expense Category Name" required>
                            </div>
                            <div class="col-md-3">
                        
                                    <input type="hidden" name="created_by" value="{{Auth::user()->id}}">
                                        <button class="btn btn-success" 
                                        type="submit">Create</button>
                       
                            </div>
                         
                         
                        </div>
                  
     
                   
                      
                    </form>
                
                </div>
         
            </div>
    
        </div>

                  
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                  

                            <tr>
                                <th>{{ __('Serial') }}</th> 
                                <th>{{ __('Expense Category Name') }}</th> 
                                <th class="no-content">
                                   Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($data)
                            @php $i=1; @endphp
                            @foreach ($data as $exp)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{ $exp->expense_category_name }}</td>
                            

                                <td>
                                    

                                    {{-- <a href="{{ url('expenseedit/'.$exp->id) }}" class="btn btn-primary ui circular basic icon button tiny">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit table-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                    </a> --}}
                                    @if($exp->id != 7 and $exp->expense_category_name !='default')
                                        <a href="{{ url('expense_category_delete/'.$exp->id) }}" onclick="alert('are you sure?')" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    @endif

                               

                                </td>
                            </tr>
                            @endforeach
                            @endisset
                    
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('ID') }}</th> 
                                <th>{{ __('Expense Category Name') }}</th> 
                              
                                <th class="no-content">
                                   Action
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>


    @endsection

    @section('script')

    @endsection

