<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        
    }

    public function before($user,$ability) {

        if ($user->isAdmin()) {
            return true;
        }
        
    }

    public function edit(User $authUser, User $user){
        return $authUser->id === $user->id;
    }

    public function update(User $authUser, User $user){
        return $authUser->id === $user->id;
    }


}
