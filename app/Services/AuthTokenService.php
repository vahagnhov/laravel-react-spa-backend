<?php

namespace App\Services;

class AuthTokenService
{
    /**
     * @param $user
     * @return array
     */
    public static function generateAuthAccessToken($user)
    {
        $accessToken = $user->createToken('MyApp')->accessToken;
        $userName = $user->name;

        return [
            'token' => $accessToken,
            'name' => $userName,
        ];
    }
}
