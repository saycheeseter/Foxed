<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Thread;
use Illuminate\Http\Request;
use Auth;


class ThreadController extends Controller
{
    public function __contruct() {
        $this->middleware('auth')->only('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Channel $channel, Thread $threads)
    {
        //
       $threads = $this->getThreads($channel);
        return $threads;
    }
    public function showChannels(Channel $channel) {
        $channel = Channel::latest()->get()->load('threads');
        return $channel;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('threads')
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'channel_id' => 'required|exists:channels,id'
        ]);
        Thread::Create([
            'user_id' => Auth::id(),
            'title' => request('title'),
            'channel_id' => 23,
            'body' => request('body')
        ]);
      
    }
    public function storeThreadOnChannel(Request $request, Channel $channel) {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'channel_id' => 'required|exists:channels,id'
        ]);
        Thread::Create([
            'user_id' => Auth::id(),
            'title' => request('title'),
            'channel_id' => request('channel_id') ,
            'body' => request('body')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show($channelId, Thread $thread)
    {
        
        $thread->load('replies', 'owner');
        $thread->replies->load('owner');
        return $thread;
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }

    protected function getThreads(Channel $channel) {
        if ($channel->exists) {
            //$channelId = Channel::where('slug', $channelSlug)->first()->id;
           // $threads = Thread::where('channel_id', $channelId)->latest()->get();
           $threads = $channel->threads()->latest();
          
        } else {
            $threads = Thread::latest();
           
            
        }
        
        
        $threads = $threads->get()->load('channel', 'owner', 'replies');
    }
}
