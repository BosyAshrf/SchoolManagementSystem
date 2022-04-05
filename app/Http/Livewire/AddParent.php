<?php

namespace App\Http\Livewire;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\Type_Blood;
use App\Models\My_Parent;
use App\Models\ParentAttachement;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;


use Livewire\Component;

class AddParent extends Component
{
    use WithFileUploads;
    public $successMessage = '';
    public $catchError,$updateForm = false,$photos,$show_table = true,$Parent_id;
    public $currentStep = 1,
     // Father_INPUTS
     $Email, $Password,
     $Name_Father, $Name_Father_en,
     $National_ID_Father, $Passport_ID_Father,
     $Phone_Father, $Job_Father, $Job_Father_en,
     $Nationality_Father_id, $Blood_Type_Father_id,
     $Address_Father, $Religion_Father_id,
    
    // Mother_INPUTS
    $Name_Mother, $Name_Mother_en,
    $National_ID_Mother, $Passport_ID_Mother,
    $Phone_Mother, $Job_Mother, $Job_Mother_en,
    $Nationality_Mother_id, $Blood_Type_Mother_id,
    $Address_Mother, $Religion_Mother_id;

                // Real-time Validation
// دى بتتعمل عشان يلحق لمستخدم ف نفس اللحظه لو ف خطا يصلحه 
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName,[
            'Email' => 'required|email',
            'National_ID_Father' => 'required|string|min:10|max:14|regex:/[0-9]{9}/',
            'Passport_ID_Father' => 'min:10|max:10',
            'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'National_ID_Mother' => 'required|string|min:10|max:14|regex:/[0-9]{9}/',
            'Passport_ID_Mother' => 'min:10|max:10',
            'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:11'

        ]);
    }


    public function render()
    {
        return view('livewire.add-parent', [
            'Nationalities' => Nationalitie::all(),
            'Type_Bloods' => Type_Blood::all(),
            'Religions' => Religion::all(),
            'My_Parents' => My_Parent::all(),
        ]);
    }

    // معناها اما يضغط ع زرار الاضافه يخفى الجدول ويظهر فورم الاضافه
    public function showformadd()
    {
       $this->show_table = false;
    }

    //  عشان يعمل زرار التالى ويدخل على معلومات الام يعني هيروح من المرحله الاولى الى المرحله التانيه
    public function firstStepSubmit()
    {
        $this->validate([
            'Email' => 'required|unique:my__parents,Email,'.$this->id,
            'Password' => 'required',
            'Name_Father' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|unique:my__parents,National_ID_Father,' . $this->id,
            'Passport_ID_Father' => 'required|unique:my__parents,Passport_ID_Father,' . $this->id,
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'Nationality_Father_id' => 'required',
            'Blood_Type_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required',
        ]);
     
        $this->currentStep = 2;
    }
    
// زرار التالى عشان يروح من المرحله التانيه الى المرحله التالته
    public function secondStepSubmit()
    {
        $this->validate([
            'Name_Mother' => 'required',
            'Name_Mother_en' => 'required',
            'National_ID_Mother' => 'required|unique:my__parents,National_ID_Mother,' . $this->id,
            'Passport_ID_Mother' => 'required|unique:my__parents,Passport_ID_Mother,' . $this->id,
            'Phone_Mother' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'Job_Mother' => 'required',
            'Job_Mother_en' => 'required',
            'Nationality_Mother_id' => 'required',
            'Blood_Type_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required',
        ]);
        
        $this->currentStep = 3;
    }

    public function submitForm(){

        try {

            $Parent = new My_Parent();
            // Father_INPUTS
            $Parent->Email = $this->Email;
            $Parent->Password = Hash::make($this->Password);
            $Parent->Name_Father = ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father];
            $Parent->National_ID_Father = $this->National_ID_Father;
            $Parent->Passport_ID_Father = $this->Passport_ID_Father;
            $Parent->Phone_Father = $this->Phone_Father;
            $Parent->Job_Father = ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father];
            $Parent->Passport_ID_Father = $this->Passport_ID_Father;
            $Parent->Nationality_Father_id = $this->Nationality_Father_id;
            $Parent->Blood_Type_Father_id = $this->Blood_Type_Father_id;
            $Parent->Religion_Father_id = $this->Religion_Father_id;
            $Parent->Address_Father = $this->Address_Father;
         
            // Mother_INPUTS
            $Parent->Name_Mother = ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother];
            $Parent->National_ID_Mother = $this->National_ID_Mother;
            $Parent->Passport_ID_Mother = $this->Passport_ID_Mother;
            $Parent->Phone_Mother = $this->Phone_Mother;
            $Parent->Job_Mother = ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother];
            $Parent->Passport_ID_Mother = $this->Passport_ID_Mother;
            $Parent->Nationality_Mother_id = $this->Nationality_Mother_id;
            $Parent->Blood_Type_Mother_id = $this->Blood_Type_Mother_id;
            $Parent->Religion_Mother_id = $this->Religion_Mother_id;
            $Parent->Address_Mother = $this->Address_Mother;
            $Parent->save();

            if (!empty($this->photos)){
                foreach ($this->photos as $photo) {
                    $photo->storeAs($this->National_ID_Father, $photo->getClientOriginalName()
                    , $disk = 'ParentAttachement');
                    ParentAttachement::create([
                        'File_name' => $photo->getClientOriginalName(),
                        'Parent_id' => My_Parent::latest()->first()->id,
                    ]);
                }
            }
            $this->successMessage = trans('messages.success');
            $this->clearForm();
            $this->currentStep = 1;
    
        }  catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };
    }

    public function edit($id)
    {
        $this->show_table = false;
        $this->updateForm = true;
        $Parent = My_Parent::where('id',$id)->first();
        $this->Parent_id = $id;
        $this->Email = $Parent->Email;
        $this->Password = $Parent->Password;
        $this->Name_Father = $Parent->getTranslation('Name_Father', 'ar');
        $this->Name_Father_en = $Parent->getTranslation('Name_Father', 'en');
        $this->Job_Father = $Parent->getTranslation('Job_Father', 'ar');;
        $this->Job_Father_en = $Parent->getTranslation('Job_Father', 'en');
        $this->National_ID_Father =$Parent->National_ID_Father;
        $this->Passport_ID_Father = $Parent->Passport_ID_Father;
        $this->Phone_Father = $Parent->Phone_Father;
        $this->Nationality_Father_id = $Parent->Nationality_Father_id;
        $this->Blood_Type_Father_id = $Parent->Blood_Type_Father_id;
        $this->Address_Father =$Parent->Address_Father;
        $this->Religion_Father_id =$Parent->Religion_Father_id;

        $this->Name_Mother = $Parent->getTranslation('Name_Mother', 'ar');
        $this->Name_Mother_en = $Parent->getTranslation('Name_Father', 'en');
        $this->Job_Mother = $Parent->getTranslation('Job_Mother', 'ar');;
        $this->Job_Mother_en = $Parent->getTranslation('Job_Mother', 'en');
        $this->National_ID_Mother =$Parent->National_ID_Mother;
        $this->Passport_ID_Mother = $Parent->Passport_ID_Mother;
        $this->Phone_Mother = $Parent->Phone_Mother;
        $this->Nationality_Mother_id = $Parent->Nationality_Mother_id;
        $this->Blood_Type_Mother_id = $Parent->Blood_Type_Mother_id;
        $this->Address_Mother =$Parent->Address_Mother;
        $this->Religion_Mother_id =$Parent->Religion_Mother_id;
    }

       //firstStepSubmit
       public function firstStepSubmit_edit()
       {
           $this->updateForm = true;
           $this->currentStep = 2;
   
       }
   
       //secondStepSubmit_edit
       public function secondStepSubmit_edit()
       {
           $this->updateForm = true;
           $this->currentStep = 3;
   
       }
       //third StepSubmit_edit
       public function submitForm_edit()
       { 
         if ($this->Parent_id){
        $parent = My_Parent::find($this->Parent_id);
        $parent->update([
            'Passport_ID_Father' => $this->Passport_ID_Father,
            'National_ID_Father' => $this->National_ID_Father,
            'Email'=> $this->Email,
            'Password'=> $this->Password,
            'Phone_Father'=> $this->Phone_Father,
            'Nationality_Father_id'=> $this->Nationality_Father_id,
            'Blood_Type_Father_id'=> $this->Blood_Type_Father_id,
            'Address_Father'=> $this->Address_Father,
            'Religion_Father_id'=> $this->Religion_Father_id,
            'Name_Father'=> $this->Name_Father,
            
            'Job_Father'=> $this->Job_Father,
          
            'Name_Mother'=> $this->Name_Mother,
           
            'Job_Mother'=> $this->Job_Mother,
          
            'National_ID_Mother'=> $this->National_ID_Mother,
            'Passport_ID_Mother'=> $this->Passport_ID_Mother,
            'Phone_Mother'=> $this->Phone_Mother,
            'Nationality_Mother_id'=> $this->Nationality_Mother_id,
            'Blood_Type_Mother_id'=> $this->Blood_Type_Mother_id,
            'Address_Mother'=> $this->Address_Mother,
            'Religion_Mother_id'=> $this->Religion_Mother_id,
        ]);
   
         }
         return redirect()->to('/Add_Parent');
   
        }

        
        public function delete($id)
        {
         My_Parent::findOrFail($id)->delete();
         return redirect()->to('/Add_Parent');
        }

    //clearForm عشان وهو راجع من عمليه الحفظ للخطوه الاولى يمسح كل البيانات اللى اتسجلت
    public function clearForm()
    {
        $this->Email = '';
        $this->Password = '';
        $this->Name_Father = '';
        $this->Job_Father = '';
        $this->Job_Father_en = '';
        $this->Name_Father_en = '';
        $this->National_ID_Father ='';
        $this->Passport_ID_Father = '';
        $this->Phone_Father = '';
        $this->Nationality_Father_id = '';
        $this->Blood_Type_Father_id = '';
        $this->Address_Father ='';
        $this->Religion_Father_id ='';

        $this->Name_Mother = '';
        $this->Job_Mother = '';
        $this->Job_Mother_en = '';
        $this->Name_Mother_en = '';
        $this->National_ID_Mother ='';
        $this->Passport_ID_Mother = '';
        $this->Phone_Mother = '';
        $this->Nationality_Mother_id = '';
        $this->Blood_Type_Mother_id = '';
        $this->Address_Mother ='';
        $this->Religion_Mother_id ='';

    }











// زرار السابق عشان يرجع من المرحله التانيه الى المرحله الاولى السابقه 
    public function back($step)
    {
        $this->currentStep = $step ;
    }



}
