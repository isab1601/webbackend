<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::with(['offers'])->get();
        return $users;
    }

    public function findByID(string $userid) {
        $user= User::where('id',$userid)->with(['offers'])->first();
        return $user;
    }
}
