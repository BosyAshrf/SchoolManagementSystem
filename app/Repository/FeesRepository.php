<?php

namespace App\Repository;

use App\Models\Fee;
use App\Models\Grade;

class FeesRepository implements FeesRepositoryInterface
{
  
    public function index()
    {
        $fees = Fee::all();
        $Grades = Grade::all();
        return view('pages.Fees.index',compact('fees','Grades'));
    }

    public function Create()
    {
        $Grades = Grade::all();
        return view('pages.Fees.create',compact('Grades'));
    }

    public function Edit($id)
    {

        $fee = Fee::findorfail($id);
        $Grades = Grade::all();
        return view('pages.Fees.edit',compact('fee','Grades'));
    }

    public function Store($request)
    {
        try {
           
            $fees = new Fee();
            $fees->title = ['ar'=>$request->title_ar ,'en'=>$request->title_en];
            $fees->amount = $request->amount ;
            $fees->Grade_id =$request->Grade_id;
            $fees->Classroom_id =$request->Classroom_id;
            $fees->year =$request->year;
            $fees->Fee_type =$request->Fee_type;
            $fees->description =$request->description;
            $fees->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Fees.index');

        } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function Update($request)
    {

        try {
            $fees = Fee::findorfail($request->id);
            $fees->title = ['ar'=>$request->title_ar ,'en'=>$request->title_en];
            $fees->amount = $request->amount ;
            $fees->Grade_id =$request->Grade_id;
            $fees->Classroom_id =$request->Classroom_id;
            $fees->year =$request->year;
            $fees->Fee_type =$request->Fee_type;
            $fees->description =$request->description;
            $fees->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Fees.index');

        } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function Destory($request)
    {

        $fees = Fee::findorfail($request->id)->delete();
        //Fee::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Fees.index');

    }

}
    
      
    

