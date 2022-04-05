<?php

namespace App\Repository;

use App\Models\Fee;
use App\Models\Fee_invoice;
use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class FeesinvoicesRepository implements FeesinvoicesRepositryInterface
{
    public function index()
    {
        $fee_invoices = Fee_invoice::all();
        $grades = Grade::all();
       return view('pages.Feesinvoices.index',compact('fee_invoices','grades'));
    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        $fees = Fee::where('Classroom_id',$student->Classroom_id)->get();
        return view('pages.Feesinvoices.add',compact('student','fees'));

    }
   

    public function store($request)
    {
        $List_Fees = $request->List_Fees;
        DB::beginTransaction();

        try {
            //الحفظ فى جدول فواتير الرسوم الدراسية
            foreach ($List_Fees as $list_fee) {
                $fees = new Fee_invoice();
                $fees->invoice_date = date('Y-m-d');
                $fees->student_id = $list_fee['student_id'];
                $fees->Grade_id = $request->Grade_id;
                $fees->Classroom_id = $request->Classroom_id;
                $fees->Fee_id = $list_fee['Fee_id'];
                $fees->amount = $list_fee['amount'];
                $fees->notes = $list_fee['notes'];
                $fees->save();
            

                // الحفظ فى جدول حسابات الطلاب 
                $studentAccounts = new StudentAccount();
                $studentAccounts->student_id = $list_fee['student_id'];
                $studentAccounts->date = date('Y-m-d');
                $studentAccounts->type = 'invoice';
                $studentAccounts->fee_invoice_id = $fees->id;
                $studentAccounts->Debit = $list_fee['amount'];
                $studentAccounts->Credit = 0.00;
                $studentAccounts->notes = $list_fee['notes'];
                $studentAccounts->save();
            }
            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Fees_Invoices.index');

         } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }

    public function edit($id)
    {
        $fee_invoices = Fee_invoice::findOrfail($id);
        $fees = Fee::where('Classroom_id',$fee_invoices->Classroom_id)->get();
        return view('pages.Feesinvoices.edit',compact('fee_invoices','fees'));

    }


    public function update($request)
    {
        DB::beginTransaction();

        try {
            //الحفظ فى جدول فواتير الرسوم الدراسية
                $fees = Fee_invoice::findorfail($request->id);
                $fees->fee_id = $request->fee_id;
                $fees->amount = $request->amount;
                $fees->notes = $request->notes;
                $fees->save();
            
                // الحفظ فى جدول حسابات الطلاب 
                $studentAccounts = StudentAccount::where('fee_invoice_id',$request->id)->first();
                $studentAccounts->Debit = $request->amount;
                $studentAccounts->Credit = 0.00;
                $studentAccounts->notes = $request->notes;
                $studentAccounts->save();
            
            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Fees_Invoices.index');

         } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }

    }

    public function destroy($request)
    {
        try {
            Fee_invoice::destroy($request->id);
            toastr()->success(trans('messages.Delete'));
            return redirect()->route('Fees_Invoices.index');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }

    }
}
    
      
    

