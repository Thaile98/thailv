<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use Session;

class CheckViewArticle
{
    private $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $art = $this->getViewedArticle();

        if (!is_null($art))
        {
            $art = $this->cleanExpiredViews($art);
            $this->storeArticle($art);
        }

        return $next($request);
    }

    private function getViewedArticle()
    {
        return $this->session->get('viewed_article', null);
    }

    private function cleanExpiredViews($art)
    {
        $time = time();

        // Let the views expire after one hour.
        $throttleTime = 10;

        return array_filter($art, function ($timestamp) use ($time, $throttleTime)
        {
            return ($timestamp + $throttleTime) > $time;
        });
    }

    private function storeArticle($art)
    {
        $this->session->put('viewed_article', $art);
    }
}