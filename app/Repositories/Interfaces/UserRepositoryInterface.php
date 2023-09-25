<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\RegisterUserRequest;

interface UserRepositoryInterface
{
    /**
     * @param RegisterUserRequest $request
     * @return mixed
     */
    public function registerNewUser(RegisterUserRequest $request): mixed;
}
