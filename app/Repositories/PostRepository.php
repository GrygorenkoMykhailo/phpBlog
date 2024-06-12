<?php

namespace App\Repositories;
use App\Models\Post;
use App\Models\User;
use Response;

class PostRepository
{
    public function __construct()
    {
        //
    }

    public function getUserPostsByUserId(int $id)
    {
        return Post::where('user_id', $id)->get();
    }

    public function addPostToUser(int $id, $postData)
    {
        $user = User::find($id);
        $post = $user->posts()->create([
            'content' => $postData['content'],
        ]);
        return $post;
    }
}
