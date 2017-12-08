<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];
    //
    public function path() {
        return '/community/{$this->channel->slug/{$this->id}';
    }
    public function replies() {
        return $this->hasMany(Reply::class);
    }
    public function addReply($reply) {
        return $this->replies()->create($reply);
    }
    public function channel() {
        return $this->belongsTo(Channel::class);
    }
    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function scopeFilter($query, $filters) {
        return $filters->apply($query);
    }

    // protected static function boot() {
    //     parent::boot();

    //     static::deleting(function ($thread) {
    //         $thread->replies()->delete();
    //     }
    // }
}
