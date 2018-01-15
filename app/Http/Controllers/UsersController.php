<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @author: Kinano
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 展示用户信息
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }
}
