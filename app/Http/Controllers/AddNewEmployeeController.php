<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewEmployee;
use Carbon\Carbon;
use Storage;

class AddNewEmployeeController extends Controller
{
    public function store(Request $request)
    {
        
        NewEmployee::insert($request->except('_token') + [
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success','Add Info Added Successfully'); 
    }
    public function view($id)
    {
        $employee = NewEmployee::find($id);
        return view('admin.employee.view',compact('employee'));
    }
    public function export(Request $request) 
    {
        // if (permission::permitted('leavetypes')=='fail'){ return redirect()->route('denied'); }
        
        $l = NewEmployee::all();

        $date = date('Y-m-d');
        $time = date('h-i-sa');
        $file = 'employee-'.$date.'T'.$time.'.csv';

        Storage::put($file, '', 'private');

        foreach ($l as $d) 
        {
            Storage::prepend($file, $d->id.','.$d->c_name.','.$d->pay_fre .','. $d->first_name .','. $d->last_name .','. $d->date_birth.','.$d->date_app.','.$d->employee_time.','.$d->ident_type.','.$d->passport_no.','.$d->passport_c_code.','.$d->id_number.','.$d->email.','.$d->pay_method.','.$d->bank_name.','.$d->acc_number.','.$d->brance_code.','.$d->acc_type.','.$d->holder_rel.','.$d->unit_number.','.$d->complex.','.$d->street_number.','.$d->street.','.$d->district.','.$d->city.','.$d->code.','.$d->same_as_residential.','.$d->line1.','.$d->line2.','.$d->line3.','.$d->codetwo.','.$d->jobtitle.','.$d->tax_nummber);
        }

        Storage::prepend($file, '"ID"' .','. 'Company Name' .','. 'Pay Freequence' .','. 'First Name'.','.'Last Name'.','.'Date of Birth'.','.'Date of Appoinment'.','.'Employee Time'.','.'Identity Type'.','.'Passport No'.','.'Passport Country Code'.','.'ID No'.','.'Email'.','.'Pay Method'.','.'Bank Name'.','.'Account Number'.','.'Brance Code'.','.'Account Type'.','.'Holder Relation'.','.'Unit Number'.','.'Complex'.','.'Street Number'.','.'Street'.','.'District'.','.'City'.','.'Code'.','.'Same as Residential'.','.'Line 1'.','.'Line 2'.','.'Line 3'.','.'Code Two'.','.'job Title'.','.'Tax Number');

        return Storage::download($file);
    }
}
