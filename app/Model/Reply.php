<?php

namespace App\Model;

use App\User;
use App\Model\Like;
use App\Model\Question;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

   protected $guarded = [];
    //Creating Relationship For Reply Models

    public function question(){

        return $this->belongsTo(Question::class);
     }
     public function user(){
        return $this->belongsTo(User::class);
     }
     public function like(){

        return $this->hasMany(Like::class);
     }
}
