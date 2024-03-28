<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;

class VisitorMiddleware
{
    public function handle($request, Closure $next)
    {
        $visitor = Visitor::firstOrNew([]);
        $visitor->count++;
        $visitor->save();

        return $next($request);
    }
}
