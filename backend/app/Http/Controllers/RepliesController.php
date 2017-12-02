<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
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
        $thread->addReply([
            'body' => request('body'),
            'user_id' => Auth::id()
        ]);
    }
}
