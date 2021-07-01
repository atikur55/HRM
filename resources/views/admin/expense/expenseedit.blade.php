@extends('layouts.default')

    @section('meta')
        <title>Expense Edit | EIT HRM</title>
        <meta name="description" content="Workday exps, view all exps, add, edit, delete, and archive exps.">
    @endsection

    @section('content')
             
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                {{-- <a href="{{url('exps/new')}}" class="btn btn-success float-right" style="text-align: center; margin:0px 20px 20px 0px"><i class="fa fa-plus"></i>Add</a> --}}
                <div class="table-responsive mb-4 mt-4">

                    @include('partials.alert')
                    <form action="expensestore" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="">Expense Category</label>

                                <select name="expensecategory" class="form-control">
                                    <option disabled>Select</option>
                                    @foreach($cat as $d)
                                <option value="{{$d->id}}" {{ $eid->category_id == $d->id ? 'selected' : '' }}>{{$d->expense_category_name}}</option>
                                    @endforeach
                                </select>

                                {{-- <input type="text" class="form-control" name="category" required> --}}
                            </div>
                            <div class="col-md-3">
                                <label for="">Date</label>
                            <input type="text" name="expensedate" class="form-control" value="{{$eid->expense_date}}">
                            </div>
                            <div class="col-md-6">
                                <label for="">Comment</label>
                            <input type="text" name="expensecomment" class="form-control" value="{{$eid->comment}}">
                            </div>
                         
                        </div>
                        
   <!-- @isset($eid->list_qty_price_total)
    {{-- <div class="form-row mb-2">
        <div class="col-md-3">
            <label for="">Items</label>
             <input type="text" name="list[]" placeholder="list" class="form-control" required>
        </div>
        <div class="col-md-3">
            <label for="Price">Price</label>
            <input type='number' id='price' name="price[]" placeholder="price" class="pr form-control" required>
        </div>
        <div class="col-md-3">
            <label for="">Qunatity</label>
            <input type='number' id='amount' name="amount[]" placeholder="amount" class="am form-control" required>
        </div>
        <div class="col-md-3">
            <label for="">Total</label>
            <input type='number' name="total[]" placeholder="total" value="" id="total" class="tt form-control" >
        </div>
      
    


    </div> --}}
    <div class="col-md-6">
    <table border="1">
        <tr>
            <th>
                Item
            </th>
            <th>
                Qty
            </th>

            <th>
                Price
            </th>
            <th>
                Total
            </th>
        </tr>

        @php 
            $lists = $eid->list_qty_price_total ;
            $lists = explode(',',$lists);
            // print_r($l);

        @endphp
        @foreach ($lists as $l)

             @php 
            $t = $l ;
            $t = explode('_',$l);
            // print_r($l);

            @endphp
            <tr>
                <td>{{$t[0]}}</td>
                <td>{{$t[1]}}</td>
                <td>{{$t[2]}}</td>
                <td>{{$t[3]}}</td>
            </tr>

        @endforeach
    </table>
</div>
    @endisset -->

                        <div class="form-group mb-2 mt-2">
                            <button type="button" class="add btn btn-primary">+ Add Item</button>
                            <button type="button" class="remove btn btn-danger">-</button>
                        </div>
     

                        <div class="form-row mb-2">
                            <div class="col-md-3">
                                <label for="">Items</label>
                                 {{-- <input type="text" name="list[]" placeholder="list" class="form-control" required> --}}
                            </div>
                            <div class="col-md-3">
                                <label for="Price">Price</label>
                                {{-- <input type='number' id='price' name="price[]" placeholder="price" class="pr form-control" required> --}}
                            </div>
                            <div class="col-md-3">
                                <label for="">Qunatity</label>
                                {{-- <input type='number' id='amount' name="amount[]" placeholder="amount" class="am form-control" required> --}}
                            </div>
                            <div class="col-md-3">
                                <label for="">Total</label>
                                {{-- <input type='number' name="total[]" placeholder="total" value="" id="total" class="tt form-control" > --}}
                            </div>
                          
                        


                        </div>
    <hr>


    @isset($eid->list_qty_price_total)
    
    @php 
    $i=1;
    $lists = $eid->list_qty_price_total ;
    $lists = explode(',',$lists);
    // print_r($l);

        @endphp
        @foreach ($lists as $l)

            @php 
            $t = $l ;
            $t = explode('_',$l);
            // print_r($l);

            @endphp

<div class="form-row mb-2" id="new{{$i}}">

    <div class="col-md-3">
    <input type="text" name="list[]" placeholder="list" class="form-control" value="{{$t[0]}}" required>
    </div>
    <div class="col-md-3">
    <input type='number' id='price' name="price[]" placeholder="price" class="pr form-control" value="{{$t[1]}}" id='<?php echo 'price'.$i; ?>' required>
    </div>
    <div class="col-md-3">
        <input type='number' id='amount' name="amount[]" placeholder="amount" class="am form-control" value="{{$t[2]}}" id='<?php echo 'price'.$i; ?>' required>
    </div>
    <div class="col-md-3">
        <input type='number' name="total[]" id='<?php echo 'total'.$i; ?>' placeholder="total" value="" id="total" class="tt form-control" >
    </div>
  



</div>
@php $i++; @endphp

        @endforeach


    @endisset



                            <div id="new_chq"></div>
                            <input type="hidden" value="{{$i}}" id="total_chq">
                        
                            <div class="form-row">
                                <div class="col-md-3">-</div>
                                <div class="col-md-3">-</div>
                                <div class="col-md-3">Net Total =</div>
                                <div class="col-md-3">  
                                    <input type="text" value="" class="form-control net" id="net" placeholder="Net price" name="net" readonly>
                                </div>
                            </div>
          <hr>
                        <div class="form-group">
                            <button class="btn btn-success" 
                            type="submit">Update</button>
                        </div>
                      
                    </form>
                </div>
            </div>
        </div>

        <!-- 
            
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                {{-- <a href="{{url('exps/new')}}" class="btn btn-success float-right" style="text-align: center; margin:0px 20px 20px 0px"><i class="fa fa-plus"></i>Add</a> --}}
                <div class="table-responsive mb-4 mt-4">


                  
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                  

                            <tr>
                                <th>{{ __('ID') }}</th> 
                                <th>{{ __('Expense Category') }}</th> 
                                <th>{{ __('List_qty_price_total') }}</th>
                                <th>{{ __('Total Expense') }}</th>
                                <th>{{ __('Expense Date') }}</th>
                                <th>{{ __('Comment') }}</th>
                                <th class="no-content">
                                   Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($data)
                            @foreach ($data as $exp)
                            <tr>
                                <td>{{ $exp->id }}</td>
                                <td>{{ $exp->expense_category_name }}</td>
                                <td>
                                   
                                    <table border="1">
                                        <tr>
                                            <th>
                                                Item
                                            </th>
                                            <th>
                                                Qty
                                            </th>

                                            <th>
                                                Price
                                            </th>
                                            <th>
                                                Total
                                            </th>
                                        </tr>

                                        @php 
                                            $lists = $exp->list_qty_price_total ;
                                            $lists = explode(',',$lists);
                                            // print_r($l);

                                        @endphp
                                        @foreach ($lists as $l)

                                             @php 
                                            $t = $l ;
                                            $t = explode('_',$l);
                                            // print_r($l);

                                            @endphp
                                            <tr>
                                                <td>{{$t[0]}}</td>
                                                <td>{{$t[1]}}</td>
                                                <td>{{$t[2]}}</td>
                                                <td>{{$t[3]}}</td>
                                            </tr>

                                        @endforeach
                                    </table>
                                </td>
                                <td>{{ $exp->total_expense }}</td>
                            
                                <td>{{ $exp->expense_date }}</td>
                                <td>{{ $exp->comment }}</td>

                                <td>
                                    

                                    <a href="{{ url('expenseedit/'.$exp->id) }}" class="btn btn-primary ui circular basic icon button tiny">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit table-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                    </a>
                                    <a href="{{ url('expensedelete/'.$exp->id) }}" onclick="alert('are you sure?')" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>

                               

                                </td>
                            </tr>
                            @endforeach
                            @endisset
                    
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('ID') }}</th> 
                                <th>{{ __('Expense Category') }}</th> 
                                <th>{{ __('List_qty_price_total') }}</th>
                                <th>{{ __('Total Expense') }}</th>
                                <th>{{ __('Expense Date') }}</th>
                                <th>{{ __('Comment') }}</th>
                                <th class="no-content">
                                   Action
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    -->


    @endsection

    @section('script')

    <script>
   $(document).ready(function(){
    $("#amount input").keyup(addinput);
    $("#price input").keyup(addinput);
    // console.log('get=====================================================================');
    function addinput(){
        console.log('get=====================================================================');
        $('#total input').each(function(){
            var $prc = $('#price').val();
            var $amt = $('#amount').val();
            console.log($prc+' '+$amt);
        });
    }
});

    </script>

<script>

var net = $('.net');
var first = 0;
var sum = 0;


$('.add').on('click', add);
$('.remove').on('click', remove);


$(document).ready(function(){

//     $(document).on("change", ".tt", function() {
//     var sum = 0;
//     $(".tt").each(function(){
//         sum += +$(this).val();
//     });
//     console.log(sum);
//     $(".net").val(sum);
// });

$('#amount, #price').on('input',function() {
    var qty = parseInt($('#amount').val());
    var price = parseFloat($('#price').val());
    $('#total').val((qty * price ? qty * price : 0).toFixed(2));
    // net = net+ parseFloat($('#total').val());
    // console.log(net);
    first =  parseFloat($('#total').val());
    //sum =sum+first;
    // net.val(first);
   
});


})



function add() {
   var new_chq_no = parseInt($('#total_chq').val()) + 1;
  var new_input = 
  "<div id='new_" 
  + new_chq_no + 
  "' class='form-row mb-2'>"+
    "<div class='col-md-3'> "+
        "<input class='form-control' type='text' name='list[]' placeholder='list' required>"+
    "</div>"+
  
    "<div class='col-md-3'>"+
        "<input class='pr form-control' type='number' id='price"+new_chq_no+"' name='price[]' placeholder='price' required>"+
    "</div>"+

    "<div class='col-md-3'>"+
        "<input class='am form-control' type='number' id='amount"+new_chq_no+"' name='amount[]' placeholder='amount' required>"+
    "</div>"+

    "<div class='col-md-3'>"+
        "<input class='tt form-control' type='number' id='total"+new_chq_no+"' name='total[]' placeholder='total' readonly >"+
    "</div>"+
  "</div>";
  
  $('#new_chq').append(new_input);
  
  $('#total_chq').val(new_chq_no);

    console.log('#amount'+new_chq_no);
    $('#amount'+new_chq_no+', #price'+new_chq_no).on('input',function() {
        var qty = parseInt($('#amount'+new_chq_no).val());
        var price = parseFloat($('#price'+new_chq_no).val());
        $('#total'+new_chq_no).val((qty * price ? qty * price : 0).toFixed(2));
        // net = net+parseFloat($('#total'+new_chq_no).val());
        // console.log(net);
       

        // sum =sum+first;

        // net.val(parseFloat($('#total'+new_chq_no).val())+   parseFloat(net.val()));

        var sum = 0;
  
        $.each($(".tt"), function() {
            sum = sum + Number($(this).val());
        });
        
            $(".net").val(sum);
            });


}

function remove() {
  var last_chq_no = $('#total_chq').val();

  if (last_chq_no > 1) {

    $v = parseFloat($('#total'+last_chq_no).val());

    if(!isNaN($v)){
        console.log('--not  null--'+$v);
        $sub =  parseFloat($(".net").val())-$v;
        $(".net").val($sub);
    }else if(isNaN($v)){
        console.log('--null--');
        $v = 0;
        $sub =  parseFloat($(".net").val())-$v;
        $(".net").val($sub);
    }
  

    $('#new_' + last_chq_no).remove();
    
    $('#total_chq').val(last_chq_no - 1);
  
   
  }
}

// function total() {
//   var sum = 0;
  
//   $.each($(".tt"), function() {
//     sum = sum + Number($(this).val());
//   });
  
//     $(".net").val(sum);
//   }





// Qrt = $('.tt');

// Qrt.on('change', function(){
// 	var qSum = 0;
//     console.log('222');

//   for (var i = 0, ln = Qrt.length; i < ln; i++) {
//     qSum += +$(Qrt[i]).val();
//   }
//   $('.net').val(qSum);
// });



// $(document).ready(function() {
//     //this calculates values automatically 
//     calculateSum();
//     var last_chq_no = $('#total_chq').val();

//     $(".am,.pr").on("keydown keyup", function() {
//         calculateSum();
       
//     });
//     // if (last_chq_no > 1) {
//     //     $("#amount"+new_chq_no,"#price"+new_chq_no).on("keydown keyup", function() {
//     //         console.log(last_chq_no);
//     //         calculateSum(last_chq_no);
        
//     //     }); 
//     // }

   
// });


// function calculateSum() {
//     console.log('got====calculatesum');
//     console.log();
//     var sum = 0;
//     //iterate through each textboxes and add the values
//     $(".tt").each(function() {
//         //add only if the value is number
//         if (!isNaN(this.value) && this.value.length != 0) {
//             sum += parseFloat(this.value);
//             $(this).css("background-color", "#FEFFB0");
//         }
//         else if(this.value.length != 0){
//             $(this).css("background-color", "red");
//         }
//     });
 
// 	// $("input#total").val(sum.toFixed(2));
//     console.log('net='+sum.toFixed(2))
// }


// $(document).ready(function() {
//   $(".amount input").keyup(multInputs);
//   $(".price input").keyup(multInputs);
// //   $(".txtMult3 input").keyup(multInputs);

//   function multInputs() {
//     var mult = 0;
//     // for each row:
//     $("span.txtMult1").each(function() {
//       // get the values from this row:
//       var $val1 = $('.val1', this).val();
//       var $val2 = 5;
//       var $total = ($val1 * 1) * ($val2 * 1)
//       $('.multTotal', this).text($total);
//       mult += $total;
//     });

//     $("span.txtMult2").each(function() {
//       // get the values from this row:
//       var $val1 = $('.val1', this).val();
//       var $val2 = 10;
//       var $total = ($val1 * 1) * ($val2 * 1)
//       $('.multTotal', this).text($total);
//       mult += $total;
//     });

//     $("span.txtMult3").each(function() {
//       // get the values from this row:
//       var $val1 = $('.val1', this).val();
//       var $val2 = 25;
//       var $total = ($val1 * 1) * ($val2 * 1)
//       $('.multTotal', this).text($total);
//       mult += $total;
//     });

//     $("#grandTotal").text(mult);
//     $("#totes").val(mult);

//   }
// });

        </script>
    @endsection

