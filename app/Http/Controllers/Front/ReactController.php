<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\React;
use App\Models\Experience;
use Auth;

class ReactController extends Controller
{
  // # make react
  public function react($expid,$action)
  {
      $userId = Auth::id(); // Loign User
      /*** React With This Exp ID ****/
      if($action == 'like')
      {
        //******* Check If User Make Like Before *******//
        $like = React::where('experience_id',$expid)->where('react','like')->where('user_id',$userId);
          //******* User liked Before => Remove The Like  *******//
        if($like->count())
        {
            $like->delete();
        }else {
          //******* User Dosnt Like  Before => Add Like   *******//
          React::create([
            'react' => 'like',
            'user_id' => $userId,
            'experience_id' => $expid
          ]);
          $userLiked = true;
        }
      }else if($action == 'dislike')
      {
        //******* Check If User Make disLike Before *******//
        $disLike = React::where('experience_id',$expid)->where('react','dislike')->where('user_id',$userId);
        // User DislIkes Before Reomve Recoured
        if($disLike->count())
        {
            $disLike->delete();
        }else {
          //******* User Dosnt dislike  Before => Add dislike   *******//
          React::create([
            'react' => 'dislike',
            'user_id' => $userId,
            'experience_id' => $expid
          ]);
        }
      }

      return \response()->json([
        'success' => true,
        'likes' => React::where('experience_id',$expid)->where('react','like')->count(),
        'dislike' => React::where('experience_id',$expid)->where('react','dislike')->count(),
      ]);
  }

}
