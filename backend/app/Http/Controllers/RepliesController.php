<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;

class RepliesController extends Controller
{
    function index(){
        return Reply::all();
    }
}
