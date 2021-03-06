<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    public function channel() {
        return $this->belongsTo(Channel::class);
    }
    public function replies() {
        return $this->hasMany(Reply::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
