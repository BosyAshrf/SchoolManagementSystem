<?php 
namespace App\Http\Controllers\Classrooms;
use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClassroom; 

class ClassroomController extends Controller 
{

 
  public function index()
  {
    $classes = Classroom::all();
    $grades = Grade::all();
    return view('pages.Classrooms.index',compact('grades','classes'));
  }

  public function create()
  {
    
  }

  
  public function store(Request $request)
    {
      $List_Classes = $request->List_Classes;

      try {
        foreach ($List_Classes as $List_Class) {

          $classes = new Classroom();
          
          $classes->Name_Class = ['en'=>$List_Class['Name_class_en'],'ar'=>$List_Class['Name']];

          $classes->Grade_id =$List_Class['Grade_id'];

          $classes->save();
        }

        toastr()->success(trans('messages.success'));
        return redirect()->route('Classrooms.index');
       
      }

      catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }

    }

 
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


  public function update(Request $request)
  {
    {
      try {
          $classes= Classroom::findOrFail($request->id);
          $classes->update([
          $classes->Name_Class = ['ar' => $request->Name, 'en' => $request->Name_class_en],
          $classes->Grade_id = $request->Grade_id,
          ]);
          toastr()->success(trans('messages.Update'));
          return redirect()->route('Classrooms.index');
      }
      catch
      (\Exception $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
    }

  }

 
  public function destroy(Request $request)
  {
    $classes = Classroom::findOrFail($request->id)->delete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Classrooms.index');

  }

  public function Delete_all(Request $request){
  
     //الid الجايين الداله معناها يعمل  ليه فى array ,العلامه دى معناه يفصل بينهم
   $delete_all_id = explode(",", $request->delete_all_id);
   // wherein دى بنستخدمها عشان احنا معانا اراى ومعانا كذا id
     Classroom::whereIn('id', $delete_all_id)->Delete();
     toastr()->error(trans('messages.Delete'));
     return redirect()->route('Classrooms.index');
   }
 

   public function Filter_Classes(Request $request){

    $grades = Grade::all();
    $Search = Classroom::select('*')->where('Grade_id','=',$request->Grade_id)->get();
    return view('pages.Classrooms.index',compact('grades'))->withDetails($Search);
   }

   
  }
  


?>