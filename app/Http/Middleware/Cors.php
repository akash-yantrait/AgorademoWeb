<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        if(request()->isMethod('OPTIONS')){
            response()->json(['success' => 'success'], 200);
        }
        else{
            return $next($request)
            ->header('Access-Control-Allow-Origin:', "*, https://api.sd-rtn.com, http://api.sd-rtn.com")
            ->header('Access-Control-Allow-Methods:', "GET, POST, PATCH, PUT, DELETE, OPTIONS")
            ->header('Access-Control-Allow-Headers:', "Origin, Content-Type, Authorization, X-Requested-With");
    
    
        }

       
    }
}
