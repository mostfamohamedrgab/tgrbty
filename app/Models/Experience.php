<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Experience extends Model
{

    protected $fillable = [
      'title','img','slug','content','user_id','section_id','approved','anonymous'
    ];

    public function user(){
      return $this->belongsTo(User::class);
    }

    // get ative experience for view it in some pages
    public function scopeActiveExp($q){
      return $q->select('slug','title','img','user_id','created_at')->where('approved',1);
    }
}
