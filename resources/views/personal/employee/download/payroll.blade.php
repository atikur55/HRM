
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Payroll</title>
  </head>
  <body>
    @php
    $get_employee = App\User::where('reference',$emp_payroll->reference)->first();
    @endphp
      <!-- <h3 style="font-size:20px;font-family:Times New Roman;">Company Name</h3> -->
      <h4 style="font-size:18px;font-family:Times New Roman;">Your Name : {{$get_employee->name}}</h4>
      <h4 style="font-size:17px;font-family:Times New Roman;">Your Email : {{$get_employee->email}}</h4>
      <h4 style="font-size:16px;font-family:Times New Roman;"> 
       

      </h4>
      <div class="" style="margin-bottom:30px;">

      </div>
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-bordered text-cente">
            <tr>
              <th style="font-size:15px;font-family:Times New Roman;">Earning</th>
              <td style="font-size:15px;font-family:Times New Roman;"></td>
              <th style="font-size:15px;font-family:Times New Roman;">Deductions</th>
              <td style="font-size:15px;font-family:Times New Roman;"></td>
            </tr>
            <tr>
              <td style="font-size:15px;font-family:Times New Roman;">Basic Salary</td>
              <td style="font-size:15px;font-family:Times New Roman;">{{$emp_payroll->salary??''}}</td>
              <td style="font-size:15px;font-family:Times New Roman;">Deduction</td>
              <td style="font-size:15px;font-family:Times New Roman;">{{$emp_payroll->deduction??''}}</td>
            </tr>
            <tr>
              <td style="font-size:15px;font-family:Times New Roman;">Bonous</td>
              <td style="font-size:15px;font-family:Times New Roman;">{{$emp_payroll->bonus??''}}</td>
              <td style="font-size:15px;font-family:Times New Roman;"></td>
              <td style="font-size:15px;font-family:Times New Roman;"></td>
            </tr>
            <tr>
              <td style="font-size:15px;font-family:Times New Roman;">Allowance</td>
              <td style="font-size:15px;font-family:Times New Roman;">{{$emp_payroll->allowance??''}}</td>
              <td style="font-size:15px;font-family:Times New Roman;"></td>
              <td style="font-size:15px;font-family:Times New Roman;"></td>
            </tr>
            <tr>
              <td style="font-size:15px;font-family:Times New Roman;">Total Addition</td>
              <td style="font-size:15px;font-family:Times New Roman;">{{$emp_payroll->salary+$emp_payroll->bonus+$emp_payroll->allowance}} Tk</td>
              <td style="font-size:15px;font-family:Times New Roman;">Total Deduction</td>
              <td style="font-size:15px;font-family:Times New Roman;">{{$emp_payroll->deduction??''}}</td>
            </tr>
            <tr>
              <td style="font-size:15px;font-family:Times New Roman;"></td>
              <td style="font-size:15px;font-family:Times New Roman;"></td>
              <th style="font-size:15px;font-family:Times New Roman;">Net Salary</th>
              <td style="font-size:15px;font-family:Times New Roman;">{{$emp_payroll->salary+$emp_payroll->bonus+$emp_payroll->allowance-$emp_payroll->deduction}}</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="" style="margin-top:25px;">
        <span>Singnature of the employee _______________</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span>Director _____________</span>
      </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
