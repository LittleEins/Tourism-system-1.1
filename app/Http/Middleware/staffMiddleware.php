<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User; 

class staffMiddleware
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
        if (!session()->has('LoggedUser'))
        {
            return redirect()->route('login')->with('fails','You must be logged in first');
        }

        if (session()->has('LoggedUser') && ($request->path() == 'login' || $request->path() == 'register') || $request->path() == '/')
        {
            return back();
        }

        if (session()->has('LoggedUser'))
        {
            $data = User::where('id','=', session('LoggedUser'))->first();

            if ($data->role == '1')
            {
                return $next($request);
            }
            else
            {
                return redirect()->route('login')->with('fails','You dont have permission to access this route!');
            }
        }
    }
}
