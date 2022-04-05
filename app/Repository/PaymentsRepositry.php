<?php

namespace App\Repository;

use App\Models\fund_account;
use App\Models\Payments;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class PaymentsRepositry implements PaymentsRepositryInterface
{

    public function index(){
        echo"sdddddddddddd";

    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        return view('pages.Payments.create',compact('student'));

    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            // حفظ البيانات في جدول سندات الصرف
            $Payments = new Payments();
            $Payments->date = date('Y-m-d');
            $Payments->student_id = $request->student_id;
            $Payments->amount = $request->Debit;
            $Payments->notes = $request->notes;
            $Payments->save();

            //حفظ البيانات والفلوس اللي اتاخدت ف الصندوق
            $fundAccounts = new fund_account();
            $fundAccounts->date = date('Y-m-d');
            $fundAccounts->payment_id = $Payments->id;
            $fundAccounts->Debit = 0.00 ;
            $fundAccounts->Credit = $request->Debit;
            $fundAccounts->description = $request->description;
            $fundAccounts->save();


            // حفظ البيانات في جدول حساب الطلاب
            $students_accounts = new StudentAccount();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'Payment';
            $students_accounts->student_id = $request->student_id;
            $students_accounts->payment_id = $Payments->id;
            $students_accounts->Debit = $request->Debit;
            $students_accounts->Credit = 0.00;
            $students_accounts->notes = $request->notes;
            $students_accounts->save();


            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Payments.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function edit($id){


    }

    public function update($request){


    }

    public function destroy($request){


    }
}