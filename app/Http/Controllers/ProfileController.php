<?php

namespace App\Http\Controllers;
use App\User;
use App\Activity;



use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // public function show($user_id)
    // {   
    //     $user = User::findOrFail($user_id);
    //     return view ('profile.show', compact('user'));
        

    // }

    public function show($user_id)
    {   

        $user = User::findOrFail($user_id); 
        
        return view('profile.show', compact('user')); 

    }

}
