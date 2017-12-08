<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Reply;
use Auth;


class RepliesController extends Controller
{
    function index(){
        return Reply::all();
    }
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function store($channelId, Thread $thread, Request $request) {
        $this->validate($request, ['body' => 'required']);
        $reply = $thread->addReply([
            'body' => request('body'),
            'user_id' => Auth::id()
        ]);
        if(request()->expectsJson()){
            return $reply->load('owner');
        }
    }
    public function update(Reply $reply) {
        $this->authorize('updateReply', $reply);
        $reply->update(['body' => request('body')]);
    }
    public function destroy(Reply $reply) {
        $this->authorize('updateReply', $reply);
        $reply->delete();

        if(request()->expectsJson()) {
            return response(['status' => 'Reply deleted']);
        }
        
    }
}
