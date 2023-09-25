<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\RegisterUserRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\AuthTokenService;
use Illuminate\Http\JsonResponse;

class RegisterController extends BaseController
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Register api
     *
     * @param RegisterUserRequest $request
     * @return JsonResponse
     */
    public function register(RegisterUserRequest $request): JsonResponse
    {
        $user = $this->userRepository->registerNewUser($request);
        $success = AuthTokenService::generateAuthAccessToken($user);

        return $this->sendResponse($success, __('User register successfully.'));
    }
}
