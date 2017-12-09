<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Classroom;
class Classroom extends Model
{
    //
    protected $guarded = [];
    public function subscribe($userId = null) {
        $this->subscriptions()->create([
            'user_id' => $userId ?: auth()->id()
        ]);
    }
    public function unsubscribe($userId = null) {
        $this->subscriptions()
            ->where('user_id', $userId ?: auth()->id())
            ->delete();
    }
    public function subscriptions() {
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
   
}
