<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('adminUser');
    }

    public function getUsers($value){
        if ($value == 'all') {
            return view('user.crud', ['users' => User::all()]);
        }
        return view('user.crud', ['users' => User::where('user_state', $value)->get()]);
    }


    public function getUsersProfile($id){

        return view('user.profile', ['user' => User::find( $id)]);

    }

}
