<?php

namespace App\Http\Middleware;

use App\Repositories\UserTokenRepositoryInterface;
use App\Services\UserAuth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class AuthUserVerification
{
    /**
     * @var UserAuth service
     */
    private UserAuth $user_auth;

    /**
     * @var UserTokenRepositoryInterface repository
     */
    private UserTokenRepositoryInterface $user_token_repository;

    public function __construct(UserTokenRepositoryInterface $user_token_repository)
    {
        $this->user_auth = new UserAuth();
        $this->user_token_repository = $user_token_repository;
    }

    /**
     * Handle an incoming request.
     *
     * @param Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // session()->put('user_id', 1);
        if ($this->user_token_repository->isTokenNotAvailable($this->user_auth->getId())) {
            # code...
        }
        return $next($request);
    }
}
