<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name','icon'];

    public function experience(){
      return $this->hasMany(Experience::class);
    }

}
