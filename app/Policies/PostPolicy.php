<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function modify(User $user,Post $post) :bool{
        //does this user own the post
        return $user->id === $post->user_id;
    }
}
