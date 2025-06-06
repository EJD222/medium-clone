<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function followUnfollow(User $user) {
        //Add the authenticated user to the followers of the user
        $user->followers()->toggle(auth()->user());
        return response()->json([
            'followersCount' => $user->followers()->count()
        ]);  
    }
}
