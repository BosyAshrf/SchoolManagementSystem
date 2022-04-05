<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasTranslations;
    public $translatable = ['Name'];
    protected $guarded =[];

    // علاقه بين المدرس والتخصص عشان نجيب اسم التخصص
    public function Specializations(){

    return $this->belongsTo('App\Models\Specialization','Specialization_id');    
    }

    // علاقه بين المدرس والنوع عشان نجيب النوع
    public function Genders(){

    return $this->belongsTo('App\Models\Gender','Gender_id');    
    }
    // علاقة بين المدرسين والاقسام عشان المدرس يجيب الفصول بتاعه
    public function Sections()
    {
        return $this->belongsToMany('App\Models\Section','table_section');
    }


}
