<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Post $post)
    {
        //
    }


    public function create(User $user)
    {
        return $user->role->name != 'user';
    }


    public function update(User $user, Post $post)
    {
        //
    }


    public function delete(User $user, Post $post)
    {
       return ($user->id == $post->user_id) || ($user->role->name!='user');
    }


    public function restore(User $user, Post $post)
    {
        //
    }


    public function forceDelete(User $user, Post $post)
    {
        //
    }
}
