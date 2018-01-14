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
    public function favorites() {
        return $this->morphMany(Favorite::class, 'favorited');
    }
    public function favorite() {
        $attributes = ['user_id' => auth()->id()];

        if(! $this->favorites()->where($attributes)->exists()) {
            return $this->favorites()->create($attributes);
        }
        else {
            abort(401, 'You already favorited this reply.');
        }
        
    }
    public function isFavorited() {
        return $this->favorites()->where('user_id', auth()->id())->exists();
    }

}
