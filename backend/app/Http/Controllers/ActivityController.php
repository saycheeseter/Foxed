<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Classroom;
use App\Code;
use App\Score;
use Auth;

class ActivityController extends Controller
{
    public function index() 
    {
        // $forums = Forum::latest()->get();
        // return view('threads.index', compact('forums') );
        return Activity::all();
    }

    public function store(Request $request){
        if($request->image){
            $exploded = explode(',', $request->image);

            $decoded = base64_decode($exploded[1]);
            if(str_contains($exploded[0],'jpeg'))
                $extension = 'jpg';
            else
                $extension ='png';

            $fileName = str_random().'.'.$extension;
            $path = public_path().'/'.$fileName;

            file_put_contents($path, $decoded);

        }
        else{
            $fileName = 'none';
        }
        // $forums = Activity::create($request->except('image') + [
        // 'user_id' => Auth::id(),
        // 'image' => $fileName
        // ]);

        $activity = Activity::create( $request->except('image') + [
            'user_id' => Auth::id(),
            'title' => request('title'),
            'body' => request('body'),
            'image' => $fileName
        ]);

        return $activity;
    }
    public function show($id){
        $forum = Activity::find($id);
        
        if(count($forum) > 0)
            return response()->json(Activity::find($id));

        return response()->json(['error' => 'resource not found'],404);
    }

    public function update(Request $request, $id){
        $forum = Activity::find($id);

        $forum->update($request->all());
        return response()->json($forum);
    }

    public function destroy($id){
        try {
            Activity::destroy($id);
            return response([],204);
        }
        catch(\Exeption $e){
            return response([ 'Problem deleting the thread' ],500);
        }
    }

    public function showActivities(Classroom $classroom){
        return [$profileUser = $classroom, 'activities' => $classroom->classPosts()->latest()->get()];
    } 
    public function evaluationCodes($Actid){
        $codes = Activity::find($Actid);
        // $codes->CodesSubmitted->load('scores');
        // $scores->ScoresSubmitted->load('user');

        // $codes->CodesSubmitted->load('user');
        // $codes->ScoresSubmitted->load('user');
        return ['userAct' => $codes->CodesSubmitted->load('user'), 'score' => $codes->ScoresSubmitted->load('user'),'class'=> $codes];
        // return $codes->ScoresSubmitted->load('owner');
        return $codes;
    }
}
