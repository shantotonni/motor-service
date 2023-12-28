<?php

namespace App\Http\Controllers;

use App\JobCard;
use App\VisitorCount;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        return view('home');
    }
}
