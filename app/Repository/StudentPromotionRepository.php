<?php

namespace App\Repository;

use App\Models\Student;
use App\Models\Grade;
use App\Models\promotion;
use Illuminate\Support\Facades\DB;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface
{
    public function index()
    {
        $Grades = Grade::all();
        return view('pages.Students.Promotions.index',compact('Grades'));
    }


    public function Create()
    {
        $promotions = promotion::all();
        return view('pages.Students.Promotions.management',compact('promotions'));
    }

    public function Store($request)
    {
        DB::beginTransaction();

        try {
            // الكود ده عشان يجيب معلومات الطلاب اللى ف المرحله الدراسيه والصفوف والاقسام بواسطه ال id
            $students = Student::where('Grade_id',$request->Grade_id)->where('Classroom_id',$request->Classroom_id)
            ->where('section_id',$request->section_id)->where('academic_year',$request->academic_year)->get();

            // الكود ده عشان لو ف بيانات مش كامله للطالب
            if($students->count() < 1){
                return redirect()->back()->with('error_promotions', __('لاتوجد بيانات في جدول الطلاب'));
            }
    
         // update in table student Promotion
            foreach ($students as $student)
            {
              $ids = explode(',',$student->id);
              // استخدمنا دى عشان هيبقي اراي ممكن كام id مع بعض
              Student::whereIn('id',$ids)
              ->update([
                  'Grade_id'=>$request->Grade_id_new,
                  'Classroom_id'=>$request->Classroom_id_new,
                  'section_id'=>$request->section_id_new,
                  'academic_year'=>$request->academic_year_new,
              ]);
    
                // insert in to promotions
                promotion::updateOrCreate([
                    'student_id'=>$student->id,
                    'from_grade'=>$request->Grade_id,
                    'from_classroom'=>$request->Classroom_id,
                    'from_section'=>$request->section_id,
                    'to_grade'=>$request->Grade_id_new,
                    'to_classroom'=>$request->Classroom_id_new,
                    'to_section'=>$request->section_id_new,
                    'academic_year'=>$request->academic_year,
                    'academic_year_new'=>$request->academic_year_new,
                ]);
    
            }
            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Students.index');
    
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    
    
    }

    public function destroy($request)
    {
        //الكود ده عشان تعمل خطوتين الاولى بتعمل ابديت للطلاب وترجعهم من الجديد للقديم  الخطوه التانيه هتمسح الترقيات من الداتا بيز 
        DB::beginTransaction();
        try {
            
            if ($request->page_id == 1) {

                 $promotions = promotion::all();
                 foreach ($promotions as $promotion) {

                    $ids = explode(',',$promotion->student_id);
                    // استخدمنا دى عشان هيبقي اراي ممكن كام id مع بعض
                    Student::whereIn('id',$ids)
                    ->update([
                        'Grade_id'=>$promotion->from_grade,
                        'Classroom_id'=>$promotion->from_classroom,
                        'section_id'=>$promotion->from_section,
                        'academic_year'=>$promotion->academic_year,
                    ]); 

                    //حذف جميع الترقيات من الداتا بيز
                    promotion::truncate();
                 }
                 DB::commit();
                 toastr()->error(trans('messages.Delete'));
                 return redirect()->route('Students.index');

            } else {
               
                $promotion = promotion::findorfail($request->id);
                Student::where('id',$promotion->student_id)
                ->update([
                    'Grade_id'=>$promotion->from_grade,
                    'Classroom_id'=>$promotion->from_classroom,
                    'section_id'=>$promotion->from_section,
                    'academic_year'=>$promotion->academic_year,
                ]); 

                promotion::destroy($request->id);
                DB::commit();
                toastr()->error(trans('messages.Delete'));
                return redirect()->route('Students.index');

            }
            
            }  
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    }
    
      
    

