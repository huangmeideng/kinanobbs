<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Handlers\ImageUploadHandler;

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

    /**
     * @author: Kinano
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * 更新用户信息
     */
    public function update(UserRequest $request,ImageUploadHandler $uploader,User $user)
    {
        $data = $request->all();
        if ($request->avatar){
            $result = $uploader->save($request->avatar,'avatars',$user->id,362);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }
        $user->update($data);
        return redirect()->route('users.show',$user->id)->with('success','个人资料更新成功!');
    }
}
