<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use App\Models\Link;
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

        // Save ip as a hash
        $ip = hash('sha512', $request->ip());
           
        // Check if user is going for a redirect
        if (Link::where('input_url', $request->path())->first()) {
            return $next($request);
        }

        // Check if admin
        if (Auth::check()) {
            if (in_array(Auth::user()->name, $admin)) {
                return $next($request);
            }
        }

        // Save geo tag
        if ($geoIp = Location::get($request->ip())) {
            $geo = $geoIp->countryName;
        } else {
            $geo = 'undefined';
        };

        // Count a visitor if all good
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
