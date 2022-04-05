<?php

namespace App\Repository;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Grade;
use App\Models\My_Parent;
use App\Models\Gender;
use App\Models\Nationalitie;
use App\Models\Type_Blood;
use App\Models\Classroom;
use App\Models\Section;
use App\Models\Image;
use App\Models\Student;

use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\DB;

class StudentRepository implements StudentRepositoryInterface
{

    public function GetStudent()
    {
        $students = Student::all();
        return view('pages.Students.index', compact('students'));
    }


    public function CreateStudent()
    {

        $data['grades'] = Grade::all();
        $data['parents'] = My_Parent::all();
        $data['genders'] = Gender::all();
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = Type_Blood::all();
        return view('pages.Students.create', $data);
    }

    public function getClassrooms($id)
    {
        $Classrooms = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
        return $Classrooms;
    }

    public function getSections($id)
    {
        $sections = Section::where("Class_id", $id)->pluck("Section_Name", "id");
        return $sections;
    }

    public function StoreStudents($request)
    {
        // الاولى عشان لو ظهرت مشكله ف جدول الصور ميضفش الطالب ولو اضاف وظهرت المشكله يمسحه
        DB::beginTransaction();

        try {
            $validated = $request->validated();
            $Students = new Student();
            $Students->email = $request->email;
            $Students->password = Hash::make($request->password);
            $Students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $Students->nationalitie_id = $request->nationalitie_id;
            $Students->gender_id = $request->gender_id;
            $Students->blood_id = $request->blood_id;
            $Students->Date_Birth = $request->Date_Birth;
            $Students->Grade_id = $request->Grade_id;
            $Students->Classroom_id = $request->Classroom_id;
            $Students->section_id = $request->section_id;
            $Students->parent_id = $request->parent_id;
            $Students->academic_year = $request->academic_year;
            $Students->save();

            //insert image in database
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                   $name = $file->getClientOriginalName();
                   $file->storeAs('attachments/students/'.$Students->name,$file->getClientOriginalName(),'uploadImages_attachments');

                    //insert image in image_table
                    $images = new Image();  
                    $images->Filename = $name;
                    $images->imageable_id = $Students->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();

                }
            }
              //التانيه عشان يكمل عمليه الاضافة 
              DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Students.index');

        } catch (\Exception $e) {
            // عشان لو الطالب اضاف يمسحه تانى وميكملش
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function EditStudent($id)
    {

        $data['grades'] = Grade::all();
        $data['parents'] = My_Parent::all();
        $data['genders'] = Gender::all();
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = Type_Blood::all();
        $Students = Student::findorfail($id);

        return view('pages.Students.edit', $data, compact('Students'));
    }

    public function UpdateStudents($request)
    {
        try {
            $validated = $request->validated();
            $Students = Student::findorfail($request->id);
            $Students->email = $request->email;
            $Students->password = $request->password;
            $Students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $Students->nationalitie_id = $request->nationalitie_id;
            $Students->gender_id = $request->gender_id;
            $Students->blood_id = $request->blood_id;
            $Students->Date_Birth = $request->Date_Birth;
            $Students->Grade_id = $request->Grade_id;
            $Students->Classroom_id = $request->Classroom_id;
            $Students->section_id = $request->section_id;
            $Students->parent_id = $request->parent_id;
            $Students->academic_year = $request->academic_year;
            $Students->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Students.index');

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function ShowStudent($id)
    {
        $Student = Student::findorfail($id);
        return view('pages.Students.show',compact('Student'));
        
    }

    public function DeleteStudents($request)
    {
        Student::destroy($request->id);
        //$Students = Student::findorfail($request->id)->delete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Students.index');
    }

    public function Parents_Student($id)
    {

       $student = Student::where('id',$id)->first();
       return view('pages.Students.p_student',compact('student'));

    }

    public function UploadAttachment($request)
    {
        foreach($request->file('photos') as $file)
        {
            $name = $file->getClientOriginalName();
            /////// اسم الطالب ده جاى من ال input hidden اللى انا انشاته
            $file->storeAs('attachments/students/'.$request->student_name, $file->getClientOriginalName(),'uploadImages_attachments');

            //insert image in image_table
            $images = new Image();  
            $images->Filename = $name;
             /////// id الطالب ده جاى من ال input hidden اللى انا انشاته
            $images->imageable_id = $request->student_id;;
            $images->imageable_type = 'App\Models\Student';
            $images->save();

        }

        toastr()->success(trans('messages.success'));
        return redirect()->route('Students.show',$request->student_id);
    }

    public function DownloadAttachment($studentname,$filename)
    {
        return response()->download(public_path('attachments/students/'.$studentname.'/'.$filename));    
    }

    public function DeleteAttachment($request)
    {
       // Delete img in server disk
        Storage::disk('uploadImages_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);

        // Delete in database
        $img = Image::where('id',$request->id)->where('filename',$request->filename)->delete();
         //$Students = Student::findorfail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Students.show',$request->student_id);
    }
}
