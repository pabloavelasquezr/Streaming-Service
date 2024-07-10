<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Following\Following;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function followedShows()
    {
        $followedShows = Following::select()->orderBy('id','desc')
            ->where('user_id', Auth::user()->id)->get();

        return view('users.followed-shows', compact('followedShows'));
    }
}
