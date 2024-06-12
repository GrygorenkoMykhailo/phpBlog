<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    protected $postRepository;
    protected $userRepository;
    public function __construct(PostRepository $postRepository, UserRepository $userRepository)
    {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }
    public function getPosts(Request $request, int $id)
    {
        $user = Auth::user();

        $user = $this->userRepository->findUserById($id);

        if($user)
        {
            return view('user.posts', 
            [
                'posts' => $this->postRepository->getUserPostsByUserId($id),
                'user' => $user,
            ]);
        }

        throw new NotFoundHttpException();
    }
}
