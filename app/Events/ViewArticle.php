<?php

namespace App\Events;

use App\Models\Article\Article;
use Illuminate\Session\Store;

class ViewArticle
{
    private $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function handle(Article $art)
	{
	    if (!$this->isArticleViewed($art))
	    {
	        $art->increment('art_hit_view');
	        $this->storeArticle($art);
	    }
	}

	private function isArticleViewed($art)
	{
	    $viewed = $this->session->get('viewed_article', []);

	    return array_key_exists($art->id, $viewed);
	}

	private function storeArticle($art)
	{
	    $key = 'viewed_article.' . $art->id;

	    $this->session->put($key, time());
	}
}