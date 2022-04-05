<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee_invoice extends Model
{
    protected $fillable=['invoice_date','student_id','Grade_id','Classroom_id','Fee_id','amount','notes'];


    // علاقة بين الرسوم الدراسية والمراحل الدراسية لجب اسم المرحلة

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade','Grade_id');
    }
    // علاقة بين الرسوم الدراسية والطلاس لجب اسم الطالب

    public function student()
    {
        return $this->belongsTo('App\Models\Student','student_id');
    }


    // علاقة بين الصفوف الدراسية والرسوم الدراسية لجب اسم الصف

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom','Classroom_id');
    }

    // علاقة بين الرسوم الدراسية و فاتورة الرسوم الدراسية لجب اسم الرسوم

    public function fees()
    {
        return $this->belongsTo('App\Models\Fee','Fee_id');
    }

}
