<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @author: Kinano
     * @param User $currentUser
     * @param User $user
     * @return bool
     * 用户更新权限验证
     */
    public function update(User $currentUser,User $user)
    {
        return $currentUser->id === $user->id;
    }
}
