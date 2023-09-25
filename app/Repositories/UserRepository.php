<?php

namespace App\Repositories;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param RegisterUserRequest $request
     * @return mixed
     */
    public function registerNewUser(RegisterUserRequest $request): mixed
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        return User::create($input);
    }
}
