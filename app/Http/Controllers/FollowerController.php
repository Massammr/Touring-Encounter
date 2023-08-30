<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follower;
use Auth;


class FollowerController extends Controller
{
    public function store($userId)
    {
        Auth::user()->follows()->attach($userId);
        return;
    }
} //
