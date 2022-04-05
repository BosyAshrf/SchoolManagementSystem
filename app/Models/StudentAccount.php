<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
  protected $fillable=['student_id','fee_invoice_id','receipt_id','type','date','Debit','Credit','notes'];

 
  public function student()
  {
      return $this->belongsTo('App\Models\Student','student_id');
  }
  

  public function fees_invoice()
  {
      return $this->belongsTo('App\Models\Fee_invoice','fee_invoice_id');
  }


}
