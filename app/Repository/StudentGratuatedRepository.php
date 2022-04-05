<?php

namespace App\Repository;

use App\Models\Fee;
use App\Models\Grade;
use App\Models\Student;

class StudentGratuatedRepository implements StudentGratuatedRepositoryInterface
{
  
    public function index()
    {
        //دى عشان يجيب الطلاب اللى اتعمل ليهم  deleted_at
        $students = Student::onlyTrashed()->get();
        //دى عشان يجيب الطلاب اللى اتعمل ليهم null 
        //$students = Student::all();
        return view('pages.Students.Gratuated.index',compact('students'));
    }

    public function Create()
    {
        $Grades = Grade::all();
        return view('pages.Students.Gratuated.create',compact('Grades'));
    }

    public function StoreStudent($request)
    {
        $students =Student::where('Grade_id',$request->Grade_id)->where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();
        if ($students->count() == 0) {
            return redirect()->back()->with('error_Graduated',trans('Students.error_Graduated'));
        }

        foreach ($students as $student) {
            $ids = explode(',',$student->id);
            Student::whereIn('id',$ids)->delete();
        }
        toastr()->success(trans('messages.success'));
        return redirect()->route('Gratuated.index');
    }

    public function ReturnStudent($request)
    {
        //restore عشاان ارجاع الطلاب تانى
        Student::onlyTrashed()->where('id',$request->id)->first()->restore();
        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }

    public function Destroy($request)
    {
        //forceDelete  عشاان امسح الطلاب نهائي من الداتا بيز
        Student::onlyTrashed()->where('id',$request->id)->first()->forceDelete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }
   

}