<?php

namespace App\Services;

use Exception;
use App\Repositories\UserRepository;
use App\Repositories\PostRepository;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ImportService
{
    public function import()
    {
        try {
            $userRepository = new UserRepository();
            $postRepository = new PostRepository();
            $users_count = $userRepository->getAll()->count();
            if ($users_count == 0) {
                $http = new Client([
                    'base_uri' => 'http://jsonplaceholder.typicode.com',
                    'timeout'  => 2.0,
                ]);
                try {
                    $responseUsers = $http->get('/users');
                    $responseUsers = json_decode($responseUsers->getBody(), true);
                    $responsePosts = $http->get('/posts');
                    $responsePosts = json_decode($responsePosts->getBody(), true);
                } catch (RequestException $e) {
                    throw $e;
                }
                foreach ($responseUsers as $user) {
                    $newUser = $userRepository->create($user);
                    foreach ($responsePosts as $post) {
                        if ($post['userId'] == $user['id']) {
                            $post['userId'] = $newUser->id;
                            $postRepository->create($post);
                        }
                    }
                }
            }
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
