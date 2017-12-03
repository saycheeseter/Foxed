<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    public function classroom() {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    public function teacher() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
