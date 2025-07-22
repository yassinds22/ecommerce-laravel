<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
       

      
         $user = Auth::user();

        if ($user && $user->usertype === 'admin') {
            // المستخدم هو أدمن، اسمح بالمرور
            return $next($request);
        }

        // المستخدم ليس أدمن، قم بإعادة التوجيه إلى الصفحة المناسبة
        return redirect()->route('home');
    

            
            
        
        
        
    }
}
