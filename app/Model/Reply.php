<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //Creating Relationship For Reply Models

    public function question(){

        return $this->belongsTo(Question::class);
     }
     public function like(){

        return $this->hasMany(Like::class);
     }
}
