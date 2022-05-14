<?php

namespace App\Repositories;

use App\Models\News;

class NewsRepository extends AbstractRepository
{
    protected $model = News::class;

    public function getById(int $news_id)
    {
        return $this->getModel()
            ->find($news_id);
    }

    public function getLastNews($limit = 5)
    {
        return $this->getModel()
            ->orderBy('datetime')
            ->limit(5)
            ->get();
    }
}
