<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    use HasTranslations;
    protected $table = 'students';
    public $translatable = ['name'];
    protected $guarded =[];

    public function genders(){
        return $this->belongsTo('App\Models\Gender','gender_id');
    }
    
    public function grades(){
        return $this->belongsTo('App\Models\Grade','Grade_id');
    }

    public function classes(){
        return $this->belongsTo('App\Models\Classroom','Classroom_id');
    }
    
    public function sections(){
        return $this->belongsTo('App\Models\Section','section_id');
    }

    public function Nationality(){
        return $this->belongsTo('App\Models\Nationalitie','nationalitie_id');
    }

    public function parents(){
        return $this->belongsTo('App\Models\My_Parent','parent_id');
    }

    public function images()
    {
        return $this->morphMany('App\Models\Image','imageable');
    }

    public function student_account()
    {
        return $this->hasMany('App\Models\StudentAccount','student_id');
    }

}
