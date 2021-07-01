@extends('layouts.default')

    @section('meta')
        <title>Payment Edit | EIT HRM</title>
        <meta name="description" content="Workday employees, view all employees, add, edit, delete, and archive employees.">
    @endsection

    @section('content')

             
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area ">
                <a href="{{url('payroll')}}" class="btn btn-danger float-right" style="text-align: center; margin:0px 20px 20px 0px"><i class="fa fa-close">&nbsp;</i>Return</a>
                        <div class="col-md-8 table-responsive mb-4 mt-4">
                        <h4 class="alert alert-success">Edit payment for ID = {{$eid->idno}} and Name = {{$eid->firstname}}</h4>
                       
                        </div>

          
         
              
            </div> 
        </div>

        

       
        
        <div class="col-md-6 layout-spacing br-6 mb-2"> 
            <div class="widget">
                
                <div class="row">
                    <div class="col-md-12">
                     
                                <h2>Edit Payroll</h2>
                                @include('partials.alert')
                            <form action="{{url('paymentupdate')}}/{{$eid->id}}" method="post">
                                    @csrf  
                                    <div class="form-group">
                                      <label for="">Salary</label>
                                    <input class="form-control" type="number" name="salary" value="{{$eid->salary}}" placeholder="salary" readonly>
                                    
                                    </div>
                                    <div class="form-group">
                                        <label for="">From Date</label>
                                    <input class="form-control" style="width:100%" type="text" name="fromdate" value="{{$eid->fromdate}}" placeholder="Date" >
                                      
                                      </div>
                                      <div class="form-group">
                                        <label for="">Till Date</label>
                                        <input class="form-control" style="width:100%" type="text" name="todate" value="{{$eid->todate}}" placeholder="" >
                                      
                                      </div>
                                      <div class="form-group">
                                        <label for="">Deduction</label>
                                        <input class="form-control" type="number" name="deduction" value="{{$eid->deduction}}" placeholder="0.00" >
                                      
                                      </div>
                                      <div class="form-group">
                                        <label for="">Bonus</label>
                                        <input class="form-control" type="number" name="bonus" value="{{$eid->bonus}}" placeholder="0.00" >
                                      
                                      </div>
                                      <div class="form-group">
                                        <label for="">Comment</label>
                                      <textarea class="form-control" name="comment"  >{{$eid->comment}}</textarea>
                                      
                                      </div>
                                      <div class="form-group">
                                       @if($eid->approve_key == 2)
                                     
                                          <input type="checkbox" name="approve_key" value="2" placeholder="" checked>
                                        @elseif($eid->approve_key == 1)
                                     
                                          <input type="checkbox" name="approve_key" value="2" placeholder="" >
                                        @endif
                                        <label for="">Pending</label>
                                      </div>
                                    
                                    <input type="hidden" name="id" value="{{$eid->id}}">
                                    <input type="hidden" name="reference" value="{{$eid->reference}}">
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit" >Submit</button>
                                      
                                      </div>

                                    
                                </form>
                          
                        
                    </div>
                </div>
            </div>
        </div>
      


    @endsection

