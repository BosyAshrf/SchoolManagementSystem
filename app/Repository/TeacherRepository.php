<?php

namespace App\Repository;
use App\Models\Teacher;
use App\Models\Specialization;
use App\Models\Gender;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface{

  public function AllTeachers(){
      return Teacher::all();
  }

  public function AllSpecializations(){
      return Specialization::all();
  }

  public function AllGenders(){
      return Gender::all();
  }

  public function StoreTeachers($request){
      /*
    try {
        
        $Teachers = new Teacher();
        $Teachers->Email = $request->Email;
        $Teachers->Password = Hash::make($request->Password);
        $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
        $Teachers->Specialization_id = $request->Specialization_id;
        $Teachers->Gender_id = $request->Gender_id;
        $Teachers->Joining_Date = $request->Joining_Date;
        $Teachers->Address = $request->Address;
        $Teachers->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('Teachers.index');
    }
    */

    try {
        Teacher::create([
            'Email'=>$request->Email,
            'Name'=> ['en' => $request->Name_en, 'ar' => $request->Name_ar],
            'Password'=> Hash::make($request->Password),
            'Gender_id' => $request->Gender_id,
            'Joining_Data'=>$request->Joining_Data,
            'Specialization_id' => $request->Specialization_id,
            'Address' =>$request->Address,
          ]);
        
       toastr()->success(trans('messages.success'));
        return redirect()->route('Teachers.index');
        } 

  catch (\Exception $e) {
      return redirect()->back()->with(['error' => $e->getMessage()]);
  }

  }

  public function EditTeachers($id)
  {
    return Teacher::FindOrFail($id);
  }

  public function UpdateTeachers($request){
    try {
        $Teachers =Teacher::FindOrFail($request->id);
        $Teachers->Email = $request->Email;
        $Teachers->Password = Hash::make($request->Password);
        $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
        $Teachers->Specialization_id = $request->Specialization_id;
        $Teachers->Gender_id = $request->Gender_id;
        $Teachers->Joining_Data = $request->Joining_Data;
        $Teachers->Address = $request->Address;
        $Teachers->save();
        toastr()->success(trans('messages.Update'));
        return redirect()->route('Teachers.index');
    } 
    catch (\Exception $e) {
    return redirect()->back()->with(['error' => $e->getMessage()]);
    }
  }

public function DeleteTeachers($request)
{
    Teacher::FindOrFail($request->id)->delete();    
    toastr()->success(trans('messages.Delete'));
    return redirect()->route('Teachers.index');
}

}

