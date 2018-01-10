<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\ThreadWasUpdated;
use App\Thread;
use App\User;

use App\ThreadSubscription;
use Auth;

class ThreadSubscription extends Model
{
    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
    
    public function notify($reply) {
        $this->user->notify(new ThreadWasUpdated($this->thread, $reply));
    }
}
