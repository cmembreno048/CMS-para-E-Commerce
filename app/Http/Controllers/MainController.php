<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{

    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('adminUser');
    }

    public function getMain(){

        return view('dashboard');

    }
}
