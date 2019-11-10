<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create($request)
    {
        $input =  $request->all();
        $user = $this->userRepository->create($input);
        return $user;
    }

    public function update($request, $id)
    {
        $input =  $request->all();
        $user = $this->userRepository->update($input, $id);
        return $user;
    }

    public function getAll()
    {
        $users = $this->userRepository->getAll();
        return $users;
    }

    public function getById($id)
    {
        $user = $this->userRepository->getById($id);
        return $user;
    }

    public function getPosts($id)
    {
        $user = $this->userRepository->getPosts($id);
        return $user;
    }

    public function delete($id)
    {
        $deleted = $this->userRepository->delete($id);
        return $deleted;
    }
}
