<?php 

namespace App\Http\Controllers\Grades;
use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGradesRequest; 

class GradeController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $grades = Grade::all();
    return view('pages.Grades.index',compact('grades'));
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreGradesRequest $request)
  {
    /* // طريقه اخرى  Validation Uniqe
    if(Grade::where('Name->ar',$request->Name)->orwhere('Name->en',$request->Name_en )->exists())
    {
      return redirect()->back()->withErrors(trans('Grades.Uniqe'));
    }
    */
    
    try {
     
    $validated = $request->validated();
    $grade = new Grade();
    $grade->Name = ['en' => $request->Name_en , 'ar' => $request->Name];
    $grade->Notes = $request->Notes;
    $grade->save();

    toastr()->success(trans('messages.success'));
    return redirect()->route('Grades.index');

    } 
      catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);

    }


  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(StoreGradesRequest $request)
  {
    {
      try {
          $validated = $request->validated();
          $grade= Grade::findOrFail($request->id);
          $grade->update([
          $grade->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
          $grade->Notes = $request->Notes,
          ]);
          toastr()->success(trans('messages.Update'));
          return redirect()->route('Grades.index');
      }
      catch
      (\Exception $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */

  public function destroy(Request $request)
  { //  الكود ده عشان لو عندنا صفوف كتير مرتبطه بالمراحل الدراسية ميمسحش او لو المستخدم مسح بالغلط المرحله ميمسحش معاها الصفوف التابعه ليها
    $classes = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');
    if($classes->count() == 0){

    $grade = Grade::findOrFail($request->id)->delete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Grades.index');
    }

    else {
      toastr()->error(trans('Grades.delete_error'));
      return redirect()->route('Grades.index');
    }



    
  }
  
}

?>