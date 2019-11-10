<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create(Request $request)
    {
        $user = $this->userService->create($request);
        return json_encode($user);
    }

    public function update(Request $request, $id)
    {
        $user = $this->userService->update($request, $id);
        return json_encode($user);
    }

    public function getAll()
    {
        $users = $this->userService->getAll();
        return json_encode($users);
    }

    public function getById($id)
    {
        $user = $this->userService->getById($id);
        return json_encode($user);
    }

    public function getPosts($id)
    {
        $user = $this->userService->getPosts($id);
        return json_encode($user);
    }

    public function delete($id)
    {
        $deleted = $this->userService->delete($id);
        return json_encode($deleted);
    }
}
