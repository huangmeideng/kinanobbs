<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

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

    /**
     * @author: Kinano
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 编辑资料
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    public function update(UserRequest $request,User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.show',$user->id)->with('success','个人资料更新成功!');
    }
}
