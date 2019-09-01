<?php

namespace App\Observers;

use App\Models\Article;

class ArticleObserver
{
    /**
     * 删除文章关联标签
     * Handle the article "force deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function forceDeleted(Article $article)
    {
        $article->tags()->detach();
    }
}
