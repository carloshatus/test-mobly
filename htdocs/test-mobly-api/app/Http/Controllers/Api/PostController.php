<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function create(Request $request)
    {
        $post = $this->postService->create($request);
        return json_encode($post);
    }

    public function update(Request $request, $id)
    {
        $post = $this->postService->update($request, $id);
        return json_encode($post);
    }

    public function getAll($userId)
    {
        $posts = $this->postService->getAll($userId);
        return json_encode($posts);
    }

    public function getById($id)
    {
        $post = $this->postService->getById($id);
        return json_encode($post);
    }

    public function delete($id)
    {
        $deleted = $this->postService->delete($id);
        return json_encode($deleted);
    }
}
