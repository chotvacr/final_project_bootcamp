<?php

namespace App\Http\Controllers;
use App\Activity;
use App\User;


use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {   dd('blbl');
        $user = User::findOrFail($user_id);
        return view ('profile.show');
        

    }
}
