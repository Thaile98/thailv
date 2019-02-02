<?php

namespace App\Policies;

use App\User;
use App\Models\Article\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    
    /**
     * Determine whether the user can view the article.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function listArticle(User $user)
    {
        return $user->hasAccess('view-article');
    }
    public function editAll(User $user,Article $article)
    {
        return $user->hasAccess('edit-all-article');
    }
}
