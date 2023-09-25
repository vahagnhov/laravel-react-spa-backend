<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     *
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle($request, Closure $next): mixed
    {
        if (!empty(trim($request->input('api_token')))) {

            $is_exists = User::where('id', Auth::guard('api')->id())->exists();
            if ($is_exists) {
                return $next($request);
            }
        }
        return response()->json('Invalid Token', 401);
    }
}
