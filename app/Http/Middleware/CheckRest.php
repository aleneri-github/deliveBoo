<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use App\Restaurant;

class CheckRest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        $rest = Restaurant::where('id', Auth::id())->get();
        if ($rest->isEmpty()) {
          return $next($request);
        }
        // return redirect()->route('home');
        return redirect()->route('admin.dishes.index');
    }
}
