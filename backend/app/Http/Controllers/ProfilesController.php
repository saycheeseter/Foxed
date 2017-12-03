<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //
    public function show(User $user) {
       
      
        return [$profileUser = $user, 'threads' => $user->threads()->latest()->get()];
    }
   
}
