<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    protected $fillable =
    [
    'student_id','from_grade','from_classroom','from_section',
    'to_grade','to_classroom','to_section','academic_year','academic_year_new',
    ];


    public function students(){
        return $this->belongsTo('App\Models\Student','student_id');
    }
    
    public function fromgrade(){
        return $this->belongsTo('App\Models\Grade','from_grade');
    }

    public function fromclasses(){
        return $this->belongsTo('App\Models\Classroom','from_classroom');
    }
    
    public function fromsections(){
        return $this->belongsTo('App\Models\Section','from_section');
    }

    public function tograde(){
        return $this->belongsTo('App\Models\Grade','to_grade');
    }

    public function toclasses(){
        return $this->belongsTo('App\Models\Classroom','to_classroom');
    }
    
    public function tosections(){
        return $this->belongsTo('App\Models\Section','to_section');
    }
}
