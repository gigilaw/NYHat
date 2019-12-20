<?php
namespace App\Http\Middleware;

use Closure;

class Cors
{
    public function handle($request, Closure $next)
    {
        return $next($request)
      ->header('Access-Control-Allow-Origin', 'https://discanddat.com')
      ->header('Access-Control-Allow-Origin', 'http://localhost')
      ->header('Access-Control-Allow-Methods', '*')
      ->header('Access-Control-Allow-Headers', '*');
    }
}
