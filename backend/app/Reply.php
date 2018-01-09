<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];
    protected $with = ['owner'];

    //
    public function getRouteKeyName() {
        return 'id';
    }
    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
    public function path()
    {
        return $this->thread->path() . "#reply-{$this->id}";
    }

}
