<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function create($request)
    {
        $input =  $request->all();
        $post = $this->postRepository->create($input);
        return $post;
    }

    public function update($request, $id)
    {
        $input =  $request->all();
        $post = $this->postRepository->update($input, $id);
        return $post;
    }

    public function getAll($userId)
    {
        $posts = $this->postRepository->getAll($userId);
        return $posts;
    }

    public function getById($id)
    {
        $post = $this->postRepository->getById($id);
        return $post;
    }

    public function delete($id)
    {
        $deleted = $this->postRepository->delete($id);
        return $deleted;
    }
}
