<?php

namespace App\Http\Middleware;

use App\PageVisits\Pages\PageFactory;
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
        if ($route = $request->route()) {
            $this->track($route->getName());
        }

        return $next($request);
    }

    private function track(string $route): void
    {
        $page = PageFactory::make($route);

        if (!$page) {
            return;
        }

        try {
            visits($page)->increment();
        } catch (\Exception $e) {
            Log::error('Could not increment page visit', [
                'e.message' => $e->getMessage(),
                'classFQN'  => get_class($page),
            ]);
        }
    }
}
