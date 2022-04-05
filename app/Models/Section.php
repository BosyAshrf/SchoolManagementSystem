<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    public $translatable = ['Section_Name'];
    protected $table = 'Sections';
    public $timestamps = true;
    protected $fillable=['Section_Name','Status','Grade_id','Class_id'];


// علاقة بين الاقسام والصفوف عشان اجيب اسم الصف في جدول الاقسام 
    public function Classes(){
        
    return $this->belongsTo('App\Models\Classroom','Class_id');
    }
// علاقه بين الاقسام والمدرس عشان القسم يجيب اسم المدرس الخاص به
    public function Teachers()
    {
        return $this->belongsToMany('App\Models\Teacher','table_section');
    }


    
}
