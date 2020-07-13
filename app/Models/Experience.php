<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Experience extends Model
{

    protected $fillable = [
      'title','img','slug','content','user_id','section_id'
      ,'approved','anonymous','keywords'];

    public function user(){
      return $this->belongsTo(User::class);
    }

    // get ative experience for view it in some pages
    public function scopeActiveExp($q){
      return $q->select('id','slug','title','img','anonymous','user_id','created_at')->where('approved',1);
    }

    // likes
    public function likes(){
      return $this->hasMany(React::class)->where('react','like');
    }
    // dislikes
    public function dislikes(){
      return $this->hasMany(React::class)->where('react','dislike');
    }
}
