<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;

class client
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $role = Role::where("name","Client")->get()->first();
        // dd([$role, auth()->user()]);
        if(auth()->user()->role_id === $role->id){

            return $next($request);
        }

        return redirect()->route('home');
    }
}
