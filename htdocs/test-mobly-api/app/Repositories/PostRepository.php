<?php

namespace App\Repositories;

use Exception;
use App\Entities\Post;

class PostRepository
{
    public function create($input)
    {
        try {
            $post = [
                'userId' => $input->userId,
                'title' => $input->title,
                'body' => $input->body
            ];
            $newPost = Post::create($post);
            return $this->getById($newPost->id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update($input, $id)
    {
        try {
            $postCurrent = Post::find($id);
            $post = [
                'userId' => $input->userId,
                'title' => $input->title,
                'body' => $input->body
            ];
            $postCurrent->update($post);
            $this->getById($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAll($userId)
    {
        $posts = Post::where('userId', $userId)->get();
        return $posts;
    }

    public function getById($id)
    {
        $post = Post::find($id);
        return $post;
    }

    public function delete($id)
    {
        try {
            $postCurrent = Post::find($id);
            $postCurrent->delete();
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
