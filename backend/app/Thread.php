<?php

namespace App;

use App\Events\ThreadReceivedNewReply;
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
            ->where('user_id', Auth::guard('api')->id())
            ->delete();
    }
    public function subscriptions() {
        return $this->hasMany(ThreadSubscription::class);
    }
    
    public function getIsSubscribedToAttribute()
    {
       
        return $this->subscriptions()
        ->where('user_id', Auth::guard('api')->id())
        ->exists();
            
    }

    //
    public function path() {
        return "#/community/{$this->channel->slug}/{$this->id}";
    }
    public function replies() {
        return $this->hasMany(Reply::class);
    }
    public function addReply($reply) {
        $reply = $this->replies()->create($reply);

        $this->subscriptions
            ->filter(function ($sub) use ($reply) {
                return $sub->user_id != $reply->user_id;
            })
            ->each->notify($reply);


     
        return $reply;
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
