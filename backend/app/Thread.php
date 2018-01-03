<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Jobs\MakeSearchable;
use Laravel\Scout\Searchable;
use App\Thread;
use Auth;

class Thread extends Model
{
    use Searchable;
    protected $guarded = [];
    protected $appends = ['isSubscribedTo'];
    public function subscribe() {
        return $this->subscriptions()->create([
            'user_id' => auth()->id()
        ]);
    }
    public function unsubscribe() {
        $this->subscriptions()
            ->where('user_id', $userId ?: auth()->id())
            ->delete();
    }
    public function subscriptions() {
        return $this->hasMany(ThreadSubscription::class);
    }

    public function getIsSubscribedToAttribute()
    {
        return $this->subscriptions()
            ->where('user_id', auth()->id())
            ->exists();
            
    }

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
    public function subscribers() {
        return $this->hasMany(ThreadSubscription::class);
    }
    public function scopeFilter($query, $filters) {
        return $filters->apply($query);
    }
   
}
