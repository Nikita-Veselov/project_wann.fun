<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location as Location;

class CountVisitor
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
        $admin = (new Controller)->admins;

        $ip = hash('sha512', $request->ip());
        if (Auth::check()) {
            if (in_array(Auth::user()->name, $admin)) {
                return $next($request);
            }
        }

        if ($geoIp = Location::get($request->ip())) {
            $geo = $geoIp->countryName;
        } else {
            $geo = 'undefined';
        };

        if (Visitor::where('date', today())->where('ip', $ip)->count() < 1)
        {
            Visitor::create([
                'date' => today(),
                'ip' => $ip,
                'geo' => $geo
            ]);
        }
        return $next($request);
    }
}
