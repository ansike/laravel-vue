<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return User::paginate(10);
    }

    public function show(User $user){
        return $user;
    }
}
