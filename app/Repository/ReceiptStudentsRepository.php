<?php

namespace App\Repository;

use App\Models\fund_account;
use App\Models\Receipt_Student;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class ReceiptStudentsRepository implements ReceiptStudentsRepositoryInterface
{
    public function index()
    {
        $ReceiptStudents = Receipt_Student::all();
        return view('pages.Receipt.index',compact('ReceiptStudents'));
    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        return view('pages.Receipt.create',compact('student'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            //حفظ البيانات ف جدول سندات القبض
         $ReceiptStudents = new Receipt_Student();
         $ReceiptStudents->date = date('Y-m-d');
         $ReceiptStudents->student_id = $request->student_id;
         $ReceiptStudents->Debit = $request->Debit;
         $ReceiptStudents->description = $request->description;
         $ReceiptStudents->save();
            //حفظ البيانات والفلوس اللي اتاخدت ف الصندوق
         $fundAccounts = new fund_account();
         $fundAccounts->date = date('Y-m-d');
         $fundAccounts->receipt_id = $ReceiptStudents->id;
         $fundAccounts->Debit = $request->Debit;
         $fundAccounts->Credit = 0.00 ;
         $fundAccounts->description = $request->description;
         $fundAccounts->save();
            //حفظ البيانات ف جدول حساب الطلاب 
         $studentAccount = new StudentAccount();
         $studentAccount->date = date('Y-m-d');
         $studentAccount->type ='receipt';
         $studentAccount->student_id = $request->student_id;
         $studentAccount->receipt_id = $ReceiptStudents->id;
         $studentAccount->Debit = 0.00;
         $studentAccount->Credit = $request->Debit ;
         $studentAccount->notes = $request->notes;
         $studentAccount->save();

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('ReceiptStudents.index');

         } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }

    public function edit($id)
    {
        $ReceiptStudent = Receipt_Student::findorfail($id);
        return view('pages.Receipt.edit',compact('ReceiptStudent'));
    }

    public function update($request)
    {

        DB::beginTransaction();
        try {
            //حفظ البيانات ف جدول سندات القبض
         $ReceiptStudents = Receipt_Student::findorfail($request->id);
         $ReceiptStudents->date = date('Y-m-d');
         $ReceiptStudents->student_id = $request->student_id;
         $ReceiptStudents->Debit = $request->Debit;
         $ReceiptStudents->description = $request->description;
         $ReceiptStudents->save();
            //حفظ البيانات والفلوس اللي اتاخدت ف الصندوق
         $fundAccounts =fund_account::where('receipt_id',$request->id)->first();
         $fundAccounts->date = date('Y-m-d');
         $fundAccounts->receipt_id = $ReceiptStudents->id;
         $fundAccounts->Debit = $request->Debit;
         $fundAccounts->Credit = 0.00 ;
         $fundAccounts->description = $request->description;
         $fundAccounts->save();
            //حفظ البيانات ف جدول حساب الطلاب 
         $studentAccount = StudentAccount::where('receipt_id',$request->id)->first();
         $studentAccount->date = date('Y-m-d');
         $studentAccount->type ='receipt';
         $studentAccount->student_id = $request->student_id;
         $studentAccount->receipt_id = $ReceiptStudents->id;
         $studentAccount->Debit = 0.00;
         $studentAccount->Credit = $request->Debit ;
         $studentAccount->notes = $request->notes;
         $studentAccount->save();

            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('ReceiptStudents.index');

         } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }

    public function destroy($request)
    {
        try {
            Receipt_Student::destroy($request->id);
            toastr()->success(trans('messages.Delete'));
            return redirect()->route('ReceiptStudents.index');

         } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }

}