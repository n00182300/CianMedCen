<?php
# @Date:   2020-11-14T19:33:15+00:00
# @Last modified time: 2020-11-14T19:41:18+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function users(){
      return $this->belongsToMany('App\Models\User','user_role');
    }
}
