<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Code;
use Auth;

class CodeController extends Controller
{
    public function index()
    {
        
        return Code::all();
    }
    
    public function store(Request $request){
       
        Code::create([
            'user_id' => Auth::id(),
            'title' => request('title'),
            'html' => request('html'),
            'js' => request('js'),
            'css' => request('css')
        ]);
        
    }
    public function show($id){
        $code = Code::find($id);
        
        if(count($code) > 0)
            return response()->json(Code::find($id));

        return response()->json(['error' => 'resource not found'],404);
    }
    public function update(Request $request, $id){
        $code = Code::find($id);

        $code->update($request->all());
        return response()->json($code);
    }
    public function destroy($id){
        try {
            Code::destroy($id);
            return response([],204);
        }
        catch(\Exeption $e){
            return response([ 'Problem deleting the thread' ],500);
        }
    }
    public function showCodes(User $user){
        return [$profileUser = $user, 'codes' => $user->project()->latest()->get()];
    }
}
