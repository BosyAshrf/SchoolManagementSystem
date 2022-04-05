<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Section;
use App\Models\Teacher;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //اول واحده دى عشان يجيب الاقسام بتاع كل مرحله ودى عملنا ريليشن فى جدول المراحل
        $grades = Grade::with(['Sections'])->get();
        // تانى واحده دى عشان يجيب كل المراحل الدراسية
        $list_Grades = Grade::all();
        // دى عشان اجيب اسماء المدرسين الخاص بالفصول دى 
        $teachers = Teacher::all();
        return view('pages.Sections.index',compact('grades','list_Grades','teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        /*
        try {
            Section::create([
                'Section_Name'=> ['en' => $request->Section_name_en , 'ar' => $request->Section_name_ar],
                'Grade_id' => $request->Grade_id,
                'Class_id' => $request->Class_id,
                'Status' => 1,
              ]);
           toastr()->success(trans('messages.success'));
            return redirect()->route('Sections.index');
            
            } 
            */
            try {
                $Sections = new Section();
                $Sections->Section_Name = ['ar' => $request->Section_name_ar, 'en' => $request->Section_name_en];
                $Sections->Grade_id = $request->Grade_id;
                $Sections->Class_id = $request->Class_id;
                $Sections->Status = 1;
                $Sections->save();
                $Sections->Teachers()->attach($request->Teacher_id);
                toastr()->success(trans('messages.success'));
          
                return redirect()->route('Sections.index');
            }
              catch (\Exception $e){
              return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        
            }

        }

       

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       try {

        $Sections = Section::findOrFail($request->id);
        $Sections->Section_Name = ['ar' => $request->Section_name_ar, 'en' => $request->Section_name_en];
        $Sections->Grade_id = $request->Grade_id;
        $Sections->Class_id = $request->Class_id;
  
        if(isset($request->Status)) {
          $Sections->Status = 1;
        } else {
          $Sections->Status = 2;
        }

        // update pivot table
        if(isset($request->Teacher_id))
        {
        // معناه هيعدل ع اسم مدرس تانى
          $Sections->teachers()->sync($request->Teacher_id);
        } else {
        // معناه هيعدل بكذا مدرس مع بعض
          $Sections->teachers()->sync(array());
        }

        $Sections->save();
        toastr()->success(trans('messages.Update'));
  
        return redirect()->route('Sections.index');
   
        }

       catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }

    }

   
    public function destroy(Request $request)
    {
        try {
            $Sections = Section::findOrFail($request->id)->delete();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Sections.index');

        }  catch (\Exception $e){
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            
        }
       

    }

    public function getClasses($id)
    {

        $Classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
        return $Classes;
        
      
    }


}
