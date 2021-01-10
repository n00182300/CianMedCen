<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    public function patient()
    {
      return $this->belongsTo('App\Models\Patient','patient_id');
    }

    public function doctor()
    {
      return $this->belongsTo('App\Models\Patient','doctor_id');
    }

}
