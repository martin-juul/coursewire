<?php

namespace App\Http\Middleware;

use App\Analytics\Repository;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PageVisitTracker
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $repository = app(Repository::class);
        $repository->record($request);

        return $next($request);
    }
}
