<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function toggleFollow(User $user)
{
    if (Auth::id() === $user->id) {
        return back()->with('error', 'You cannot follow yourself.');
    }

    /** @var \App\Models\User $me */
    $me = Auth::user(); 

    if ($me->isFollowing($user->id)) {
        $me->followings()->detach($user->id);
    } else {
        $me->followings()->attach($user->id);
    }
    return back();
}
}
