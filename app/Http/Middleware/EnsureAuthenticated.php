<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class EnsureAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = (int) $request->route('id');

        if($id !== 0 && $id > 0)
        {
            if(!Auth::check())
            {
                throw new AuthenticationException();
            }
            else
            {
                $user = Auth::user();
                if(!$user || $user->id !== $id)
                {
                    throw new AuthenticationException();
                }
                else
                {
                    return $next($request);
                }
            }
        } 
        else
        {
            throw new BadRequestHttpException();
        }
    }
}
