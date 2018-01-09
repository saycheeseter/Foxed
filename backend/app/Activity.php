<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Activity;
use Auth;
class Activity extends Model
{
    protected $guarded = [];
    //
    public function owner() {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    public function CodesSubmitted() {
        return $this->hasMany(Code::class);
    }
    public function ScoresSubmitted() {
        return $this->hasMany(Score::class);
    }
    
    public function activities(){
        return $this->hasMany(Classroom::class);
    }
    // public function teacher() {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
