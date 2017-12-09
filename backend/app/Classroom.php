<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    //
    protected $guarded = [];
    public function join($userId = null) {
        $this->joins()->create([
            'user_id' => $userId ?: auth()->id()
        ]);
    }
    public function joins() {
        return $this->hasMany(UserGroup::class);
    }

    public function members() {
        return $this->hasMany(UserGroup::class);
    }
    public function announcements() {
        return $this->hasMany(UserGroup::class);
    }
    public function assignments() {
        return $this->hasMany(UserGroup::class);
    }
    public function files() {
        return $this->hasMany(UserGroup::class);
    }
    public function classPosts(){
        return $this->hasMany(Activity::class);
    }
}
